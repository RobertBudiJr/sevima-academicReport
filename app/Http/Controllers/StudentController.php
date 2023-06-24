<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\Models\ClassModel;

class StudentController extends Controller
{
    // public function showLoginForm()
    // {
    //     return view('auth.student-login');
    // }

    // public function login(Request $request)
    // {
    //     // Validate the login request
    //     $credentials = $request->only('username', 'password');

    //     if (auth()->guard('student')->attempt($credentials)) {
    //         // Authentication successful
    //         return redirect()->intended('/dashboard');
    //     } else {
    //         // Authentication failed
    //         return redirect()->back()->with('status', 'Invalid credentials.');
    //     }
    // }

    // public function showRegistrationForm()
    // {
    //     $classes = ClassModel::all();

    //     return view('auth.student-register', compact('classes'));
    // }

    // public function register(Request $request)
    // {
    //     // Validate the registration request
    //     $validatedData = $request->validate([
    //         'student_name' => 'required|string|max:255',
    //         'id_class' => 'required|integer',
    //         'username' => 'required|string|unique:student_tb',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);

    //     // Create a new student record
    //     $student = Student::create([
    //         'student_name' => $validatedData['student_name'],
    //         'id_class' => $validatedData['id_class'],
    //         'username' => $validatedData['username'],
    //         'password' => bcrypt($validatedData['password']),
    //     ]);

    //     // Log in the newly registered student
    //     auth()->guard('student')->login($student);

    //     // Redirect to the student's dashboard or any other desired location
    //     return redirect('/dashboard');
    // }
    public function index()
{
    $students = StudentModel::all();
    return view('students.index', compact('students'));
}

public function create()
{
    return view('students.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'student_name' => 'required',
        'id_class' => 'required',
        'username' => 'required',
        'password' => 'required',
    ]);

    StudentModel::create($validatedData);

    return redirect()->route('students.index')->with('success', 'Student created successfully.');
}

public function show(StudentModel $student)
{
    return view('students.show', compact('student'));
}

public function edit(StudentModel $student)
{
    $classes = ClassModel::all();
    return view('students.edit', compact('student', 'classes'));
}

public function update(Request $request, StudentModel $student)
{
    $validatedData = $request->validate([
        'student_name' => 'required',
        'id_class' => 'required',
        'username' => 'required',
        'password' => 'required',
    ]);

    $teacher->update($validatedData);

    return redirect()->route('students.index')->with('success', 'Student updated successfully.');
}

public function destroy(StudentModel $teacher)
{
    $teacher->delete();

    return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
}
}
