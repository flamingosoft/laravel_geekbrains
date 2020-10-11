@extends('layout.layout')

@section('menu')
    @include('news.menu')
@endsection

@section('content')

    <h1>News All</h1>

    @if($categories)
        <h2>news by categories</h2>
        <ul>
        @foreach ($categories as $key => $category)
            <li><a href=" {{ route('news.category.bySlug', $category['slug'] ) }} ">{{ $category['title'] }}</a></li>
        @endforeach
        </ul>
    @endif

    @if($news)
    <h2>news by articles</h2>

    @foreach ($news as $key => $newsItem)
        <p><a href="{{ route("news.byId", $key) }}">{{ $newsItem['title'] }}</a></p>
    @endforeach

    @else
        <h2>Пока у нас нет новостей :(</h2>
    @endif

@endsection
