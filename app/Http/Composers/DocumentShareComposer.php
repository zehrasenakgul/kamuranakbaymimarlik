<?php

namespace App\Http\Composers;

use App\Models\Document;
use Illuminate\Contracts\View\View;

class DocumentShareComposer
{
    public function compose(View $view)
    {
        $documents = Document::where("status", 1)->orderby("id", "desc")->get();
        $view->with("documents", $documents);
    }
}
