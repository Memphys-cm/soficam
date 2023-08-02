<?php

namespace App\Http\Livewire\Portal\Sales\SimpleSales;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Sales\Sale;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public ?string $query = null;
    public int $perPage = 15;
    public string $orderAsc = 'desc';
    public string $orderBy = 'created_at';

    public $inputs = [];
    public $i = 1;

    public $user, $user_id;
    public $created, $sales_code, $number_of_lots_sold, $number_of_lots_remaining;
    public $maeture, $land_title_area, $public_utility_area, $area_sold, $remaining_area, $number_of_blocks, $number_of_lots;
    public $purchaser_name, $purchaser_address;

    public function mount()
    {
        $this->user = User::select('id', 'first_name')->get();
        $this->created = Carbon::now()->addHour();
        $this->sales_code = $this->generateConsCode();

    }public function addPurchaser($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }
    public function dispaly()
    {
        dd("hello");
    }
    public function removePurchaser($i)
    {
        unset($this->inputs[$i]);
    }

    public static function generateConsCode()
    {
        $lastSaleCode = DB::table('sales')
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

    public function render()
    {
        $simplesales = Sale::search($this->query)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        return view('livewire..portal.sales.simple-sales.index', compact('simplesales'))->layout('components.layouts.dashboard');
    }
}
