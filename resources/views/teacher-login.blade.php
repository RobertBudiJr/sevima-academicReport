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
                            <input type="text" name="username" placeholder="Username">
                            <input type="password" name="password" placeholder="Password">
                            <button type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection