<?php

namespace App\Http\Livewire\Portal\Sales\SimpleSales;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Sales\Sale;
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

    public $user, $user_id;
    public $created, $sales_code, $number_of_lots_sold, $number_of_lots_remaining, $balance, $observation;
    public $maeture, $land_title_area, $public_utility_area, $area_sold, $remaining_area, $number_of_blocks, $number_of_lots;
    public $purchaser_address, $surface_for_sale, $price_per_m², $sale_amount, $payment_type, $advance;
    public $document = [];
    public $purchaser_name = [];

    public function mount()
    {
        $this->user = User::select('id', 'first_name')->get();
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
        } else {
            // If any of the inputs is not set, set the sale amount to null or 0, depending on your preference
            $this->sale_amount = null; // or 0

            $this->balance = null; // or 0
        }
    }


    public static function generateConsCode()
    {
        $lastSaleCode = DB::table('sales')
            ->where('sales_type', 'simple-sale')
            ->orderBy('id', 'desc')->select('sales_code')->first();
        $number = 1;
        if ($lastSaleCode) {
            $number = (int)substr($lastSaleCode->code, 3) + 1;
        }
        $SaleCode = 'SSALE' . str_pad($number, 6, '0', STR_PAD_LEFT);
        while (DB::table('sales')->where('sales_code', $SaleCode)->exists()) {
            $number++;
            $SaleCode = 'SSale' . str_pad($number, 6, '0', STR_PAD_LEFT);
        }
        return $SaleCode;
    }


    public function store()
    {
        // Validate the required fields before storing the data
        $this->validate([
            'surface_for_sale' => 'required|numeric',
            'price_per_m²' => 'required|numeric',
            'advance' => 'nullable|numeric',
            'document.*' => 'image|mimes:jpeg,png,jpg,gif,svg,pdf,docx,txt,doc,xlsx,mp3,mp4,zip|max:5120|nullable',
            // Add more validation rules for other fields if needed
        ]);

        // Calculate the sale amount
        $this->calculateSaleAmount();
        $purchaserNames = implode(',', $this->purchaser_name);
        // Store the data into the database (or any other storage medium)
        $sale = Sale::create([
            'user_id' => $this->user_id,
            'created' => $this->created,
            'sales_code' => $this->sales_code,
            'number_of_lots_sold' => $this->number_of_lots_sold,
            'number_of_lots_remaining' => $this->number_of_lots_remaining,
            'balance' => $this->balance,
            'mature' => $this->mature,
            'land_title_area' => $this->land_title_area,
            'public_utility_area' => $this->public_utility_area,
            'area_sold' => $this->area_sold,
            'remaining_area' => $this->remaining_area,
            'number_of_blocks' => $this->number_of_blocks,
            'number_of_lots' => $this->number_of_lots,
            'purchaser_name' => $this->purchaserNames,
            'purchaser_address' => $this->purchaser_address,
            'surface_for_sale' => $this->surface_for_sale,
            'price_per_m²' => $this->price_per_m²,
            'sale_amount' => $this->sale_amount,
            'payment_type' => $this->payment_type,
            'advance' => $this->advance,
            'balance' => $this->balance,
            'observation' => $this->observation,
        ]);

        // Store the documents
        foreach ($this->document as $document) {
            $document->store('document');
            // Assuming you want to store the document's path in the database, you can do something like this:
            $sale->documents()->create(['path' => $document->hashName()]);
        }

        // Clear the input fields after storing
        $this->resetInput();

        // Optionally, you can add a success message or redirect to a confirmation page.
        session()->flash('success', 'Sale information stored successfully!');
    }


    public function resetInput()
    {
    }


    public function render()
    {

        $simplesales = Sale::search($this->query)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        return view('livewire..portal.sales.simple-sales.index', compact('simplesales'))->layout('components.layouts.dashboard');
    }
}
