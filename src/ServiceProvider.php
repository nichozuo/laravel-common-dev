<?php


namespace Nichozuo\LaravelCommonDev;


use Nichozuo\LaravelCommonDev\Commands;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->commands([
            Commands\DumpTableCommand::class,
            Commands\ClearDBCacheCommand::class,
            Commands\GenFilesCommand::class,
            Commands\UpdateModelsCommand::class,
            Commands\ISeedBackupCommand::class
        ]);
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/resources/docs/dist' => public_path('docs')
        ]);
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
    }
}