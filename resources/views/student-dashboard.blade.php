@extends('layouts.app')

@section('content')
    <header class="mt-5 mb-4">
        <h1>Welcome, {{ session('student_name') }}</h1>
        <h4>Class {{ session('class_name') }} student</h4>
    </header>

    <div class="row">
        @foreach ($articles as $article)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->content }}</p>
                        <p class="card-text">Teacher: {{ $article->teacher_name }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <a href="{{ route('logout') }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    </form>
    <!-- Rest of the content -->
@endsection