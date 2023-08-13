<?php

namespace App\Http\Livewire\Traits;

use Livewire\WithFileUploads;
use Livewire\WithPagination;

trait WithDataTables
{
    use WithPagination, WithFileUploads;
    
    protected $paginationTheme = 'bootstrap';

    //DataTable props
    public ?string $query = null;
    public ?string $resultCount;
    public string $orderBy = 'created_at';
    public string $orderAsc = 'desc';
    public int $perPage = 15;

    public function refresh($message, $modal)
    {
        //Close the active modal
        $this->emit('cancel', $modal);
        session()->flash('message', $message);
        //Refresh the livewire component
    }
    
}