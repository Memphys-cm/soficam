<?php

namespace App\Livewire\Portal\Roles\Partial;


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

    public function userAndServicePermissionClearFields()
    {
        $this->reset([
            'selectedUserPermissions',
            'selectAllServicePermissions',
            'selectedServicePermissions',
            'selectAllUserPermissions'
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
}
