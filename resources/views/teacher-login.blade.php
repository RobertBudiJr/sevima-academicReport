@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Teacher Login') }}</div>

                    <div class="card-body">
                    @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('teacher.login') }}">
                            @csrf
                            <input type="text" class="form-control mb-3" placeholder="Username" name="username">
                            <input type="password" class="form-control mb-3" placeholder="Password" name="password">
                            <button class="btn btn-primary mb-3" type="submit">Login</button>
                        </form>

                        <a href="{{ route('student.login') }}">Log In as Student</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection