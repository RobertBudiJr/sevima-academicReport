<!-- resources/views/classes/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Class Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Class Name</h5>
            <p class="card-text">{{ $class->class_name }}</p>
        </div>
    </div>

    <a href="{{ route('classes.edit', $class) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('classes.destroy', $class) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
@endsection