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

                <div class="ml-auto mt-3">
                    <a href="{{ route('user.showLogin') }}" class="btn btn-primary btn-block">@lang('appHome.login')</a>
                </div>
            </nav>

            @include('layouts.sidebar')

            <div class="content-wrapper">
                @yield('content')
            </div>

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>@lang('appHome.version')</b> 3.1.0
                </div>
                <strong>Copyright &copy; 2014-2023 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
                reserved.
            </footer>
        </div>
    </body>
</x-laravel-ui-adminlte::adminlte-layout>
