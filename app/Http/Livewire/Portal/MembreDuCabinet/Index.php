<?php

namespace App\Http\Livewire\Portal\MembreDuCabinet;

use Livewire\Component;
use App\Models\MembreDuCabinet;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithDataTables;
use App\Models\Cabinet;

class Index extends Component
{

    use WithDataTables;

    public $first_name, $post, $cabinet_id;
    public $membre_du_cabinet, $cabinets;
    public $membre_du_cabinetId, $region_id;
    public $last_name, $phone_number, $address, $type_membre;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'first_name' => 'required',
            'last_name' => 'required',
            'cabinet_id'=>'required',
            'address'=>'nullable',
            'phone_number'=>'nullable',
            'type_membre'=>'required',
            'post' => 'nullable',
        ]);
    }

    public function mount(){
        $this->cabinets = Cabinet::select('id', 'nom_cabinet')->get();
    }

    // public function updatedNotaryOfficeId($cabinet_id)
    // {
    //     // dd('s');
    //     if (!empty($cabinet_id)) {
    //         $notaryoffices = Cabinet::findOrFail($cabinet_id);
    //         // dd($notaryoffices->region->region_name_en); 

    //         // Update the Livewire component properties with the titre_foncier information
            
    //         $this->region_id = $notaryoffices->region->region_name_en;
    //     } else {
    //         // Reset the Livewire component properties when the titre_foncier_id is empty
           
    //         $this->region_id = '';
    //     }
    // }

    public function store()
    {
        // Validate the input fields
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'cabinet_id'=>'required',
            'address'=>'nullable',
            'phone_number'=>'nullable',
            'type_membre'=>'required',
            'post' => 'nullable',
        ]);

        // Create a new notary
        $membre_du_cabinet = new MembreDuCabinet();
        $membre_du_cabinet->first_name = $this->first_name;
        $membre_du_cabinet->last_name = $this->last_name;
        $membre_du_cabinet->address = $this->address;
        $membre_du_cabinet->phone_number = $this->phone_number;
        $membre_du_cabinet->post = $this->post;
        $membre_du_cabinet->type_membre = $this->type_membre;
        $membre_du_cabinet->cabinet_id = $this->cabinet_id;
        $membre_du_cabinet->save();

        // Show success message, reset fields, and close the modal
        $this->clearFields();
        $this->refresh(__('Membre du Cabinet créé avec succès!'), 'CreateMembreModal');

    }

    public function update()
    {
        // Validate the input fields
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'cabinet_id'=>'required',
            'address'=>'nullable',
            'phone_number'=>'nullable',
            'type_membre'=>'required',
            'post' => 'nullable',
        ]);
        DB::transaction(function () {
            $this->membre_du_cabinet->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'address' => $this->address,
                'phone_number' => $this->phone_number,
                'type_membre' => $this->type_membre,
                'post' => $this->post,
                'cabinet_id' => $this->cabinet_id,
                
            ]);
        });
        $this->clearFields();

        $this->refresh(__('Membre du Cabinet mis à jour avec succès!'), 'EditMembeModal');

    }

    public function initData($id)
    {
        $membre_du_cabinet = MembreDuCabinet::findOrFail($id);
        $this->membre_du_cabinet = $membre_du_cabinet;
        $this->membre_du_cabinetId = $id;
        $this->first_name = $membre_du_cabinet->first_name;
        $this->last_name = $membre_du_cabinet->last_name;
        $this->address = $membre_du_cabinet->address;
        $this->phone_number = $membre_du_cabinet->phone_number;
        $this->post = $membre_du_cabinet->post;
        $this->type_membre = $membre_du_cabinet->type_membre;
        $this->cabinet_id = $membre_du_cabinet->cabinet_id;
    }



    public function delete()
    {
        if ($this->membre_du_cabinet) {
            $this->membre_du_cabinet->delete();
            $this->refresh(__('Membre du Cabinet supprimé avec succès!'), 'DeleteModal');
        }
    }



    public function clearFields()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->address = '';
        $this->phone_number = '';
        $this->type_membre = '';
        $this->post = '';
        $this->cabinet_id = '';
    }

    public function render()
    {
        $membre_du_cabinets = MembreDuCabinet::search($this->query)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $membre_du_cabinets_count = MembreDuCabinet::count();


        return view('livewire..portal.membres-du-cabinet.index', ['membre_du_cabinets'=>$membre_du_cabinets, 'membre_du_cabinets_count'=>$membre_du_cabinets_count]);
    }
}
