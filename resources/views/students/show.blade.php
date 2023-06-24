<!-- resources/views/students/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Student Details</h1>

    <div>
        <p><strong>Student Name:</strong> {{ $student->student_name }}</p>
        <p><strong>Class:</strong> {{ $student->class->class_name }}</p>
        <p><strong>Username:</strong> {{ $student->username }}</p>
    </div>

    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>

    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
@endsection