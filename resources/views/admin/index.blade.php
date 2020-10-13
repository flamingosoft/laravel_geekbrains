@extends('layout.layout')

@section('menu')
    @include("admin.menu")
@endsection

@section('content')
    <div class="col-md-6 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">{{ __('Админка') }} </h2>
        </div>
    </div>
@endsection
