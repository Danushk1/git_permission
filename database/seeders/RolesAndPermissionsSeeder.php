<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view']);
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
       
        // create roles and assign created permissions

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('view');
        $admin->givePermissionTo('create');
        $admin->givePermissionTo('delete');
        $admin->givePermissionTo('edit');
        

        $user = Role::create(['name' => 'user']);
        $user->givePermissionTo('view post');

        $subadmin = Role::create(['name' => 'subadmin']);
        $subadmin->givePermissionTo('view');
        $subadmin->givePermissionTo('create');
        $subadmin->givePermissionTo('delete');
        //
        $admin = User::where('name', 'admin')->first();
        $user = User::where('name', 'user')->first();
        $super_admin = User::where('name', 'subadmin')->first();

        $admin->assignRole('admin');
        $user->assignRole('user');
        $super_admin->assignRole('subadmin');
    }
}
