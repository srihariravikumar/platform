<!DOCTYPE html>
<html class="@yield('body-class')">
<head>
    <title>{{ isset($pageTitle) ? $pageTitle . ' | ' : '' }}{{ setting('app-name') }}</title>

    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ baseUrl('/') }}">
    <meta charset="utf-8">
    

    <link rel="dns-prefetch" href="https://s.gravatar.com">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://chart.googleapis.com">

    <link rel="stylesheet" href="{{ versioned_asset('css/styles.css') }}">
    <link rel="stylesheet" media="print" href="{{ versioned_asset('css/print-styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ baseUrl('/translations') }}"></script>

    @yield('head')

    @include('partials/custom-styles')

    @if(setting('app-custom-head') && \Route::currentRouteName() !== 'settings')
        <!-- Custom user content -->
        {!! setting('app-custom-head') !!}
        <!-- End custom user content -->
    @endif
</head>
<body class="@yield('body-class')" ng-app="bookStack">

    @include('partials/notifications')
    
    <section id="content" class="block">
        @yield('content')
    </section>

    <div id="back-to-top">
        <div class="inner">
            <i class="zmdi zmdi-chevron-up"></i> <span>{{ trans('common.back_to_top') }}</span>
        </div>
    </div>
    <div class="faded-footer toolbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 faded">
                    <div class="action-buttons text-left">
                        <a href="https://doctub.com" class="text-primary text-button">© 2017 DocTub</a>
                        <a style="color:#002bb8" href="https://creativecommons.org/licenses/by-sa/4.0/"><i style="color:#4caf50" class="zmdi zmdi-case-check"></i>CC BY-SA 4.0&nbsp;<img src="{{ baseUrl('/images') }}/ntab.svg"</img></a>
                    </div>
                </div>
            </div>
        </div>
     </div>
@yield('bottom')
<script src="{{ versioned_asset('js/common.js') }}"></script>
@yield('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.11.0/highlight.min.js"></script>
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
