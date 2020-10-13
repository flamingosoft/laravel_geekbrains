@extends('layout.layout')

@section('menu')
    @include('news.menu')
@endsection

@section('content')
    <div class=" blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">Новости по категории '{{ $category['title'] }}'</h2>

            <ul>
                @forelse ($news as $newId => $new)
                    <li><a href="{{ route("news.byId", $newId) }}">{{ $new["title"] }}</a></li>
                @empty
                    <li class="blog-post-title">Нет новостей в данной рубрике</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
