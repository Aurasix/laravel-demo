<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" type="image/ico" href="{{ asset('impulse-favicon.png') }}" />

    <title>@yield('title')</title>

    {!! Html::style('assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('assets/css/main.css') !!}
    {!! Html::style('assets/css/custom.css') !!}

    @yield('styles')

</head>
<body class="with-side-menu control-panel control-panel-compact">

<header class="site-header">
    <div class="container-fluid">
        <a href="{{ route('dashboard') }}" class="site-logo">
            <img class="hidden-md-down" src="{{ asset('assets/img/logo-2.png') }}" alt="">
            <img class="hidden-lg-up" src="{{ asset('assets/img/logo-2-mob.png') }}" alt="">
        </a>
        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>
        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">
                    <div class="dropdown dropdown-lang">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="flag-icon flag-icon-{{ App\Models\Language::where('language', App::getLocale())->first()->country }}"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-col">
                            @foreach(App\Models\Language::orderBy('name', 'asc')->get() as $key => $language)
                                <a class="dropdown-item{{ $language->language == App::getLocale()? ' current' : '' }}" href="{{ action('TranslationController@getTranslate', $language->language) }}"><span class="flag-icon flag-icon-{{ $language->country }}"></span>{{ $language->name }}</a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="dropdown user-menu">
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{!! Auth::user()->getRealPhoto() !!}" alt="">
                            {{ Auth::user()->getFullname() }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <a class="dropdown-item" href="{{ route('admin.profile.index') }}"><span class="font-icon glyphicon glyphicon-user"></span>{{ trans('profile.title.index') }}</a>
                            <a class="dropdown-item" href="{{ route('admin.settings.index') }}"><span class="font-icon glyphicon glyphicon-cog"></span>{{ trans('settings.title.index') }}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('logout') }}"><span class="font-icon glyphicon glyphicon-log-out"></span>{{ trans('auth.logout') }}</a>
                        </div>
                    </div>
                    <button type="button" class="burger-right">
                        <i class="font-icon-menu-addl"></i>
                    </button>
                </div><!--.site-header-shown-->
            </div><!--site-header-content-in-->
        </div><!--.site-header-content-->
    </div><!--.container-fluid-->
</header><!--.site-header-->

<div class="mobile-menu-left-overlay"></div>

<nav class="side-menu">
    {{--*/ $route = Request::segment(2) /*--}}
    <ul class="side-menu-list">
        <li class="blue">
            <a href="{{ route('dashboard') }}">
                <i class="fa fa-home"></i>
                <span class="lbl">{{ trans('common.modules.home') }}</span>
            </a>
        </li>
        <li class="red with-sub{{ $route == 'articles' || $route == 'categories' || $route == 'pages' || $route == 'menus' ? ' opened' : '' }}">
            <span>
                <span class="fa fa-book"></span>
                <span class="lbl">CMS</span>
            </span>
            <ul>
                <li><a href="{{ route('admin.articles.index') }}"><span class="lbl">{{ trans('articles.title.index') }}</span></a></li>
                <li><a href="{{ route('admin.categories.index') }}"><span class="lbl">{{ trans('categories.title.index') }}</span></a></li>
                <li><a href="{{ route('admin.pages.index') }}"><span class="lbl">{{ trans('pages.title.index') }}</span></a></li>
                <li><a href="{{ route('admin.menus.index') }}"><span class="lbl">{{ trans('menus.title.index') }}</span></a></li>
            </ul>
        </li>
        <li class="gold with-sub{{ $route == 'contact-messages' ? ' opened' : '' }}">
            <span>
                <i class="font-icon font-icon-mail"></i>
                <span class="lbl">{{ trans('contact-messages.title.index') }}</span>
            </span>
            <ul>
                <li><a href="{{ route('admin.contact-messages.index') }}"><span class="lbl">{{ trans('common.button.viewAll') }}</span></a></li>
                <li><a href="{{ route('admin.contact-messages.create') }}"><span class="lbl">{{ trans('common.button.add') }}</span></a></li>
            </ul>
        </li>
        <li class="green with-sub{{ $route == 'users' ? ' opened' : '' }}">
                <span>
                    <i class="font-icon font-icon-users"></i>
                    <span class="lbl">{{ trans('users.title.index') }}</span>
                </span>
            <ul>
                <li><a href="{{ route('admin.users.index') }}"><span class="lbl">{{ trans('common.button.viewAll') }}</span></a></li>
                <li><a href="{{ route('admin.users.create') }}"><span class="lbl">{{ trans('common.button.add') }}</span></a></li>
            </ul>
        </li>
        <li class="purple with-sub{{ $route == 'settings' || $route == 'password-resets' || $route == 'sessions' || $route == 'translations' ? ' opened' : '' }}">
            <span>
                <span class="fa fa-hdd-o"></span>
                <span class="lbl">{{ trans('common.modules.management') }}</span>
            </span>
            <ul>
                <li><a href="{{ route('admin.settings.index') }}"><span class="lbl">{{ trans('settings.title.index') }}</span></a></li>
                <li><a href="{{ route('admin.password-resets.index') }}"><span class="lbl">{{ trans('password-resets.title.index') }}</span></a></li>
                <li><a href="{{ route('admin.sessions.index') }}"><span class="lbl">{{ trans('sessions.title.index') }}</span></a></li>
                <li><a href="{{ action('TranslationController@getIndex') }}"><span class="lbl">{{ trans('translations.title.index') }}</span></a></li>
            </ul>
        </li>
    </ul>

</nav><!--.side-menu-->

<div class="page-content">

    @yield('content')

</div><!--.page-content-->

    {!! Html::script('assets/js/lib/jquery/jquery.min.js') !!}
    {!! Html::script('assets/js/lib/tether/tether.min.js') !!}
    {!! Html::script('assets/plugins/bootstrap/js/bootstrap.js') !!}
    {!! Html::script('assets/js/plugins.js') !!}

    <script>
        var globalCSRF = '{!! csrf_token() !!}';
        var globalUrlRemovePhoto = '{!! route('admin.users.removePhoto') !!}';
    </script>

    @yield('scripts')

    {!! Html::script('assets/js/app.js') !!}

</body>
</html>
