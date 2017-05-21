<!DOCTYPE html>
<html>
<head>
    <title>{{ setting('app-name') }}</title>

    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ baseUrl('/') }}">
    <meta charset="utf-8">

    <link rel="dns-prefetch" href="https://s.gravatar.com">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://chart.googleapis.com">

    <link rel="stylesheet" href="{{ versioned_asset('css/styles.css') }}">
    <link rel="stylesheet" media="print" href="{{ versioned_asset('css/print-styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @include('partials/custom-styles')

    <!-- Custom user content -->
    @if(setting('app-custom-head'))
        {!! setting('app-custom-head') !!}
    @endif
</head>
<body class="@yield('body-class')" ng-app="bookStack">

@include('partials.notifications')

<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">

                <a href="{{ baseUrl('/') }}" class="logo">
                    @if(setting('app-logo', '') !== 'none')
                        <img class="logo-image" src="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjRkZGRkZGIiB4bWxuczp4PSJodHRwOi8vbnMuYWRvYmUuY29tL0V4dGVuc2liaWxpdHkvMS4wLyIgeG1sbnM6aT0iaHR0cDovL25zLmFkb2JlLmNvbS9BZG9iZUlsbHVzdHJhdG9yLzEwLjAvIiB4bWxuczpncmFwaD0iaHR0cDovL25zLmFkb2JlLmNvbS9HcmFwaHMvMS4wLyIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEwMCAxMDAiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxzd2l0Y2g+PGZvcmVpZ25PYmplY3QgcmVxdWlyZWRFeHRlbnNpb25zPSJodHRwOi8vbnMuYWRvYmUuY29tL0Fkb2JlSWxsdXN0cmF0b3IvMTAuMC8iIHg9IjAiIHk9IjAiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiLz48ZyBpOmV4dHJhbmVvdXM9InNlbGYiPjxnPjxwYXRoIHN0cm9rZT0iI0ZGRkZGRiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIGQ9Ik03NS4yMyw1LjVoLTUwICAgICBjLTQuNjQ3LDAtOS43MywzLjE1NC05LjczLDcuODAxdjYxLjc4NWMwLDQuNjQ2LDUuMDgzLDkuNDE0LDkuNzMsOS40MTRoNi4yN3YxMC41NTNsOC41NTMtOC40NTVsOS40NDcsOC40NTVWODQuNWgyNS43MyAgICAgYzQuNjQ2LDAsNy4yNy00Ljc2OCw3LjI3LTkuNDE0VjEzLjMwMUM4Mi41LDguNjU0LDc5Ljg3Nyw1LjUsNzUuMjMsNS41eiBNNzYuNSwxMy4zMDFWNjEuNWgtNTB2LTUwaDQ4LjczICAgICBDNzYuNzgsMTEuNSw3Ni41LDExLjc1Miw3Ni41LDEzLjMwMXogTTc1LjIzLDc4LjVINDkuNXYtNmgtMTh2NmgtNi4yN2MtMS41NDksMC0zLjczLTEuODY1LTMuNzMtMy40MTRWNjcuNWg1NXY3LjU4NiAgICAgQzc2LjUsNzYuNjM1LDc2Ljc4LDc4LjUsNzUuMjMsNzguNXoiLz48Zz48cGF0aCBkPSJNMzcsMTcuNWMwLTAuMjc1LTAuMjI1LTAuNS0wLjUtMC41aC00Yy0wLjI3NSwwLTAuNSwwLjIyNS0wLjUsMC41djRjMCwwLjI3NSwwLjIyNSwwLjUsMC41LDAuNWg0ICAgICAgYzAuMjc1LDAsMC41LTAuMjI1LDAuNS0wLjVWMTcuNXoiLz48L2c+PGc+PHBhdGggZD0iTTM3LDI4LjVjMC0wLjI3NS0wLjIyNS0wLjUtMC41LTAuNWgtNGMtMC4yNzUsMC0wLjUsMC4yMjUtMC41LDAuNXY0YzAsMC4yNzUsMC4yMjUsMC41LDAuNSwwLjVoNCAgICAgIGMwLjI3NSwwLDAuNS0wLjIyNSwwLjUtMC41VjI4LjV6Ii8+PC9nPjxnPjxwYXRoIGQ9Ik0zNywzOS41YzAtMC4yNzUtMC4yMjUtMC41LTAuNS0wLjVoLTRjLTAuMjc1LDAtMC41LDAuMjI1LTAuNSwwLjV2NGMwLDAuMjc1LDAuMjI1LDAuNSwwLjUsMC41aDQgICAgICBjMC4yNzUsMCwwLjUtMC4yMjUsMC41LTAuNVYzOS41eiIvPjwvZz48Zz48cGF0aCBkPSJNMzcsNTAuNWMwLTAuMjc1LTAuMjI1LTAuNS0wLjUtMC41aC00Yy0wLjI3NSwwLTAuNSwwLjIyNS0wLjUsMC41djRjMCwwLjI3NSwwLjIyNSwwLjUsMC41LDAuNWg0ICAgICAgYzAuMjc1LDAsMC41LTAuMjI1LDAuNS0wLjVWNTAuNXoiLz48L2c+PC9nPjwvZz48L3N3aXRjaD48L3N2Zz4=" alt="Logo">
                    @endif
                    @if (setting('app-name-header'))
                        <span class="logo-text">{{ setting('app-name') }}</span>
                    @endif
                </a>
            </div>
            <div class="col-sm-6">
                <div class="float right">
                    <div class="links text-center">
                        @yield('header-buttons')
                    </div>
                    @if(isset($signedIn) && $signedIn)
                        @include('partials._header-dropdown', ['currentUser' => $currentUser])
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

<section class="container">
    @yield('content')
</section>
<script src="{{ versioned_asset('js/common.js') }}"></script>
</body>
</html>
