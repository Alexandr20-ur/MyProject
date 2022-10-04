@extends('layouts.layout')

@section('title')
    @parent :: Registration
@endsection
@section('header')
    @parent
@endsection

@section('content')


    <div class="container">

        <form action="{{ route('register.store') }}" class="mt-5" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
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

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation"  name="password_confirmation" placeholder="password_confirmation">
            </div>

            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" class="form-control-file"  id="avatar"  name="avatar">
            </div>

            <button type="submit" class="btn-primary">Регистрация</button>
        </form>
    </div>

@endsection
