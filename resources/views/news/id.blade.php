@extends('layout.layout')

@section('menu')
    @include('news.menu')
@endsection

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Новость
        </h3>
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $new['title'] }}</h2>
            <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>
            <p>{{ $new['message'] }}</p>
        </div>
    </div>
@endsection
