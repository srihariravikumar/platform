<!DOCTYPE html>
<html style="background-image: url(https://cdn.jsdelivr.net/gh/doctub/cdn@2.0/images/back.png)">
<head>
    <title>{{ setting('app-name') }}</title>

    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ baseUrl('/') }}">
    <meta name="theme-color" content="#F48024">
    <meta charset="utf-8">

    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net/gh/doctub/cdn@2.0/">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net/">

    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="https://cdn.jsdelivr.net/gh/doctub/cdn@2.0/images/favicon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/doctub/cdn@2.0/css/core-bundle.css">
    <link rel="stylesheet" media="print" href="https://cdn.jsdelivr.net/gh/doctub/cdn@2.0/css/core-bundle-1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/doctub/cdn@2.0/css/icon-bundle/css/icon-bundle.min.css">

    <script src="https://cdn.jsdelivr.net/gh/doctub/cdn@2.0/js/doctub-query.min.js"></script>
    @include('partials/custom-styles')

    <!-- Custom user content -->
    @if(setting('app-custom-head'))
        {!! setting('app-custom-head') !!}
    @endif
</head>
<body class="@yield('body-class')" ng-app="bookStack">

@include('partials.notifications')

<section class="container">
    @yield('content')
</section>
<script src="https://cdn.jsdelivr.net/gh/doctub/cdn@2.0/js/common.js"></script>
</body>
</html>
