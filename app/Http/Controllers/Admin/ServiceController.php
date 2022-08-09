<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Enums\noImagePath;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view("admin.services.index", compact("services"));
    }
    public function create()
    {
        return view("admin.services.add");
    }
    public function edit(Service $service)
    {
        return view("admin.services.update", compact("service"));
    }

    public function store(Request $request)
    {
        $service = new Service();
        $filePath = noImagePath::PATH;
        if ($request->hasFile('image')) {
            $filePath = Storage::disk('storage')->put('services', $request->file('image'), 'public');
        }
        $service->name = $request->input('name');
        $service->content = $request->input('content');
        $service->status = $request->input('status');
        $service->image = $filePath;
        $str = Str::slug($request->name, '-');
        $service->slug = $str;
        $service->save();
        Session::flash('alertSuccessMessage', 'Hizmet Kaydı Başarılı!');
        return redirect()->route('admin.services.index');
    }

    public function update(Request $request, Service $service)
    {
        $filePath = $service->image;
        if ($request->hasFile('image')) {
            if ($service->image != noImagePath::PATH) {
                Storage::disk('storage')->delete($service->image);
            }
            $filePath = Storage::disk('storage')->put('services', $request->file('image'), 'public');
        }
        $service->name = $request->input('name');
        $service->content = $request->input('content');
        $service->status = $request->input('status');
        $service->image = $filePath;
        $str = Str::slug($request->name, '-');
        $service->slug = $str;
        $service->save();
        Session::flash('alertSuccessMessage', 'Hizmet Güncelleme Başarılı!');
        return redirect()->route('admin.services.index');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        Session::flash('alertSuccessMessage', 'Hizmet Silme Başarılı!');
        return redirect()->route('admin.services.index');
    }
}
