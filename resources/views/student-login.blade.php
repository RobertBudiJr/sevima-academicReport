@extends('layouts.app')

@section('content')
    <div class="container justify-content-center align-items-center">
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Student Login') }}</div>
                        <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('student.login') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Username" aria-label="Student's username" aria-describedby="basic-addon" name="username">
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" aria-label="Student's password" aria-describedby="basic-addon2" name="username">
                            </div>
                            <button class="btn btn-primary" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection