<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes for Job Listings
Route::middleware(['auth', 'employer'])->group(function () {
    Route::get('/jobs/create', [JobListingController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [JobListingController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{job}', [JobListingController::class, 'show'])->name('jobs.show');
    Route::get('/jobs/{job}/edit', [JobListingController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{job}', [JobListingController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{job}', [JobListingController::class, 'destroy'])->name('jobs.destroy');
});



require __DIR__.'/auth.php';
