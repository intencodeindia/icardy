<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/register');
});

Route::get('/forgot-password', function () {
    return view('auth/forgot-password');
});     

Route::get('/dashboard', function () {
    return view('welcome');
})->name('dashboard');

// Move schools route inside auth middleware since it's not defined
Route::middleware(['auth'])->group(function () {
    Route::get('schools', [SchoolController::class, 'index'])->name('schools.index');
    Route::get('classes', [ClassesController::class, 'index'])->name('classes.index');
    Route::get('sections', [SectionController::class, 'index'])->name('sections.index');
    Route::get('students', [StudentController::class, 'index'])->name('students.index');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profileinfo', function () {
        return view('profileinfo');
    })->name('profileinfo');

    // ID Card printing route
    Route::get('/print-id-card', function () {
        return view('print-id-card');
    })->name('print-id-card');
});

require __DIR__.'/auth.php';
