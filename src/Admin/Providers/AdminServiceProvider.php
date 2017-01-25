<?php

namespace Rizalmovic\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Routes
        include __DIR__.'/../Http/routes.php';

        // Views
        $this->loadViewsFrom(__DIR__ . '/../Views', 'Admin');

        // Config
        $this->mergeConfigFrom(__DIR__. '/../Config/admin.php', 'admin');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
