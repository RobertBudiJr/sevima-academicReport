<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentLoginController;
use App\Http\Controllers\TeacherLoginController;

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

// Routes for student login
Route::get('/login/student', [StudentLoginController::class, 'showLoginForm'])->name('student.login');
Route::post('/login/student', [StudentLoginController::class, 'login'])->name('student.login.submit');

// Routes for teacher login
Route::get('/login/teacher', [TeacherLoginController::class, 'showLoginForm'])->name('teacher.login');
Route::post('/login/teacher', [TeacherLoginController::class, 'login'])->name('teacher.login.submit');
