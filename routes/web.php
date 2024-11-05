<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

// Route::get('/', function () {
//     return view('upload');
// });
Route::get('/',[ImageController::class,'index'])->name('home');
Route::post('image',[ImageController::class,'store'])->name('image.store');