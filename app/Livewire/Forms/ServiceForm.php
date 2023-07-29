<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Service;
use Livewire\Attributes\Rule;

class ServiceForm extends Form
{

    #[Rule('required')]
    public $service_name_fr;

    #[Rule('required')]
    public $service_name_en;

    #[Rule('required')]
    public $code;

    #[Rule('required|boolean')]
    public $status;

    public function save()
    {
        if (!Gate::allows('service.create')) {
            return abort(401);
        }

        Service::create($this->all());

        $this->clearFields();
    }

    public function delete(Service $service)
    {
        if (!Gate::allows('service.delete')) {
            return abort(401);
        }

        $service->delete();
    }

    
    public function clearFields()
    {
        $this->reset(['service_name_fr', 'service_name_en', 'code', 'status']); 
    }

}
