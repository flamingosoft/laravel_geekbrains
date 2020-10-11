@extends('layout.layout')

@section('menu')
    @include('menu')
@endsection

@section('content')

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <h1>Vue!</h1>
            </div>

            <div id="app" class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <example-component></example-component>
            </div>

@endsection
