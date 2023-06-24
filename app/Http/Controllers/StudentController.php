<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\Models\ClassModel;
use App\Models\ArticleModel;
use App\Models\TeacherModel;
use Auth;

class StudentController extends Controller
{
    // Display the student login form
    public function showLoginForm()
    {
        return view('student-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('student')->attempt($credentials)) {
            // Retrieve the authenticated student
            $student = StudentModel::where('username', $credentials['username'])->first();

            // Store the student's name in the session
            $request->session()->put('student_name', $student->student_name);

            // Retrieve the class information for the student
            $class = $student->class; // Assuming 'class' is the relationship method in StudentModel

            // Store the class name in the session
            $request->session()->put('class_name', $class->class_name);

            // Retrieve all articles with the same id_class and their associated teachers
            $articles = ArticleModel::where('id_class', $class->id)
            ->with('teacher')
            ->get();

            // Store the articles in the session
            $request->session()->put('articles', $articles);

            // Student login successful
            return redirect()->intended('/student/dashboard')->with([
                'success' => 'Login successful!',
                'articles' => $articles, // Pass the articles as a parameter
            ]);
        }

        // Student login failed
        return redirect()->back()->with('error', 'Invalid credentials');
    }

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
