<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;

class StudentLoginController extends Controller
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
}
