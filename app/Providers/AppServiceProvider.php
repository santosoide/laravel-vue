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
}
