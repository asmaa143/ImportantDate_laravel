<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $models = getModels();
        $cruds = crud();
        $permissions = [];
        foreach ($models as $model) {
            foreach ($cruds as $crud) {
                $permissions[] = $crud . '_' . $model;
            }
        }

        foreach ($permissions as $permission) {
            Permission::create(['guard_name' => 'admin','name' => $permission]);
        }

        $roles = ['admins','manager'];

        foreach ($roles as  $role) {
            Role::create(['guard_name' => 'admin', 'name' => $role]);
        }
    }
}
