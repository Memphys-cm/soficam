<?php

namespace App\Http\Livewire\Portal\MembreDuCabinet\Cabinet;

use App\Models\Region;
use Livewire\Component;
use App\Models\NotaryOffice;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{

    use WithPagination;
    use WithDataTables;


    public ?string $query = null;

    public $office_name, $post;
    public  $notaryoffice;
    public $notaryOfficeId, $region, $regions, $region_id, $description;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'office_name' => 'required',
            'description' => 'nullable',
            'region_id' => 'required',
        ]);
    }

    public function mount(){
        $this->regions = Region::select('id', 'region_name_en')->get();

    }


    
    public function store()
    {
        // Validate the input fields
        $this->validate([
            'office_name' => 'required',
            'description' => 'required',
            'region_id' => 'required',
        ]);

        // Create a new notary
        $notaryoffice = new NotaryOffice();
        $notaryoffice->office_name = $this->office_name;
        $notaryoffice->description = $this->description;
        $notaryoffice->region_id = $this->region_id;
        $notaryoffice->save();

        // Show success message, reset fields, and close the modal
        $this->clearFields();
        $this->refresh(__('Notary Office successfully Created!'), 'CreatenotaryofficeModal');

    }

    public function update()
    {
        // Validate the input fields
        $this->validate([
            'office_name' => 'required',
            'description' => 'required',
            'region_id' => 'required',
        ]);
        DB::transaction(function () {
            $this->notaryoffice->update([
                'office_name' => $this->office_name,
                'description' => $this->description,
                'region_id' => $this->region_id,
            ]);
        });

        $this->clearFields();
        $this->refresh(__('Notary Office successfully Created!'), 'Editnotaryofficedal');

    }

    public function initData($id)
    {
        $notaryoffice = NotaryOffice::findOrFail($id);
        $this->notaryoffice = $notaryoffice;
        $this->notaryOfficeId = $id;
        $this->office_name = $notaryoffice->office_name;
        $this->description = $notaryoffice->description;
        $this->region_id = $notaryoffice->region_id;
    }

    public function delete()
    {
        if ($this->notaryoffice) {
            $this->notaryoffice->delete();
            $this->refresh(__('Notary Office successfully deleted!'), 'DeleteModal');
        }
    }

    public function clearFields()
    {
        $this->office_name = '';
        $this->description = '';
        $this->region_id = '';
    }

    public function render()
    {
        $notaryoffices = NotaryOffice::search($this->query)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $notaryoffices_count = NotaryOffice::count();

        return view('livewire..portal.membre-du-cabinet.cabinet.index', ['notaryoffices'=>$notaryoffices, 'notaryoffices_count'=>$notaryoffices_count]);
    }
}
