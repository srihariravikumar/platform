<!DOCTYPE html>
<html class="@yield('body-class')">
<head>
    <title>{{ isset($pageTitle) ? $pageTitle . ' | ' : '' }}{{ setting('app-name') }}</title>

    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ baseUrl('/') }}">
    <meta charset="utf-8">

    <link rel="dns-prefetch" href="https://friendstub.com">
    <link rel="prefetch" href="/css/styles.css">
    <link rel="prefetch" href="/libs/jquery/jquery.min.js?version=2.1.4">
    <link rel="prefetch" href="/libs/jquery/jquery-ui.min.js?version=1.11.4">
    <link rel="prefetch" href="/libs/tinymce/tinymce.min.js?ver=4.4.3">

    <link rel="stylesheet" href="{{ versioned_asset('css/styles.css') }}">
    <link rel="stylesheet" media="print" href="{{ versioned_asset('css/print-styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    
    <script src="{{ baseUrl('/libs/jquery/jquery.min.js?version=2.1.4') }}"></script>
    <script src="{{ baseUrl('/libs/jquery/jquery-ui.min.js?version=1.11.4') }}"></script>
    <script src="{{ baseUrl('/translations') }}"></script>
    <script src="{{ baseUrl('/libs/tinymce/tinymce.min.js?ver=4.4.3') }}"></script>

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
                            <img class="logo-image" src="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjRkZGRkZGIiB4bWxuczp4PSJodHRwOi8vbnMuYWRvYmUuY29tL0V4dGVuc2liaWxpdHkvMS4wLyIgeG1sbnM6aT0iaHR0cDovL25zLmFkb2JlLmNvbS9BZG9iZUlsbHVzdHJhdG9yLzEwLjAvIiB4bWxuczpncmFwaD0iaHR0cDovL25zLmFkb2JlLmNvbS9HcmFwaHMvMS4wLyIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEwMCAxMDAiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxzd2l0Y2g+PGZvcmVpZ25PYmplY3QgcmVxdWlyZWRFeHRlbnNpb25zPSJodHRwOi8vbnMuYWRvYmUuY29tL0Fkb2JlSWxsdXN0cmF0b3IvMTAuMC8iIHg9IjAiIHk9IjAiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiLz48ZyBpOmV4dHJhbmVvdXM9InNlbGYiPjxnPjxwYXRoIHN0cm9rZT0iI0ZGRkZGRiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIGQ9Ik03NS4yMyw1LjVoLTUwICAgICBjLTQuNjQ3LDAtOS43MywzLjE1NC05LjczLDcuODAxdjYxLjc4NWMwLDQuNjQ2LDUuMDgzLDkuNDE0LDkuNzMsOS40MTRoNi4yN3YxMC41NTNsOC41NTMtOC40NTVsOS40NDcsOC40NTVWODQuNWgyNS43MyAgICAgYzQuNjQ2LDAsNy4yNy00Ljc2OCw3LjI3LTkuNDE0VjEzLjMwMUM4Mi41LDguNjU0LDc5Ljg3Nyw1LjUsNzUuMjMsNS41eiBNNzYuNSwxMy4zMDFWNjEuNWgtNTB2LTUwaDQ4LjczICAgICBDNzYuNzgsMTEuNSw3Ni41LDExLjc1Miw3Ni41LDEzLjMwMXogTTc1LjIzLDc4LjVINDkuNXYtNmgtMTh2NmgtNi4yN2MtMS41NDksMC0zLjczLTEuODY1LTMuNzMtMy40MTRWNjcuNWg1NXY3LjU4NiAgICAgQzc2LjUsNzYuNjM1LDc2Ljc4LDc4LjUsNzUuMjMsNzguNXoiLz48Zz48cGF0aCBkPSJNMzcsMTcuNWMwLTAuMjc1LTAuMjI1LTAuNS0wLjUtMC41aC00Yy0wLjI3NSwwLTAuNSwwLjIyNS0wLjUsMC41djRjMCwwLjI3NSwwLjIyNSwwLjUsMC41LDAuNWg0ICAgICAgYzAuMjc1LDAsMC41LTAuMjI1LDAuNS0wLjVWMTcuNXoiLz48L2c+PGc+PHBhdGggZD0iTTM3LDI4LjVjMC0wLjI3NS0wLjIyNS0wLjUtMC41LTAuNWgtNGMtMC4yNzUsMC0wLjUsMC4yMjUtMC41LDAuNXY0YzAsMC4yNzUsMC4yMjUsMC41LDAuNSwwLjVoNCAgICAgIGMwLjI3NSwwLDAuNS0wLjIyNSwwLjUtMC41VjI4LjV6Ii8+PC9nPjxnPjxwYXRoIGQ9Ik0zNywzOS41YzAtMC4yNzUtMC4yMjUtMC41LTAuNS0wLjVoLTRjLTAuMjc1LDAtMC41LDAuMjI1LTAuNSwwLjV2NGMwLDAuMjc1LDAuMjI1LDAuNSwwLjUsMC41aDQgICAgICBjMC4yNzUsMCwwLjUtMC4yMjUsMC41LTAuNVYzOS41eiIvPjwvZz48Zz48cGF0aCBkPSJNMzcsNTAuNWMwLTAuMjc1LTAuMjI1LTAuNS0wLjUtMC41aC00Yy0wLjI3NSwwLTAuNSwwLjIyNS0wLjUsMC41djRjMCwwLjI3NSwwLjIyNSwwLjUsMC41LDAuNWg0ICAgICAgYzAuMjc1LDAsMC41LTAuMjI1LDAuNS0wLjVWNTAuNXoiLz48L2c+PC9nPjwvZz48L3N3aXRjaD48L3N2Zz4=" alt="Logo">
                        @endif
                        @if (setting('app-name-header'))
                            <span class="logo-text">{{ setting('app-name') }}</span>
                        @endif
                    </a>
                </div>
                <div class="col-lg-4 col-sm-3 text-center">
                    <form action="{{ baseUrl('/search') }}" method="GET" class="search-box">
                        <input id="header-search-box-input" placeholder="Search in DocTub" type="text" name="term" tabindex="2" value="{{ isset($searchTerm) ? $searchTerm : '' }}">
                        <button id="header-search-box-button" type="submit" class="text-button"><i class="zmdi zmdi-search"></i></button>
                    </form>
                </div>
                <div class="col-lg-4 col-sm-5">
                    <div class="float right">
                        <div class="links text-center">
                          <a href="{{ baseUrl('/books') }}" style="background:#8ECC4C;text-shadow:0 1px 1px rgba(0, 0, 0, 0.5)"><i class="zmdi zmdi-book"></i>{{ trans('entities.books') }}</a>
                            @if(!signedInUser())
                                <a href="{{ baseUrl('/register') }}" style="background:#f05330"><i class="zmdi zmdi-account-add"></i>Sign Up</a>
                                <a href="{{ baseUrl('/login') }}" style="background:transparent;box-shadow:0 2px 2px transparent">{{ trans('auth.log_in') }}</a>
                            @endif
                            @if(signedInUser())
                                <a href="{{ baseUrl('/books/create') }}" style="background:#f05330"><i class="zmdi zmdi-plus"></i>Create</a>
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
            <i class="zmdi zmdi-chevron-up"></i> <span>{{ trans('common.back_to_top') }}</span>
        </div>
    </div>
    <div class="faded-footer toolbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 faded">
                    <div class="action-buttons text-left">
                        <a href="https://doctub.com" class="text-primary text-button">© 2017 DocTub</a>
                        <a style="color:#002bb8" href="https://creativecommons.org/licenses/by-sa/4.0/"><i style="color:#4caf50" class="zmdi zmdi-case-check"></i>CC BY-SA 4.0&nbsp;<img src="{{ baseUrl('/images') }}/ntab.svg"</img></a>
                    </div>
                </div>
            </div>
        </div>
     </div>
@yield('bottom')
<script src="{{ versioned_asset('js/common.js') }}"></script>
@yield('scripts')
     <script src="{{ baseUrl('/libs/highlightjs/highlight.min.js') }}"></script>
     <script>
      $(function() {
        var aCodes = document.getElementsByTagName('pre');
        for (var i=0; i < aCodes.length; i++) {
            hljs.highlightBlock(aCodes[i]);
        }
      });
     </script>
</body>
</html>
