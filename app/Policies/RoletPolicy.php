<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoletPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function view(User $user)
    {
        return  $user->isAdmin();

    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->isAdmin())
            return true;
        return false;
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\User $user
     * @param  \App\Role $role
     * @return mixed
     */
    public function update(User $user)
    {
        if ($user->isAdmin())
            return true;
        return false;
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\User $user
     * @param  \App\Role $role
     * @return mixed
     */
    public function delete(User $user)
    {
        if ($user->isAdmin())
            return true;
        return false;
    }
}
