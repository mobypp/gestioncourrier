<?php

namespace App\Policies;

use App\Models\Courrier;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Carbon;

class CourrierPolicy
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
    /**
	 * Determine whether the user can view the courrier.
	 *
	 * @param  \App\User $user
	 * @return mixed
	 */
    public function view(User $user)
    {

        if ($user->isAdmin() || $user->isUF() || $user->isCD() || $user->isCS() || $user->isBO())
            return true;

        return false;
    }

    /**
     * Determine whether the user can create courrier.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->isUF())
            return true;

        return false;
    }

	/**
	 * Determine whether the user can update the courrier.
	 *
	 * @param  \App\User $user
	 * @return mixed
	 */
    public function update(User $user)
    {
        if ($user->isUF())
            return true;

        return false;
    }

	/**
	 * Determine whether the user can delete the courrier.
	 *
	 * @param  \App\User $user
	 * @return mixed
	 */

    public function delete(User $user)
    {
        if ($user->isUF())
            return true;

        return false;
    }

    public function accept(User $user, Courrier $courrier)
    {
		if($user->isUF() && $courrier->due_date > Carbon::now())
			return true;

		return false;
    }
}
