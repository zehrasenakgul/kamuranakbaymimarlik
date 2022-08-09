<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuShareProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->composeMenuShare();
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
    public function composeMenuShare()
    {
        view()->composer("layouts.frontend", "App\Http\Composers\MenuShareComposer");
    }
}
