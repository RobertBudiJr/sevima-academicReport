<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleGeneratorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student/dashboard', function () {
    return view('student-dashboard');
});
Route::get('/teacher/dashboard', function () {
    return view('teacher-dashboard');
});

// Routes for student login
Route::get('student/login', [StudentController::class, 'showLoginForm'])->name('student.login');
Route::post('student/login', [StudentController::class, 'login']);

// Routes for teacher login
Route::get('teacher/login', [TeacherController::class, 'showLoginForm'])->name('teacher.login');
Route::post('teacher/login', [TeacherController::class, 'login']);

// Teacher Register Route
Route::get('/register/teacher', [TeacherController::class, 'showRegistrationForm'])->name('teacher.register');
Route::post('/register/teacher', [TeacherController::class, 'register']);

// Student Register Route
Route::get('/register/student', [StudentController::class, 'showRegistrationForm'])->name('student.register');
Route::post('/register/student', [StudentController::class, 'register']);

// Logout Route
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// CRUD Class
Route::resource('classes', ClassController::class);

// CRUD Articles
Route::resource('articles', ArticleController::class);

Route::post('/write/generate', [ArticleGeneratorController::class, 'index']);

// CRUD Teachers
Route::resource('teachers', TeacherController::class);

// CRUD Students
Route::resource('students', StudentController::class);
