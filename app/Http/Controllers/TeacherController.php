<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeacherModel;
use App\Models\ClassModel;
use Auth;

class TeacherController extends Controller
{
    // Display the teacher login form
    public function showLoginForm()
    {
        return view('teacher-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('teacher')->attempt($credentials)) {
            // Retrieve the authenticated teacher
            $teacher = TeacherModel::where('username', $credentials['username'])->first();

            // Store the teacher's name in the session
            $request->session()->put('teacher_name', $teacher->teacher_name);

            // Teacher login successful
            return redirect()->intended('/teacher/dashboard')->with('success', 'Login successful!');
        }

        // Teacher login failed
        return redirect()->back()->with('error', 'Invalid credentials');
    }

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
