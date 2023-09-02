<?php

namespace App\Http\Livewire\Portal\EtatCession;

use App\Models\User;
use Livewire\Component;
use App\Models\Sales\Sale;
use App\Models\EtatCession;
use App\Models\SubDivision;
use App\Models\TitreFoncier;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithDataTables;
use App\Models\Sales\Saleable;

class Index extends Component
{

    use WithDataTables;

    public EtatCession $state_assignment;
    public $land_titles , $land_id , $geometre_id , $geometres , $subdivisions , $subdivision_id;
    public $state = 0 , $price_m2 , $users , $user_id;
    public ?string $query=null;

    public function mount()
    {
        $this->state_assignment = new EtatCession();
        $this->land_titles = TitreFoncier::all();
        $this->users = User::role('user')->get();
        $this->geometres = User::role('user')->get();
        $this->subdivisions = SubDivision::all();
    }

    public function initData($id)
    {
        $this->state_assignment = EtatCession::findOrFail($id);
        $this->state = 1;
    }

    public function updated()
    {
        $area =  $this->state_assignment->superficie_en_m2;
        $zone = $this->state_assignment->zone;

        // if ($zone == "terrain_urbain") {
        //     $this->price_m2 = ($area <= 5000) ? 25000 : ($area - 5000) * 20;
        // } else if ($zone == "terrain_rurale") {
        //     if ($area <= 50000) {
        //         $this->price_m2 = 25000;
        //     } else if ($area >= 50000 && $area <= 200000) {
        //         $this->price_m2 = 50000;
        //     }else if($area > 200000){
        //         $this->price_m2 = ($area - 200000) * 1;
        //     }
        // }

        $this->price_m2 = match ($zone) {
            "terrain_urbain" => ($area <= 5000) ? 25000 : ($area - 5000) * 20,
            "terrain_rurale" => match (true) {
                ($area <= 50000) => 25000,
                ($area >= 50000 && $area <= 200000) => 50000,
                default => ($area - 200000) * 1,
            },
            default => 0,
        };
        
        $this->state_assignment->frais_suplementaires = 2500;
        $this->state_assignment->cout = (int)$this->price_m2;
        $this->state_assignment->cout_etat_cession = (int)$this->state_assignment->cout + (int)$this->state_assignment->frais_suplementaires;
   
    }

    protected array $rules = [
        'state_assignment.reference_etat_cession' => 'sometimes',
        'state_assignment.type_personne' => 'sometimes',
        'state_assignment.titre_foncier_id' => 'sometimes',
        'state_assignment.geometre_id' => 'sometimes',
        'state_assignment.user_id' => 'required',
        'state_assignment.sub_division_id' => 'required',
        'state_assignment.lieu_dit' => 'required',
        'state_assignment.superficie_en_m2' => 'required',
        'state_assignment.type_operation' => 'required',
        'state_assignment.cout' => 'sometimes',
        'state_assignment.frais_suplementaires' => 'sometimes',
        'state_assignment.cout_etat_cession' => 'sometimes',
        'state_assignment.status' => 'sometimes',
        'state_assignment.commentaires' => 'sometimes',
        'state_assignment.zone' => 'sometimes',
    ];

    public function generateUniqueCode($year, $counter)
    {
        $counterFormatted = str_pad($counter, 5, '0', STR_PAD_LEFT);
        return $year . 'STATE' . $counterFormatted;
    }

    public function store()
    {

        // Récupérer l'année en cours au format 'yy'
        $year = date('y');

        // Récupérer le compteur depuis la base de données (par exemple en comptant les enregistrements de lotissement existants)
        $counter = EtatCession::count() + 1;

        // Générer le code unique
        $code = $this->generateUniqueCode($year, $counter);

        // $this->validate();
        if ($this->state == 0) {
            $this->state_assignment->sub_division_id = $this->subdivision_id;
            $this->state_assignment->reference_etat_cession = $code;
            $this->state_assignment->user_id = $this->user_id;
            $this->state_assignment->geometre_id = $this->geometre_id;
            $this->state_assignment->status = 'pending_payment';
            $this->state_assignment->save();

            $sale = Sale::create([
                'user_id' => $this->user_id,
                'sales_amount' => $this->state_assignment->cout_etat_cession,
                'sales_type' => 'etat_cession',
                'created_by' => auth()->user()->name,
            ]);

            // Create the Saleable item using only the specified information
            Saleable::create([
                'sale_id' => $sale->id,
                'price' => $this->state_assignment->cout_etat_cession,
                'quantity' => 1,
                'saleable_id' => $this->state_assignment->id,
                'saleable_type' => 'App\Models\EtatCession', // Adjust the namespace if different
                'created_by' => auth()->user()->name,
            ]);
            # code...
        } else {
            # code...
            DB::transaction(function(){

            
            });
        }
        
        // $this->subdivision_id->reference_etat_cession = $code;
       
        $this->state = 0;
        $this->clearFields();
        $this->refresh(__('State Assignment successfully :state!', ['state' => $this->state ? 'Updated' : 'Created']), 'CreateUpdateEtatCessionModal');
    }

    public function delete()
    {
        // if (!Gate::allows('service.delete')) {
        //     return abort(401);
        // }

        if (!empty($this->state_assignment)) {

            $this->state_assignment->delete();
        }

        $this->state_assignment = new EtatCession();

        $this->state = 0;

        $this->refresh(__('State Assignment Estate successfully deleted!'), 'DeleteModal');
    }

    public function clearFields()
    {
        // $this->reset([]
        // ]);
    }

    public function render()
    {

        $state_assignments = EtatCession::search($this->query)->
        // withCount('users')->
        orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $state_assignments_count = EtatCession::count();

        return view('livewire.portal.etat-cession.index',  ['state_assignments' => $state_assignments, 'state_assignments_count' => $state_assignments_count]);
    }
}
