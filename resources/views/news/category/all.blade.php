@extends('layout.layout')

@section('menu')
    @include('news.menu')
@endsection

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Новости по категориям
        </h3>
        <div class="blog-post">
            @forelse($categories as $category)
                <p><a href="{{ route('news.category.bySlug', $category['slug']) }}">{{ $category['title'] }}</a></p>
            @empty
                <h2 class="blog-post-title">А что-то нет категорий то совсем</h2>
            @endforelse
        </div>
    </div>
@endsection
