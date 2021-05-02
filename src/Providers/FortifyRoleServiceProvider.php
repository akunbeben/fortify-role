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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMiddleware();
    }

    /**
     * Register the route middleware.
     *
     * @return void
     */
    protected function registerMiddleware()
    {
        $router = $this->app->make(Router::class);
        
        $router->aliasMiddleware(
            'role', 
            CheckRoles::class
        );
    }
}
