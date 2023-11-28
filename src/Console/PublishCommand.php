<?php

namespace Sajadsdi\LaravelDynamicRouter\Console;

use Illuminate\Console\Command;

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
        $this->call('vendor:publish', ['--tag' => "laravel-router-configure"]);
    }

    private function publishRoutes()
    {
        $this->comment('Publishing routes ...');
        $this->call('vendor:publish', ['--tag' => "laravel-router-routes"]);
    }
}
