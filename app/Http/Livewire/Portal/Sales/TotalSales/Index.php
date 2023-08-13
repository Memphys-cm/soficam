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
use App\Models\MembreDuCabinet;

class Index extends Component
{

    use WithDataTables;
    public ?string $query = null;

    public $titre_foncier, $titre_foncier_id, $titre_fonciers, $notarys;
    public $created, $sales_code, $sale_type, $number_of_lots_remaining, $commentaires;
    public $maeture, $land_title_area, $public_utility_area, $area_sold, $remaining_area, $number_of_blocks, $number_of_lots;
    public $surface_for_sale, $price_per_m², $sale_amount, $payment_method, $notary, $service_id;
    public $document = [];
    public $numero_titre_foncier, $superficie_du_TF_mere, $limit_nord, $limit_sud, $limit_est, $limit_ouest, $sale, $saleId;
    public $remaining_amount = 0;
    public $advanced_amount = 0;
    public $payment_status = 'pending_payment';

    public $lieu_dit, $sub_division_id, $division_id, $region_id, $users, $user_id; 

    public function mount()
    {

        $this->titre_fonciers = TitreFoncier::select('id', 'numero_titre_foncier')->get();
        $this->notarys = MembreDuCabinet::select('id', 'first_name', 'last_name')->get();
        $this->users = User::role('user')->select('id', 'first_name', 'last_name')->get();

        $this->created = Carbon::now()->addHour();
        $this->calculateSaleAmount();
    }
    public function calculateSaleAmount()
{
    // Check if both total surface for sale (superficie_du_TF_mere) and unit price per m² are set
    if (!empty($this->superficie_du_TF_mere) && !empty($this->price_per_m²)) {
        // Calculate the sale amount by multiplying superficie_du_TF_mere and price per m²
        $this->sale_amount = $this->superficie_du_TF_mere * $this->price_per_m²;

        // Calculate the remaining_amount as the difference between sale_amount and advanced_amount
        if ($this->payment_method === 'tranche') {
            $this->remaining_amount = $this->sale_amount - $this->advanced_amount;
        } else {
            $this->advanced_amount = null; // Set the advanced_amount value based on your logic for cash payment
            $this->remaining_amount = null; // Set the remaining_amount value based on your logic for cash payment
        }
    } else {
        // If any of the inputs is not set, set the sale amount to null or 0, depending on your preference
        $this->sale_amount = null; // or 0
        $this->remaining_amount = null; // or 0
    }
}
    public function updatedSurfaceForSale()
    {
        $this->calculateSaleAmount();
    }

    public function updatedPricePerM²()
    {
        $this->calculateSaleAmount();
    }

    public function updatedAdvancedAmount()
    {
        // Recalculate the remaining_amount based on the updated advanced_amount
        $this->remaining_amount = $this->sale_amount - $this->advanced_amount;
    }


    public function updatedTitreFoncierId($titre_foncier_id)
    {
        // dd('s');
        if (!empty($titre_foncier_id)) {
            $utilisateur = TitreFoncier::findOrFail($titre_foncier_id);
            // dd($utilisateur->region->region_name_en);

            // Update the Livewire component properties with the titre_foncier information
            $this->numero_titre_foncier = $utilisateur->numero_titre_foncier;
            $this->superficie_du_TF_mere = $utilisateur->superficie_du_TF_mere;
            $this->limit_nord = $utilisateur->limit_nord;
            $this->limit_sud = $utilisateur->limit_sud;
            $this->limit_est = $utilisateur->limit_est;
            $this->limit_ouest = $utilisateur->limit_ouest;
            $this->lieu_dit = $utilisateur->lieu_dit;
            $this->sub_division_id = $utilisateur->subDivision->sub_division_name_en;
            $this->region_id = $utilisateur->region->region_name_en;
            $this->division_id = $utilisateur->division->division_name_en;
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
            $this->sub_division_id = '';
            $this->region_id = '';
            $this->division_id = '';
        }
    }

    public function store()
    {
        $this->validate([
            'titre_foncier_id' => 'nullable',
            'service_id' => 'nullable',
            'payment_status' => 'required',
            'payment_method' => 'nullable',
            
        ]);
        // Calculate the sale amount
        $this->calculateSaleAmount();

        // Store the data into the database (or any other storage medium)
        $sale = Sale::create([
            'service_id' => $this->service_id,
            'user_id' => $this->user_id,
            'sales_amount' => $this->sale_amount,
            'sales_type' => 'total_sale',
            'payment_status' => $this->payment_status,
            'payment_method' => $this->payment_method,
            'commentaires' => $this->commentaires,
            'created_by' => auth()->user()->name,
        ]);

        $saleableData = [
            'sale_id' => $sale->id,
            'price' => $this->sale_amount,
            'quantity' => 1,
            'saleable_id' => $sale->id,
            'saleable_type' => 'total_sale', // Adjust the namespace if different
            'created_by' => auth()->user()->name,
        ];

        DB::table('saleables')->insert($saleableData);
        $this->clearFields();
        $this->refresh(__('Sale successfully Created!'), 'CreatetotalsaleModal');
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
        $this->titre_foncier_id = null;
        $this->service_id = null;
        $this->price_per_m² = null;
        $this->sale_amount = null;
        $this->document = [];
        $this->sale_type = 'total_sale';
        $this->payment_method = 'cash';
        $this->commentaires = null;
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
        $this->payment_method = $sale->payment_method;
        $this->price_per_m² = $sale->price_per_m²;
        $this->service_id = $sale->service_id;
        $this->advanced_amount = $sale->advanced_amount;
        $this->remaining_amount = $sale->remaining_amount;
        $this->commentaires = $sale->commentaires;
    }
    public function render()
    {
        $totals_count = Sale::where('sales_type', 'total_sale')->count();
        $totals = Sale::search($this->query)->where('sales_type', 'total_sale')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        return view('livewire..portal.sales.total-sales.index', ['totals'=>$totals, 'totals_count'=>$totals_count]);
    }
}
