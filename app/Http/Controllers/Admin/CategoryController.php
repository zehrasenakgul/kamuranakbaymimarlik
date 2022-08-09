<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Enums\noImagePath;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view("admin.categories.index", compact("categories"));
    }
    public function create()
    {
        return view("admin.categories.add");
    }
    public function edit(Category $category)
    {
        return view("admin.categories.update", compact("category"));
    }
    public function store(Request $request)
    {
        $category = new Category();
        $str = Str::slug($request->name, '-');
        $category->name = $request->name;
        $category->slug = $str;
        $category->status = $request->status;
        $category->save();
        Session::flash('alertSuccessMessage', 'Kategori Kaydı Başarılı!');
        return redirect()->action([CategoryController::class, 'index']);
    }
    public function update(Request $request, Category $category)
    {
        $str = Str::slug($request->name, '-');
        $category->update([
            "name" => $request->name,
            "slug" => $str,
            "status" => $request->status
        ]);
        Session::flash('alertSuccessMessage', 'Kategori Güncelleme Başarılı!');
        return redirect()->action([CategoryController::class, 'index']);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        Session::flash('alertSuccessMessage', 'Kategori Silme Başarılı!');
        return redirect()->action([CategoryController::class, 'index']);
    }
}
