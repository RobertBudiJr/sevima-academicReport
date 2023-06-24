<!-- resources/views/classes/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Classes</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Class Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($classes as $class)
                <tr>
                    <td>{{ $class->class_name }}</td>
                    <td>
                        <a href="{{ route('classes.show', $class) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('classes.edit', $class) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('classes.destroy', $class) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No classes found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('classes.create') }}" class="btn btn-success">Create Class</a>
@endsection