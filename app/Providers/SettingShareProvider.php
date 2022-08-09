<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SettingShareProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->composeSettingShare();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }

    public function composeSettingShare()
    {
        view()->composer("layouts.frontend", "App\Http\Composers\SettingShareComposer");
    }
}
