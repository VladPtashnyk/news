<li class="nav-item">
    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('main.home_admin')</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.allUsers') }}" class="nav-link {{ Request::is('allUsers') ? 'active' : '' }}">
        <i class="nav-icon fas fa-id-badge"></i>
        <p>@lang('main.all_users')</p>
    </a>
</li>
