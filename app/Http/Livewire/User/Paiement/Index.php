<?php

namespace App\Http\Livewire\User\Paiement;

use Livewire\Component;
use App\Models\Sales\Sale;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{
    use WithDataTables;
    public ?string $query = null;
    public $allsales, $user;

    public function mount(){
        $this->user = Auth::user();
        $this->allsales = Sale::where('user_id', $this->user->id)->get();
    }

    public function render()
    {
        $this->user = Auth::user();

        $allsaless = Sale::search($this->query)
        ->where('user_id', $this->user->id)
        ->orderBy($this->orderBy, $this->orderAsc)
        ->paginate($this->perPage);

        $allsales_count = Sale::where('user_id', $this->user->id)->count();

        return view('livewire.user.paiement.index', ['allsaless'=>$allsaless, 'allsales_count'=>$allsales_count]);
    }
}
