<?php

namespace App\Http\Livewire\Portal\Services;

use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{
    use WithDataTables;
    
    public Service $service;
    public $state = 0;


    //Update & Store Rules
    protected array $rules = [
        'service.service_name_fr' => 'required',
        'service.service_name_en' => 'required',
        'service.code' => 'required',
        'service.status' => 'sometimes'
    ];

    public function mount()
    {
        $this->service = new Service();
    }


    public function store()
    {
        if (!Gate::allows('service.create') || !Gate::allows('service.update')) {
            return abort(401);
        }

        $this->validate();

        $this->service->save();

        $this->state = 0;

        $this->refresh(__('Service successfully :state!', ['state' => $this->state ? 'Updated' : 'Created']), 'CreateUpdateServiceModal');
    }

    public function initData($id)
    {
        $this->service = Service::findOrFail($id);
        $this->state = 1;
    }

    public function delete()
    {
        if (!Gate::allows('service.delete')) {
            return abort(401);
        }

        if (!empty($this->service)) {

            $this->service->delete();
        }

        $this->service = new Service();

        $this->state = 0;

        $this->refresh(__('Service successfully deleted!'), 'DeleteModal');
    }

    public function render()
    {
        if (!Gate::allows('service.view')) {
            return abort(401);
        }

        $services = Service::withCount('users')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $services_count = Service::count();

        return view('livewire.portal.services.index', ['services' => $services,'services_count' => $services_count])->layout('components.layouts.dashboard');
    }
 
}
