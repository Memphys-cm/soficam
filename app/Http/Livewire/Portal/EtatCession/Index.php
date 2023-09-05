<?php

namespace App\Http\Livewire\Portal\EtatCession;

use App\Models\User;
use Livewire\Component;
use App\Models\Sales\Sale;
use App\Models\EtatCession;
use App\Models\SubDivision;
use App\Models\TitreFoncier;
use App\Models\Sales\Saleable;
use App\Models\MembreDuCabinet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{

    use WithDataTables;

    public EtatCession $etat_cession;
    public $land_titles , $titre_foncier_id , $geometre_id , $geometres , $subdivisions , $subdivision_id;
    public $state = 0 , $price_m2 , $users , $user_id;
    public ?string $query=null;

    public $reference_etat_cession;
    public $type_personne;
    public $sub_division_id;
    public $lieu_dit;
    public $superficie_en_m2;
    public $type_operation;
    public $cout;
    public $frais_suplementaires;
    public $cout_etat_cession;
    public $status;
    public $commentaires;
    public $zone;

    public function mount()
    {
        $this->land_titles = TitreFoncier::all();
        $this->users = User::role('user')->get();
        $this->geometres = MembreDuCabinet::geometre()->get();
        $this->subdivisions = SubDivision::all();
    }

    public function initData($id)
    {
        $etat_cession = EtatCession::findOrFail($id);

        $this->etat_cession = $etat_cession;
        $this->reference_etat_cession = $etat_cession->reference_etat_cession;
        $this->type_personne = $etat_cession->type_personne;
        $this->titre_foncier_id = $etat_cession->titre_foncier_id;
        $this->sub_division_id = $etat_cession->sub_division_id;
        $this->lieu_dit = $etat_cession->lieu_dit;
        $this->superficie_en_m2 = $etat_cession->superficie_en_m2;
        $this->type_operation = $etat_cession->type_operation;
        $this->cout = $etat_cession->cout;
        $this->frais_suplementaires = $etat_cession->frais_suplementaires;
        $this->cout_etat_cession = $etat_cession->cout_etat_cession;
        $this->status = $etat_cession->status;
        $this->commentaires = $etat_cession->commentaires;
        $this->zone = $etat_cession->zone;

        $this->titre_foncier_id = $etat_cession->titre_foncier_id;

    }

    public function updatedTitreFoncierId($id) 
    {
        if(!empty($id)){
           $tf =  TitreFoncier::findOrFail($id);
           $this->sub_division_id = $tf->subDivision->id;
           $this->lieu_dit = $tf->lieu_dit;
           $this->zone = $tf->zone;
        }

    }

    public function updated()
    {
        $area =  $this->superficie_en_m2;
        $zone = $this->zone;

        $this->price_m2 = match ($zone) {
            "urbain" => ($area <= 5000) ? 25000 : ($area - 5000) * 20,
            "rurale" => match (true) {
                ($area <= 50000) => 25000,
                ($area >= 50000 && $area <= 200000) => 50000,
                default => ($area - 200000) * 1,
            },
            default => 0,
        };
        
        $this->frais_suplementaires = 2500;
        $this->cout = (int)$this->price_m2;
        $this->cout_etat_cession = (int)$this->cout + (int)$this->frais_suplementaires;
   
    }

    protected array $rules = [
        'reference_etat_cession' => 'sometimes',
        'type_personne' => 'sometimes',
        'titre_foncier_id' => 'sometimes',
        'geometre_id' => 'sometimes',
        'user_id' => 'required',
        'sub_division_id' => 'required',
        'lieu_dit' => 'required',
        'superficie_en_m2' => 'required',
        'type_operation' => 'required',
        'cout' => 'sometimes',
        'frais_suplementaires' => 'sometimes',
        'cout_etat_cession' => 'sometimes',
        'status' => 'sometimes',
        'commentaires' => 'sometimes',
        'zone' => 'sometimes',
    ];

    public function generateUniqueCode($year, $counter)
    {
        $counterFormatted = str_pad($counter, 5, '0', STR_PAD_LEFT);
        return $year . 'STATE' . $counterFormatted;
    }

    public function store()
    {
        if (!Gate::allows('etat_cession.create')) {
            return abort(401);
        }
        // Récupérer l'année en cours au format 'yy'
        $year = date('y');

        // Récupérer le compteur depuis la base de données (par exemple en comptant les enregistrements de lotissement existants)
        $counter = EtatCession::count() + 1;

        // Générer le code unique
        $code = $this->generateUniqueCode($year, $counter);

        $this->validate();

        // $this->subdivision_id->reference_etat_cession = $code;
        DB::transaction(function() use($code) {
            $etat_cession = EtatCession::create([
                'sub_division_id' => $this->sub_division_id,
                'reference_etat_cession' => $code,
                'user_id' => $this->user_id,
                'geometre_id' => $this->geometre_id,
                'frais_suplementaires' => $this->frais_suplementaires,
                'cout' => $this->cout,
                'cout_etat_cession' => $this->cout_etat_cession,
                'status' => 'pending_payment',
                'superficie_en_m2' => $this->superficie_en_m2,
            ]);

            $sale = Sale::create([
                'user_id' => $this->user_id,
                'sales_amount' => $etat_cession->cout_etat_cession,
                'sales_type' => 'etat_cession',
                'created_by' => auth()->user()->name,
            ]);

            // Create the Saleable item using only the specified information
            Saleable::create([
                'sale_id' => $sale->id,
                'price' => $etat_cession->cout_etat_cession,
                'quantity' => 1,
                'saleable_id' => $etat_cession->id,
                'saleable_type' => 'App\Models\EtatCession', // Adjust the namespace if different
                'created_by' => auth()->user()->name,
            ]);
        });

        $this->clearFields();

        $this->refresh(__('Etat Cession créé avec succes'), 'CreateEtatCessionModal');
    }

    public function update()
    {
        if (!Gate::allows('etat_cession.update')) {
            return abort(401);
        }

        $this->validate();

        if(!empty($this->etat_cession)){

            DB::transaction(function ()  {
                $this->etat_cession->update([
                    'sub_division_id' => $this->sub_division_id,
                    'user_id' => $this->user_id,
                    'geometre_id' => $this->geometre_id,
                    'frais_suplementaires' => $this->frais_suplementaires,
                    'cout' => $this->cout,
                    'cout_etat_cession' => $this->cout_etat_cession,
                    'status' => 'pending_payment',
                    'superficie_en_m2' => $this->superficie_en_m2,
                ]);
    
                if($this->cout_etat_cession !== $this->etat_cession->cout_etat_cession)
                {
                    $saleable = Saleable::whereSaleableId($this->etat_cession->id)->first();

                    $sale = Sale::findOrFail($saleable->sale_id);

                    $sale->update([
                        'user_id' => $this->user_id,
                        'sales_amount' => $this->etat_cession->cout_etat_cession,
                        'created_by' => auth()->user()->name,
                    ]);

                    $saleable->update([
                        'price' => $this->etat_cession->cout_etat_cession,
                    ]);
                }

            });
        }

        $this->clearFields();

        $this->refresh(__('Etat Cession mis à jour avec succes'), 'CreateEtatCessionModal');
    }

    public function delete()
    {
        if (!Gate::allows('etat_cession.delete')) {
            return abort(401);
        }

        if (!empty($this->etat_cession)) {

            $saleable = Saleable::whereSaleableId($this->etat_cession->id)->first();

            Sale::findOrFail($saleable->sale_id)->delete();

            $saleable->delete();

            $this->etat_cession->delete();
        }


        $this->refresh(__('Etat Cession supprimé avec succes!'), 'DeleteModal');
    }

    public function clearFields()
    {
        $this->reset([
           'reference_etat_cession',
           'type_personne',
           'titre_foncier_id',
           'geometre_id',
           'user_id',
           'sub_division_id',
           'lieu_dit',
           'superficie_en_m2',
           'type_operation',
           'cout',
           'frais_suplementaires',
           'cout_etat_cession',
           'status',
           'commentaires',
           'zone'
        ]);
    }

    public function render()
    {
        if (!Gate::allows('etat_cession.view')) {
            return abort(401);
        }

        $state_assignments = EtatCession::search($this->query)->
        // withCount('users')->
        orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $state_assignments_count = EtatCession::count();

        return view('livewire.portal.etat-cession.index',  ['state_assignments' => $state_assignments, 'state_assignments_count' => $state_assignments_count]);
    }
}
