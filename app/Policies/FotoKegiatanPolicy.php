<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\FotoKegiatan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FotoKegiatanPolicy
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

    public function view(User $user, FotoKegiatan $fotoKegiatan): bool
    {
        if ($user->isSekertaris()) {
            return true;
        }

        return $user->isKetuaPelaksana()
            && $fotoKegiatan->kegiatan
            && $fotoKegiatan->kegiatan->isOwnedBy($user)
            && $fotoKegiatan->kegiatan->canManageReport();
    }

    public function create(User $user): bool
    {
        return $user->isKetuaPelaksana() || $user->isSekertaris();
    }

    public function update(User $user, FotoKegiatan $fotoKegiatan): bool
    {
        return $this->view($user, $fotoKegiatan);
    }

    public function delete(User $user, FotoKegiatan $fotoKegiatan): bool
    {
        return $this->view($user, $fotoKegiatan);
    }

    public function deleteAny(User $user): bool
    {
        return false;
    }

    public function restore(User $user, FotoKegiatan $fotoKegiatan): bool
    {
        return false;
    }

    public function forceDelete(User $user, FotoKegiatan $fotoKegiatan): bool
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

    public function replicate(User $user, FotoKegiatan $fotoKegiatan): bool
    {
        return false;
    }

    public function reorder(User $user): bool
    {
        return false;
    }
}
