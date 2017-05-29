<!DOCTYPE html>
<html style="background-image: url(https://doctub-cdn.firebaseapp.com/images/back.png) no-repeat center center fixed;position:fixed">
<head>
    <title>{{ setting('app-name') }}</title>

    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ baseUrl('/') }}">
    <meta name="theme-color" content="#F48024">
    <meta charset="utf-8">

    <link rel="dns-prefetch" href="https://doctub-cdn.firebaseapp.com/">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net/">

    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="https://doctub-cdn.firebaseapp.com/images/logo.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://doctub-cdn.firebaseapp.com/css/styles-bundle.css">
    <link rel="stylesheet" media="print" href="https://doctub-cdn.firebaseapp.com/css/print-styles.css">
    <link rel="stylesheet" href="https://doctub-cdn.firebaseapp.com/css/icon-bundle/css/icon-bundle.min.css">

    <script src="https://doctub-cdn.firebaseapp.com/js/jquery.min.js"></script>
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
<script src="https://doctub-cdn.firebaseapp.com/js/common.js"></script>
</body>
</html>
