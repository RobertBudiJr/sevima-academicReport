@extends('layouts.app')

@section('content')
    <header class="mt-5 mb-4">
        <h1>Welcome, {{ session('teacher_name') }}</h1>
        <h4>Teacher</h4>
    </header>

    <div class="row mb-3">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Student</h5>
                <p class="card-text">Manage student data.</p>
                <a href="/students" class="btn btn-primary">Manage Student</a>
            </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Teacher</h5>
                <p class="card-text">Manage teacher data</p>
                <a href="/teachers" class="btn btn-primary">Manage Teacher</a>
            </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Article</h5>
                <p class="card-text">Manage article data for students.</p>
                <a href="/articles" class="btn btn-primary">Manage Article</a>
            </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Class</h5>
                <p class="card-text">Manage class data</p>
                <a href="/classes" class="btn btn-primary">Manage Class</a>
            </div>
            </div>
        </div>
    </div>

    <a href="{{ route('logout') }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    </form>
    <!-- Rest of the content -->
@endsection