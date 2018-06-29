<?php
namespace Nagy\LaraObserve;

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
            __DIR__.'/../config/Laraobserve.php' => config_path('Laraobserve.php'),
        ], 'config');

        // boot the observer
        LaraObserve::boot();
    }

    /**
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/Laraobserve.php', 'Laraobserve'
        );
    }
}

