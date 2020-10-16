
<li class="nav-item"><a class="nav-link {{ request()->routeIs('home')?'active':'' }}" href="{{ route('home') }}">{{ __('Главная') }}</a></li>
<li class="nav-item"><a class="nav-link {{ request()->routeIs('news')?'active':'' }}" href="{{ route('news.home') }}">{{ __('Новости') }}</a></li>

<li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.home')?'active':'' }}" href="{{ route('admin.home') }}">{{ __('Админка') }}</a></li>
<li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.addNews')?'active':'' }}" href="{{ route('admin.addNews') }}">{{ __('Добавить новость') }}</a></li>
<li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.getNews')?'active':'' }}" href="{{ route('admin.getNews') }}">{{ __('Скачать новости') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Залогиниться') }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Зарегаться') }}</a></li>
