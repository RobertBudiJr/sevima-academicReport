@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <h3>Welcome to the Dashboard!</h3>
                        @if(auth()->check())
                            <p>Logged in as:
                                @if(auth()->user()->student)
                                    {{ auth()->user()->student->student_name }} (Student)
                                @elseif(auth()->user()->teacher)
                                    {{ auth()->user()->teacher->teacher_name }} (Teacher)
                                @endif
                            </p>
                        @else
                            <p>Guest User</p>
                        @endif

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection