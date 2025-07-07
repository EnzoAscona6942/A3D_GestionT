<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine if the user is an admin.
     */
    public function admin(User $user): bool
    {
        return $user->rol === 'admin';
    }
}
