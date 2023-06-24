@extends('layouts.app')

@section('content')
    <header>
        <h1>Welcome, {{ session('teacher_name') }}</h1>
    </header>

    <!-- Rest of the content -->
@endsection