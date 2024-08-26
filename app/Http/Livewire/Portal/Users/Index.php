<?php

namespace App\Http\Livewire\Portal\Users;

use App\Models\User;
use App\Models\Service;
use Livewire\Component;
use Ramsey\Uuid\Type\Integer;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{
    use WithDataTables;

    public $services;
    public $service_id;

    public $first_name;
    public $last_name;
    public $sexe;
    public $email;
    public $is_active;
    public $id_card_number;
    public $date_of_birth;
    public $place_of_birth;
    public $primary_phone_number;
    public $secondary_phone_number;
    public $address;
    public $password, $password_confirmation;
    public $user;
    public $role_name;

    public $roles;
    public $role_id;
    public $selectedStatus, $selectedSexe;

    public ?string $query=null;

    // public $total_users, $total_active_users, $total_inactive_users;


    //Update & Store Rules
    protected array $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'sexe' => 'required',
        'is_active' => 'sometimes',
        'service_id' => 'sometimes',
        'id_card_number' => 'required',
        'date_of_birth' => 'required|date',
        'place_of_birth' => 'required',
        'primary_phone_number' => 'required',
        'secondary_phone_number' => 'sometimes',
        'address' => 'sometimes',
        'password' => 'required|confirmed',
    ];

    public function mount()
    {
        $this->roles = Role::whereNotIn('name', ['super_admin'])->get();
        $this->services = Service::active()->select('id', 'service_name_en', 'service_name_fr')->get();
    }


    public function store()
    {
        if (!Gate::allows('user.create')) {
            return abort(401);
        }

        $this->validate();

        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'sexe' => $this->sexe,
            'email' => $this->email,
            'service_id' => $this->service_id,
            'id_card_number' => $this->id_card_number,
            'date_of_birth' => $this->date_of_birth,
            'place_of_birth' => $this->place_of_birth,
            'primary_phone_number' => $this->primary_phone_number,
            'secondary_phone_number' => $this->secondary_phone_number,
            'address' => $this->address,
            'is_active' => $this->is_active === true ?  1 : 0,
            'password' => bcrypt($this->password),
        ]);

        $user->assignRole($this->role_name);

        $this->refresh(__('Utilisateur créé avec succès!'), 'CreateUserModal');
    }

    public function update()
    {
        if (!Gate::allows('user.update')) {
            return abort(401);
        }
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id)],
            'is_active' => 'sometimes',
            'service_id' => 'sometimes',
            'id_card_number' => 'required',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required',
            'primary_phone_number' => 'required',
            'secondary_phone_number' => 'sometimes',
            'address' => 'sometimes',
        ]);

        $this->user->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'sexe' => $this->sexe,
            'email' => $this->email,
            'service_id' => $this->service_id,
            'id_card_number' => $this->id_card_number,
            'date_of_birth' => $this->date_of_birth,
            'place_of_birth' => $this->place_of_birth,
            'primary_phone_number' => $this->primary_phone_number,
            'secondary_phone_number' => $this->secondary_phone_number,
            'address' => $this->address,
            'is_active' => $this->is_active === true ?  1 : 0,
            'password' => empty($this->password) ? $this->user->password : bcrypt($this->password),
        ]);

        // dd($this->is_active);

        if ($this->user->getRoleNames()->first() != $this->role_name) {
            $this->user->syncRoles($this->role_name);
        }

        $this->refresh(__('Mise à jour de l\'utilisateur réussie!'), 'EditUserModal');
    }

    public function initData($id)
    {
        $user = User::findOrFail($id);

        // $service = Service::findOrFail($user->service_id);
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->sexe = $user->sexe;
        $this->email = $user->email;
        $this->service_id = $user->service_id;
        $this->is_active = $user->is_active === false ? 0 : 1;
        $this->id_card_number = $user->id_card_number;
        $this->date_of_birth = $user->date_of_birth;
        $this->place_of_birth = $user->place_of_birth;
        $this->primary_phone_number = $user->primary_phone_number;
        $this->secondary_phone_number = $user->secondary_phone_number;
        $this->address = $user->address;
        $this->role_name = $user->getRoleNames()->first();

        $this->user = $user;
    }

    public function delete()
    {
        if (!Gate::allows('user.delete') || !Gate::allows('user.update')) {
            return abort(401);
        }

        if (!empty($this->user)) {

            $this->user->delete();
        }

        $this->user = new User();

        $this->state = 0;

        $this->refresh(__('Utilisateur supprimé avec succès!'), 'DeleteModal');
    }

    public function render()
    {
        if (!Gate::allows('user.view')) {
            return abort(401);
        }

        $users = User::search($this->query)->with('roles')
        ->when($this->selectedStatus, function ($query, $selectedStatus) {
            return $query->where('is_active', $selectedStatus);
        })
        ->when($this->selectedSexe, function ($query, $selectedSexe) {
            return $query->where('sexe', $selectedSexe);
        })
        ->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $total_users = User::with(['roles' => function ($role) {
            return $role->whereNotIn('name', ['super_admin'])->get();
        }])->count();

        $total_active_users = User::with(['roles' => function ($role) {
            return $role->whereNotIn('name', ['super_admin'])->get();
        }])->active()->count();
        
        $total_inactive_users = User::with(['roles' => function ($role) {
            return $role->whereNotIn('name', ['super_admin'])->get();
        }])->inactive()->count();


        return view(
            'livewire.portal.users.index',
            [
                'users' => $users,
                'total_users' => $total_users,
                'total_active_users' => $total_active_users,
                'total_inactive_users' => $total_inactive_users,
            ]
        )->layout('components.layouts.dashboard');
    }
}
