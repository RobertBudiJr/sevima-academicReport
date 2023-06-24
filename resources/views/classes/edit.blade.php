<!-- resources/views/classes/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Class</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('classes.update', $class) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="class_name">Class Name</label>
            <input type="text" name="class_name" id="class_name" class="form-control" value="{{ old('class_name', $class->class_name) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection