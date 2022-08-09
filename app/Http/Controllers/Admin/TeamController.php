<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Enums\noImagePath;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view("admin.teams.index", compact("teams"));
    }
    public function create()
    {
        return view("admin.teams.add");
    }
    public function edit(Team $team)
    {
        return view("admin.teams.update", compact("team"));
    }

    public function store(Request $request)
    {
        $team = new Team();
        $filePath = noImagePath::PATH;
        if ($request->hasFile('image')) {
            $filePath = Storage::disk('storage')->put('teams', $request->file('image'), 'public');
        }
        $team->name = $request->input('name');
        $team->title = $request->input('title');
        $team->status = $request->input('status');
        $team->email = $request->input('email');
        $team->phone = $request->input('phone');
        $team->image = $filePath;
        $team->save();
        Session::flash('alertSuccessMessage', 'Ekip Kaydı Başarılı!');
        return redirect()->route('admin.teams.index');
    }

    public function update(Request $request, team $team)
    {
        $filePath = $team->image;
        if ($request->hasFile('image')) {
            if ($team->image != noImagePath::PATH) {
                Storage::disk('storage')->delete($team->image);
            }
            $filePath = Storage::disk('storage')->put('teams', $request->file('image'), 'public');
        }
        $team->name = $request->input('name');
        $team->name = $request->input('name');
        $team->title = $request->input('title');
        $team->status = $request->input('status');
        $team->email = $request->input('email');
        $team->phone = $request->input('phone');
        $team->image = $filePath;
        $team->save();
        Session::flash('alertSuccessMessage', 'Ekip Güncelleme Başarılı!');
        return redirect()->route('admin.teams.index');
    }

    public function destroy(team $team)
    {
        $team->delete();
        Session::flash('alertSuccessMessage', 'Ekip Silme Başarılı!');
        return redirect()->route('admin.teams.index');
    }
}
