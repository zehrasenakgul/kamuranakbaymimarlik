<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProjectShareProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->composeProjectShare();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }

    public function composeProjectShare()
    {
        view()->composer("frontend.projects.owl-carousel", "App\Http\Composers\ProjectShareComposer");
        view()->composer("frontend.projects.slider", "App\Http\Composers\ProjectShareComposer");
    }
}
