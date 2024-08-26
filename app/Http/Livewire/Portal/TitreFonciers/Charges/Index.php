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

    public $charge;
    public $titre_foncier_id, $titre_fonciers, $numero_titre_foncier;
    public $type_charge;
    public $attachements;
    public $etat_TF;
    public ?string $query = null;

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
    
        $this->refresh(__('Charge ajouté avec succès!'), 'CreateChargeModal');
    }

    public function initData($id) {
        $charge = Charge::findOrFail($id);

        $this->charge = $charge;

        $this->type_charge = $charge->type_charge;
    }

    function sendChargeMessage($charge){
        $receivers = $charge->titreFoncier->users;

        $sms='';
        $userNames='';
        $mobiles = "";

        foreach($receivers as $user) {
            if($user){
                $userNames .= $user->first_name . ',';
                $mobiles .= "$user->primary_phone_number,";
            }
        }

        //retirer la virgule en fin de chaine
        $userNames = rtrim($userNames, ',');
        $mobiles = rtrim($mobiles, ',');

        //Personnaliser le sms
        switch ($charge->type_charge) {
            case 'HYPOTHEQUE':
                $sms = "Mr/Mme. $userNames, une hypothèque a été ajouté à votre titre foncier.";
                break;
    
            case 'PRENOTE':
                $sms = "Mr/Mme. $userNames, une prénotation a été ajouté à votre titre foncier.";
                break;
                
            case 'SUSPENDU';
                $sms = "Mr/Mme. $userNames, votre titre foncier a été suspendu.";
                break;

            case 'ANNULATION';
                $sms = "Mr/Mme. $userNames, votre titre foncier a été annulé.";
                break;

            default:
                    // Le type de charge n'est pas reconnu, vous pouvez gérer cela ici
                break;
        }
                
        if(!empty($sms)){
            $senderid ='SOFICAM';
            $mobiles = $mobiles;
            $api_key = 'wplL0f9wq1moi1NrsjpsBgfBzun4';
            $url = 'https://api.queensms.net/v1/sms.php';

            $sms_body = array(
                'api_key' => $api_key,
                'senderid' => $senderid,
                'sms' => $sms,
                'mobiles' => $mobiles
            );
                
            $send_data = http_build_query($sms_body);
            $gateway_url = $url . "?" . $send_data;
                
            try {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $gateway_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPGET, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $output = curl_exec($ch);
            
                if (curl_errno($ch)) {
                    $output = curl_error($ch);
                    $arr = ['echec'];
                    return($arr);
                }
                else{
                    return($output);
                }
                    curl_close($ch);
            }
                
            catch (Exception $exception){
                //echo $exception->getMessage();
                $arr = ['echec'];
                return($arr);
            }
        }

    }

    private function removeCharge($charge) {
        $receivers = $charge->titreFoncier->users;

        $sms = 'votre titre foncier est disponible';
        $senderid ='SOFICAM';
        $mobiles = '';

        foreach ($receivers as $user) {
            if ($user) {
                // Ajoutez le numéro de téléphone de l'utilisateur à la chaîne
                $mobiles .= "$user->primary_phone_number,";
            }
        }
    
        // Supprimez la virgule et l'espace en trop à la fin de la chaîne
        $mobiles = rtrim($mobiles, ',');
        $api_key = '36v7fN66hzUD6SaBYkILlirHZo7P';
        $url = 'https://api.queensms.net/v1/sms.php';

        $sms_body = array(
            'api_key' => $api_key,
            'senderid' => $senderid,
            'sms' => $sms,
            'mobiles' => $mobiles
        );
    
        $send_data = http_build_query($sms_body);
        $gateway_url = $url . "?" . $send_data;
    
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $gateway_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPGET, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $output = curl_exec($ch);
    
            if (curl_errno($ch)) {
                $output = curl_error($ch);
                $arr = ['echec'];
                return($arr);
            }
            else{
                return($output);
            }
            curl_close($ch);
        }
    
        catch (Exception $exception){
            //echo $exception->getMessage();
            $arr = ['echec'];
            return($arr);
        }
    }

    public function retirer() {
        $this->validate([
            'titre_foncier_id' => 'required',
        ]);

        $this->titre_foncier = TitreFoncier::findOrFail($this->titre_foncier_id);

        $this->titre_foncier->update([
            'etat_TF' => 'RETRAIT',
        ]);
            
        $charge = Charge::create([
            'titre_foncier_id' => $this->titre_foncier_id,
            'type_charge' => 'RETRAIT',
        ]);

        $this->removeCharge($charge);

        $this->clearFields();

        $this->refresh(__('Charge retirée avec succès!'), 'EditChargeModal');
    }

    public function delete()
    {
        if (!empty($this->charge)) {
            $this->charge->delete();
        }

        $this->refresh(__('Charge Supprimé de l\'historique avec succès'), 'DeleteModal');
    }
   
    public function render()
    {
        $charges = Charge::search($this->query)->with('titrefoncier')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
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
    
}
