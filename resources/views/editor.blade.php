<!DOCTYPE html>
<html class="@yield('body-class')">
<head>
    <title>{{ isset($pageTitle) ? $pageTitle . ' | ' : '' }}{{ setting('app-name') }}</title>

    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ baseUrl('/') }}">
    <meta name="theme-color" content="#F48024">
    <meta charset="utf-8">

    <link rel="dns-prefetch" href="//secure.gravatar.com/">
    <link rel="dns-prefetch" href="//unpkg.com/">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com/">
    <link rel="assets" href="//unpkg.com/">

    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="//unpkg.com/doctub@4.0.0/images/favicon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="//unpkg.com/doctub@4.0.0/css/core-bundle.css">
    <link rel="stylesheet" media="print" href="//unpkg.com/doctub@4.0.0/css/core-bundle-1.css">
    <link rel="stylesheet" href="//unpkg.com/doctub@4.0.0/css/icon-bundle.css">

    <script src="//unpkg.com/doctub@4.0.0/js/doctub-query.min.js"></script>

    <script src="{{ baseUrl('/translations') }}"></script>

    @yield('head')

    @include('partials/custom-styles')


</head>
<body class="@yield('body-class')" ng-app="bookStack">

    @include('partials/notifications')

    <section id="content" class="block">
        @yield('content')
    </section>

@yield('bottom')
<script src="//unpkg.com/doctub@4.0.0/js/common.js"></script>
@yield('scripts')
</body>
</html>
