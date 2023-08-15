<?php

namespace App\Http\Livewire\Portal\ImmatriculationDirecte;

use App\Models\User;
use Livewire\Component;
use App\Models\SubDivision;
use App\Models\TitreFoncier;
use App\Models\ImmatriculationDirecte;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{

    use WithDataTables;

    public ImmatriculationDirecte $imma_directe;

    public $state = 0 , $price_m2 , $users , $user_id , $user_ids;

    public function mount()
    {
        $this->imma_directe = new ImmatriculationDirecte();
        $this->users = User::role('user')->get();
    }

    public function initData($id)
    {
        $this->imma_directe = ImmatriculationDirecte::findOrFail($id);
        $this->state = 1;
    }

    protected array $rules = [
        'imma_directe.reference_etat_cession' => 'sometimes',
        'imma_directe.type_personne' => 'sometimes',
        'imma_directe.titre_foncier_id' => 'sometimes',
        'imma_directe.geometre_id' => 'sometimes',
        'imma_directe.user_id' => 'sometimes',
        'imma_directe.sub_division_id' => 'sometimes',
        'imma_directe.lieu_dit' => 'sometimes',
        'imma_directe.superficie_en_m2' => 'sometimes',
        'imma_directe.type_operation' => 'sometimes',
        'imma_directe.cout' => 'sometimes',
        'imma_directe.frais_suplementaires' => 'sometimes',
        'imma_directe.cout_etat_cession' => 'sometimes',
        'imma_directe.status' => 'sometimes',
        'imma_directe.commentaires' => 'sometimes',
        'imma_directe.zone' => 'sometimes',
    ];


    public function render()
    {
        $imma_directes = ImmatriculationDirecte::
        // withCount('users')->
        orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $imma_directes_count = ImmatriculationDirecte::count();


        return view('livewire.portal.immatriculation-directe.index',['imma_directes' => $imma_directes, 'imma_directes_count' => $imma_directes_count]);
    }
}
