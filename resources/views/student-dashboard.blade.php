@extends('layouts.app')

@section('content')
    <header>
        <h1>Welcome, {{ session('student_name') }}</h1>
    </header>

    <!-- Rest of the content -->
@endsection