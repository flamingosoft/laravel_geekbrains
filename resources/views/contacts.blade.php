@extends('layout.layout')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="col-md-6 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">{{ __('Контакты') }} </h2>
            <h3>e-mail</h3>
            <p>alexander.khayev@gmail.com</p>
            <h3>Telegram</h3>
            <p>@old_relaxman</p>
            <p>notes</p>        </div>
    </div>
@endsection
