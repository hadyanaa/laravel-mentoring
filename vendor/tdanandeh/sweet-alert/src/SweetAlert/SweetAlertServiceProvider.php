<?php

namespace Tdanandeh\SweetAlert;

use Illuminate\Support\ServiceProvider;

class SweetAlertServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'sweet');

        $this->publishes([
            __DIR__ . '/../config/sweet-alert.php' => config_path('sweet-alert.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../views' => base_path('resources/views/vendor/sweet'),
        ], 'views');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/sweet-alert.php',
            'sweet-alert'
        );

        $this->app->bind(
            'Tdanandeh\SweetAlert\SessionStore',
            'Tdanandeh\SweetAlert\LaravelSessionStore'
        );

        $this->app->bind('tdanandeh.sweet-alert', function () {
            return $this->app->make('Tdanandeh\SweetAlert\SweetAlertNotifier');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'Tdanandeh\SweetAlert\SessionStore',
            'tdanandeh.sweet-alert',
        ];
    }
}
