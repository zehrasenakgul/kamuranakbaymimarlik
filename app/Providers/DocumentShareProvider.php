<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DocumentShareProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->composeDocumentShare();
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
    public function composeDocumentShare()
    {
        view()->composer("frontend.documents.documents-index", "App\Http\Composers\DocumentShareComposer");
    }
}
