<?php

namespace App\Http\Livewire\Portal\MembreDuCabinet\Cabinet;

use App\Models\Region;
use App\Models\Cabinet;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithDataTables;
use App\Models\Division;
use App\Models\SubDivision;

class Index extends Component
{

    use WithPagination;
    use WithDataTables;


    public ?string $query = null;

    public $nom_cabinet, $post;
    public  $cabinet;
    public $type_cabinet;
    public $cabinetId, $region, $regions, $region_id, $description;
    public  $sub_division_id, $division_id, $sub_divisions, $divisions;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'nom_cabinet' => 'required',
            'description' => 'nullable',
            'region_id' => 'required',
            'division_id' => 'required',
            'type_cabinet' => 'required',
            'sub_division_id' => 'required',
        ]);
    }

    public function mount(){
        $this->regions = Region::select('region_name_en', 'region_name_fr', 'id')->get();

    }

    public function updatedRegionID($region_id)
    {
        if (!empty($region_id)) {
            $this->divisions = Division::whereRegionId($region_id)->get();
        }
    }
    public function updatedDivisionID($division_id)
    {
        if (!empty($division_id)) {
            $this->sub_divisions = SubDivision::whereDivisionId($division_id)->get();
        }
    }


    
    public function store()
    {
        // Validate the input fields
        $this->validate([
            'nom_cabinet' => 'required',
            'description' => 'nullable',
            'region_id' => 'required',
            'type_cabinet' => 'required',
            'division_id' => 'required',
            'sub_division_id' => 'required',
        ]);

        // Create a new notary
        $cabinet = new Cabinet();
        $cabinet->nom_cabinet = $this->nom_cabinet;
        $cabinet->description = $this->description;
        $cabinet->type_cabinet = $this->type_cabinet;
        $cabinet->region_id = $this->region_id;
        $cabinet->division_id = $this->division_id;
        $cabinet->sub_division_id = $this->sub_division_id;
        $cabinet->save();

        // Show success message, reset fields, and close the modal
        $this->clearFields();
        $this->refresh(__('Notary Office successfully Created!'), 'CreatecabinetModal');

    }

    public function update()
    {
        // Validate the input fields
        $this->validate([
            'nom_cabinet' => 'required',
            'description' => 'nullable',
            'type_cabinet' => 'required',
            'region_id' => 'required',
            'division_id' => 'required',
            'sub_division_id' => 'required',
        ]);
        DB::transaction(function () {
            $this->cabinet->update([
                'nom_cabinet' => $this->nom_cabinet,
                'description' => $this->description,
                'type_cabinet' => $this->type_cabinet,
                'region_id' => $this->region_id,
                'division_id' => $this->division_id,
                'sub_division_id' => $this->sub_division_id,
            ]);
        });

        $this->clearFields();
        $this->refresh(__('Notary Office successfully Created!'), 'UpdateCabinetModal');

    }

    public function initData($id)
    {
        $cabinet = Cabinet::findOrFail($id);
        $this->cabinet = $cabinet;
        $this->cabinetId = $id;
        $this->nom_cabinet = $cabinet->nom_cabinet;
        $this->description = $cabinet->description;
        $this->type_cabinet = $cabinet->type_cabinet;
        $this->region_id = $cabinet->region_id;
        $this->division_id = $cabinet->division_id;
        $this->sub_division_id = $cabinet->sub_division_id;
    }

    public function delete()
    {
        if ($this->cabinet) {
            $this->cabinet->delete();
            $this->refresh(__('Notary Office successfully deleted!'), 'DeleteModal');
        }
    }

    public function clearFields()
    {
        $this->nom_cabinet = '';
        $this->description = '';
        $this->region_id = '';
        $this->type_cabinet = '';
        $this->division_id = '';
        $this->sub_division_id = '';
    }

    public function render()
    {
        $cabinets = Cabinet::search($this->query)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $cabinets_count = Cabinet::count();

        return view('livewire..portal.membres-du-cabinet.cabinet.index', ['cabinets'=>$cabinets, 'cabinets_count'=>$cabinets_count]);
    }
}
