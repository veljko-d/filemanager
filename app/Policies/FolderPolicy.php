<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Folder;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class FolderPolicy
 *
 * @package App\Policies
 */
class FolderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create folders.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {

    }

    /**
     * Determine whether the user can update the folder.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Folder  $folder
     * @return mixed
     */
    public function update(User $user, Folder $folder)
    {
        return $user->id === $folder->user_id;
    }

    /**
     * Determine whether the user can delete the folder.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Folder  $folder
     * @return mixed
     */
    public function delete(User $user, Folder $folder)
    {
        return $user->id === $folder->user_id;
    }

    /**
     * Determine whether the user can restore the folder.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Folder  $folder
     * @return mixed
     */
    public function restore(User $user, Folder $folder)
    {
        return $user->id === $folder->user_id;
    }

    /**
     * Determine whether the user can permanently delete the folder.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Folder  $folder
     * @return mixed
     */
    public function forceDelete(User $user, Folder $folder)
    {
        return $user->id === $folder->user_id;
    }
}
