<?php

namespace Database\Seeders;

use App\Models\QuestionAssessments;
use App\Models\QuestionnaireType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);

        // Create admin user
        $user = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('admin1234'),
                'email_verified_at' => now(),
            ]
        );

        // Assign super_admin role to the user
        $user->assignRole($superAdminRole);
    }
}
