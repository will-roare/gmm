<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\EpisodeController;


Route::get('/', [WelcomeController::class, 'index']);
Route::get('/episodes', [EpisodeController::class, 'index'])->name('episodes.index');
Route::get('/episodes/create', [EpisodeController::class, 'create'])->name('episodes.create');
Route::get('/episodes/{id}', [EpisodeController::class, 'show'])->name('episodes.show');
Route::post('/episodes', [EpisodeController::class, 'store'])->name('episodes.store');
Route::get('/episodes/{id}/edit', [EpisodeController::class, 'edit'])->name('episodes.edit');
Route::put('/episodes/{id}', [EpisodeController::class, 'update'])->name('episodes.update');
Route::delete('/episodes/{id}', [EpisodeController::class, 'destroy'])->name('episodes.destroy');

Route::get('/dashboard', function () {
    return view('userzone.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
