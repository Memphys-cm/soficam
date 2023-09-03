<?php

namespace App\Http\Livewire\Portal\Roles\Partial;


trait WithUserAndServicePermissions
{
    public $selectedUserPermissions = [];
    public $selectAllUserPermissions = false;
    public $UserPermissions = [
        'View' => 'user.view',
        'Update' => 'user.update',
        'Delete' => 'user.delete',
        'Create' => 'user.create',
        'Import' => 'user.import',
        'Export & Print' => 'user.export_n_print',
    ];

    public $selectedServicePermissions = [];
    public $selectAllServicePermissions = false;
    public $ServicePermissions = [
        'View' => 'service.view',
        'Update' => 'service.update',
        'Delete' => 'service.delete',
        'Create' => 'service.create',
        'Import' => 'service.import',
        'Export & Print' => 'service.export_n_print',
    ];

    public $selectedMembreCabinetPermissions = [];
    public $selectAllMembreCabinetPermissions = false;
    public $MembreCabinetPermissions = [
        'View' => 'membre_du_cabinet.view',
        'Update' => 'membre_du_cabinet.update',
        'Delete' => 'membre_du_cabinet.delete',
        'Create' => 'membre_du_cabinet.create',
        'Export & Print' => 'membre_du_cabinet.export_n_print',
    ];
    public $selectedCabinetPermissions = [];
    public $selectAllCabinetPermissions = false;
    public $CabinetPermissions = [
        'View' => 'cabinet.view',
        'Update' => 'cabinet.update',
        'Delete' => 'cabinet.delete',
        'Create' => 'cabinet.create',
        'Import' => 'cabinet.import',
        'Export & Print' => 'service.export_n_print',
    ];

    public function userAndServicePermissionClearFields()
    {
        $this->reset([
            'selectedUserPermissions',
            'selectAllServicePermissions',
            'selectedServicePermissions',
            'selectAllUserPermissions',
            'selectedMembreCabinetPermissions',
            'selectAllCabinetPermissions',
            'selectedMembreCabinetPermissions',
            'selectAllCabinetPermissions',
        ]);
    }

    public function updatedSelectAllUserPermissions($value)
    {
        if ($value) {
            $this->selectedUserPermissions = [
                'user.create',
                'user.view',
                'user.update',
                'user.delete',
                'user.import',
                'user.export_n_print',
            ];
        } else {
            $this->selectedUserPermissions = [];
        }
    }

    public function updatedSelectAllServicePermissions($value)
    {
        if ($value) {
            $this->selectedServicePermissions = [
                'service.create',
                'service.view',
                'service.update',
                'service.delete',
                'service.import',
                'service.export_n_print',
            ];
        } else {
            $this->selectedServicePermissions = [];
        }
    }
    public function updatedSelectAllMembreCabinetPermissions($value)
    {
        if ($value) {
            $this->selectedMembreCabinetPermissions = [
                'membre_du_cabinet.create',
                'membre_du_cabinet.view',
                'membre_du_cabinet.update',
                'membre_du_cabinet.delete',
                'membre_du_cabinet.import',
                'membre_du_cabinet.export_n_print',
            ];
        } else {
            $this->selectedMembreCabinetPermissions = [];
        }
    }
    public function updatedSelectAllCabinetPermissions($value)
    {
        if ($value) {
            $this->selectedCabinetPermissions = [
                'cabinet.create',
                'cabinet.view',
                'cabinet.update',
                'cabinet.delete',
                'cabinet.import',
                'cabinet.export_n_print',
            ];
        } else {
            $this->selectedCabinetPermissions = [];
        }
    }
}
