<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BackendHomeController extends Controller
{
    public function index()
    {
        return view('admin.home.index');
    }
}
