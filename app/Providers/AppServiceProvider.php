<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // register classes , that do not depend on other classes
        // to make them available to your application
        $this->app->bind(
            'App\Libraries\NotificationsInterface',
            function ($app) {
                return new \App\Libraries\Notifications();
            }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // register classes , that depend on other classes
        // to make them available to your application

    }
}
