<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserService;

class UserProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(UserService::class, function ($app) {
            $users = [
                [
                    'id'=> 1,
                   'name' => 'Marky Lim',
                   'gender' => 'Male' 
                ],
                [
                    'id'=> 2,
                    'name' => 'Janet Kim', 
                    'gender' => 'Female'
                ]
            ];

            return new UserService($users);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
