<?php

use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Route;

Route::get("/", [PageController::class, "home"])->name('home');

Route::get('/about', [PageController::class, 'about'])->name('about');