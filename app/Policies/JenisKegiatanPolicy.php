<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\JenisKegiatan;
use Illuminate\Auth\Access\HandlesAuthorization;

class JenisKegiatanPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:JenisKegiatan');
    }

    public function view(AuthUser $authUser, JenisKegiatan $jenisKegiatan): bool
    {
        return $authUser->can('View:JenisKegiatan');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:JenisKegiatan');
    }

    public function update(AuthUser $authUser, JenisKegiatan $jenisKegiatan): bool
    {
        return $authUser->can('Update:JenisKegiatan');
    }

    public function delete(AuthUser $authUser, JenisKegiatan $jenisKegiatan): bool
    {
        return $authUser->can('Delete:JenisKegiatan');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:JenisKegiatan');
    }

    public function restore(AuthUser $authUser, JenisKegiatan $jenisKegiatan): bool
    {
        return $authUser->can('Restore:JenisKegiatan');
    }

    public function forceDelete(AuthUser $authUser, JenisKegiatan $jenisKegiatan): bool
    {
        return $authUser->can('ForceDelete:JenisKegiatan');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:JenisKegiatan');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:JenisKegiatan');
    }

    public function replicate(AuthUser $authUser, JenisKegiatan $jenisKegiatan): bool
    {
        return $authUser->can('Replicate:JenisKegiatan');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:JenisKegiatan');
    }

}