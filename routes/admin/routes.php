<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamController;
use Illuminate\Support\Facades\Route;

Route::redirect('/admin', '/admin/login');

Route::get('/admin/login', "App\Http\Controllers\Auth\LoginController@showLoginForm")->name('admin.login.index');
Route::post('/admin/login', "App\Http\Controllers\Auth\LoginController@login");
Route::get('/admin/logout', "App\Http\Controllers\Auth\LoginController@logout")->name('admin.logout.index');

Route::group(['prefix' => 'admin', "as" => "admin.", 'middleware' => 'auth'], function () {
    Route::get('/dashboard', "App\Http\Controllers\Admin\BackendHomeController@index")->name('admin.home.index');

    Route::controller(ImageController::class)->group(function () {
        Route::group(["prefix" => "images"], function () {
            Route::get("/", "index")->name("images.index");
            Route::put("/", "update")->name("images.update");
        });
    });

    Route::controller(MenuController::class)->group(function () {
        Route::group(["prefix" => "menus", "as" => "menus"], function () {
            Route::get('/', 'index')->name(".index");
            Route::post("/edit", "edit")->name(".edit");
            Route::post("/create", "store")->name(".store");
            Route::post("/delete", "destroy")->name(".destroy");
        });
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::group(["prefix" => "categories", "as" => "categories"], function () {
            Route::get("/", "index")->name(".index");
            Route::get("/create", "create")->name(".create");
            Route::get("/{category}", "edit")->name(".edit");
            Route::put("/{category}", "update")->name(".update");
            Route::post("/", "store")->name(".store");
            Route::delete("/{category}", "destroy")->name(".destroy");
        });
    });

    Route::controller(BlogController::class)->group(function () {
        Route::group(["prefix" => "blogs", "as" => "blogs"], function () {
            Route::get("/", "index")->name(".index");
            Route::get("/create", "create")->name(".create");
            Route::get("/{blog}", "edit")->name(".edit");
            Route::put("/{blog}", "update")->name(".update");
            Route::post("/", "store")->name(".store");
            Route::delete("/{blog}", "destroy")->name(".destroy");
        });
    });
    Route::controller(ServiceController::class)->group(function () {
        Route::group(["prefix" => "services", "as" => "services"], function () {
            Route::get("/", "index")->name(".index");
            Route::get("/create", "create")->name(".create");
            Route::get("/{service}", "edit")->name(".edit");
            Route::put("/{service}", "update")->name(".update");
            Route::post("/", "store")->name(".store");
            Route::delete("/{service}", "destroy")->name(".destroy");
        });
    });
    Route::controller(TeamController::class)->group(function () {
        Route::group(["prefix" => "teams", "as" => "teams"], function () {
            Route::get("/", "index")->name(".index");
            Route::get("/create", "create")->name(".create");
            Route::get("/{team}", "edit")->name(".edit");
            Route::put("/{team}", "update")->name(".update");
            Route::post("/", "store")->name(".store");
            Route::delete("/{team}", "destroy")->name(".destroy");
        });
    });
    Route::controller(DocumentController::class)->group(function () {
        Route::group(["prefix" => "documents", "as" => "documents"], function () {
            Route::get("/", "index")->name(".index");
            Route::get("/create", "create")->name(".create");
            Route::get("/{document}", "edit")->name(".edit");
            Route::put("/{document}", "update")->name(".update");
            Route::post("/", "store")->name(".store");
            Route::delete("/{document}", "destroy")->name(".destroy");
        });
    });
    Route::controller(ProjectController::class)->group(function () {
        Route::group(["prefix" => "projects", "as" => "projects"], function () {
            Route::get("/", "index")->name(".index");
            Route::get("/create", "create")->name(".create");
            Route::get("/{project}", "edit")->name(".edit");
            Route::get("/{project}/images", "show")->name("show");
            Route::put("/{project}", "update")->name(".update");
            Route::post("/", "store")->name(".store");
            Route::delete("/{project}", "destroy")->name(".destroy");
            Route::delete("/images/{projectImage}", "destroyImage")->name(".images.destroyImage");
            Route::get("/{project}/create", "createImage")->name(".images.createImage");
            Route::post("/{project}/store", "storeImage")->name(".images.storeImage");
        });
    });
    //Formu tüm methodlar için ajax ile post ettiğimden resource için url ve method biçimleri uygun olmuyor.
    Route::controller(SettingController::class)->group(function () {
        Route::group(['prefix' => 'settings', "as" => "settings."], function () {
            Route::get('/', 'index')->name("index");
            //ajax post işlemi olduğu için type post =>
            Route::post('/update', 'update')->name("update");
            Route::post('/create', 'store')->name("store");
            Route::post('/delete', 'destroy')->name("destroy");
        });
    });
});
