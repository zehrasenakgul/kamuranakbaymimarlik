<?php

namespace App\Http\Controllers\Admin;

use App\Enums\noImagePath;
use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class ImageController extends Controller
{
    public function index()
    {
        $images = Image::where("id", "1")->first();
        return view("admin.images.index", compact("images"));
    }

    public function update(Request $request)
    {
        $image = Image::where("id", "1")->first();
        if ($request->hasFile('logo')) {
            if ($image->logo != noImagePath::PATH) {
                Storage::disk('storage')->delete($image->logo);
            };
            $logoPath = Storage::disk('storage')->put('logo', $request->file("logo"), 'public');
            Image::where("id", 1)->update([
                "logo" => $logoPath
            ]);
        }
        if ($request->hasFile('favicon')) {
            if ($image->favicon != noImagePath::PATH) {
                Storage::disk('storage')->delete($image->favicon);
            };
            $faviconPath = Storage::disk('storage')->put('favicon', $request->file("favicon"), 'public');
            Image::where("id", 1)->update([
                "favicon" => $faviconPath
            ]);
        }
        Session::flash('alertSuccessMessage', 'Görsel Güncelleme Başarılı!');
        return redirect()->route("admin.images.index");
    }
}
