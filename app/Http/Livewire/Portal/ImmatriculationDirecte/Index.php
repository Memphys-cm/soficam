<?php

namespace App\Http\Livewire\Portal\ImmatriculationDirecte;

use App\Models\User;
use Livewire\Component;
use App\Models\SubDivision;
use App\Models\TitreFoncier;
use Illuminate\Support\Facades\Gate;
use App\Models\ImmatriculationDirecte;
use App\Http\Livewire\Traits\WithDataTables;
use Illuminate\Support\Str;

class Index extends Component
{

    use WithDataTables;

    public ImmatriculationDirecte $imma_directe;

    public $state = 0, $price_m2, $users, $user_id, $user_ids, $comissions = [] , $localisation;
    public $attachements;

    public function mount()
    {
        $this->imma_directe = new ImmatriculationDirecte();
        $this->users = User::role('user')->get();
    }

    public function addRow()
    {
        $this->comissions[] = ['name' => '', 'position' => ''];
    }

    public function removeRow($index)
    {
        unset($this->comissions[$index]);
        $this->comissions = array_values($this->comissions);
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

    public function store()
    {
        if (!Gate::allows('lotissement.create') ) {
            return abort(401);
        }

        
       $imma_directe = ImmatriculationDirecte::create([
        'titre_foncier_id' => 1,
        'numero_bordereau_transmission' => 6,
        'date_delivrance' => now(),
        'reference' => Str::upper(Str::random(7)) . "" . now()->format('msu'),
        // 'requestor_id' => $this->user_id,
        'localisation' => $this->localisation,
        'status' => 'Dossier Ouvert',
        'StatusStyle' => 'info',
        'comissions' => json_encode($this->comissions),
       ]);


       $imma_directe->users()->sync($this->user_ids);

       if(!empty($this->attachements)){
            $imma_directe->addMedia($this->attachements->getRealPath())
            ->usingName($imma_directe->reference)
            ->toMediaCollection('immadirectes');
        }

        $this->clearFields();

        $this->refresh(__('Dossier D\'Immatriculation Directe Creer Avec SUCCES'), 'CreateImmaDirecteModal');

    }

    public function clearFields()
    {
        $this->reset(
            [
                'requestor_id',
                'localisation',
                'status',
                'StatusStyle',
                'comissions',
            ]
        );

        $this->user_ids = [];
    }


    public function render()
    {
        $imma_directes = ImmatriculationDirecte::
            // withCount('users')->
            orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $imma_directes_count = ImmatriculationDirecte::count();


        return view('livewire.portal.immatriculation-directe.index', ['imma_directes' => $imma_directes, 'imma_directes_count' => $imma_directes_count]);
    }
}
