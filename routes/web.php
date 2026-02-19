<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'))->name('home');

Route::get('/dashboard', fn () => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/library', [LibraryItemController::class, 'index'])->name('library.index');
Route::middleware('auth')->group(function () {
    Route::get('/contribute', [LibraryItemController::class, 'create'])->name('library.create');
    Route::post('/contribute', [LibraryItemController::class, 'store'])->name('library.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('films', FilmController::class);
});

require __DIR__.'/auth.php';
