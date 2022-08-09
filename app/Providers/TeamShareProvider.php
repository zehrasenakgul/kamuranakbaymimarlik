<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TeamShareProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->composeTeamShare();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }

    public function composeTeamShare()
    {
        view()->composer("frontend.teams.teams-index", "App\Http\Composers\TeamShareComposer");
    }
}
