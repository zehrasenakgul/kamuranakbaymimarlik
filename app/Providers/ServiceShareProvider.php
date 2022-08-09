<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceShareProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->composeServiceShare();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }

    public function composeServiceShare()
    {
        view()->composer("frontend.services.owl-carousel", "App\Http\Composers\ServiceShareComposer");
    }
}
