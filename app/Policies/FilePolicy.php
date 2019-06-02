<?php

namespace App\Policies;

use App\Models\User;
use App\Models\File;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class FilePolicy
 *
 * @package App\Policies
 */
class FilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create files.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {

    }

    /**
     * Determine whether the user can update the file.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\File  $file
     * @return mixed
     */
    public function update(User $user, File $file)
    {
        return $user->id === $file->user_id;
    }

    /**
     * Determine whether the user can delete the file.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\File  $file
     * @return mixed
     */
    public function delete(User $user, File $file)
    {
        return $user->id === $file->user_id;
    }

    /**
     * Determine whether the user can restore the file.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\File  $file
     * @return mixed
     */
    public function restore(User $user, File $file)
    {
        return $user->id === $file->user_id;
    }

    /**
     * Determine whether the user can permanently delete the file.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\File  $file
     * @return mixed
     */
    public function forceDelete(User $user, File $file)
    {
        return $user->id === $file->user_id;
    }
}
