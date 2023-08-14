<?php

namespace App\Http\Livewire\Portal\Divisions;

use App\Models\Region;
use Livewire\Component;
use App\Models\Division;
use Illuminate\Support\Facades\Gate;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{
    use WithDataTables;

    public Division $division;
    public $state = 0;
    public $regions;
    public $region_id; 
    public ?string $query=null;

    //Update & Store Rules
    protected array $rules = [
        'division.division_name_fr' => 'required',
        'division.division_name_en' => 'required',
        'division.code' => 'required',
        'division.region_id' => 'required',
        'division.status' => 'sometimes'
    ];

    public function mount()
    {
        $this->regions = Region::select('id','region_name_fr','region_name_en')->get();

        $this->division = new Division();
    }


    public function store()
    {
        if (!Gate::allows('division.create') || !Gate::allows('division.update')) {
            return abort(401);
        }

        $this->validate();

        $this->division->save();

        $this->state = 0;

        $this->refresh(__('Division successfully :state!', ['state' => $this->state ? 'Updated' : 'Created']), 'CreateUpdateDivisionModal');
    }

    public function initData($id)
    {
        $this->division = Division::findOrFail($id);
        $this->state = 1;
    }

    public function delete()
    {
        if (!Gate::allows('division.delete')) {
            return abort(401);
        }

        if (!empty($this->division)) {

            $this->division->delete();
        }

        $this->division = new Division();

        $this->state = 0;

        $this->refresh(__('Division successfully deleted!'), 'DeleteModal');
    }

    public function render()
    {
        if (!Gate::allows('region.view')) {
            return abort(401);
        }


        $divisions = Division::search($this->query)->with('region')->withCount('subDivisions')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $divisions_count = Division::count();

        return view('livewire.portal.divisions.index', [
            'divisions' => $divisions,
            'divisions_count' => $divisions_count,
        ])->layout('components.layouts.dashboard');
    }
   
}
