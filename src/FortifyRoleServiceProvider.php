<?php

namespace Akunbeben\FortifyRole;

use App\Http\Middleware\CheckRoles;
use Illuminate\Routing\Router;
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
        $router = $this->app->make(Router::class);
        
        $router->aliasMiddleware(
            'role', 
            CheckRoles::class
        );

        $this->app->singleton(
            \Laravel\Fortify\Contracts\LoginResponse::class,
            \App\Http\Responses\LoginResponse::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePublishing();
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
                __DIR__.'/Models/Role.php' => app_path('Models/Role.php'),
            ], 'fortify-role-support');

            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations'),
                __DIR__.'/../database/seeders' => database_path('seeders'),
            ], 'fortify-role-migrations');
        }
    }
}