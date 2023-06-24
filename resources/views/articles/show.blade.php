<!-- resources/views/articles/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Article Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Teacher</h5>
            <p class="card-text">{{ $article->teacher->teacher_name }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Class</h5>
            <p class="card-text">{{ $article->class->class_name }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Title</h5>
            <p class="card-text">{{ $article->title }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Content</h5>
            <p class="card-text">{{ $article->content }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Published At</h5>
            <p class="card-text">{{ $article->published_at }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Subject</h5>
            <p class="card-text">{{ $article->subject }}</p>
        </div>
    </div>

    <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
@endsection