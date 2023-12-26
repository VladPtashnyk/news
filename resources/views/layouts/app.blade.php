<x-laravel-ui-adminlte::adminlte-layout>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <a href="{{ route('locale.change', __('main.set_lang')) }}">@lang('main.set_lang')</a>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                                class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">
                                @if (session()->has('admin'))
                                    {{ session('admin')['name'] }}
                                @endif
                                @if (session()->has('user'))
                                    {{ session('user')['name'] }}
                                @endif
                            </span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <li class="user-header bg-primary">
                                <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                                    class="img-circle elevation-2" alt="User Image">
                                <p>
                                    @if (session()->has('admin'))
                                        {{ session('admin')['name'] }}
                                    @endif
                                    @if (session()->has('user'))
                                        {{ session('user')['name'] }}
                                    @endif
                                </p>
                            </li>
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">@lang('app.profile')</a>
                                <a href="#" class="btn btn-default btn-flat float-right"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    @lang('app.sign_out')
                                </a>
                                <form id="logout-form" action="
                                    @if (session()->has('admin'))
                                        {{ route('admin.logout') }}
                                    @endif
                                    @if (session()->has('user'))
                                        {{ route('user.logout') }}
                                    @endif
                                " method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            @include('layouts.sidebar')

            <div class="content-wrapper">
                @yield('content')
            </div>

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>@lang('app.version')</b> 3.1.0
                </div>
                <strong>Copyright &copy; 2014-2023 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
                reserved.
            </footer>
        </div>
    </body>
</x-laravel-ui-adminlte::adminlte-layout>
