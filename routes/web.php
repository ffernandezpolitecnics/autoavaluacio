<?php

use App\Http\Controllers\CicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::resource('cicles', CicleController::class);
Route::get('cicles/pepe', [CicleController::class, 'pepe']);
