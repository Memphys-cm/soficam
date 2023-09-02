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

            ['name' => 'operation.mutation_totale.view'],
            ['name' => 'operation.mutation_totale.create'],
            ['name' => 'operation.mutation_totale.update'],
            ['name' => 'operation.mutation_totale.delete'],
            ['name' => 'operation.mutation_totale.export_n_print'],
            ['name' => 'operation.mutation_totale.sale'],
            ['name' => 'operation.mutation_totale.par_deces'],

            ['name' => 'operation.add_coordinates'],
            ['name' => 'operation.add_sale'],
            ['name' => 'operation.add_payment'],
            ['name' => 'operation.generate_ba'],

            ['name' => 'operation.morcellement.view'],
            ['name' => 'operation.morcellement.create'],
            ['name' => 'operation.morcellement.update'],
            ['name' => 'operation.morcellement.delete'],
            ['name' => 'operation.morcellement.export_n_print'],
            ['name' => 'operation.morcellement.sale'],
            ['name' => 'operation.morcellement.forcee'],

            ['name' => 'operation.retrait_indivision.view'],
            ['name' => 'operation.retrait_indivision.create'],
            ['name' => 'operation.retrait_indivision.update'],
            ['name' => 'operation.retrait_indivision.delete'],
            ['name' => 'operation.retrait_indivision.export_n_print'],
            ['name' => 'operation.retrait_indivision.sale'],
            ['name' => 'operation.retrait_indivision.forcee'],

            ['name' => 'membre_du_cabinet.view'],
            ['name' => 'membre_du_cabinet.create'],
            ['name' => 'membre_du_cabinet.update'],
            ['name' => 'membre_du_cabinet.delete'],
            ['name' => 'membre_du_cabinet.export_n_print'],

            ['name' => 'cabinet.view'],
            ['name' => 'cabinet.create'],
            ['name' => 'cabinet.update'],
            ['name' => 'cabinet.delete'],
            ['name' => 'cabinet.export_n_print'],

            ['name' => 'immobilier.view'],
            ['name' => 'immobilier.create'],
            ['name' => 'immobilier.update'],
            ['name' => 'immobilier.delete'],
            ['name' => 'immobilier.export_n_print'],

            ['name' => 'charge_titre_foncier.view'],
            ['name' => 'charge_titre_foncier.create'],
            ['name' => 'charge_titre_foncier.update'],
            ['name' => 'charge_titre_foncier.delete'],
            ['name' => 'charge_titre_foncier.export_n_print'],


            ['name' => 'imma_directe.view'],
            ['name' => 'imma_directe.create'],
            ['name' => 'imma_directe.update'],
            ['name' => 'imma_directe.cotation'],
            ['name' => 'imma_directe.ordre_versement'],
            ['name' => 'imma_directe.view_detail'],
            ['name' => 'imma_directe.convocation'],
            ['name' => 'imma_directe.avis'],
            ['name' => 'imma_directe.certificat'],
            ['name' => 'imma_directe.etat_cession'],
            ['name' => 'imma_directe.geometre'],
            ['name' => 'imma_directe.pv_bornage'],
            ['name' => 'imma_directe.descente_terrain'],
            ['name' => 'imma_directe.bordereau_transmission'],
            ['name' => 'imma_directe.dossier_vise'],
            ['name' => 'imma_directe.enregistrer_geometre'],
            ['name' => 'imma_directe.enregistrement_pv_bornage'],
            ['name' => 'imma_directe.mise_en_forme_dos_tech'],
            ['name' => 'imma_directe.mise_en_forme_dos_admin'],
            ['name' => 'imma_directe.creation_dos_tech'],
            ['name' => 'imma_directe.export_n_print'],
            

            ['name' => 'tax_foncier.view'],
            ['name' => 'tax_foncier.update'],     
            
            ['name' => 'sales.view'],
            ['name' => 'sales.pay'],
            ['name' => 'sales.delete'],
            ['name' => 'sales.export_n_print'],

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
