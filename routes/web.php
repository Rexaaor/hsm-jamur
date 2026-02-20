<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FarmTourController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\ClickLogsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =======================
// PUBLIC (GUEST)
// =======================
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/kontak', fn () => Inertia::render('Kontak'))->name('kontak');
Route::get('/terms', fn () => Inertia::render('Terms'))->name('terms');
Route::get('/privacy', fn () => Inertia::render('PrivacyPolicy'))->name('privacy');
Route::get('/lokasi', fn () => Inertia::render('Lokasi'))->name('lokasi');
Route::get('/funfact', fn () => Inertia::render('FunFact'))->name('funfact');

Route::get('/produk', [ProductController::class, 'index'])->name('produk');
Route::get('/produk/{id}', [ProductController::class, 'show'])->name('produk.detail');
Route::get('/farmtour', [FarmTourController::class, 'index'])->name('farmtour');

Route::post('/click-log', [ClickLogsController::class, 'store'])
    ->name('click.log');

// =======================
// ADMIN / AUTH ONLY
// =======================
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/admin', [AdminProductController::class, 'index'])->name('admin.product');
    Route::put('/admin/produk/{id}', [AdminProductController::class, 'update']);
});

// Auth routes (login, register, dll)
require __DIR__.'/auth.php';
