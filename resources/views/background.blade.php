<!DOCTYPE html>
<html style="background:linear-gradient(to bottom left,#76c4e2,#8176b5)">
<head>
    <title>{{ setting('app-name') }}</title>

    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ baseUrl('/') }}">
    <meta name="theme-color" content="#F48024">
    <meta charset="utf-8">

    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">

    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="https://cdn.jsdelivr.net/npm/doctub/images/favicon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/combine/npm/doctub/css/core-bundle.min.css">
    <link rel="stylesheet" media="print" href="https://cdn.jsdelivr.net/npm/doctub/css/core-bundle-1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/doctub/js/doctub-query.min.js"></script>
    @include('partials/custom-styles')
</head>
<body class="@yield('body-class')" ng-app="bookStack">
@include('partials.notifications')
<section class="container">
    @yield('content')
</section>
<script src="https://cdn.jsdelivr.net/npm/doctub/js/js-bundle.js"></script>
</body>
</html>