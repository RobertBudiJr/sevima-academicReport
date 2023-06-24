<!-- resources/views/articles/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Articles</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Teacher</th>
                <th>Class</th>
                <th>Title</th>
                <th>Content</th>
                <th>Published At</th>
                <th>Subject</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $article)
                <tr>
                    <td>{{ $article->teacher->teacher_name }}</td>
                    <td>{{ $article->class->class_name }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->content }}</td>
                    <td>{{ $article->published_at }}</td>
                    <td>{{ $article->subject }}</td>
                    <td>
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No articles found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('articles.create') }}" class="btn btn-success">Create Article</a>
@endsection