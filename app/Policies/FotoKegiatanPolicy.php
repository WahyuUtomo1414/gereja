<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\FotoKegiatan;
use Illuminate\Auth\Access\HandlesAuthorization;

class FotoKegiatanPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:FotoKegiatan');
    }

    public function view(AuthUser $authUser, FotoKegiatan $fotoKegiatan): bool
    {
        return $authUser->can('View:FotoKegiatan');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:FotoKegiatan');
    }

    public function update(AuthUser $authUser, FotoKegiatan $fotoKegiatan): bool
    {
        return $authUser->can('Update:FotoKegiatan');
    }

    public function delete(AuthUser $authUser, FotoKegiatan $fotoKegiatan): bool
    {
        return $authUser->can('Delete:FotoKegiatan');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:FotoKegiatan');
    }

    public function restore(AuthUser $authUser, FotoKegiatan $fotoKegiatan): bool
    {
        return $authUser->can('Restore:FotoKegiatan');
    }

    public function forceDelete(AuthUser $authUser, FotoKegiatan $fotoKegiatan): bool
    {
        return $authUser->can('ForceDelete:FotoKegiatan');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:FotoKegiatan');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:FotoKegiatan');
    }

    public function replicate(AuthUser $authUser, FotoKegiatan $fotoKegiatan): bool
    {
        return $authUser->can('Replicate:FotoKegiatan');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:FotoKegiatan');
    }

}