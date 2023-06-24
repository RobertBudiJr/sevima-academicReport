<!-- resources/views/students/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Create Student</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="student_name">Student Name</label>
            <input type="text" name="student_name" id="student_name" class="form-control" value="{{ old('student_name') }}">
        </div>
        <div class="form-group">
            <label for="id_class">Class</label>
            <select name="id_class" id="id_class" class="form-control">
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection