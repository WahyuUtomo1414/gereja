<?php

namespace Database\Seeders;

use App\Enums\RoleUser;
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

        $roles = RoleUser::values();

        foreach ($roles as $roleName) {
            Role::query()->updateOrCreate(
                [
                    'name' => $roleName,
                    'guard_name' => $guardName,
                ]
            );
        }

        $assignments = [
            'admin@gereja.test' => RoleUser::SUPER_ADMIN->value,
            'ketua.panitia@gereja.test' => RoleUser::KETUA_PELAKSANA->value,
            'sekertaris@gereja.test' => RoleUser::SEKERTARIS->value,
            'jamaat@gereja.test' => RoleUser::JAMAAT->value,
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
