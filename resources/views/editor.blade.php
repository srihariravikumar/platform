<!DOCTYPE html>
<html class="@yield('body-class')">
<head>
    <title>{{ isset($pageTitle) ? $pageTitle . ' | ' : '' }}{{ setting('app-name') }}</title>

    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ baseUrl('/') }}">
    <meta charset="utf-8">
    
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net/">
    
    <link rel="icon" href="https://cdn.jsdelivr.net/gh/doctub/static@4.0/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/doctub/static@4.0/css/styles.css?version=v.prod">
    <link rel="stylesheet" media="print" href="https://cdn.jsdelivr.net/gh/doctub/static@4.0/css/print-styles.css?version=v.prod">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/doctub/static@4.0/css/icon-bundle.css">
    
    <script src="https://cdn.jsdelivr.net/gh/doctub/static@4.0/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/doctub/static@4.0/js/jquery-ui.min.js"></script>
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
<script src="https://cdn.jsdelivr.net/gh/doctub/static@4.0/js/common.js?version=v.prod"></script>
@yield('scripts')
    <script src="https://cdn.jsdelivr.net/gh/doctub/static@4.0/js/highlight.js"></script>
     <script>
      $(function() {
        var aCodes = document.getElementsByTagName('pre');
        for (var i=0; i < aCodes.length; i++) {
            hljs.highlightBlock(aCodes[i]);
        }
      });
     </script>
</body>
</html>
