<?php

namespace App\Http\Livewire\Portal\Roles;

use App\Http\Livewire\Traits\WithDataTables;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

class Index extends Component
{
    use WithDataTables;

    public $listeners = [
        'roleCreated'
    ];

    public function roleCreated()
    {
        $this->refresh(__('Role and associated Permissions created succeffuly!'), 'CreateRoleModal');
    }

    //Get & assign selected advance_salary props
    public function initData($role_id)
    {
        $role = Role::findOrFail($role_id);

        $this->role = $role;
    }


    public function delete()
    {
        if (!Gate::allows('role.delete')) {
            return abort(401);
        }

        if (!empty($this->role)) {

            if(count($this->role->users) <= 0) {
                $this->role->syncPermissions([]);
                $this->role->delete();
                $this->refreshModal(__('Role and Permissions successfully deleted!'), 'DeleteModal');
            }else{
                $this->refreshModal(__('Role cannot be deleted as it is still assigned to users!'), '');
            }
        }


    }

    public function refreshModal($message, $modal)
    {
        //Close the active modal
        $this->emit('cancel', $modal);
        session()->flash('message', $message);
    }

    public function render()
    {
        if (!Gate::allows('role.view')) {
            return abort(401);
        }

        $roles = Role::with(['permissions'])->withCount('users')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $roles_count = Role::count();
        
        return view('livewire.portal.roles.index',[
            'roles'=>$roles,
            'roles_count' => $roles_count,
        ])->layout('components.layouts.dashboard');
    }
}
