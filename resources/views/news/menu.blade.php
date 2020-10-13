<a class="nav-link {{ (request()->routeIs('home'))?'active':'' }}"
   href='{{ route('home') }}'>{{ __('Главная') }}</a>
<a class="nav-link {{ (request()->routeIs('news.one'))?'active':'' }}"
   href="{{ route('news.home') }}">{{ __('Новости') }}</a>
<a class="nav-link {{ (request()->routeIs('news.category.home'))?'active':'' }}"
   href="{{ route('news.category.home') }}">{{ __('Все категории') }}</a>
<a class="p-2 text-muted" href="{{ route('about') }}">{{ __('О нас') }}</a>
<a class="p-2 text-muted" href="{{ route('contacts') }}">{{ __('Контакты') }}</a>
<a class="p-2 text-muted" href="{{ route('vue') }}">{{ __('Вьюха') }}</a>

<!--<a href="--><?php //=route('news.category', ['categoryId'
// <li><a href={{ route('news.category.home }}=>Все категории> 'test'])?><!--">Новости по категориям</a>-->

