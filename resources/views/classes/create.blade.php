<!-- resources/views/classes/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Create Class</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('classes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="class_name">Class Name</label>
            <input type="text" name="class_name" id="class_name" class="form-control" value="{{ old('class_name') }}">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection