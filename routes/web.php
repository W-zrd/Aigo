<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(AdminController::class, '')->group(function(){
    //Route::get('/admin/dashboard', 'index')->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/admin/doctor-info', 'showDoctor')->middleware(['auth', 'verified'])->name('dashboard');//->name('showDoctor');
    Route::get('/admin/patient-info', 'showPatient')->middleware(['auth', 'verified'])->name('showPatient');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
