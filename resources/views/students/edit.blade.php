<!-- resources/views/students/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Student</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="student_name">Student Name</label>
            <input type="text" name="student_name" id="student_name" class="form-control" value="{{ $student->student_name }}">
        </div>
        <div class="form-group">
            <label for="id_class">Class</label>
            <select name="id_class" id="id_class" class="form-control">
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}" {{ $class->id === $student->id_class ? 'selected' : '' }}>{{ $class->class_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ $student->username }}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection