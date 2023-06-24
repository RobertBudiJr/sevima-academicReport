<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherModel;

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
            return redirect()->back()->withErrors(['Invalid credentials']);
        }
    }
}
