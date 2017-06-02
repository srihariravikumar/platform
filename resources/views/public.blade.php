<!DOCTYPE html>
<html>
<head>
    <title>{{ setting('app-name') }}</title>

    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ baseUrl('/') }}">
    <meta name="theme-color" content="#F48024">
    <meta charset="utf-8">

    <link rel="dns-prefetch" href="https://secure.gravatar.com/">
    <link rel="dns-prefetch" href="//chart.googleapis.com/">
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net/">

    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="//unpkg.com/doctub@4.0.0/images/favicon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="//unpkg.com/doctub@4.0.0/css/core-bundle.css">
    <link rel="stylesheet" media="print" href="//unpkg.com/doctub@4.0.0/css/core-bundle-1.css">
    <link rel="stylesheet" href="//unpkg.com/doctub@4.0.0/css/icon-bundle.css">

    <script src="//unpkg.com/doctub@4.0.0/js/doctub-query.min.js"></script>
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
                        <img class="logo-image" src="//unpkg.com/doctub@4.0.0/images/logo-250.png" alt="Logo">
                    @endif
                    @if (setting('app-name-header'))
                        <span class="logo-text"><b>Doc</b><i>Tub</i></span>
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
<script src="//unpkg.com/doctub@4.0.0/js/common.js"></script>
</body>
</html>
