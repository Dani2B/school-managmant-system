<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Enum\UserRole;


//Routes Admin
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified', 'userRole:' . UserRole::ADMIN->value])
    ->prefix('admin')
    ->group(function () {


        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('users', UserController::class);
        Route::resource('courses', CourseController::class);

    });


// //Routes teacher
// Route::get('/teacher/dashboard', function () {
//     return view('teacher.dashboard');
// })->middleware(['auth', 'verified', 'checkuserRole:' . UserRole::TEACHER->value])->name('teacher.dashboard');

Route::middleware(['auth', 'verified', 'userRole:' . UserRole::TEACHER->value])
    ->prefix('teacher')
    ->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Teacher\DashboardController::class, 'index'])->name('teacher.dashboard');

        Route::get('/course/{course}', [App\Http\Controllers\Teacher\CourseController::class, 'show'])->name('teacher.courses.show');
    });


Route::middleware(['auth', 'verified', 'userRole:' . UserRole::STUDENT->value])
    ->prefix('student')
    ->group(function () {

        Route::get('/dashboard', [\App\Http\Controllers\Student\DashboardController::class, 'index'])->name('student.dashboard');

        Route::get('/courses', [\App\Http\Controllers\Student\CourseController::class, 'index'])->name('student.courses');

        Route::get('/courses/{course}', [\App\Http\Controllers\Student\CourseController::class, 'show'])->name('student.courses.show');

        Route::post('/courses/{course}/student/{student}/enroll', [\App\Http\Controllers\Student\CourseController::class, 'enroll'])->name('student.courses.enroll');
    });



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
