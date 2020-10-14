@extends('layout.layout')

@section('menu')
    @include("admin.menu")
@endsection

@section('content')

    <div class="col-md-6 blog-main offset-3">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ __('Админка: добавление новости') }}
        </h3>

        <div class="blog-post">

            <form name="addNews" method="POST" action="{{ url()->current() }}">
                @csrf
                <div class="form-group">
                    <label for="title">Заголовок новости</label>
                    <input type="text" class="form-control" id="title" placeholder="Заголовок новости">
                </div>
                @if($categories)
                    <div class="form-group">
                        <label for="category">Категория</label>
                        <select class="form-control" id="category">
                            @foreach($categories as $category)
                                <option value="{{ $category['slug'] }}">{{ $category['title'] }}</option>
                            @endforeach
                            <option value="[new]">--Новая категория--</option>
                        </select>
                    </div>
                @endif
                <div class="form-group">
                    <label for="message">Описание новости</label>
                    <textarea class="form-control" id="message" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="{{ __('Создать новость') }}">
                </div>
            </form>
        </div>
@endsection
