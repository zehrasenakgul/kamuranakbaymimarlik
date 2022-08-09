<?php

namespace App\Http\Composers;

use App\Models\Menu;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class MenuShareComposer
{
    public function compose(View $view)
    {
        $menus = Menu::all();

        $view->with("menus", $menus);
    }
}
