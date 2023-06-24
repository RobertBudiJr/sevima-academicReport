<!-- resources/views/teachers/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Teacher Details</h1>

    <div>
        <p><strong>Teacher Name:</strong> {{ $teacher->teacher_name }}</p>
        <p><strong>Class:</strong> {{ $teacher->class->class_name }}</p>
        <p><strong>Username:</strong> {{ $teacher->username }}</p>
    </div>

    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-primary">Edit</a>

    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
@endsection