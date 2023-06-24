<!-- resources/views/students/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Students</h1>

    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Create Student</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->student_name }}</td>
                <td>{{ $student->class->class_name }}</td>
                <td>{{ $student->username }}</td>
                <td>
                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-success">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection