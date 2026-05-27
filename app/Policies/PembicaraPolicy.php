<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Pembicara;
use Illuminate\Auth\Access\HandlesAuthorization;

class PembicaraPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Pembicara');
    }

    public function view(AuthUser $authUser, Pembicara $pembicara): bool
    {
        return $authUser->can('View:Pembicara');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Pembicara');
    }

    public function update(AuthUser $authUser, Pembicara $pembicara): bool
    {
        return $authUser->can('Update:Pembicara');
    }

    public function delete(AuthUser $authUser, Pembicara $pembicara): bool
    {
        return $authUser->can('Delete:Pembicara');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Pembicara');
    }

    public function restore(AuthUser $authUser, Pembicara $pembicara): bool
    {
        return $authUser->can('Restore:Pembicara');
    }

    public function forceDelete(AuthUser $authUser, Pembicara $pembicara): bool
    {
        return $authUser->can('ForceDelete:Pembicara');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Pembicara');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Pembicara');
    }

    public function replicate(AuthUser $authUser, Pembicara $pembicara): bool
    {
        return $authUser->can('Replicate:Pembicara');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Pembicara');
    }

}