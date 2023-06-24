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
}
