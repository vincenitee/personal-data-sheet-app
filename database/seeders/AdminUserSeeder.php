<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Finds the admin role in the table
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Fills up the necessary information for the admin user
        $admin = User::firstOrCreate([
            'email' => 'admintest@gmail.com',
        ],
        [
            'first_name' => 'Admin',
            'last_name' => 'Test',
            'birth_date' => '1990-05-15',
            'sex' => 'male',
            'email' => 'admintest@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        // Assign role to the user
        $admin->assignRole($adminRole);

        // SuccessMessage
        $this->command->info('Admin created successfully');
    }
}
