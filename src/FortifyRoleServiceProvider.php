<?php

namespace Akunbeben\FortifyRole;

use Illuminate\Support\ServiceProvider;

class FortifyRoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Configure the publishable resources offered by the package.
     *
     * @return void
     */
    protected function configurePublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/Http/Middleware/CheckRoles.php' => app_path('Http/Middleware/CheckRoles.php'),
                __DIR__.'/Http/Middleware/RedirectIfAuthenticated.php' => app_path('Http/Middleware/RedirectIfAuthenticated.php'),
                __DIR__.'/Http/Responses/LoginResponse.php' => app_path('Http/Responses/LoginResponse.php'),
                __DIR__.'/Providers/FortifyRoleServiceProvider.php' => app_path('Providers/FortifyRoleServiceProvider.php'),
                __DIR__.'/Models/Role.php' => app_path('Models/Role.php'),
            ], 'fortify-role-support');

            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'fortify-role-migrations');
        }
    }
}