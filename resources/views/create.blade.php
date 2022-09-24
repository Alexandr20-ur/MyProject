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
            <input type="text" class="form-control" id="title" placeholder="Title" name="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" rows="5" name="content" placeholder="Content"></textarea>
        </div>
        
        <div class="mb-3">
            <label for="rubric_id">Rubric</label>
            <select class="form-select" aria-label="Rubric" name="rubric_id", id="rubric_id">
                <option>Select Rubric</option>
                @foreach ($rubrics as $k => $v)
                        <option value="{{ $k }}">{{ $v }}</option>            
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn-primary">Submit</button>
    </form>
</div>

@endsection