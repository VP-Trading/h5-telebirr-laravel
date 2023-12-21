<?php

namespace Vptrading\TelebirrLaravel;

use Illuminate\Support\ServiceProvider;

class TelebirrServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/telebirr.php' => config_path('telebirr.php')
        ]);
    }

    public function register()
    {
        $this->app->singleton(Telebirr::class, function () {
            return new Telebirr();
        });
    }
}
