<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerUser();
        $this->registerCustomer();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function registerUser(){
        $this->app->when('App\Http\Controllers\Api\UserController')
            ->needs('App\Domain\Contracts\UserInterface')
            ->give('App\Domain\Repositories\UserRepository');
    }
    public function registerCustomer(){
        $this->app->when('App\Http\Controllers\Api\CustomerController')
            ->needs('App\Domain\Contracts\CustomerInterface')
            ->give('App\Domain\Repositories\CustomerRepository');
    }
}
