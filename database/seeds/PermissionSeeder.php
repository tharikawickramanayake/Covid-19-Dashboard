<?php

use App\Photo;
use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        
        Permission::create(['name' => 'user_management_create']);
        Permission::create(['name' => 'user_management_view']);
        Permission::create(['name' => 'user_management_update']);
        Permission::create(['name' => 'user_management_delete']);

        Permission::create(['name' => 'customer_management_create']);
        Permission::create(['name' => 'customer_management_view']);
        Permission::create(['name' => 'customer_management_update']);
        Permission::create(['name' => 'customer_management_delete']);

        Permission::create(['name' => 'guarantor_management_create']);
        Permission::create(['name' => 'guarantor_management_view']);
        Permission::create(['name' => 'guarantor_management_update']);
        Permission::create(['name' => 'guarantor_management_delete']);

        Permission::create(['name' => 'route_management_create']);
        Permission::create(['name' => 'route_management_view']);
        Permission::create(['name' => 'route_management_update']);
        Permission::create(['name' => 'route_management_delete']);

        Permission::create(['name' => 'loan_management_create']);
        Permission::create(['name' => 'loan_management_view']);
        Permission::create(['name' => 'loan_management_update']);
        Permission::create(['name' => 'loan_management_delete']);

        Permission::create(['name' => 'payment_management_create']);
        Permission::create(['name' => 'payment_management_view']);
        Permission::create(['name' => 'payment_management_update']);
        Permission::create(['name' => 'payment_management_delete']);
        
        Permission::create(['name' => 'payroll_management_create']);
        Permission::create(['name' => 'payroll_management_view']);
        Permission::create(['name' => 'payroll_management_update']);
        Permission::create(['name' => 'payroll_management_delete']);

        Permission::create(['name' => 'expense_management_create']);
        Permission::create(['name' => 'expense_management_view']);
        Permission::create(['name' => 'expense_management_update']);
        Permission::create(['name' => 'expense_management_delete']);

        
        Permission::create(['name' => 'income_management_create']);
        Permission::create(['name' => 'income_management_view']);
        Permission::create(['name' => 'income_management_update']);
        Permission::create(['name' => 'income_management_delete']);

        Permission::create(['name' => 'investment_management_create']);
        Permission::create(['name' => 'investment_management_view']);
        Permission::create(['name' => 'investment_management_update']);
        Permission::create(['name' => 'investment_management_delete']);

        Permission::create(['name' => 'report_management_create']);
        Permission::create(['name' => 'report_management_view']);
        Permission::create(['name' => 'report_management_update']);
        Permission::create(['name' => 'report_management_delete']);

        //Create Super Admin Account & Super Admin Role

        Photo::create([
            'user_id' => '1'
        ]);

        $supermin_role = Role::create(['name' => 'Super Admin']);

        $supermin = User::create([
            'username' => 'admin',
            'email' => 'admin@email.com',
            'password' => 'password',
        ]);
        $supermin->syncRoles($supermin_role);

    }
}
