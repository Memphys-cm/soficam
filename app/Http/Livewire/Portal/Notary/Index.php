<?php

namespace App\Http\Livewire\Portal\Notary;

use App\Models\Notary;
use Livewire\Component;
use App\Models\NotaryOffice;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{

    use WithPagination;
    use WithDataTables;


   

    public $name, $post, $notary_office_id;
    public  $notary, $notaryoffices;
    public $notaryId, $region_id;
    public ?string $query = null;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|unique:notaries',
            'notary_office_id'=>'required',
            'post' => 'nullable',
        ]);
    }
    public function mount(){
        $this->notaryoffices = NotaryOffice::select('id', 'office_name')->get();
    }
    public function updatedNotaryOfficeId($notary_office_id)
    {
        // dd('s');
        if (!empty($notary_office_id)) {
            $notaryoffices = NotaryOffice::findOrFail($notary_office_id);
            // dd($notaryoffices->region->region_name_en); 

            // Update the Livewire component properties with the titre_foncier information
            
            $this->region_id = $notaryoffices->region->region_name_en;
        } else {
            // Reset the Livewire component properties when the titre_foncier_id is empty
           
            $this->region_id = '';
        }
    }

    public function store()
    {
        // Validate the input fields
        $this->validate([
            'name' => 'required|unique:notaries',
            'notary_office_id'=>'required',
            'post' => 'nullable',
        ]);

        // Create a new notary
        $notary = new Notary();
        $notary->name = $this->name;
        $notary->post = $this->post;
        $notary->notary_office_id = $this->notary_office_id;
        $notary->save();

        // Show success message, reset fields, and close the modal
        $this->clearFields();
        $this->refresh(__('Notary successfully Created!'), 'CreatenotaryModal');

    }

    public function update()
    {
        // Validate the input fields
        $this->validate([
            'name' => 'required',
            'post' => 'required',
            'notary_office_id' => 'required',
        ]);
        DB::transaction(function () {
            $this->notary->update([
                'name' => $this->name,
                'post' => $this->post,
                'notary_office_id' => $this->notary_office_id,
                
            ]);
        });
        $this->clearFields();

        $this->refresh(__('Notary Office successfully Updated!'), 'Editnotaryodal');

    }

    public function initData($id)
    {
        $notary = Notary::findOrFail($id);
        $this->notary = $notary;
        $this->notaryId = $id;
        $this->name = $notary->name;
        $this->post = $notary->post;
        $this->notary_office_id = $notary->notary_office_id;
    }



    public function delete()
    {
        if ($this->notary) {
            $this->notary->delete();
            $this->refresh(__('Notary successfully deleted!'), 'DeleteModal');
        }
    }



    public function clearFields()
    {
        $this->name = '';
        $this->post = '';
        $this->notary_office_id = '';
    }

    public function render()
    {
        $notarys = Notary::search($this->query)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $notarys_count = Notary::count();


        return view('livewire..portal.notary.index', ['notarys'=>$notarys, 'notarys_count'=>$notarys_count]);
    }
}
