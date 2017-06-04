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
    <link rel="icon" href="https://unpkg.com/doctub@12.0.0/images/favicon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://unpkg.com/doctub@12.0.0/css/core-bundle.css">
    <link rel="stylesheet" media="print" href="https://unpkg.com/doctub@12.0.0/css/core-bundle-1.css">
    <link rel="stylesheet" href="https://unpkg.com/doctub@12.0.0/css/fa-doctub.css">

    <script src="https://unpkg.com/doctub@12.0.0/js/doctub@12.0.0-query.min.js"></script>

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
<script src="https://unpkg.com/doctub@12.0.0/js/js-bundle.js"></script>
@yield('scripts')
</body>
</html>
