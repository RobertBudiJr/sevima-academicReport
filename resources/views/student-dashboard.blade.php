@extends('layouts.app')

@section('content')
    <header class="mt-5 mb-4">
        <h1>Welcome, {{ session('student_name') }}</h1>
        <h4>Class {{ session('class_name') }} student</h4>
    </header>
    
    <a href="{{ route('logout') }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    </form>
    <!-- Rest of the content -->
@endsection