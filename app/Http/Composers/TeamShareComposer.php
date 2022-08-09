<?php

namespace App\Http\Composers;

use App\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class TeamShareComposer
{
    public function compose(View $view)
    {
        if (Cache::has("teams")) {
            $teams = Cache::get("teams");
        } else {
            $teams = Team::where("status", 1)->get();
            Cache::put("teams", $teams, 3);
        }

        $view->with("teams", $teams);
    }
}
