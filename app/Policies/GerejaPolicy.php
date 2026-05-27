<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Gereja;
use Illuminate\Auth\Access\HandlesAuthorization;

class GerejaPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Gereja');
    }

    public function view(AuthUser $authUser, Gereja $gereja): bool
    {
        return $authUser->can('View:Gereja');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Gereja');
    }

    public function update(AuthUser $authUser, Gereja $gereja): bool
    {
        return $authUser->can('Update:Gereja');
    }

    public function delete(AuthUser $authUser, Gereja $gereja): bool
    {
        return $authUser->can('Delete:Gereja');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Gereja');
    }

    public function restore(AuthUser $authUser, Gereja $gereja): bool
    {
        return $authUser->can('Restore:Gereja');
    }

    public function forceDelete(AuthUser $authUser, Gereja $gereja): bool
    {
        return $authUser->can('ForceDelete:Gereja');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Gereja');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Gereja');
    }

    public function replicate(AuthUser $authUser, Gereja $gereja): bool
    {
        return $authUser->can('Replicate:Gereja');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Gereja');
    }

}