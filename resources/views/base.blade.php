<!DOCTYPE html>
<html class="@yield('body-class')">
<head>
    <title>{{ isset($pageTitle) ? $pageTitle . ' | ' : '' }}{{ setting('app-name') }}</title>

    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ baseUrl('/') }}">
    <meta name="theme-color" content="#F48024">
    <meta charset="utf-8">

    <link rel="dns-prefetch" href="https://secure.gravatar.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">

    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="https://unpkg.com/doctub@{{ $version }}/images/favicon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://unpkg.com/doctub@12.0.0/css/core-bundle.css">
    <link rel="stylesheet" media="print" href="https://unpkg.com/doctub@12.0.0/css/core-bundle-1.css">
    <link rel="stylesheet" href="https://unpkg.com/doctub@12.0.0/css/fa-doctub.css">

    <script src="https://unpkg.com/doctub@12.0.0/js/doctub@12.0.0-query.min.js"></script>
    <script src="https://unpkg.com/doctub@12.0.0/js/doctub@12.0.0-query-ui.min.js"></script>
    <script src="{{ baseUrl('/translations') }}"></script>

    @yield('head')

    @include('partials/custom-styles')

    @if(setting('app-custom-head') && \Route::currentRouteName() !== 'settings')
        <!-- Custom user content -->
        {!! setting('app-custom-head') !!}
        <!-- End custom user content -->
    @endif
</head>
<body class="@yield('body-class')" ng-app="bookStack">

    @include('partials/notifications')

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4" ng-non-bindable>
                    <a href="{{ baseUrl('/') }}" class="logo">
                        @if(setting('app-logo', '') !== 'none')
                            <img class="logo-image" src="https://unpkg.com/doctub@12.0.0/images/logo-250.png" alt="Logo">
                        @endif
                        @if (setting('app-name-header'))
                            <span class="logo-text"><b>Doc</b><i>Tub</i></span>
                        @endif
                    </a>
                </div>
                <div class="col-lg-4 col-sm-3 text-center">
                    <form action="{{ baseUrl('/search') }}" method="GET" class="search-box">
                        <input id="header-search-box-input" placeholder="Search in DocTub" type="text" name="term" tabindex="2" value="{{ isset($searchTerm) ? $searchTerm : '' }}">
                        <button id="header-search-box-button" type="submit" class="text-button"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="col-lg-4 col-sm-5">
                    <div class="float right">
                        <div class="links text-center">
                          <a href="{{ baseUrl('/books') }}" style="background:#8ECC4C;text-shadow:0 1px 1px rgba(0, 0, 0, 0.5)"><i class="fa fa-book"></i>{{ trans('entities.books') }}</a>
                            @if(!signedInUser())
                                <a href="{{ baseUrl('/register') }}" style="background:#f05330"><i class="fa fa-plus"></i>Sign Up</a>
                                <a href="{{ baseUrl('/login') }}" style="background:transparent;box-shadow:0 2px 2px transparent">{{ trans('auth.log_in') }}</a>
                            @endif
                            @if(signedInUser())
                                <a href="{{ baseUrl('/books/create') }}" style="background:#f05330"><i class="fa fa-plus"></i>Create</a>
                            @endif
                        </div>
                        @if(signedInUser())
                            @include('partials._header-dropdown', ['currentUser' => user()])
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="content" class="block">
        @yield('content')
    </section>
    <div id="back-to-top">
        <div class="inner">
            <i class="fa fa-chevron-up"></i> <span>{{ trans('common.back_to_top') }}</span>
        </div>
    </div>
@yield('bottom')
<script src="https://unpkg.com/doctub@12.0.0/js/js-bundle.js"></script>
@yield('scripts')
</body>
</html>
