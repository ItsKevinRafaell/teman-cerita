<?php

namespace Database\Seeders;

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
        User::firstOrCreate(
            ['email' => 'superadmin@temancerita.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('superadmin1234'),
                // 'email_verified_at' => now(),
            ]
        );
    }
}
