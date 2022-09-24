@extends('layouts.layout')

@section('title')
    @parent :: Login
@endsection
@section('header')
    @parent
@endsection

@section('content')


    <div class="container">

        <form action="{{ route('login') }}" class="mt-5" method="post">

            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"  name="email" placeholder="email" value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"  name="password" placeholder="password">
            </div>

            <button type="submit" class="btn-primary">Auth</button>
        </form>
    </div>

@endsection
