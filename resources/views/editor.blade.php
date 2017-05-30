<!DOCTYPE html>
<html class="@yield('body-class')">
<head>
    <title>{{ isset($pageTitle) ? $pageTitle . ' | ' : '' }}{{ setting('app-name') }}</title>

    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ baseUrl('/') }}">
    <meta name="theme-color" content="#F48024">
    <meta charset="utf-8">

    <link rel="dns-prefetch" href="https://secure.gravatar.com/">
    <link rel="dns-prefetch" href="https://doctub-cdn.firebaseapp.com/">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net/">

    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="https://doctub-cdn.firebaseapp.com/images/favicon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://doctub-cdn.firebaseapp.com/css/styles-bundle.css">
    <link rel="stylesheet" media="print" href="https://doctub-cdn.firebaseapp.com/css/print-styles.css">
    <link rel="stylesheet" href="https://doctub-cdn.firebaseapp.com/css/icon-bundle/css/icon-bundle.min.css">

    <script>
    if('serviceWorker' in navigator) {
      navigator.serviceWorker.register('/serviceworker.js', {
        scope: '/'
      });
    }
    </script>

    <script src="https://doctub-cdn.firebaseapp.com/js/jquery.min.js"></script>

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
<script src="https://doctub-cdn.firebaseapp.com/js/common.js"></script>
@yield('scripts')
</body>
</html>
