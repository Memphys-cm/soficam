<?php

namespace App\Http\Livewire\Portal\StateAssignment;

use Livewire\Component;
use App\Http\Livewire\Traits\WithDataTables;
use App\Models\EtatCession;

class Index extends Component
{

    use WithDataTables;

    public EtatCession $state_assignment;
    public $state = 0;

    public function mount()
    {
        $this->state_assignment = new EtatCession();
    }

    public function initData($id)
    {
        $this->state_assignment = EtatCession::findOrFail($id);
        $this->state = 1;
    }

    protected array $rules = [
        'state_assignment.reference_etat_cession' => 'sometimes',
        'state_assignment.type_personne' => 'sometimes',
        'state_assignment.terrain_urbain' => 'sometimes',
        'state_assignment.titre_foncier_id' => 'sometimes',
        'state_assignment.geometre_id' => 'sometimes',
        'state_assignment.user_id' => 'sometimes',
        'state_assignment.sub_division_id' => 'sometimes',
        'state_assignment.lieu_dit' => 'sometimes',
        'state_assignment.superficie_en_m2' => 'sometimes',
        'state_assignment.cout' => 'sometimes',
        'state_assignment.frais_suplementaires' => 'sometimes',
        'state_assignment.cout_etat_cession' => 'sometimes',
        'state_assignment.status' => 'sometimes',
        'state_assignment.commentaires' => 'sometimes',
    ];

    public function store()
    {
        $this->validate();

        // $this->state_assignment->land_id = $this->land_id;
        // $this->state_assignment->code = $code;
        $this->state_assignment->save();
        $this->state = 0;
        $this->clearFields();
        $this->refresh(__('housing_estate successfully :state!', ['state' => $this->state ? 'Updated' : 'Created']), 'CreateUpdateStateAssignmentModal');
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


        return view('livewire.portal.state-assignment.index' ,  ['state_assignments' => $state_assignments, 'state_assignments_count' => $state_assignments_count]);
    }
}
