<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeacherModel;
use App\Models\ClassModel;

class TeacherController extends Controller
{
    // public function showLoginForm()
    // {
    //     return view('auth.teacher-login');
    // }

    // public function login(Request $request)
    // {
    //     // Validate the login request
    //     $credentials = $request->only('username', 'password');

    //     if (auth()->guard('teacher')->attempt($credentials)) {
    //         // Authentication successful
    //         return redirect()->intended('/dashboard');
    //     } else {
    //         // Authentication failed
    //         return redirect()->back()->with('status', 'Invalid credentials.');
    //     }
    // }

    // public function showRegistrationForm()
    // {
    //     return view('auth.teacher-register');
    // }

    // public function register(Request $request)
    // {
    //     // Validate the registration request
    //     $validatedData = $request->validate([
    //         'teacher_name' => 'required|string|max:255',
    //         'id_class' => 'required|integer',
    //         'username' => 'required|string|unique:teacher_tb',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);

    //     // Create a new teacher record
    //     $teacher = Teacher::create([
    //         'teacher_name' => $validatedData['teacher_name'],
    //         'id_class' => $validatedData['id_class'],
    //         'username' => $validatedData['username'],
    //         'password' => bcrypt($validatedData['password']),
    //     ]);

    //     // Log in the newly registered teacher
    //     auth()->guard('teacher')->login($teacher);

    //     // Redirect to the teacher's dashboard or any other desired location
    //     return redirect('/dashboard');
    // }
    public function index()
{
    $teachers = TeacherModel::all();
    return view('teachers.index', compact('teachers'));
}

public function create()
{
    return view('teachers.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'teacher_name' => 'required',
        'id_class' => 'required',
        'username' => 'required',
        'password' => 'required',
    ]);

    TeacherModel::create($validatedData);

    return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
}

public function show(TeacherModel $teacher)
{
    return view('teachers.show', compact('teacher'));
}

public function edit(TeacherModel $teacher)
{
    $classes = ClassModel::all();
    return view('teachers.edit', compact('teacher', 'classes'));
}

public function update(Request $request, TeacherModel $teacher)
{
    $validatedData = $request->validate([
        'teacher_name' => 'required',
        'id_class' => 'required',
        'username' => 'required',
        'password' => 'required',
    ]);

    $teacher->update($validatedData);

    return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
}

public function destroy(TeacherModel $teacher)
{
    $teacher->delete();

    return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
}
}
