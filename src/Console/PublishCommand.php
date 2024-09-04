<?php

namespace Sajadsdi\LaravelDynamicRouter\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class PublishCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dynamic-router:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish Laravel Dynamic Router!';

    /**
     * Execute the console command.
     *
     * @return int|null
     */
    public function handle()
    {
        $this->info('Publishing Laravel Dynamic Router ...');
        $this->publishConfigs();
        $this->publishRoutes();
        return null;
    }

    private function publishConfigs()
    {
        $this->comment('Publishing configure ...');

        if (File::exists(base_path('routes/api.php'))) {
            $this->call('vendor:publish', ['--tag' => "laravel-router-configure-api"]);
        }

        if (File::exists(base_path('routes/web.php'))) {
            $this->call('vendor:publish', ['--tag' => "laravel-router-configure-web"]);
        }
    }

    private function publishRoutes()
    {
        $this->comment('Publishing routes ...');

        if (File::exists(base_path('routes/api.php'))) {
            $this->call('vendor:publish', ['--tag' => "laravel-router-routes-api"]);
        }

        if (File::exists(base_path('routes/web.php'))) {
            $this->call('vendor:publish', ['--tag' => "laravel-router-routes-web"]);
        }
    }
}
