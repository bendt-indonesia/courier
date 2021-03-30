<?php

namespace Bendt\Courier;

use Illuminate\Support\ServiceProvider;

class CourierServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/bendt-courier.php' => config_path('bendt-courier.php'),
        ], 'config');

        if(config('bendt-courier.routes_enabled')) {
            require __DIR__ . '/Routes/web.php';
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
