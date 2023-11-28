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
        $this->configurePublishing();
        $this->routesPublishing();
        $this->registerCommands();
    }

    private function configurePublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../../config/api-routes.php' => config_path('api-routes.php')], 'laravel-router-configure');
            $this->publishes([__DIR__ . '/../../config/web-routes.php' => config_path('web-routes.php')], 'laravel-router-configure');
        }
    }

    private function routesPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../../routes/api-routes.php' => app_path('routes/api-routes.php')], 'laravel-router-routes');
            $this->publishes([__DIR__ . '/../../routes/web-routes.php' => config_path('routes/web-routes.php')], 'laravel-router-routes');
        }
    }

    private function registerCommands()
    {
        $this->commands([
            PublishCommand::class,
            InstallCommand::class
        ]);
    }
}
