<?php

namespace App\Providers;

use App\Helpers\FisrtAccess;
use App\Helpers\UserPermission\Admin;
use App\Helpers\UserPermission\ContextPermission;
use App\Helpers\UserPermission\Inactive;
use App\Helpers\UserPermission\Permission;
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

                $this->app
                ->when(Admin::class)
                ->needs('$namePermission')
                ->give("is-admin-gate");
  
                $this->app
                    ->when(Inactive::class)
                    ->needs('$namePermission')
                    ->give("inactive-gate");
       
                $this->app->bind(ContextPermission::class , function($app) {
                        return (new ContextPermission)
                                ->define($app->make(Admin::class))
                                ->define($app->make(Inactive::class));
               });
         

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Gate::define("is-admin-gate" , function(User $user) {
        //     return UserRole::userContainRole($user)->permission === "Administrador";
        // });

        // Gate::define("inactive-gate",function(User $user) {
        //     return UserRole::userContainRole($user)->permission !== "Inativo";
        // });
  
       $this->app->make(ContextPermission::class);
   


    }
}
