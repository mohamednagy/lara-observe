<?php
namespace Nagy\LaravelDB;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laraveldb.php' => config_path('laraveldb.php'),
        ], 'config');

        // boot the observer
        LaravelDB::boot();
    }

    /**
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/laraveldb.php', 'laraveldb'
        );
    }
}

