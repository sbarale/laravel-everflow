<?php

namespace CodeGreenCreative\Everflow;

/**
 * The service provider for laravel-everflow
 *
 * @license MIT
 */

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

class EverflowServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot(Router $router)
    {
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->configure();

        $this->offerPublishing();

        App::bind('everflow', function () {
            return new \CodeGreenCreative\Everflow\Everflow;
        });
    }

    /**
     * Configure the service provider
     *
     * @return void
     */
    private function configure()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/everflow.php', 'everflow');
    }

    /**
     * Offer publishing for the service provider
     *
     * @return void
     */
    public function offerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/everflow.php' => config_path('everflow.php'),
            ], 'everflow-config');
        }
    }
}
