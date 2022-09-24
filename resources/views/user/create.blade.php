@extends('layouts.layout')

@section('title')
    @parent :: Register
@endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('register.store') }}" class="mt-5" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" placeholder="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input class="form-control" id="password"  name="password">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input class="form-control" id="password_confirmation"  name="password_confirmation">
            </div>

            <button type="submit" class="btn-primary">Register</button>
        </form>
    </div>

@endsection
