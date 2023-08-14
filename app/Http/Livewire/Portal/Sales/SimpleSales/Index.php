<?php

namespace App\Http\Livewire\Portal\Sales\SimpleSales;

use App\Http\Livewire\Traits\WithDataTables;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Notary;
use Livewire\Component;
use App\Models\Sales\Sale;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\MembreDuCabinet;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Lotissements\Lotissement;

class Index extends Component
{
    use WithDataTables;
    
    public function render()
    {
        $lotissements = Lotissement::/*search($this->query)->*/withCount('blocks')->withCount('parcels')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $lotissements_count = Lotissement::count();

        return view('livewire.portal.sales.simple-sales.index',
            [
                'lotissements' => $lotissements,
                'lotissements_count' => $lotissements_count
            ]);
    }
}