<?php

namespace App\Livewire\Portal\Roles\Partial;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use App\Livewire\Traits\WithDataTables;

class Create extends Component
{

    use WithUserAndServicePermissions, WithLocationPermissions, WithRolePermissions, WithAuditLogPermissions;

    public $name;
    public $role;
    public $makeAdmin = false;
    public $grantGeneralSettingsPermissions = false;
    public $grantReportingPermissions = false;
    public $onlyOwnedSalesPermissions = false;

    public function store()
    {
        if (!Gate::allows('role.create')) {
            return abort(401);
        }

        $this->validate(['name' => 'required|unique:roles']);

        try {
            $role = Role::firstOrCreate(['name' => $this->name]);

            if ($this->makeAdmin) {

                $all_permissions = Permission::where('guard_name', 'web')->get();
                $role->syncPermissions($all_permissions);

            } else {
                $role->syncPermissions([
                    $this->selectedRolePermissions,
                    $this->selectedRegionPermissions,
                    $this->selectedDivisionPermissions,
                    $this->selectedSubDivisionPermissions,
                    $this->selectedUserPermissions,
                    $this->selectedServicePermissions,
                    $this->selectedAuditLogPermissions,
                ]);
            }

            $this->emit('roleCreated');
        } catch (\Throwable $th) {
            $this->refresh(__('Something went wrong!'), 'CreateRoleModal');
        }
    }
   
    public function clearFields()
    {
        $this->userAndServicePermissionClearFields();
        $this->locationPermissionClearFields();
        $this->rolePermissionClearFields();
        $this->auditLogPermissionClearFields();
        $this->reset(['name']);
    }

    public function render()
    {
        return view('livewire.portal.roles.partial.create');
    }
}
