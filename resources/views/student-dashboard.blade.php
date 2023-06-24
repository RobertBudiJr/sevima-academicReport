@extends('layouts.app')

@section('content')
    <header>
        <h1>Welcome, {{ session('student_name') }}</h1>
        <h2>{{ session('class_name') }}</h2>
    </header>
    <div class="row">
        @foreach ($articles as $article)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        {{ $article->title }}
                    </div>
                    <div class="card-body">
                        {{ $article->content }}
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{ $article->subject }}</small>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Teacher: {{ $article->teacher->teacher_name }}</small>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Published at: {{ $article->published_at }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Rest of the content -->
@endsection