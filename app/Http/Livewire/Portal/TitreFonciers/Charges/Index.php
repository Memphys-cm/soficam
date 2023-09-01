<?php

namespace App\Http\Livewire\Portal\TitreFonciers\Charges;

use App\Models\User;
use App\Models\Charge;
use Livewire\Component;
use Twilio\Rest\Client;
use App\Models\TitreFoncier;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{
    use WithDataTables;

    public ?Charge $charge;
    public $titre_foncier_id, $titre_fonciers, $numero_titre_foncier;
    public $type_charge;
    public $attachements;
    public $etat_TF;
    //public $phone_number = '+237672959097';

    public function mount()
    {
        $this->titre_fonciers = TitreFoncier::select('id', 'numero_titre_foncier')->get();
        $this->users = User::role('user')->select('id', 'first_name', 'last_name')->get();
    }

    public function updatedTitreFoncierId($titre_foncier_id) {
        if (!empty($titre_foncier_id)) {
            $tf = TitreFoncier::findOrFail($titre_foncier_id);
            $this->numero_titre_foncier = $tf->numero_titre_foncier;
            $this->titre_foncier_users = $tf->users;
            $this->etat_TF = $tf->etat_TF;
        }
    }

    public function initData($id) {
        $charge = Charge::findOrFail($id);

        $this->charge = $charge;
        $this->titre_foncier_id = $charge->titreFoncier->numero_titre_foncier;
        $this->type_charge = $charge->type_charge;
    }

    public function store() 
    {   
        $this->validate([
            'titre_foncier_id' => 'required',
            'etat_TF' => 'required',
        ]);

        $this->titre_foncier = TitreFoncier::findOrFail($this->titre_foncier_id);

        $this->titre_foncier->update([
            'etat_TF' => $this->etat_TF,
        ]);
            
        $charge = Charge::create([
            'titre_foncier_id' => $this->titre_foncier_id,
            'type_charge' => $this->etat_TF,
        ]);

        $this->sendChargeMessage($charge);

        if(!empty($this->attachements)){
            $charge->addMedia($this->attachements->getRealPath())
            ->usingName($charge->titre_foncier_id)
            ->toMediaCollection('charges');
        }

        $this->clearFields();
    
        $this->refresh(__('Charge successfully Created!'), 'CreateChargeModal');
    }

    private function sendChargeMessage($charge)
    {
        $receivers = $charge->titreFoncier->users;

        /*foreach($receivers as $user) {
            if ($user) {*/
            $sid='ACa77985267946bd8e613944d40b9d0458';
            $token='b7b84303df6a21c3d6f9b32d3d678103';
            $twilio = new Client($sid, $token);

            $messageBody = "Hello, a $charge->type_charge has been added to your land title.";

            $twilio->messages->create(
                '+237672959097',
                [
                    'from' => '+15856393680',
                    'body' => $messageBody,
                ]
            );
            //}
        //}
    }

    private function removeCharge() {
        $sid='ACa77985267946bd8e613944d40b9d0458';
        $token='b7b84303df6a21c3d6f9b32d3d678103';
        $twilio = new Client($sid, $token);

        $messageBody = "Hello, your land title is now available.";

        $twilio->messages->create(
            '+237672959097',
            [
                'from' => '+15856393680',
                'body' => $messageBody,
            ]
        );
    }

    public function update() {
        $this->validate([
            'titre_foncier_id' => 'required',
        ]);

        $this->titre_foncier = TitreFoncier::findOrFail($this->titre_foncier_id);

        $this->titre_foncier->update([
            'etat_TF' => 'DISPONIBLE',
        ]);
            
        $charge = Charge::create([
            'titre_foncier_id' => $this->titre_foncier_id,
            'type_charge' => 'DISPONIBLE',
        ]);

        $this->removeCharge();

        $this->clearFields();

        $this->refresh(__('Charge successfully Updated!'), 'EditChargeModal');
    }

    public function delete()
    {
        if (!empty($this->charge)) {
            $this->charge->delete();
        }

        $this->refresh(__('Charge successfully deleted!'), 'DeleteModal');
    }
   
    public function render()
    {
        $charges = Charge::with('titrefoncier')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $charges_count = Charge::count();

        return view('livewire.portal.titre-fonciers.charges.index', [
            'charges' => $charges,
            'charges_count' => $charges_count,
        ])->layout('components.layouts.dashboard');
    }

    public function clearFields() {
        $this->reset([
            'type_charge',
            'titre_foncier_id',
        ]);
    }

    public function clearField() {
        $this->reset([
            'etat_TF',
            'numero_titre_foncier',
        ]);
    }
}
