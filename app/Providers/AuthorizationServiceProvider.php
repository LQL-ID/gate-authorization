<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthorizationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        collect(['admin', 'manager', 'user'])->each(function ($role) {
            Gate::define($role, function (User $user) use ($role) {
                return $user->roles == $role;
            });
        });
    }
}
