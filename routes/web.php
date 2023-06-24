<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ArticleController;

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

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// Routes for student login
Route::get('/login/student', [StudennController::class, 'showLoginForm'])->name('student.login');
Route::post('/login/student', [StudentController::class, 'login'])->name('student.login.submit');

// Routes for teacher login
Route::get('/login/teacher', [TeacherController::class, 'showLoginForm'])->name('teacher.login');
Route::post('/login/teacher', [TeacherController::class, 'login'])->name('teacher.login.submit');

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

// CRUD Teachers
Route::resource('teachers', TeacherController::class);
