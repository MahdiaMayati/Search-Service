<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
      $this->app->bind('search-service', function ($app) {
        return new \App\Services\SearchService();
    });
    }

    public function boot(): void
    {
        //
    }
}
