<?php

namespace App\Http\Livewire\Portal\Operations\RetraitIndivision;

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
use Illuminate\Contracts\Database\Eloquent\Builder;

class Index extends Component
{
    use WithDataTables;

    public ?Collection $titre_foncier_users;
    public $certificates_propriete_id, $certificates_proprietes = [], $users = [], $titre_fonciers = [], $notaires = [], $geomtres = [];
    public $titre_foncier_id, $numero_titre_foncier, $superficie_du_TF_mere;
    public $requestor_id, $region, $division, $sub_division, $lieu_dit, $operation, $operation_type, $retrait_indivision;
    public $parcel_id, $parcels = [], $etat_cession_id, $etat_cessions = [];


    public $commentaires;

    public $listeners = ['flow_updated' => 'render'];

    public function mount()
    {
        $this->titre_fonciers = TitreFoncier::select('id', 'numero_titre_foncier', 'region_id', 'division_id', 'sub_division_id', 'lieu_dit')
            ->has('users','>=', 2)->get();
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
            $this->etat_cessions = $tf->etatCessionsPaid->where('type_operation', 'retrait_indivision');
            $this->parcels = $tf->parcels;
        } else {
        }
    }

    public function initData($id)
    {
        $operation = Operation::findOrFail($id);
        $this->retrait_indivision = $operation;
        $this->operation = $operation;
    }

    public function store()
    {
        if (!Gate::allows('operation.retrait_indivision.create')) {
            return abort(401);
        }

        $this->validate([
            'titre_foncier_id' => 'required',
            'requestor_id' => 'required',
            'etat_cession_id' => 'sometimes',
            'certificates_propriete_id' => 'required',
        ]);

        $cp = CertificatePropriete::findOrFail($this->certificates_propriete_id);

        if ($cp->validity->lt(now())) {
            return;
            session()->flash('message', __('Certificate propriete provided is in valid'));
        }

        $titre_foncier = TitreFoncier::findOrFail($this->titre_foncier_id);
        $lot = Parcel::create([
            'titre_foncier_id' => $this->titre_foncier_id,
            'numero_du_lot' => fake()->randomDigitNot(2),
            'surperficie_du_lot' =>  $titre_foncier->superficie_du_TF_mere,
            'superficie_a_vendre' =>  'totale',
            'superficie_vendu' =>  $titre_foncier->superficie_du_TF_mere,
            'statut_du_lot' =>  $titre_foncier->etat_terrain,
            'type' => 'normale',
            'type_de_venter' => 'mutation_totale',
            'type_de_versement' => $this->type_de_versement,
            'prix_du_m2' =>  $this->price_per_m²,
            'superficie_restant' =>  $this->price_per_m²,
            'prix_du_m2' =>  $this->price_per_m²,
            'montant_de_la_vente' =>  $this->sale_amount,
            'montant_versee' =>  $this->montant_versee,
            'montant_restant' =>  $this->montant_restant,
            'commentaire_du_notaire' => $this->commentaires,
            'date_de_vente' => empty($this->date_de_vente) ? now() : $this->date_de_vente,
        ]);

        Operation::create([
            'numero_operation' => Str::upper(Str::random(6)) . "" . now()->format('msu'),
            'titre_foncier_id' => $this->titre_foncier_id,
            'type_operation' => $this->operation_type,
            'requestor_id' => $this->requestor_id,
            'certificate_prioprietes_id' => $this->certificates_propriete_id,
            'etat_cession_id' => $this->etat_cession_id,
            'validite_CP' => $cp->validity,
        ]);

        $this->clearFields();
        $this->refresh(__('Mutation Totale successfully Created'), 'CreateMutationTotaleNormaleModal');
    }

    public function delete()
    {
        if (!Gate::allows('operation.retrait_indivision.delete')) {
            return abort(401);
        }

        if (!empty($this->mutation_totale)) {

            // $this->mutation_totale->users()->delete();

            $this->mutation_totale->delete();
        }


        $this->refresh(__('Operation successfully deleted!'), 'DeleteModal');
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
        if (!Gate::allows('operation.retrait_indivision.view')) {
            return abort(401);
        }

        $retraits = Operation::search($this->query)->mutationTotale()->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $retraits_count = Operation::mutationTotale()->count();

        return view('livewire.portal.operations.retrait-indivision.index', [
            'retraits' => $retraits,
            'retraits_count' => $retraits_count,
        ])->layout('components.layouts.dashboard');
    }
}
