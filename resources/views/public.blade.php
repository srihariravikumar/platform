<!DOCTYPE html>
<html>
<head>
    <title>{{ setting('app-name') }}</title>

    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ baseUrl('/') }}">
    <meta charset="utf-8">

    <link rel="dns-prefetch" href="https://s.gravatar.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net/">
    <link rel="dns-prefetch" href="https://chart.googleapis.com">
    
    <link rel="icon" href="https://cdn.jsdelivr.net/gh/doctub/static-cdn@2.0/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/doctub/static-cdn@2.0/css/styles-bundle.min.css?version=v.prod">
    <link rel="stylesheet" media="print" href="https://cdn.jsdelivr.net/gh/doctub/static-cdn@2.0/css/print-styles.css?version=v.prod">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/doctub/static-cdn@2.0/css/icon-bundle.css">
    
    <script src="https://cdn.jsdelivr.net/gh/doctub/static-cdn@2.0/js/jquery.min.js"></script>
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
                        <img class="logo-image" src="https://cdn.jsdelivr.net/gh/doctub/static-cdn@2.0/images/logo.svg" alt="Logo">
                    @endif
                    @if (setting('app-name-header'))
                        <span class="logo-text">{{ setting('app-name') }}</span>
                        <a href="https://doctub.github.io/hire" style="
    position: relative;
    text-transform: uppercase;
    background: #f2f5fd;
    border-radius: 4px;
    display: inline-block;
    float: left;
    margin-top: 22px;
    color: #212121;
    padding: 6px 8px;
    font-size: 12px;
    line-height: 1em;
">We are hiring!</a>
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
<script src="https://cdn.jsdelivr.net/gh/doctub/static-cdn@2.0/js/common.js?version=v.prod"></script>
</body>
</html>
