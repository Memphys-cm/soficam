<?php

namespace App\Livewire\Portal\Sales\SimpleSales;

use Livewire\Component;
use App\Models\Sales\Sale;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public ?string $query = null;
    public int $perPage = 15;
    public string $orderAsc = 'desc';
    public string $orderBy = 'created_at';

    public function render()
    {
        $simplesales = Sale::search($this->query)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        return view('livewire..portal.sales.simple-sales.index', compact('simplesales'))->layout('components.layouts.dashboard');
    }
}
