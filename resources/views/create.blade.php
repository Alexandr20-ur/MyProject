@extends('layouts.layout')

@section('title')
    @parent :: {{ $title }}
@endsection
@section('header')
    @parent
@endsection

@section('content')
<div class="container">
    <form action="{{ route('posts.store') }}" class="mt-5" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" name="title" value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="5" name="content" placeholder="Content">{{ old('content') }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="rubric_id">Rubric</label>
            <select class="form-select @error('rubric_id') is-invalid @enderror" aria-label="Rubric" name="rubric_id", id="rubric_id">
                <option>Select Rubric</option>
                @foreach ($rubrics as $k => $v)
                        <option value="{{ $k }}"
                        @if(old('rubric_id') == $k) selected @endif
                        >{{ $v }}</option>
                @endforeach
            </select>
            @error('rubric_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn-primary">Submit</button>
    </form>
</div>

@endsection
