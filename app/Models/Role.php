<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @package App\Models
 */
class Role extends Model
{
    const ROLE_ADMIN = 'role_admin';
    const ROLE_MODERATOR = 'role_moderator';
    const ROLE_CUSTOMER = 'role_customer';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
