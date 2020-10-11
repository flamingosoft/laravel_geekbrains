@extends('layout.layout')

@section('menu')
    @include('news.menu')
@endsection

@section('content')
    <h1>Новости по категориям</h1>
    @forelse($categories as $category)
        <li><a href="{{ route('news.category.bySlug', $category['slug']) }}">{{ $category['title'] }}</a></li>
    @empty
        А что-то нет категорий то совсем
    @endforelse
@endsection
