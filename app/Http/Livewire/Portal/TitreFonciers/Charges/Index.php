<?php

namespace App\Http\Livewire\Portal\TitreFonciers\Charges;

use App\Models\User;
use App\Models\Charge;
use Livewire\Component;
use App\Models\Sales\Sale;
use App\Models\TitreFoncier;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithDataTables;
use Twilio\Rest\Client;

class Index extends Component
{
    use WithDataTables;

    public $titre_foncier_id, $titre_fonciers, $titre_foncier;
    public $type_charge;
    public $etat_TF;
    public $phone_number = '+237672959097';

    public function mount()
    {
        $this->titre_fonciers = TitreFoncier::all();
    }

    public $priceMapping = [
        'HYPOTHEQUE' => 2334,
        'DISPONIBLE' => 0,
        'PRENOTE' => 3234,
        'SUSPENDU' => 4344,
    ];            

    public $statusMapping = [
        'HYPOTHEQUE' => 'pending_payment',
        'DISPONIBLE' => 'active',
        'PRENOTE' => 'pending_payment',
        'SUSPENDU' => 'inactive',
    ];

    public function updatedEtatTF()
    {
        if (isset($this->priceMapping[$this->etat_TF])) {
            $this->price = $this->priceMapping[$this->etat_TF];
        } else {
            $this->price = null;
        }
    }

    public function initData($id) {
        $titrefoncier = TitreFoncier::findOrFail($id);

        $this->titrefoncier = $titrefoncier;
        $this->numero_titre_foncier =  $titrefoncier->numero_titre_foncier;
        $this->etat_TF =  $titrefoncier->etat_TF;
        if (isset($this->priceMapping[$this->etat_TF])) {
            $this->price = $this->priceMapping[$this->etat_TF];
        } else {
            $this->price = null;
        }
    }

    public function store() 
    {   
        $this->validate([
            'etat_TF' => 'required'
        ]);
        
        DB::transaction(function () {
            $this->titrefoncier->update([
                'etat_TF' => $this->etat_TF,
            ]);
            
            $charge = Charge::create([
                'titre_foncier_id' => $this->titrefoncier->id,
                'type_charge' => $this->etat_TF, 
                'status' => $this->statusMapping[$this->etat_TF],
            ]);

            $sale = Sale::create([
                'sales_amount' => $this->price,
                'sales_type' => 'charge',
                'created_by' => auth()->user()->name,
            ]);

            // Create the Saleable item using only the specified information
            $saleableData = [
                'sale_id' => $sale->id,
                'price' => $this->price,
                'quantity' => 1,
                'saleable_id' => $charge->id,
                'saleable_type' => $this->etat_TF, // Adjust the namespace if different
                'created_by' => auth()->user()->name,
            ];

            DB::table('saleables')->insert($saleableData);

        });
    
        $this->refresh(__('Charge successfully Created!'), 'CreateChargeModal');
    }

    public function sendMessage() {
        $user = $this->titrefoncier->titrefoncier_user->user_id;

        if($user) {
            $twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));

            $messageBody = "Hello {$user->first_name}, a new charge has been added to your land title.";

            $twilio->messages->create(
                $user->primary_phone_number,
                [
                    'from' => config('services.twilio.phone_number'),
                    'body' => $messageBody,
                ]
            );
        }
    }

    public function render()
    {
        $charges = TitreFoncier::with('users')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $charges_count = TitreFoncier::count();

        return view('livewire.portal.titre-fonciers.charges.index', [
            'charges' => $charges,
            'charges_count' => $charges_count,
        ])->layout('components.layouts.dashboard');
    }
}
