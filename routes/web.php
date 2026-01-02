<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $stats = [
        'pending' => \App\Models\Need::where('status', 'pending')->count(),
        'approved' => \App\Models\Need::where('status', 'approved')->count(),
        'filled' => \App\Models\Need::where('status', 'filled')->count(),
        'rejected' => \App\Models\Need::where('status', 'rejected')->count(),
    ];
    return view('dashboard', compact('stats'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/input', function () {
    return view('input');
})->middleware(['auth', 'verified'])->name('input');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
