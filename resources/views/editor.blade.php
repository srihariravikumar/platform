<!DOCTYPE html>
<html class="@yield('body-class')">
<head>
    <title>{{ isset($pageTitle) ? $pageTitle . ' | ' : '' }}{{ setting('app-name') }}</title>

    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ baseUrl('/') }}">
    <meta charset="utf-8">
    
    <link rel="dns-prefetch" href="https://cdn-doctub.netlify.com/">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com/">
    
    <link rel="icon" href="https://cdn-doctub.netlify.com/images/logo.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdn-doctub.netlify.com/css/styles-bundle.css">
    <link rel="stylesheet" media="print" href="https://cdn-doctub.netlify.com/css/print-styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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
<script src="https://cdn-doctub.netlify.com/js/common.js"></script>
@yield('scripts')
</body>
</html>
