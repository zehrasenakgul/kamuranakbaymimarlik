<?php

namespace App\Http\Composers;

use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class ServiceShareComposer
{
    public function compose(View $view)
    {
        if (Cache::has("services")) {
            $services = Cache::get("services");
        } else {
            $services = Service::where("status", 1)->get();
            Cache::put("services", $services);
        }

        $view->with("services", $services);
    }
}
