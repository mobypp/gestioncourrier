<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsertPolicy
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
        if ($user->isAdmin())
            return true;
        return false;
    }
    public function create(User $user)
    {
        if ($user->isAdmin()){
            return true;
        }else{
            return false;
        }

    }
}
