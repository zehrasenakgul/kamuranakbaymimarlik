<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Enums\noImagePath;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view("admin.projects.index", compact("projects"));
    }
    public function create()
    {
        return view("admin.projects.add");
    }
    public function edit(Project $project)
    {
        return view("admin.projects.update", compact("project"));
    }
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $project = new Project();
            $str = Str::slug($request->name, '-');
            $project->name = $request->name;
            $project->content = $request->content;
            $project->slug = $str;
            $project->status = $request->status;
            $project->save();
            foreach ($files as $file) {
                $image = new ProjectImage();
                $filePath = Storage::disk('storage')->put('projects', $file, 'public');
                $image->image = $filePath;
                $image->project_id = $project->id;
                $image->save();
            }
            Session::flash('alertSuccessMessage', 'Proje Kaydı Başarılı!');
            return redirect()->action([ProjectController::class, 'index']);
        }

        Session::flash('alertErrorMessage', 'Proje Kaydı Başarısız!');
        return redirect()->action([ProjectController::class, 'index']);
    }

    public function update(Request $request, Project $project)
    {
        $str = Str::slug($request->name, '-');
        $project->update([
            "name" => $request->name,
            "content" => $project->content,
            "slug" => $str,
            "status" => $request->status
        ]);
        Session::flash('alertSuccessMessage', 'Proje Güncelleme Başarılı!');
        return redirect()->action([ProjectController::class, 'index']);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        Session::flash('alertSuccessMessage', 'Proje Silme Başarılı!');
        return redirect()->action([ProjectController::class, 'index']);
    }

    public function destroyImage(ProjectImage $projectImage)
    {
        $projectImage->delete();
        Session::flash('alertSuccessMessage', 'Proje Görsel Silme Başarılı!');
        return redirect()->back();
    }

    public function createImage(Project $project)
    {
        return view("admin.projects.imagesCreate", compact("project"));
    }
    public function storeImage(Project $project, Request $request)
    {
        if ($request->hasFile('image')) {
            $files = $request->file('image');
            foreach ($files as $file) {
                $image = new ProjectImage();
                $filePath = Storage::disk('storage')->put('projects', $file, 'public');
                $image->image = $filePath;
                $image->project_id = $project->id;
                $image->save();
            }
            Session::flash('alertSuccessMessage', 'Proje Görsel Kaydı Başarılı!');
            return redirect()->back();
        }

        Session::flash('alertErrorMessage', 'Proje Görsel Kaydı Başarısız!');
        return redirect()->back();
    }
    public function show(Project $project)
    {
        $projectImages = ProjectImage::where("project_id", $project->id)->get();
        return view("admin.projects.imagesIndex", compact("projectImages", "project"));
    }
}
