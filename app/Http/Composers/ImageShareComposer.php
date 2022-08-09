<?php

namespace App\Http\Composers;

use App\Models\Image;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;


class ImageShareComposer
{
    public function compose(View $view)
    {
        if (Cache::has("images")) {
            $images = Cache::get("images");
        } else {
            $images = Image::all();
            Cache::put("images", $images);
        }

        $view->with("images", $images);
    }
}
