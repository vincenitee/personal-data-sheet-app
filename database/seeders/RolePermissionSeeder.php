<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assign permissions to admin
        $admin = Role::findByName('admin');
        $admin->syncPermissions(Permission::all());

        // Assign permission to employee
        $employee = Role::findByName('employee');
        $employee->givePermissionTo([
            'create pds',
            'edit own pds',
            'view own pds',
            'delete own pds',
            'print pds',
            'download pds',
            'edit own user profile'
        ]);
    }
}
