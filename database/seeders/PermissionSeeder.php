<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // PDS Entry Permissions
        Permission::firstOrCreate(['name' => 'create pds']);
        Permission::firstOrCreate(['name' => 'edit own pds']);
        Permission::firstOrCreate(['name' => 'edit any pds']);
        Permission::firstOrCreate(['name' => 'view own pds']);
        Permission::firstOrCreate(['name' => 'view any pds']);
        Permission::firstOrCreate(['name' => 'delete own pds']);
        Permission::firstOrCreate(['name' => 'delete any pds']);
        Permission::firstOrCreate(['name' => 'approve pds']);
        Permission::firstOrCreate(['name' => 'return pds for revision']);
        Permission::firstOrCreate(['name' => 'print pds']);
        Permission::firstOrCreate(['name' => 'download pds']);

        // User Management
        Permission::firstOrCreate(['name' => 'manage signups']);
        Permission::firstOrCreate(['name' => 'create user']);
        Permission::firstOrCreate(['name' => 'edit own user profile']);
        Permission::firstOrCreate(['name' => 'edit any user profile']);
        Permission::firstOrCreate(['name' => 'delete user']);
        Permission::firstOrCreate(['name' => 'deactivate user']);

        // Reports and Analytics
        Permission::firstOrCreate(['name' => 'generate personnel inventory report']);
        Permission::firstOrCreate(['name' => 'generate comparative report']);

        // System Management (for Admins)
        Permission::firstOrCreate(['name' => 'assign roles']);
        Permission::firstOrCreate(['name' => 'assign permissions']);
    }
}
