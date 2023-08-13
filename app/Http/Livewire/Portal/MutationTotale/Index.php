<?php

namespace App\Http\Livewire\Portal\MutationTotale;

use Livewire\Component;
use App\Http\Livewire\Traits\WithDataTables;
use App\Models\MutationTotale;
use App\Models\User;

class Index extends Component
{
    use WithDataTables;

    public MutationTotale $mutation_totale;
    public $requestors ,$requestor_id , $state;
    public $land_id , $land_titles ,$certificats , $certificat_id , $geometre_id ,$geometres;

    public function mount()
    {
        $this->mutation_totale = new MutationTotale();
        $this->requestors = User::role('user')->get();
    }

    public function initData($id)
    {
        $this->mutation_totale = MutationTotale::findOrFail($id);
        $this->state = 1;
    }

    // protected array $rules = [
    //     'state_assignment.reference_etat_cession' => 'sometimes',
    //     'state_assignment.type_personne' => 'sometimes',
    //     'state_assignment.titre_foncier_id' => 'sometimes',
    //     'state_assignment.geometre_id' => 'sometimes',
    //     'state_assignment.user_id' => 'sometimes',
    //     'state_assignment.sub_division_id' => 'sometimes',
    //     'state_assignment.lieu_dit' => 'sometimes',
    //     'state_assignment.superficie_en_m2' => 'sometimes',
    //     'state_assignment.type_operation' => 'sometimes',
    //     'state_assignment.cout' => 'sometimes',
    //     'state_assignment.frais_suplementaires' => 'sometimes',
    //     'state_assignment.cout_etat_cession' => 'sometimes',
    //     'state_assignment.status' => 'sometimes',
    //     'state_assignment.commentaires' => 'sometimes',
    //     'state_assignment.zone' => 'sometimes',
    // ];

    public function render()
    {

        $mutation_totales = MutationTotale::
        // withCount('users')->
        orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $mutation_totales_count = MutationTotale::count();

        return view('livewire.portal.mutation-totale.index',['mutation_totales' => $mutation_totales, 'mutation_totales_count' => $mutation_totales_count]);
    }
}
