<?php

namespace App\Providers;

use App\Models\Admin\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('admin', function($user){
            return $user->role == User::ADMIN  && $user->isPublished();
        });

        $gate->define('manager', function($user){
            return $user->role > User::USER && $user->isPublished();
        });

        $gate->define('special_manager', function($user){
            return $user->role == User::SPECIAL_MANAGER && $user->isPublished();
        });
    }
}
