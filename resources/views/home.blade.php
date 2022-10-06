@extends('layouts.layout')

@section('title')
    @parent:: {{ $title }}
@endsection
@section('header')
    @parent
@endsection

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1>{{ $title }}</h1>
        </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($posts as $post)

                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{ asset('/public/storage/'. $post->thumbnail) }}" alt="" style="max-width: 419px; max-height: 248px;">

                        <div class="card-body">
                            <h5 class="card_title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            <small class="text-muted">
                                {{ $post->getPostDate() }}
                            </small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-md-10">
                    {{ $posts->onEachSide(2)->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
