<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeacherModel;
use App\Models\ClassModel;

class TeacherLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.teacher-login');
    }

    public function login(Request $request)
    {
        // Validate the login request
        $credentials = $request->only('username', 'password');

        if (auth()->guard('teacher')->attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('/dashboard');
        } else {
            // Authentication failed
            return redirect()->back()->with('status', 'Invalid credentials.');
        }
    }

    public function showRegistrationForm()
    {
        return view('auth.teacher-register');
    }

    public function register(Request $request)
    {
        // Validate the registration request
        $validatedData = $request->validate([
            'teacher_name' => 'required|string|max:255',
            'id_class' => 'required|integer',
            'username' => 'required|string|unique:teacher_tb',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new teacher record
        $teacher = Teacher::create([
            'teacher_name' => $validatedData['teacher_name'],
            'id_class' => $validatedData['id_class'],
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Log in the newly registered teacher
        auth()->guard('teacher')->login($teacher);

        // Redirect to the teacher's dashboard or any other desired location
        return redirect('/dashboard');
    }
}
