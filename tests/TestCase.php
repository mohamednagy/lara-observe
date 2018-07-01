<?php

namespace Nagy\LaraObserve\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Nagy\LaraObserve\Exceptions\SlowQueryException;

abstract class TestCase extends Orchestra
{
    public function setUp()
    {
        parent::setUp();
        $this->setUpDatabase($this->app);
    }
    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
        $app['config']->set('app.key', env('APP_KEY'));
    }

    public function setUpDatabase($app)
    {
        $this->app['config']->set('laraobserve.queries.active', false);
        $this->loadMigrationsFrom(realpath(__DIR__.'/database/migrations'));
        $this->artisan('migrate');
        $this->app['config']->set('laraobserve.queries.active', true);

    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Nagy\LaraObserve\ServiceProvider::class,
        ];
    }

    protected function tearDown()
    {
        $this->app['config']->set('laraobserve.queries.active', false);
        parent::tearDown();
    }
}