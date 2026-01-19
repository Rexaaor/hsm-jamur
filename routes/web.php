<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public pages (static)
Route::get('/farmtour', fn () => Inertia::render('FarmTour'))->name('farmtour');
Route::get('/kontak', fn () => Inertia::render('Kontak'))->name('kontak');
Route::get('/terms', fn () => Inertia::render('Terms'))->name('terms');
Route::get('/privacy', fn () => Inertia::render('PrivacyPolicy'))->name('privacy');
Route::get('/lokasi', fn () => Inertia::render('Lokasi'))->name('lokasi');
Route::get('/funfact', fn () => Inertia::render('FunFact'))->name('funfact');
Route::get('/lowongan', fn () => Inertia::render('Lowongan'))->name('lowongan');

// Produk (DINAMIS → CONTROLLER)
Route::get('/produk', [ProductController::class, 'index'])->name('produk');
Route::get('/produk/{id}', [ProductController::class, 'show'])->name('produk.detail');
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth routes
require __DIR__.'/auth.php';
