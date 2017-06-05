    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ baseUrl('/') }}">
    <meta name="theme-color" content="#F48024">
    <meta charset="utf-8">

    <link rel="dns-prefetch" href="https://secure.gravatar.com">
    <link rel="dns-prefetch" href="https://unpkg.com">
    <link rel="assets" href="https://unpkg.com">

    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="{{ cdnUrl() }}/images/favicon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ cdnUrl() }}/css/core-bundle.css">
    <link rel="stylesheet" media="print" href="{{ cdnUrl() }}/css/core-bundle-1.css">
    <link rel="stylesheet" href="{{ cdnUrl() }}/css/fa-doctub.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <script src="{{ cdnUrl() }}/js/doctub-query.min.js"></script>
    <script src="{{ cdnUrl() }}/js/doctub-query-ui.min.js"></script>
    <script src="{{ baseUrl('/translations') }}"></script>
    
    @include('partials/custom-styles')
    
    @yield('head')

    <!-- Custom user content -->
    @if(setting('app-custom-head'))
        {!! setting('app-custom-head') !!}
    @endif