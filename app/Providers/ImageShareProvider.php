<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ImageShareProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->composeImagesShare();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    public function composeImagesShare()
    {
        view()->composer("layouts.frontend", "App\Http\Composers\ImageShareComposer");
    }
}
