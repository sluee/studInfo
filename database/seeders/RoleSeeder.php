<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_normal = Role::create(['name' => 'normal']);
        $role_editor = Role::create(['name' => 'editor']);


        $permission_read = Permission::create(['name' => 'read-stud']);
        $permission_edit = Permission::create(['name' => 'edit-stud']);
        $permission_write = Permission::create(['name' => 'write-stud']);
        $permission_delete = Permission::create(['name' => 'delete-stud']);

        $permissions_admin =[
            $permission_read,
            $permission_edit,
            $permission_write,
            $permission_delete
        ];

        $permissions_editor =[
            $permission_read,
            $permission_edit,
        ];

        $role_admin->syncPermissions($permissions_admin);

        $role_normal->givePermissionTo($permission_read);
        $role_editor->givePermissionTo($permissions_editor);
    }
}
