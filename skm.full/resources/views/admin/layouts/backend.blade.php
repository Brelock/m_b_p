<!doctype html>
<html lang="{{ config('app.locale') }}" class="no-focus">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>SKM</title>

    <meta name="description" content="skm">
    <meta name="author" content="zengineers company">
    <meta name="robots" content="noindex, nofollow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

    <!-- Fonts and Styles -->
    @yield('css_before')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
    <link rel="stylesheet" id="css-main" href="{{ asset('/css/admin/codebase.css') }}">
    <link rel="stylesheet" href="/css/main.min.css">
    <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
<!-- <link rel="stylesheet" id="css-theme" href="{{ asset('/css/admin/themes/corporate.css') }}"> -->
@yield('css_after')

<!-- Scripts -->
    <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
</head>
<body>
<div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">

    <!-- Sidebar -->
    <nav id="sidebar">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="content-header content-header-fullrow px-15">
                <!-- Mini Mode -->
                <div class="content-header-section sidebar-mini-visible-b">
                    <!-- Logo -->
                    <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                            </span>
                    <!-- END Logo -->
                </div>
                <!-- END Mini Mode -->

                <!-- Normal Mode -->
                <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <!-- END Close Sidebar -->

                    <!-- Logo -->
                    <div class="content-header-item">
                        <a class="link-effect font-w700" href="{{ route('admin.admin') }}">
                            <i class="si si-fire text-primary"></i>
                            <span class="font-size-xl text-dual-primary-dark">SKM </span><span class="font-size-xl text-primary">Мебель</span>
                        </a>
                    </div>
                    <!-- END Logo -->
                </div>
                <!-- END Normal Mode -->
            </div>
            <!-- END Side Header -->

            <!-- Side User -->
            <div class="content-side content-side-full content-side-user px-10 align-parent">
                <!-- Visible only in mini mode -->
                <div class="sidebar-mini-visible-b align-v animated fadeIn">
                    <img class="img-avatar img-avatar32" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
                </div>
                <!-- END Visible only in mini mode -->

                <!-- Visible only in normal mode -->
                <div class="sidebar-mini-hidden-b text-center">
                    <a class="img-link" href="javascript:void(0)">
                        <img class="img-avatar" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
                    </a>
                    <ul class="list-inline mt-10">
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="javascript:void(0)">{{ auth()->user()->name }}</a>
                        </li>
                        <li class="list-inline-item">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                                <i class="si si-drop"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="si si-logout"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- END Visible only in normal mode -->
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li>
                        <a href="{{ route('admin.categories.index') }}" class="{{ Route::is('admin.categories.index') ? ' active' : '' }}">
                            <i class="fa fa-list-alt"></i><span class="sidebar-mini-hide">Категории товаров</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.subcategories.index') }}" class="{{ Route::is('admin.subcategories.index') ? ' active' : '' }}">
                            <i class="fa fa-list" aria-hidden="true"></i><span class="sidebar-mini-hide">Подкатегории товаров</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.index') }}" class="{{ Route::is('admin.products.index') ? ' active' : '' }}">
                            <i class="fa fa fa-shopping-bag"></i><span class="sidebar-mini-hide">Товары</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-users"></i><span class="sidebar-mini-hide">Пользователи</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.brands.index') }}">
                            <i class="fa fa-copyright"></i><span class="sidebar-mini-hide">Бренды</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.slides.index') }}">
                            <i class="fa fa-film"></i><span class="sidebar-mini-hide">Слайдер</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.shops.index') }}">
                            <i class="fa fa-archive"></i><span class="sidebar-mini-hide">Склады</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::is('admin.static-pages.index') ? ' active' : '' }}" href="{{ route('admin.static-pages.index') }}">
                            <i class="fa fa-file"></i><span class="sidebar-mini-hide">Статические страницы</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::is('admin.contact.index') ? ' active' : '' }}" href="{{ route('admin.contact.index') }}">
                            <i class="fa fa-envelope"></i><span class="sidebar-mini-hide">Заявки</span>
                        </a>
                    </li>

                    <li>
                        <div class="m-2 p-2"></div>
                    </li>
                    <li>
                        <a href="{{ route('main') }}" class="{{ Route::is('main') ? ' active' : '' }}" target="_blank">
                            <i class="fa fa-share"></i><span class="sidebar-mini-hide">На сайт</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- Sidebar Content -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">

    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
        @yield('content')
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="opacity-0">
        <div class="content py-20 font-size-xs clearfix">
            <div class="float-right">
                Сделано с <i class="fa fa-heart text-pulse"></i> {{--by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">Zengineers Company</a>--}}
            </div>
            <div class="float-left">
                <a href="https://zengineers.company/"><span>Zengineers Company</span></a> &copy; <span class="js-year-copy"></span>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- Codebase Core JS -->
<script src="{{ asset('/js/admin/codebase.app.js') }}"></script>

<!-- Laravel Scaffolding JS -->
<script src="{{ asset('/js/admin/laravel.app.js') }}"></script>

<script src="{{ asset('/js/admin/delete_approved.js') }}"></script>

@yield('js_after')
</body>
</html>
