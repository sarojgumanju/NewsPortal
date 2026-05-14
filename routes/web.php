<?php

use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Route;

Route::get("/", [PageController::class, "home"])->name('home');

Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/category/{slug}', [PageController::class, 'category'])->name('category');

Route::get('/search', [PageController::class, 'search'])->name('search');

Route::get('/article/{slug}', [PageController::class, 'article'])->name('article');
