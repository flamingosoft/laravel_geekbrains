@extends('layout.layout')

@section('menu')
    @include('menu')
@endsection

@section('content')

    <div class="col-md-6 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">{{ __('Vue!') }} </h2>
        </div>

        <div class="blog-post">
            <example-component></example-component>
        </div>
    </div>
@endsection
