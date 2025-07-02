<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;

Route::controller(HomeController::class)->group(function () {
    Route::get('/index', 'index')->name('home.index');
});