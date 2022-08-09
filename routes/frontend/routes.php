<?php

use Illuminate\Support\Facades\Route;

Route::redirect("/", "/anasayfa");
Route::get('/anasayfa', "App\Http\Controllers\Frontend\HomeController@index")->name('frontend.index');
Route::get('/projeler', "App\Http\Controllers\Frontend\ProjectController@index")->name('frontend.projects.index');
Route::get('/projeler/{slug}', "App\Http\Controllers\Frontend\ProjectController@show")->name('frontend.project.show');
Route::get('/tasarim-ve-inovasyon/{slug}', "App\Http\Controllers\Frontend\ServiceController@show")->name('frontend.service.show');
Route::get('/tasarim-ve-inovasyon', "App\Http\Controllers\Frontend\ServiceController@index")->name('frontend.service.index');
Route::get('/musteri-iliskileri', "App\Http\Controllers\Frontend\CustomerController@index")->name('frontend.customer.index');
Route::get('/iletisim', "App\Http\Controllers\Frontend\ContactController@index")->name('frontend.contact.index');
Route::post('/sendMessage', "App\Http\Controllers\Frontend\ContactController@sendMessage")->name(".sendMessage");
Route::post('/sendApplication', "App\Http\Controllers\Frontend\ContactController@sendApplication")->name(".sendApplication");
Route::get('/arsa-bayilik-basvurusu', "App\Http\Controllers\Frontend\ContactController@application")->name(".application");
Route::get('/blog', "App\Http\Controllers\Frontend\BlogController@index")->name(".index");
Route::get('/blog/{slug}', "App\Http\Controllers\Frontend\BlogController@show")->name(".show");
