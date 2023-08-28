<?php

namespace App\Http\Livewire\Portal\ImmatriculationDirecte;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Service;
use Livewire\Component;
use App\Models\Sales\Sale;
use App\Models\SubDivision;
use Illuminate\Support\Str;
use App\Models\TitreFoncier;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\ImmatriculationDirecte;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{

    use WithDataTables;

    // public ImmatriculationDirecte $imma_directe;
    public $imma_directe;

    public $state = 0, $price_m2, $users, $user_id, $user_ids, $comissions = [] , $localisation;
    public $attachements , $services , $service_id , $observation , $montant_ordre_versement;

    public function mount()
    {
        // $this->imma_directe = new ImmatriculationDirecte();
        $this->users = User::with(['roles' => function ($role) {
            return $role->whereIn('name', ['user'])->get();
        }])->get();
        $this->services = Service::select('id','service_name_fr')->get();
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

    public function store()
    {
        if (!Gate::allows('lotissement.create') ) {
            return abort(401);
        }

        $this->validate([
            'localisation' => 'required',
        ]);
        
       $imma_directe = ImmatriculationDirecte::create([
        'reference' => Str::upper(Str::random(7)) . "" . now()->format('msu'),
        // 'requestor_id' => $this->user_id,
        'localisation' => $this->localisation,
        'statut' => 'Dossier Ouvert',
        'next_step' => 'Cotation du Dossier au CSDAF',
        'StatutStyle' => 'info',
        // 'comissions' => json_encode($this->comissions),
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

    public function cotation_first_step()
    {
        $this->validate([
            'service_id' => 'required',
            'user_id' => 'required',
        ]);
        
       
        DB::transaction(function () {
            $this->imma_directe->update([
                'service_id' => $this->service_id,
                'observation_cotation' => $this->observation,
                'cotation_user_id' => $this->user_id,
                'status_cotation' => 'done',
                'statut' => 'coter',
                'next_step' => 'ordre_versement',
                'date_cotation' => Carbon::now(),
            ]);
        });

        $this->refresh(__('Dossier D\'Immatriculation Directe Coter Avec SUCCES!'), 'CotationImmaDirecteModal');

        $this->clearFields();
    }

    public function ordre_versement()
    {
        $this->validate([
            'montant_ordre_versement' => 'required',
        ]);
        
       
        DB::transaction(function () {
            $this->imma_directe->update([
                'montant_ordre_versement' => $this->montant_ordre_versement,
                'status_ordre_versement' => 'pending',
                'statut' => 'Ordre de Versement en Attente de Paiement',
                'next_step' => 'Paiement de L\'Ordre versement',
                'date_ordre_versement' => Carbon::now(),
            ]);
        });

        $sale = Sale::create([
            // 'user_id' => $this->requestor_id,
            'sales_amount' => $this->montant_ordre_versement,
            'sales_type' => 'ordre_versement_imma_directe',
            'created_by' => auth()->user()->name,
        ]);

        // Create the Saleable item using only the specified information
        $saleableData = [
            'sale_id' => $sale->id,
            'price' => $this->montant_ordre_versement,
            'quantity' => 1,
            'saleable_id' => $this->imma_directe->id,
            'saleable_type' => 'App\Models\ImmatriculationDirecte', // Adjust the namespace if different
            'created_by' => auth()->user()->name,
        ];

        DB::table('saleables')->insert($saleableData);


        $this->refresh(__('Ordre de Versement Enregistrer Avec SUCCES!'), 'OrdreVersementImmaDirecteModal');

        $this->clearFields();
    }

    public function clearFields()
    {
        $this->reset(
            [
                // 'requestor_id', 
                'localisation',
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
