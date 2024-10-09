<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product_controller ;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('products', Product_controller::class);


