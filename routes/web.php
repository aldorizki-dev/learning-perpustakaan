<?php

use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\RakController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','role:user'])->name('dashboard');

Route::prefix('admin')
    ->middleware(['auth', 'verified', 'role:admin'])
    ->group(function () {

    Route::get('/dashboard', function () {
        return view('admin-dashboard');
    })->name('admin.dashboard');

    // Buku
    Route::get('/daftar-buku', [BukuController::class,'index'])->name('admin.daftar-buku');
    Route::get('/daftar-buku/create', [BukuController::class,'create'])->name('admin.daftar-buku.create');
    Route::post('/daftar-buku/store', [BukuController::class,'store'])->name('admin.daftar-buku.store');
    Route::get('/daftar-buku/edit/{id}', [BukuController::class,'edit'])->name('admin.daftar-buku.edit');
    Route::patch('/daftar-buku/update/{id}', [BukuController::class,'update'])->name('admin.daftar-buku.update');
    Route::delete('/daftar-buku/destroy/{id}', [BukuController::class,'destroy'])->name('admin.daftar-buku.destroy');

    // Rak
    Route::get('/daftar-rak', [RakController::class,'index'])->name('admin.daftar-rak');
    Route::get('/daftar-rak/create', [RakController::class,'create'])->name('admin.daftar-rak.create');
    Route::post('/daftar-rak/store', [RakController::class,'store'])->name('admin.daftar-rak.store');
    Route::get('/daftar-rak/edit/{id}', [RakController::class,'edit'])->name('admin.daftar-rak.edit');
    Route::patch('/daftar-rak/update/{id}', [RakController::class,'update'])->name('admin.daftar-rak.update');
    Route::delete('/daftar-rak/destroy/{id}', [RakController::class,'destroy'])->name('admin.daftar-rak.destroy');

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
