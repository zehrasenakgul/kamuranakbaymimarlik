<?php

namespace App\Http\Composers;

use App\Models\Blog;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class BlogShareComposer
{
    public function compose(View $view)
    {
        if (Cache::has("blogs")) {
            $blogs = Cache::get("blogs");
        } else {
            $blogs = Blog::where("status", 1)->get();
            Cache::put("blogs", $blogs, 4);
        }

        $view->with("blogs", $blogs);
    }
}
