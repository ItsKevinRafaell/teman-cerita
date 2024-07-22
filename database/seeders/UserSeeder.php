<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);
        
        $user1 = User::create([
            'name' => 'Admin Kevin',
            'email' => 'admin@localhost',
            'password' => bcrypt('password'),
        ]);

        $user1->assignRole($role1);

        $user2 = User::create([
            'name' => 'User Erick',
            'email' => 'user@localhost',
            'password' => bcrypt('password'),
        ]);
        $user2->assignRole($role2);
     
    }
}
