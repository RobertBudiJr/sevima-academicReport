<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\Models\ClassModel;

class StudentController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.student-login');
    }

    public function login(Request $request)
    {
        // Validate the login request
        $credentials = $request->only('username', 'password');

        if (auth()->guard('student')->attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('/dashboard');
        } else {
            // Authentication failed
            return redirect()->back()->with('status', 'Invalid credentials.');
        }
    }

    public function showRegistrationForm()
    {
        $classes = ClassModel::all();

        return view('auth.student-register', compact('classes'));
    }

    public function register(Request $request)
    {
        // Validate the registration request
        $validatedData = $request->validate([
            'student_name' => 'required|string|max:255',
            'id_class' => 'required|integer',
            'username' => 'required|string|unique:student_tb',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new student record
        $student = Student::create([
            'student_name' => $validatedData['student_name'],
            'id_class' => $validatedData['id_class'],
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Log in the newly registered student
        auth()->guard('student')->login($student);

        // Redirect to the student's dashboard or any other desired location
        return redirect('/dashboard');
    }
}
