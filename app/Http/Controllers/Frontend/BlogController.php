<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class BlogController extends Controller
{
    public function index()
    {
        if (Cache::has("blogs")) {
            $blogs = Cache::get("blogs");
        } else {
            $blogs = Blog::where("status", "1")->with("category")->orderBy("id", "ASC")->get();
            Cache::put("blogs", $blogs);
        }

        return view("frontend.blogs.index", compact("blogs"));
    }
    public function show($slug)
    {
        $blog = Blog::where("slug", $slug)->get();
        return view("frontend.blogs.details", compact("blog"));
    }
}
