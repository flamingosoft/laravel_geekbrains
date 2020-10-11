@extends('layout.layout')

@section('menu')
    @include('news.menu')
@endsection

@section('content')
<h1>News One</h1>

<h2>{{ $new['title'] }}</h2>
<p>{{ $new['message'] }}</p>

@endsection
