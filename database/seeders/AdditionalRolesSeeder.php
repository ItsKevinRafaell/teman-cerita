<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdditionalRolesSeeder extends Seeder
{
    public function run()
    {
        // Pastikan semua role dan permission sudah ada
        $writer = Role::firstOrCreate(['name' => 'writer']);
        $user = Role::firstOrCreate(['name' => 'user']);

        // Izin untuk role "writer"
        $writerPermissions = [
            'view_article', 'view_any_article', 'create_article', 'update_article',
            'view_question::assessment', 'view_any_question::assessment',
        ];

        // Izin untuk role "user"
        $userPermissions = [
            'view_article', 'view_any_article',
        ];

        // Menetapkan izin ke role "writer"
        foreach ($writerPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
            $writer->givePermissionTo($permission);
        }

        // Menetapkan izin ke role "user"
        foreach ($userPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
            $user->givePermissionTo($permission);
        }
    }
}
