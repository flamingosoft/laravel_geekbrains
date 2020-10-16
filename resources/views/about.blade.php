@extends('layout.layout')

@section('title', 'About Us')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="col-md-6 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">{{ __('geekbrains laravel course') }} </h2>
            <h4>student: Alexander Khayev</h4>
        </div>
    </div>
@endsection
