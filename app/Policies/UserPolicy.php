<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    
    public function modifyRole(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Create a new policy instance.
     */
    // public function __construct()
    // {
    //     //
    // }
}
