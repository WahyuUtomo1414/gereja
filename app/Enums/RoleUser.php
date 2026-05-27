<?php

namespace App\Enums;

enum RoleUser: string
{
    case SUPER_ADMIN = 'super_admin';
    case KETUA_PELAKSANA = 'ketua pelaksana';
    case SEKERTARIS = 'sekertaris';
    case JAMAAT = 'jamaat';

    /**
     * @return array<int, string>
     */
    public static function values(): array
    {
        return array_map(
            static fn (self $role): string => $role->value,
            self::cases(),
        );
    }
}
