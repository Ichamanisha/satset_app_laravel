<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
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

    Route::resource('reports', ReportController::class)
        ->only(['index', 'create', 'store', 'show']);

    Route::get('/admin/dashboard', [ReportController::class, 'adminIndex'])->name('admin.dashboard');
    Route::patch('/admin/reports/{id}/status', [ReportController::class, 'updateStatus'])->name('admin.reports.update');
});

require __DIR__.'/auth.php';
