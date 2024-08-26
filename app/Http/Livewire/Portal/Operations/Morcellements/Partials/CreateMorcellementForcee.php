<?php

namespace App\Http\Livewire\Portal\Operations\Morcellements\Partials;

use App\Models\User;
use Livewire\Component;
use App\Models\TitreFoncier;
use App\Models\MembreDuCabinet;
use App\Http\Livewire\Traits\WithDataTables;
use Illuminate\Database\Eloquent\Collection;

class CreateMorcellementForcee extends Component
{
    use WithDataTables;

    public ?Collection $titre_foncier_users;
    public $certificates_propriete_id, $certificates_proprietes = [], $users = [], $titre_fonciers = [], $notaires = [], $geomtres = [];
    public $titre_foncier_id, $numero_titre_foncier, $superficie_du_TF_mere;
    public $requestor_id, $region, $division, $sub_division, $lieu_dit;
    public $parcel_id, $parcels = [], $etat_cession_id, $etat_cessions = [];
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
            $this->etat_cessions = $tf->etatCessionsPaid->where('type_operation', 'mutation_totale');
            $this->parcels = $tf->parcels;
        } else {
        }
    }

    public function store()
    {
        if (!Gate::allows('operation.mutation_totale.create')) {
            return abort(401);
        }

        $this->validate([
            'titre_foncier_id' => 'required',
            'requestor_id' => 'required',
            'etat_cession_id' => 'sometimes',
            'certificates_propriete_id' => 'sometimes',
        ]);

        $cp = CertificatePropriete::findOrFail($this->certificates_propriete_id);

        if ($cp->validity->lt(now())) {
            return;
            session()->flash('message', __('Le certificat de propriété fourni est en cours de validité'));
        }

        Operation::create([
            'numero_operation' => Str::upper(Str::random(6)) . "" . now()->format('msu'),
            'titre_foncier_id' => $this->titre_foncier_id,
            'type_operation' => 'mutation_totale_par_deces',
            'requestor_id' => $this->requestor_id,
            'certificate_prioprietes_id' => $this->certificates_propriete_id,
            'etat_cession_id' => $this->etat_cession_id,
            'validite_CP' => $cp->validity,
        ]);

        $this->clearFields();
        $this->refresh(__('Mutation Totale par Deces créée avec succès'), 'CreateMutationTotaleParDecesModal');
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
        return view('livewire.portal.operations.morcellements.partials.create-morcellement-forcee');
    }
}
