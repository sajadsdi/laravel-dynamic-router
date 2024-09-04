<?php

namespace Sajadsdi\LaravelDynamicRouter\Providers;

use Illuminate\Support\ServiceProvider;
use Sajadsdi\LaravelDynamicRouter\Console\InstallCommand;
use Sajadsdi\LaravelDynamicRouter\Console\PublishCommand;

class LaravelDynamicRouterServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->configurePublishing();
            $this->routesPublishing();
            $this->registerCommands();
        }
    }

    private function configurePublishing()
    {
        $this->publishes([__DIR__ . '/../../config/routes-api.php' => config_path('routes-api.php')], 'laravel-router-configure-api');
        $this->publishes([__DIR__ . '/../../config/routes-web.php' => config_path('routes-web.php')], 'laravel-router-configure-web');
    }

    private function routesPublishing()
    {
        $this->publishes([__DIR__ . '/../../routes/api-routes.php' => base_path('routes/api-routes.php')], 'laravel-router-routes-api');
        $this->publishes([__DIR__ . '/../../routes/web-routes.php' => base_path('routes/web-routes.php')], 'laravel-router-routes-web');
    }

    private function registerCommands()
    {
        $this->commands([
            PublishCommand::class,
            InstallCommand::class
        ]);
    }
}
