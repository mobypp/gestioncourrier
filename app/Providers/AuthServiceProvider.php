<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Role' => 'App\Policies\RoletPolicy',
        'App\Models\User' => 'App\Policies\UsertPolicy',
    ];
  

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('Access-admin', function ($user)
	    {
		    if($user->isAdmin()) {
			    return true;
		    }
			    return false;

	    });

	    Gate::define('Access-service', function ($user)
	    {
		    if($user->isCS() || $user->isAdmin()) {
			    return true;
		    }
			    return false;

	    });
	    Gate::define('Access-employee', function ($user)
	    {
		    if($user->isUF()) {
			    return true;
		    }
			    return false;

	    });

    }
}
