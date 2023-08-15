<?php

namespace App\Http\Livewire\Portal\TitreFonciers\Charges;

use App\Models\User;
use App\Models\Charge;
use Livewire\Component;
use App\Models\TitreFoncier;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{
    use WithDataTables;

    public $status='pending_payment';
    public $charge, $charge_id;
    public $titre_foncier_id, $titre_fonciers;
    public $type_charge;
    public $etat_TF;

    public function mount()
    {
        $this->titre_fonciers = TitreFoncier::all();
    }


    public $priceMapping = [
        'HYPOTHEQUE' => 2334,
        'DISPONIBLE' => 0,
        'PRENOTE' => 2234,
        'SUSPENDU' => 2344,
    ];

    public function updatedEtatTF()
    {
        if (isset($this->priceMapping[$this->etat_TF])) {
            $this->price = $this->priceMapping[$this->etat_TF];
        } else {
            $this->price = null;
        }
    }

    public function updatedChargeId($titre_foncier_id)
    {
        if (!empty($titre_foncier_id)) {
            $tf = TitreFoncier::findOrFail($titre_foncier_id);

            $this->numero_titre_foncier = $tf->numero_titre_foncier;
            $this->etat_TF = $tf->etat_TF;
            
        } else {
            $this->numero_titre_foncier = '';
            $this->etat_TF = '';
           
        }
        
    }

    public function store() {
        $this->validate([
            'titre_foncier_id' => 'required',
            'type_charge' => 'required'
        ]);

        $charge = Charge::create([
            'titre_foncier_id' => $this->numero_titre_foncier,
            'type_charge' => $this->etat_TF,
            'status' => $this->status,
        ]);
    }

    public function render()
    {
        $charges = Charge::with('users')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $charges_count = Charge::count();

        return view('livewire.portal.titre-fonciers.charges.index', [
            'charges' => $charges,
            'charges_count' => $charges_count,
        ])->layout('components.layouts.dashboard');
    }
}
