<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Seed roles and assign them to the core users.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $guardName = 'web';

        $roles = [
            'super_admin',
            'ketua pelaksana',
            'sekertaris',
            'jamaat',
        ];

        foreach ($roles as $roleName) {
            Role::query()->updateOrCreate(
                [
                    'name' => $roleName,
                    'guard_name' => $guardName,
                ]
            );
        }

        $assignments = [
            'admin@gmail.com' => 'super_admin',
            'ketua.panitia@gereja.test' => 'ketua pelaksana',
            'sekertaris@gereja.test' => 'sekertaris',
            'jamaat@gereja.test' => 'jamaat',
        ];

        foreach ($assignments as $email => $roleName) {
            $user = User::query()->where('email', $email)->first();

            if (! $user) {
                continue;
            }

            $user->syncRoles([$roleName]);
        }
    }
}
