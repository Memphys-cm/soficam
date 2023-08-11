<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Modules\Employees\Entities\Employee;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ['name' => 'user.dashboard.view'],

            ['name' => 'user.view'],
            ['name' => 'user.create'],
            ['name' => 'user.update'],
            ['name' => 'user.delete'],

            ['name' => 'user.export_n_print'],
            ['name' => 'user.import'],

            ['name' => 'region.view'],
            ['name' => 'region.create'],
            ['name' => 'region.update'],
            ['name' => 'region.delete'],

            ['name' => 'region.import'],
            ['name' => 'region.export_n_print'],

            ['name' => 'division.view'],
            ['name' => 'division.create'],
            ['name' => 'division.update'],
            ['name' => 'division.delete'],

            ['name' => 'division.import'],
            ['name' => 'division.export_n_print'],

            ['name' => 'sub_division.view'],
            ['name' => 'sub_division.create'],
            ['name' => 'sub_division.update'],
            ['name' => 'sub_division.delete'],

            ['name' => 'sub_division.import'],
            ['name' => 'sub_division.export_n_print'],

            ['name' => 'service.view'],
            ['name' => 'service.create'],
            ['name' => 'service.update'],
            ['name' => 'service.delete'],

            ['name' => 'service.import'],
            ['name' => 'service.export_n_print'],

            ['name' => 'audit_log.view_all'],
            ['name' => 'audit_log.view_own_only'],
            ['name' => 'audit_log.delete'],

            ['name' => 'role.view'],
            ['name' => 'role.create'],
            ['name' => 'role.update'],
            ['name' => 'role.delete'],

            ['name' => 'role.import'],
            ['name' => 'role.export_n_print'],

            ['name' => 'titre_foncier.view'],
            ['name' => 'titre_foncier.view_detail'],
            ['name' => 'titre_foncier.create'],
            ['name' => 'titre_foncier.update'],
            ['name' => 'titre_foncier.delete'],
            
            ['name' => 'titre_foncier.import'],
            ['name' => 'titre_foncier.export_n_print'],
            
            ['name' => 'titre_foncier.operations.view'],

            ['name' => 'profile.view'],
            ['name' => 'profile.update'],
            ['name' => 'profile.delete'],

            ['name' => 'category_activites_and_activite.view'],
            ['name' => 'category_activites_and_activite.create'],
            ['name' => 'category_activites_and_activite.update'],
            ['name' => 'category_activites_and_activite.delete'],
            ['name' => 'category_activites_and_activite.export_n_print'],

            ['name' => 'etat_cession.view'],
            ['name' => 'etat_cession.create'],
            ['name' => 'etat_cession.update'],
            ['name' => 'etat_cession.delete'],
            ['name' => 'etat_cession.export_n_print'],

            ['name' => 'certificate_propriete.view'],
            ['name' => 'certificate_propriete.create'],
            ['name' => 'certificate_propriete.update'],
            ['name' => 'certificate_propriete.delete'],
            ['name' => 'certificate_propriete.export_n_print'],

            ['name' => 'etat_cession.view'],
            ['name' => 'etat_cession.create'],
            ['name' => 'etat_cession.update'],
            ['name' => 'etat_cession.delete'],
            ['name' => 'etat_cession.export_n_print'],

            ['name' => 'lotissement.view'],
            ['name' => 'lotissement.create'],
            ['name' => 'lotissement.update'],
            ['name' => 'lotissement.delete'],
            ['name' => 'lotissement.export_n_print'],
            ['name' => 'lotissement.sale'],
            ['name' => 'lotissement.add_coordinates'],

        ];

        $insert_data = [];
        $time_stamp = Carbon::now()->toDateTimeString();
        foreach ($data as $d) {
            $this->command->info('Creating Permissions');
            Permission::firstOrCreate([
                'name' => $d['name']
            ],[
                'guard_name' => 'web',
                'created_at' => $time_stamp, 
            ]);
        }
        // $this->command->info('Creating Permissions');
        // Permission::firstOrCr($insert_data);

        $this->command->info('Creating Default Roles');

        $this->command->info('Creating Super Admin\'s Role');
        $super_admin_role = Role::firstOrCreate(['name' => 'super_admin']);

        $this->command->info('Creating Admin User\'s Role');
        $admin_user_role = Role::firstOrCreate(['name' => 'admin_user']);

        $this->command->info('Creating Geometre User\'s Role');
        $admin_user_role = Role::firstOrCreate(['name' => 'geometre']);

        $this->command->info('Creating User\'s Role');
        $user_role = Role::firstOrCreate(['name' => 'user']);

        $this->command->info('Syncing Permissions for default Roles');
        $all_permissions = Permission::where('guard_name', 'web')->get();
        $super_admin_role->syncPermissions($all_permissions);

        $this->command->info('Syncing Permissions for default User Role');
        $user_role->syncPermissions([
            'profile.view',
            'profile.update',
            'profile.delete',
        ]);
    }

    /**
     * Truncates all the laratrust tables and the users table
     *
     * @return  void
     */
    public function truncateLaratrustTables()
    {
        $this->command->info('Truncating User, Role and Permission tables');
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
