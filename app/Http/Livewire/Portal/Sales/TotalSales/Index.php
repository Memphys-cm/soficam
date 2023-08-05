<?php

namespace App\Http\Livewire\Portal\Sales\TotalSales;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Notary;
use Livewire\Component;
use App\Models\Sales\Sale;
use App\Models\TitreFoncier;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class Index extends Component
{

    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public ?string $query = null;
    public int $perPage = 15;
    public string $orderAsc = 'desc';
    public string $orderBy = 'created_at';

    public $inputs = [0]; // Initialize with one element
    public $i = 0;


    public $titre_foncier, $titre_foncier_id, $titre_fonciers, $notarys;
    public $created, $sales_code, $sale_type, $number_of_lots_remaining, $observation;
    public $maeture, $land_title_area, $public_utility_area, $area_sold, $remaining_area, $number_of_blocks, $number_of_lots;
    public $surface_for_sale, $price_per_m², $sale_amount, $payment_type, $notary, $notary_id;
    public $document = [];
    public $purchaser_name = [];
    public $numero_titre_foncier, $superficie_du_TF_mere, $limit_nord, $limit_sud, $limit_est, $limit_ouest, $sale, $saleId;
    public $balance = 0;
    public $advance = 0;
    public $lieu_dit, $sub_division_id, $division_id, $region_id; 


    public function mount()
    {
        $this->titre_fonciers = TitreFoncier::select('id', 'numero_titre_foncier')->get();
        $this->notarys = Notary::select('id', 'name')->get();
        $this->created = Carbon::now()->addHour();
        $this->sales_code = $this->generateConsCode();
        $this->calculateSaleAmount();
        // dd($this->calculateSaleAmount());
        // $this->sale_amount = $this->calculateSaleAmount();
    }
    public function updatedSurfaceForSale()
    {
        $this->calculateSaleAmount();
    }

    public function updatedPricePerM2()
    {
        $this->calculateSaleAmount();
    }

    public function updatedAdvance()
    {
        // Recalculate the balance based on the updated advance
        $this->balance = $this->sale_amount - $this->advance;
    }

    public function addPurchaser()
    {
        $this->i++;
        $this->inputs[] = $this->i;
        $this->purchaser_name[] = ''; // Add an empty string for the new purchaser name
    }

    public function removePurchaser($index)
    {
        if ($index > 0) {
            unset($this->inputs[$index]);
            unset($this->purchaser_name[$index]);
        }
    }


    public function calculateSaleAmount()
    {
        // Check if both total surface for sale and unit price per m² are set
        if (!empty($this->surface_for_sale) && !empty($this->price_per_m²)) {
            // Calculate the sale amount by multiplying surface for sale and price per m²
            $this->sale_amount = $this->surface_for_sale * $this->price_per_m²;

            // Calculate the balance as the difference between sale_amount and advance
            $this->balance = $this->sale_amount - $this->advance;
            if ($this->payment_type === 'tranche') {
                $this->balance = $this->sale_amount - $this->advance;
            } else {
                $this->advance = null; // Set the advance value based on your logic for cash payment
                $this->balance = null; // Set the balance value based on your logic for cash payment
            }
        } else {
            // If any of the inputs is not set, set the sale amount to null or 0, depending on your preference
            $this->sale_amount = null; // or 0

            $this->balance = null; // or 0
        }
    }


    public static function generateConsCode()
    {
        $lastSaleCode = DB::table('sales')
            ->orderBy('id', 'desc')->select('sales_code')->first();
        $number = 1;
        if ($lastSaleCode) {
            $number = (int)substr($lastSaleCode->sales_code, 3) + 1;
        }
        $SaleCode = 'SSALE' . str_pad($number, 6, '0', STR_PAD_LEFT);
        while (DB::table('sales')->where('sales_code', $SaleCode)->exists()) {
            $number++;
            $SaleCode = 'SSale' . str_pad($number, 6, '0', STR_PAD_LEFT);
        }
        return $SaleCode;
    }

    public function updatedTitreFoncierId($titre_foncier_id)
    {
        // dd('s');
        if (!empty($titre_foncier_id)) {
            $utilisateur = TitreFoncier::findOrFail($titre_foncier_id);

            // Update the Livewire component properties with the titre_foncier information
            $this->numero_titre_foncier = $utilisateur->numero_titre_foncier;
            $this->superficie_du_TF_mere = $utilisateur->superficie_du_TF_mere;
            $this->limit_nord = $utilisateur->limit_nord;
            $this->limit_sud = $utilisateur->limit_sud;
            $this->limit_est = $utilisateur->limit_est;
            $this->limit_ouest = $utilisateur->limit_ouest;
            $this->lieu_dit = $utilisateur->lieu_dit;
            $this->sub_division_id = $utilisateur->sub_division_id;
            $this->region_id = $utilisateur->region_id;
            $this->division_id = $utilisateur->division_id;
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
        // Validate the required fields before storing the data
        $this->validate([
            'titre_foncier_id' => 'required',
            'surface_for_sale' => 'required|numeric',
            'price_per_m²' => 'required|numeric',
            'advance' => 'nullable|numeric',
            'notary_id' => 'required|nullable',
            'payment_type' => 'required|in:cash,tranche',
            'document.*' => [
                'file',
                'max:2048', // Maximum file size in kilobytes (2MB in this example)
                'mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,text/plain,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // Allowed MIME types
            ],
            // Add more validation rules for other fields if needed
        ]);


        // Calculate the sale amount
        $this->calculateSaleAmount();

        $documentPaths = [];
        // foreach ($this->document as $document) {
        //     dd($document);
        //     $documentPaths[] = $document->store('documents', 'documents'); // Store using the 'documents' disk
        // }
        $documentPaths = [];
        foreach ($this->document as $document) {
            // dd($document);

            $documentPaths[] = $document->store('public/documents');
        }

        $purchaserNames = implode(',', $this->purchaser_name);

        if ($this->payment_type === 'cash') {
            $defaultAdvance = 0;
            $defaultBalance = 0;
        } else {
            $defaultAdvance = $this->advance ?? 0;
            $defaultBalance = $this->balance ?? 0;
        }
        // Store the data into the database (or any other storage medium)
        $sale = Sale::create([
            'titre_foncier_id' => $this->titre_foncier_id,
            'notary_id' => $this->notary_id,
            'sales_code' => $this->sales_code,
            'balance' => $defaultBalance,
            'purchaser_name' => implode(',', $this->purchaser_name),
            'surface_for_sale' => $this->surface_for_sale,
            'price_per_m²' => $this->price_per_m²,
            'sale_amount' => $this->sale_amount,
            'document_path' => json_encode($documentPaths), // Use the array with document paths here
            'sale_type' => 'total_sale',
            'payment_type' => $this->payment_type,
            'advance' => $this->advance,
            'advance' => $defaultAdvance,
            'observation' => $this->observation,
            'created_by' => auth()->user()->name,
        ]);

        // Assuming your Sale model has a documents relationship, you can store the documents like this:
        foreach ($documentPaths as $path) {
            $sale->documents()->create(['path' => $path]);
        }

        session()->flash('success', 'Sale information stored successfully!');


        // Clear the input fields after storing
        $this->clearFields();

        // Optionally, you can add a success message or redirect to a confirmation page.
    }

    public function delete()
    {
        if ($this->sale) {
            $this->sale->delete();
            session()->flash('message', 'sale deleted successfully');
            $this->dispatchBrowserEvent('close-modal');
        }
    }


    public function clearFields()
    {
        $this->titre_foncier_id = null;
        $this->notary_id = null;
        $this->sales_code = $this->generateConsCode();
        $this->balance = 0;
        $this->purchaser_name = [];
        $this->surface_for_sale = null;
        $this->price_per_m² = null;
        $this->sale_amount = null;
        $this->document = [];
        $this->sale_type = 'total_sale';
        $this->payment_type = 'cash';
        $this->advance = 0;
        $this->observation = null;
    }
    public function initData($id)
    {
        $sale = Sale::findOrFail($id);
        $this->sale = $sale;
        $this->saleId = $id;
        $this->sale_amount = $sale->sale_amount;
        $this->titre_foncier_id = $sale->titre_foncier_id;
        $this->sales_code = $sale->sales_code;
        $this->purchaser_name = $sale->purchaser_name;
        $this->document = $sale->document;
        $this->surface_for_sale = $sale->surface_for_sale;
        $this->payment_type = $sale->payment_type;
        $this->price_per_m² = $sale->price_per_m²;
        $this->notary_id = $sale->notary_id;
        $this->advance = $sale->advance;
        $this->balance = $sale->balance;
        $this->observation = $sale->observation;
    }

    public function render()
    {
        $totals = Sale::search($this->query)->where('sale_type', 'total_sale')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        return view('livewire..portal.sales.total-sales.index', compact('totals'));
    }
}
