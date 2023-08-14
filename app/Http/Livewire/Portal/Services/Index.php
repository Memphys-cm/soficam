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
    public $service_name_fr;
    public $service_name_en;
    public $code;
    public $status;


    //Update & Store Rules
    protected array $rules = [
        'service_name_fr' => 'required',
        'service_name_en' => 'required',
        'code' => 'required',
        'status' => 'sometimes'
    ];


    public function store()
    {
        if (!Gate::allows('service.create')) {
            return abort(401);
        }

        $this->validate();

        Service::create([
            'service_name_fr' => $this->service_name_fr,
            'service_name_en' => $this->service_name_en,
            'code' => $this->code,
            'status' => $this->status,
        ]);

        $this->clearFields();

        $this->refresh(__('Service successfully :state!', ['state' => $this->state ? 'Updated' : 'Created']), 'CreateUpdateServiceModal');
    }

    public function initData($id)
    {
        $this->service = Service::findOrFail($id);

        $this->service_name_fr = $this->service->service_name_fr;
        $this->service_name_en = $this->service->service_name_en;
        $this->code = $this->service->code;
        $this->status = $this->service->status;

        $this->state = 0;
    }

    public function update()
    {
        if (!Gate::allows('service.update')) {
            return abort(401);
        }
        $this->validate();


        $this->service->update([
            'service_name_fr' => $this->service_name_fr,
            'service_name_en' => $this->service_name_en,
            'code' => $this->code,
            'status' => $this->status,
        ]);

        $this->state = 1;

        $this->clearFields();

        $this->refresh(__('Service successfully :state!', ['state' => $this->state ? 'Updated' : 'Created']), 'CreateUpdateServiceModal');
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


    public function clearFields()
    {
        $this->reset(
            [
                'service_name_fr',
                'service_name_en',
                'code',
                'status',
            ]
        );
    }

    public function render()
    {
        if (!Gate::allows('service.view')) {
            return abort(401);
        }

        $services = Service::withCount('users')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $services_count = Service::count();

        return view('livewire.portal.services.index', ['services' => $services, 'services_count' => $services_count])->layout('components.layouts.dashboard');
    }
}