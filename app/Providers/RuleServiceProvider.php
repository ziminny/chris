<?php

namespace App\Providers;

use App\Helpers\FisrtAccess;
use App\Helpers\UserRole;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class RuleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define("is-admin" , function(User $user) {
            return UserRole::userContainRole($user)->permission === "Administrador";
        });


    }
}
