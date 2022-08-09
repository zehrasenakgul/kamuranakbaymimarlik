<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Enums\noImagePath;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view("admin.blogs.index", compact("blogs"));
    }
    public function create()
    {
        $categories = Category::where("status", 1)->get();
        return view("admin.blogs.add", compact("categories"));
    }
    public function edit(Blog $blog)
    {
        $categories = Category::where("status", 1)->get();
        return view("admin.blogs.update", compact("blog", "categories"));
    }

    public function store(Request $request)
    {
        $blog = new Blog();
        $filePath = noImagePath::PATH;
        if ($request->hasFile('image')) {
            $filePath = Storage::disk('storage')->put('blogs', $request->file('image'), 'public');
        }
        $blog->name = $request->input('name');
        $blog->content = $request->input('content');
        $blog->category_id = $request->input('category_id');
        $blog->status = $request->input('status');
        $blog->image = $filePath;
        $str = Str::slug($request->name, '-');
        $blog->slug = $str;
        $blog->save();
        Session::flash('alertSuccessMessage', 'Blog Kaydı Başarılı!');
        return redirect()->route('admin.blogs.index');
    }

    public function update(Request $request, Blog $blog)
    {
        $filePath = $blog->image;
        if ($request->hasFile('image')) {
            if ($blog->image != noImagePath::PATH) {
                Storage::disk('storage')->delete($blog->image);
            }
            $filePath = Storage::disk('storage')->put('blogs', $request->file('image'), 'public');
        }
        $blog->name = $request->input('name');
        $blog->content = $request->input('content');
        $blog->category_id = $request->input('category_id');
        $blog->status = $request->input('status');
        $blog->image = $filePath;
        $str = Str::slug($request->name, '-');
        $blog->slug = $str;
        $blog->save();
        Session::flash('alertSuccessMessage', 'Blog Güncelleme Başarılı!');
        return redirect()->route('admin.blogs.index');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        Session::flash('alertSuccessMessage', 'Blog Silme Başarılı!');
        return redirect()->route('admin.blogs.index');
    }
}
