<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Sambutan;
use Illuminate\Auth\Access\HandlesAuthorization;

class SambutanPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Sambutan');
    }

    public function view(AuthUser $authUser, Sambutan $sambutan): bool
    {
        return $authUser->can('View:Sambutan');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Sambutan');
    }

    public function update(AuthUser $authUser, Sambutan $sambutan): bool
    {
        return $authUser->can('Update:Sambutan');
    }

    public function delete(AuthUser $authUser, Sambutan $sambutan): bool
    {
        return $authUser->can('Delete:Sambutan');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Sambutan');
    }

    public function restore(AuthUser $authUser, Sambutan $sambutan): bool
    {
        return $authUser->can('Restore:Sambutan');
    }

    public function forceDelete(AuthUser $authUser, Sambutan $sambutan): bool
    {
        return $authUser->can('ForceDelete:Sambutan');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Sambutan');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Sambutan');
    }

    public function replicate(AuthUser $authUser, Sambutan $sambutan): bool
    {
        return $authUser->can('Replicate:Sambutan');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Sambutan');
    }

}