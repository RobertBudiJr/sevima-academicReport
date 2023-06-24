<!-- resources/views/teachers/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Teachers</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Create Teacher</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Class</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->id }}</td>
                    <td>{{ $teacher->teacher_name }}</td>
                    <td>{{ $teacher->class->class_name }}</td>
                    <td>{{ $teacher->username }}</td>
                    <td>
                        <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection