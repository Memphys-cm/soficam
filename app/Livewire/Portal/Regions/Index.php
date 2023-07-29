<?php

namespace App\Livewire\Portal\Regions;

use App\Livewire\Traits\WithDataTables;
use App\Models\Region;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

class Index extends Component
{
    use WithDataTables;

    public Region $region;
    public $state = 0 ;

    //Update & Store Rules
    protected array $rules = [
        'region.region_name_fr' => 'required',
        'region.region_name_en' => 'required',
        'region.code' => 'required',
        'region.status' => 'sometimes'
    ];

    public function mount()
    {
        $this->region = new Region();
    }

    public function store()
    {
        if (!Gate::allows('region.create')|| !Gate::allows('region.update')) {
            return abort(401);
        }

        $this->validate();

        $this->region->save();

        $this->state = 0;

        $this->refresh(__('Region successfully :state!',['state'=> $this->state ? 'Updated' : 'Created']), 'CreateUpdateRegionModal');

    }

    public function initData($id) 
    {
        $this->region = Region::findOrFail($id);
        $this->state = 1;

    }

    public function delete()
    {
        if (!Gate::allows('region.delete')) {
            return abort(401);
        }

        if (!empty($this->region)) {

            $this->region->delete();
        }

        $this->region = new Region();

        $this->state = 0;

        $this->refresh(__('Region successfully deleted!'), 'DeleteModal');
    }

    public function render()
    {
        if (!Gate::allows('region.view')) {
            return abort(401);
        }

        $regions = Region::withCount('divisions')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $regions_count = Region::count();

        return view('livewire.portal.regions.index',
        [
            'regions'=> $regions,
            'regions_count'=> $regions_count,
        ]
        )->layout('components.layouts.dashboard');
    }
}
