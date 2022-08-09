<?php

namespace App\Http\Composers;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class ProjectShareComposer
{
    public function compose(View $view)
    {
        if (Cache::has("projects")) {
            $projects = Cache::get("projects");
        } else {
            $projects = Project::where("status", 1)->with('images')->get();
            Cache::put("projects", $projects);
        }

        if (Cache::has("projectImages")) {
            $projectImages = Cache::get("projectImages");
        } else {
            $projectImages = ProjectImage::limit(7)->with("project")->orderBy("id", "asc")->get();
            Cache::put("projectImages", $projectImages);
        }

        $view->with("projectImages", $projectImages);
    }
}
