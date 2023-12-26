<li class="nav-item">
    <a href="{{ route('user.dashboard') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('menu.home')</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('user.myNews', session()->has('user') ? session('user')['id'] : '') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-id-badge"></i>
        <p>@lang('menu.my_news')</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('user.createNews') }}" class="nav-link {{ Request::is('createNews') ? 'active' : '' }}">
        <i class="nav-icon fas fa-pencil-alt"></i>
        <p>@lang('menu.create_news')</p>
    </a>
</li>
