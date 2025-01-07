<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\IdCardController;
use App\Models\Classes; 
use App\Models\Section;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
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

 // Dashboard route
 Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Schools route
Route::get('/schools', [SchoolController::class, 'index'])->name('schools');
Route::post('/schools', [SchoolController::class, 'store'])->name('schools.store');
Route::get('/schools/{id}', [SchoolController::class, 'show'])->name('schools.show');
Route::put('/schools/{school}', [SchoolController::class, 'update'])->name('schools.update');
Route::get('/schools/{school}/classes', [ClassesController::class, 'index'])->name('classes');
Route::post('/classes', [ClassesController::class, 'store'])->name('classes.store');
Route::put('/classes/{class}', [ClassesController::class, 'update'])->name('classes.update');
Route::delete('/classes/{class}', [ClassesController::class, 'destroy'])->name('classes.destroy');

// Sections route
Route::get('/sections/{class}', [SectionController::class, 'index'])->name('sections');
Route::post('/sections', [SectionController::class, 'store'])->name('sections.store');
Route::put('/sections/{section}', [SectionController::class, 'update'])->name('sections.update');
Route::delete('/sections/{section}', [SectionController::class, 'destroy'])->name('sections.destroy');

// Print ID Card route
Route::get('/print-id-card', [IdCardController::class, 'index'])->name('print-id-card');

Route::post('/id-card/settings', [IdCardController::class, 'store'])->name('id-card.settings');

// Settings route
Route::get('/settings', function () {
    return view('settings');
})->name('settings');

// Profile info route
Route::get('/profileinfo', function () {
    return view('profileinfo');
})->name('profileinfo');

// Authenticated routes group
Route::middleware(['auth'])->group(function () {
   

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Student routes
Route::get('/students/template', [StudentController::class, 'downloadTemplate'])->name('students.template.download');
Route::get('/students/{school_id}', [StudentController::class, 'index'])->name('students');
Route::post('/students/import', [StudentController::class, 'importStudents'])->name('students.import');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

// API routes for cascading dropdowns
Route::get('/api/schools/{school}/classes', function($schoolId) {
    $classes = Classes::where('school_id', $schoolId)->get();
    return response()->json($classes);
});

Route::get('/api/classes/{class}/sections', [StudentController::class, 'getSections']);

Route::get('/api/students/filter', [IdCardController::class, 'filterStudents'])->name('students.filter');

require __DIR__.'/auth.php';
