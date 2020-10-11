@extends('layout.layout')

@section('menu')
    @include('news.menu')
@endsection

@section('content')
<h1>News by {{ $category['title'] }}</h1>

<ul>
    @forelse ($news as $newId => $new)
    <li><a href="{{ route("news.byId", $newId) }}">{{ $new["title"] }}</a></li>
    @empty
        <li>Нет новостей в данной рубрике</li>
    @endforelse
</ul>
@endsection
