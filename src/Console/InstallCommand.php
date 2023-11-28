<?php

namespace Sajadsdi\LaravelDynamicRouter\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class InstallCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dynamic-router:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Laravel Dynamic Router!';

    /**
     * Execute the console command.
     *
     * @return int|null
     */
    public function handle()
    {
        $this->info('Installing Laravel Dynamic Router ...');
        $this->installRoutes();
        $this->info('Installation completed !');
        return null;
    }

    private function installRoutes()
    {
        $this->comment('Adding web-routes in web route ...');

        //require web-route.php in web.php
        $webRout = file_get_contents(base_path('routes/web.php'));

        if (Str::contains($webRout, "require __DIR__.'/web-routes.php';")) {
            $this->warn("require __DIR__.'/web-routes.php'; is exists in web route ............ SKIPPED");
            return;
        }

        file_put_contents(base_path('routes/web.php'),$webRout . "\n\n require __DIR__.'/web-routes.php';");
        $this->info("require __DIR__.'/web-routes.php'; added to web route ..... DONE");

        //require api-route.php in api.php
        $apiRout = file_get_contents(base_path('routes/api.php'));

        if (Str::contains($apiRout, "require __DIR__.'/api-routes.php';")) {
            $this->warn("require __DIR__.'/api-routes.php'; is exists in web route ............ SKIPPED");
            return;
        }

        file_put_contents(base_path('routes/api.php'),$apiRout . "\n\n require __DIR__.'/api-routes.php';");
        $this->info("require __DIR__.'/api-routes.php'; added to web route ..... DONE");
    }
}
