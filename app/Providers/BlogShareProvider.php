<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BlogShareProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->composeBlogShare();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }

    public function composeBlogShare()
    {
        view()->composer("frontend.blogs.latest-blog", "App\Http\Composers\BlogShareComposer");
    }
}
