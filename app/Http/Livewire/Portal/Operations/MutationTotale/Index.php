<?php

namespace App\Http\Livewire\Portal\Operations\MutationTotale;

use App\Models\User;
use Livewire\Component;
use App\Models\Operation;
use Illuminate\Support\Str;
use App\Models\TitreFoncier;
use App\Models\MembreDuCabinet;
use App\Models\CertificatePropriete;
use Illuminate\Support\Facades\Gate;
use App\Http\Livewire\Traits\WithDataTables;
use Illuminate\Database\Eloquent\Collection;

class Index extends Component
{
    use WithDataTables;

    public ?Collection $titre_foncier_users; 
    public $certificates_propriete_id, $certificates_proprietes = [], $users = [], $titre_fonciers = [], $notaires = [], $geomtres = [];
    public $titre_foncier_id, $numero_titre_foncier, $superficie_du_TF_mere;
    public $requestor_id, $region, $division, $sub_division, $lieu_dit;
    public $parcel_ids, $parcels = [], $etat_cession_id, $etat_cessions = [];
    public $commentaires;
    
    public function mount()
    {
        $this->titre_fonciers = TitreFoncier::select('id', 'numero_titre_foncier', 'region_id', 'division_id', 'sub_division_id', 'lieu_dit')->get();
        $this->notaires = MembreDuCabinet::notaire()->select('id', 'first_name', 'last_name')->get();
        $this->users = User::role('user')->select('id', 'first_name', 'last_name')->get();
    }

    public function updatedTitreFoncierId($titre_foncier_id)
    {
        if (!empty($titre_foncier_id)) {
            $tf = TitreFoncier::findOrFail($titre_foncier_id);
            // Update the Livewire component properties with the titre_foncier information
            $this->numero_titre_foncier = $tf->numero_titre_foncier;
            $this->superficie_du_TF_mere = $tf->superficie_du_TF_mere;
            $this->lieu_dit = $tf->lieu_dit;
            $this->sub_division = $tf->subDivision->sub_division_name;
            $this->region = $tf->region->region_name;
            $this->division = $tf->division->division_name;
            $this->titre_foncier_users = $tf->users;
            $this->certificates_proprietes = $tf->certificatesProprietes;
            $this->etat_cessions = $tf->etatCessionsPaid->where('type_operation','mutation_totale');
            $this->parcels = $tf->parcels;
        }else{

        }
    }

    public function initData($id)  
    {
        $operation = Operation::findOrFail($id);
        $this->mutation_totale = $operation;
    }

    public function store()  
    {
        if (!Gate::allows('mutation_totale.create')) {
            return abort(401);
        }

        $this->validate([
            'titre_foncier_id' => 'required',
            'requestor_id' => 'required',
            'etat_cession_id' => 'sometimes',
            'certificates_propriete_id' => 'required',
        ]);

        $cp = CertificatePropriete::findOrFail($this->certificates_propriete_id);

        if($cp->validity->lt(now())){
            return ;
            session()->flash('message', __('Certificate propriete provided is in valid'));
        }

        Operation::create([
            'numero_operation' => Str::upper(Str::random(6)) . "" . now()->format('msu'),
            'titre_foncier_id' => $this->titre_foncier_id,
            'type_operation' => 'mutation_totale',
            'requestor_id' => $this->requestor_id,
            'certificate_prioprietes_id' => $this->certificates_propriete_id,
            'etat_cession_id' => $this->etat_cession_id,
            'validite_CP' => $cp->validity,
        ]);

        $this->clearFields();
        $this->refresh(__('Mutation Totale successfully Created'), 'CreateMutationTotaleModal');
    }

    public function storeGeomtreUpdates()
    {
        if (!Gate::allows('mutation_totale.create')) {
            return abort(401);
        }

        $this->validate([
            'titre_foncier_id' => 'required',
            'requestor_id' => 'required',
            'etat_cession_id' => 'sometimes',
            'certificates_propriete_id' => 'required',
        ]);

        $this->mutation_total->update([
            'geometre_id' => $this->geometre_id,
            'numero_reference_plan' => $this->numero_reference_plan,
            'numero_reference_quittance_etat_cession' => $this->numero_reference_quittance_etat_cession,
            'commantaires_geometre' => $this->commantaires_geometre,
            'certificate_prioprietes_id' => $this->certificates_propriete_id,
            'etat_cession_id' => $this->etat_cession_id,
        ]);

        $this->clearFields();
        $this->refresh(__('Mutation Totale successfully Created'), 'CreateMutationTotaleModal');
    }

    public function clearFields()
    {
        return $this->reset([
            'titre_foncier_id',
            'requestor_id',
            'certificates_propriete_id',
            'etat_cession_id',
        ]);
    }
    public function render()
    {
        if (!Gate::allows('mutation_totale.view')) {
            return abort(401);
        }

        $mutation_totales = Operation::search($this->query)->mutationTotale()->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $mutation_totales_count = Operation::mutationTotale()->count();

        return view('livewire.portal.operations.mutation-totale.index', [
            'mutation_totales' => $mutation_totales,
            'mutation_totales_count' => $mutation_totales_count,
        ])->layout('components.layouts.dashboard');

    }
}
