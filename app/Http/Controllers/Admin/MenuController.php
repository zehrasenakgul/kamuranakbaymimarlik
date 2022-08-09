<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view("admin.menus.index", compact("menus"));
    }

    public function edit(Request $request)
    {
        Menu::where("name", $request->name)->update(["route" => $request->route]);
        Session::flash('alertSuccessMessage', 'Menü Güncelleme Başarılı!');
    }

    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->route = $request->route;
        $menu->save();
        Session::flash('alertSuccessMessage', 'Menü Kaydı Başarılı!');
    }

    public function destroy(Request $request)
    {
        Menu::where("name", $request->name)->delete();
        Session::flash('alertSuccessMessage', 'Menü Silme Başarılı!');
    }
}
