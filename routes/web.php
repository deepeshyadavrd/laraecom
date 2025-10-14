<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Product Routes
// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('products.show');

// Category Routes
// Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Static Pages Routes
// Route::get('/about', [PageController::class, 'about'])->name('pages.about');
// Route::get('/contact', [PageController::class, 'contact'])->name('pages.contact');
// Route::post('/contact', [PageController::class, 'submitContact'])->name('pages.contact.submit');
// Route::get('/terms', [PageController::class, 'terms'])->name('pages.terms');
// Route::get('/privacy', [PageController::class, 'privacy'])->name('pages.privacy');

// Dynamic Pages (for any custom pages)
// Route::get('/page/{page:slug}', [PageController::class, 'show'])->name('pages.show');

// Search Route
// Route::get('/search', [ProductController::class, 'search'])->name('products.search');