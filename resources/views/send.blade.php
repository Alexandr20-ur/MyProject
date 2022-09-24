@extends('layouts.layout')

@section('title')
    @parent:: SendMail
@endsection
@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="alert alert-success">
            Письмо отправлено
        </div>
    </div>
@endsection
