<?php

namespace App\Http\Livewire\Portal\EtatCession;

use Livewire\Component;
use App\Http\Livewire\Traits\WithDataTables;
use App\Models\EtatCession;
use App\Models\SubDivision;
use App\Models\TitreFoncier;
use App\Models\User;

class Index extends Component
{

    use WithDataTables;

    public EtatCession $state_assignment;
    public $land_titles , $land_id , $geometre_id , $geometres , $subdivisions , $subdivision_id;
    public $state = 0 , $price_m2 , $users , $user_id;

    public function mount()
    {
        $this->state_assignment = new EtatCession();
        $this->land_titles = TitreFoncier::all();
        $this->users = User::role('user')->get();
        $this->geometres = User::role('geometre')->get();
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
        // dd($area);
        // $price_m2 = 0;

        if ($zone == "terrain_urbain") {
            if ($area <= 5000) {
                $this->price_m2 = 25000;
                $this->state_assignment->frais_suplementaires = 2500;
            $this->state_assignment->cout = (int)$this->price_m2;
            $this->state_assignment->cout_etat_cession = (int)$this->state_assignment->cout + (int)$this->state_assignment->frais_suplementaires;
                # code...
            }else{
                $area_are = $area - 5000;
                $this->state_assignment->frais_suplementaires = 2500;
                $this->state_assignment->cout = (25000 * 5000) + ($area_are * 20);
                $this->state_assignment->cout_etat_cession = (int)$this->state_assignment->cout + (int)$this->state_assignment->frais_suplementaires;

            }
            
        } else if($zone == "terrain_rurale"){
            if ($area <= 50000) {
                $this->price_m2 = 25000;
                $this->state_assignment->frais_suplementaires = 2500;
            } else if($area >= 50000 && $area <= 200000) {
                $this->price_m2 = 50000;
                $this->state_assignment->frais_suplementaires = 2500;
            }
            $this->state_assignment->cout = (int)$this->price_m2;
            $this->state_assignment->cout_etat_cession = (int)$this->state_assignment->cout + (int)$this->state_assignment->frais_suplementaires;
        }

        // if (!$area >=5000 && $zone == "terrain_urbain") {
        //     $this->state_assignment->cout = (int)$this->price_m2 * (int)$area;
        //     $this->state_assignment->cout_etat_cession = (int)$this->state_assignment->cout + (int)$this->state_assignment->frais_suplementaires;
        //     # code...
        // }
        
        
    }

    protected array $rules = [
        'state_assignment.reference_etat_cession' => 'sometimes',
        'state_assignment.type_personne' => 'sometimes',
        'state_assignment.titre_foncier_id' => 'sometimes',
        'state_assignment.geometre_id' => 'sometimes',
        'state_assignment.user_id' => 'sometimes',
        'state_assignment.sub_division_id' => 'sometimes',
        'state_assignment.lieu_dit' => 'sometimes',
        'state_assignment.superficie_en_m2' => 'sometimes',
        'state_assignment.type_operation' => 'sometimes',
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

        $this->validate();
        if ($this->state == 0) {
            $this->state_assignment->sub_division_id = $this->subdivision_id;
            $this->state_assignment->reference_etat_cession = $code;
            $this->state_assignment->user_id = $this->user_id;
            $this->state_assignment->geometre_id = $this->geometre_id;
            $this->state_assignment->status = 'pending_payment';
            # code...
        } else {
            # code...
        }
        
        // $this->subdivision_id->reference_etat_cession = $code;
        $this->state_assignment->save();
        $this->state = 0;
        $this->clearFields();
        $this->refresh(__('State Assignment successfully :state!', ['state' => $this->state ? 'Updated' : 'Created']), 'CreateUpdateStateAssignmentModal');
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

        $state_assignments = EtatCession::
        // withCount('users')->
        orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $state_assignments_count = EtatCession::count();

        return view('livewire.portal.etat-cession.index',  ['state_assignments' => $state_assignments, 'state_assignments_count' => $state_assignments_count]);
    }
}
