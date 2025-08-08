<?php

use App\Http\Controllers\productcontroller;
use Illuminate\Support\Facades\Route;

//route dengan mode resource
Route::resource('products', productcontroller::class);

Route::get('/', function () {
    return view('welcome');
});
