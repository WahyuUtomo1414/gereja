<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class KegiatanPolicy
{
    use HandlesAuthorization;

    public function before(User $user, string $ability): ?bool
    {
        if ($user->isSuperAdmin()) {
            return true;
        }

        return null;
    }

    public function viewAny(User $user): bool
    {
        return $user->isKetuaPelaksana() || $user->isSekertaris();
    }

    public function view(User $user, Kegiatan $kegiatan): bool
    {
        if ($user->isSekertaris()) {
            return true;
        }

        return $user->isKetuaPelaksana() && $kegiatan->isOwnedBy($user);
    }

    public function create(User $user): bool
    {
        return $user->isKetuaPelaksana();
    }

    public function update(User $user, Kegiatan $kegiatan): bool
    {
        if ($user->isSekertaris()) {
            return true;
        }

        return $user->isKetuaPelaksana() && $kegiatan->isOwnedBy($user);
    }

    public function delete(User $user, Kegiatan $kegiatan): bool
    {
        return $user->isKetuaPelaksana()
            && $kegiatan->isOwnedBy($user)
            && $kegiatan->canBeEditedByKetua();
    }

    public function deleteAny(User $user): bool
    {
        return false;
    }

    public function restore(User $user, Kegiatan $kegiatan): bool
    {
        return false;
    }

    public function forceDelete(User $user, Kegiatan $kegiatan): bool
    {
        return false;
    }

    public function forceDeleteAny(User $user): bool
    {
        return false;
    }

    public function restoreAny(User $user): bool
    {
        return false;
    }

    public function replicate(User $user, Kegiatan $kegiatan): bool
    {
        return false;
    }

    public function reorder(User $user): bool
    {
        return false;
    }
}
