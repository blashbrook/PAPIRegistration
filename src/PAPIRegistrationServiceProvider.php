<?php

namespace Blashbrook\PAPIRegistration;

use Illuminate\Support\ServiceProvider;

class PAPIRegistrationServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'papiregistration');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'papiregistration');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/papiregistration.php', 'papiregistration');

        // Register the service the package provides.
        $this->app->singleton('papiregistration', function ($app) {
            return new PAPIRegistration;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['papiregistration'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/papiregistration.php' => config_path('papiregistration.php'),
        ], 'papiregistration.config');

        // Publishing the views.
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/blashbrook'),
        ], 'papiregistration.views');

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/blashbrook'),
        ], 'papiregistration.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/blashbrook'),
        ], 'papiregistration.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
