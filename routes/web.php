<?php

use App\Http\Controllers\EntryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ✅ Routes pour les entrées du journal
    Route::get('/entrees', [EntryController::class, 'index'])->name('entrees.index');
    Route::get('/entrees/create', [EntryController::class, 'create'])->name('entrees.create');
    Route::post('/entrees', [EntryController::class, 'store'])->name('entrees.store');
    Route::get('/entrees/{id}', [EntryController::class, 'show'])->name('entrees.show');
    Route::get('/entrees/{id}/edit', [EntryController::class, 'edit'])->name('entrees.edit');
    Route::put('/entrees/{id}', [EntryController::class, 'update'])->name('entrees.update');
    Route::delete('/entrees/{id}', [EntryController::class, 'delete'])->name('entrees.destroy');
});

require __DIR__.'/auth.php';
