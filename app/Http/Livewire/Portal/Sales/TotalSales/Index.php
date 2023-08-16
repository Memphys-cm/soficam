<?php

namespace App\Http\Livewire\Portal\Sales\TotalSales;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Notary;
use Livewire\Component;
use App\Models\Sales\Sale;
use App\Models\TitreFoncier;

use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithDataTables;
use App\Models\Lotissements\Parcel;
use App\Models\MembreDuCabinet;
use Illuminate\Support\Facades\Date;

class Index extends Component
{
    use WithDataTables;

    public ?Parcel $parcel;

    public $titre_foncier, $titre_foncier_id, $titre_fonciers, $notaires, $notaire_id;
    public $created, $sales_code, $sale_type, $number_of_lots_remaining, $commentaires;
    public $region, $division, $sub_division, $lieu_dit,  $area_sold, $remaining_area, $number_of_blocks, $number_of_lots;
    public $surface_for_sale, $price_per_m², $sale_amount, $notary, $service_id;
    public $users = [], $user_ids = [];
    public $numero_titre_foncier, $superficie_du_TF_mere, $limit_nord, $limit_sud, $limit_est, $limit_ouest, $sale, $saleId;
    public $remaining_amount = 0;
    public $advanced_amount = 0;
    public $payment_status = 'pending_payment';
    public $montant_versee, $montant_restant;
    public $date_de_vente, $type_de_versement;

    public function mount()
    {
        $this->titre_fonciers = TitreFoncier::select('id', 'numero_titre_foncier','region_id','division_id','sub_division_id','lieu_dit')->get();
        $this->notaires = MembreDuCabinet::notaire()->select('id', 'first_name', 'last_name')->get();
        $this->users = User::role('user')->select('id', 'first_name', 'last_name')->get();

    }

    public function calculateSaleAmount()
    {
        // Check if both total surface for sale (superficie_du_TF_mere) and unit price per m² are set
        if (!empty($this->superficie_du_TF_mere) && !empty($this->price_per_m²)) {
            // Calculate the sale amount by multiplying superficie_du_TF_mere and price per m²
            $this->sale_amount = $this->superficie_du_TF_mere * $this->price_per_m²;

            // Calculate the remaining_amount as the difference between sale_amount and advanced_amount
            if ($this->type_de_versement === 'tranche') {
                if ($this->montant_versee !== null) {
                    $this->montant_restant = $this->sale_amount - $this->montant_versee;
                } else {
                    $this->montant_versee = 0;
                    $this->montant_restant = 0;
                }
            } else {
                $this->type_de_versement = 'cash';
                $this->montant_versee = 0;
                $this->montant_restant = 0;
            }
        } else {
            // If any of the inputs is not set, set the sale amount to null or 0, depending on your preference
            $this->sale_amount = null; // or 0
            $this->remaining_amount = null; // or 0
        }
        // dd($this->type_de_versement);
    }
    public function updatedSurfaceForSale()
    {
        $this->calculateSaleAmount();
    }

    public function updatedPricePerM²()
    {
        $this->calculateSaleAmount();
    }

    public function updatedMontantVersee()
    {
        // Recalculate the montant_restant based on the updated montant_versee
        $this->montant_restant = $this->sale_amount - $this->montant_versee;
    }

    public function updated($changedProperty)
    {
        // Recalculate based on changed property
        if (
            $changedProperty === 'superficie_du_TF_mere' ||
            $changedProperty === 'price_per_m²' ||
            $changedProperty === 'montant_versee' ||
            $changedProperty === 'type_de_versement' ||
            $changedProperty === 'superficie_restant'
          
        ) {
            $this->calculateSaleAmount();
        }
    }


    public function updatedTitreFoncierId($titre_foncier_id)
    {
        if (!empty($titre_foncier_id)) {
            $tf = TitreFoncier::findOrFail($titre_foncier_id);
            // dd($tf->region->region_name_en);

            // Update the Livewire component properties with the titre_foncier information
            $this->numero_titre_foncier = $tf->numero_titre_foncier;
            $this->superficie_du_TF_mere = $tf->superficie_du_TF_mere;
            $this->limit_nord = $tf->limit_nord;
            $this->limit_sud = $tf->limit_sud;
            $this->limit_est = $tf->limit_est;
            $this->limit_ouest = $tf->limit_ouest;
            $this->lieu_dit = $tf->lieu_dit;
            $this->sub_division = $tf->subDivision->sub_division_name;
            $this->region = $tf->region->region_name;
            $this->division = $tf->division->division_name;
            $this->calculateSaleAmount();
        } else {
            // Reset the Livewire component properties when the titre_foncier_id is empty
            $this->numero_titre_foncier = '';
            $this->superficie_du_TF_mere = '';
            $this->limit_nord = '';
            $this->limit_sud = '';
            $this->limit_est = '';
            $this->limit_ouest = '';
            $this->lieu_dit = '';
            $this->sub_division = '';
            $this->region = '';
            $this->division = '';
        }
        
    }

    public function store()
    {
        $this->validate([
            'titre_foncier_id' => 'required',
            'titre_foncier_id' => 'required',
            'payment_status' => 'required',
            'type_de_versement' => 'nullable',
            'user_ids' => 'required',
            'notaire_id' => 'required',

        ]);
        // Calculate the sale amount
        $this->calculateSaleAmount();

        // Store the data into the database (or any other storage medium)

        $notaire = MembreDuCabinet::findOrFail($this->notaire_id);
        $titre_foncier = TitreFoncier::findOrFail($this->titre_foncier_id);

        $lot = Parcel::create([
            'titre_foncier_id' => $titre_foncier->id,
            'numero_du_lot' => fake()->randomDigitNot(2),
            'surperficie_du_lot' =>  $titre_foncier->superficie_du_TF_mere,
            'superficie_a_vendre' =>  'totale',
            'superficie_vendu' =>  $titre_foncier->superficie_du_TF_mere,
            'statut_du_lot' =>  $titre_foncier->etat_terrain,
            'type' => 'normale',
            'cabinet_notaire_id' => $notaire->cabinet->id,
            'notaire_id' => $notaire->id,
            'type_de_venter' => 'mutation_totale',
            'type_de_versement' => $this->type_de_versement,
            'prix_du_m2' =>  $this->price_per_m²,
            'superficie_restant' =>  $this->price_per_m²,
            'prix_du_m2' =>  $this->price_per_m²,
            'montant_de_la_vente' =>  $this->sale_amount,
            'montant_versee' =>  $this->montant_versee,
            'montant_restant' =>  $this->montant_restant,
            'commentaire_du_notaire' => $this->commentaires,
            'date_de_vente' => empty($this->date_de_vente) ? now() : $this->date_de_vente ,
        ]);

        $lot->users()->sync($this->user_ids);

        $this->clearFields();
        $this->refresh(__('Sale successfully Created!'), 'CreateMutationTotalModal');
    }

    public function delete()
    {
        if ($this->sale) {
            $this->sale->delete();
        }
        $this->refresh(__('Sale deleted successfully'), 'DeleteModal');
    }
    public function clearFields()
    {
        $this->titre_foncier_id = '';
        $this->service_id = '';
        $this->price_per_m² = '';
        $this->sale_amount = '';
        $this->sale_type = 'total_sale';
        $this->type_de_versement = 'cash';
        $this->commentaires = '';
    }
    public function initData($id)
    {
        $sale = Sale::findOrFail($id);
        $this->sale = $sale;
        $this->saleId = $id;
        $this->sale_amount = $sale->sale_amount;
        $this->titre_foncier_id = $sale->titre_foncier_id;
        $this->sales_code = $sale->sales_code;
        $this->superficie_du_TF_mere = $sale->superficie_du_TF_mere;
        $this->type_de_versement = $sale->type_de_versement;
        $this->price_per_m² = $sale->price_per_m²;
        $this->service_id = $sale->service_id;
        $this->advanced_amount = $sale->advanced_amount;
        $this->remaining_amount = $sale->remaining_amount;
        $this->commentaires = $sale->commentaires;
    }
    public function render()
    {
        $parcels = Parcel::mutationtotale()->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $parcels_count = Parcel::mutationtotale()->count();
        

        return view('livewire..portal.sales.total-sales.index', ['parcels' => $parcels, 'parcels_count' => $parcels_count]);
    }
}
