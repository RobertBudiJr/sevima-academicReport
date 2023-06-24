<?php

namespace App\Http\Controllers;
use App\Models\StudentModel;
use App\Models\ClassModel;
use App\Models\ArticleModel;
use Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function dashboardStudent()
    {
        $student = StudentModel::find(Auth::id());

        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.');
        }

        $class = ClassModel::find($student->class_id);

        if (!$class) {
            return redirect()->back()->with('error', 'Class not found.');
        }

        $articles = ArticleModel::where('id_class', $class->id)->get();

        return view('student-dashboard', compact('student', 'class', 'articles'));
    }
}
