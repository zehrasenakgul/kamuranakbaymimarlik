<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::where("status", 1)->get();
        return view("frontend.home.index", compact("projects"));
    }
}
