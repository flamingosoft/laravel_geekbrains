@extends('layout.layout')

@section('menu')
    @include("admin.menu")
@endsection

@section('content')

    <h1>Админка: добавление новости</h1>


    <form>
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
    </form>

@endsection
