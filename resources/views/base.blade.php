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
    <link rel="dns-prefetch" href="https://chart.googleapis.com/">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net/">
    
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="https://doctub-cdn.firebaseapp.com/images/logo.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://doctub-cdn.firebaseapp.com/css/styles-bundle.css">
    <link rel="stylesheet" media="print" href="https://doctub-cdn.firebaseapp.com/css/print-styles.css">
    <link rel="stylesheet" href="https://doctub-cdn.firebaseapp.com/css/icon-bundle/css/icon-bundle.min.css">
    
    <script src="https://doctub-cdn.firebaseapp.com/js/jquery.min.js"></script>
    <script src="https://doctub-cdn.firebaseapp.com/js/jquery-ui.min.js"></script>
    <script src="{{ baseUrl('/translations') }}"></script>
    
        <script src="/service-worker-registration.js"></script>
    <script>
      function sendMessage(message) {
        return new Promise(function(resolve, reject) {
          if (navigator.serviceWorker.controller) {
            var messageChannel = new MessageChannel();
            messageChannel.port1.onmessage = function (event) {
              if (event.data.error) {
                reject(event.data.error);
              } else {
                resolve(event.data);
              }
            };
            navigator.serviceWorker.controller.postMessage(message, [messageChannel.port2]);
          } else {
            reject("This page isn't currently controlled by a service worker. Please reload and try again.");
          }
        });
      }
      document.querySelector('#clear-cache').addEventListener('click', function() {
        sendMessage({command: 'delete_all'}).then(function() {
          console.log('All caches deleted.');
        }).catch(function(error) {
          console.error('Caches not deleted:', error);
        });
      });
    </script>

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

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4" ng-non-bindable>
                    <a href="{{ baseUrl('/') }}" class="logo">
                        @if(setting('app-logo', '') !== 'none')
                            <img class="logo-image" src="https://doctub-cdn.firebaseapp.com/images/logo.png" alt="Logo">
                        @endif
                        @if (setting('app-name-header'))
                            <span class="logo-text"><b>Doc</b><i>Tub</i></span>
                        @endif
                    </a>
                </div>
                <div class="col-lg-4 col-sm-3 text-center">
                    <form action="{{ baseUrl('/search') }}" method="GET" class="search-box">
                        <input id="header-search-box-input" placeholder="Search in DocTub" type="text" name="term" tabindex="2" value="{{ isset($searchTerm) ? $searchTerm : '' }}">
                        <button id="header-search-box-button" type="submit" class="text-button"><i class="zmdi zmdi-search"></i></button>
                    </form>
                </div>
                <div class="col-lg-4 col-sm-5">
                    <div class="float right">
                        <div class="links text-center">
                          <a href="{{ baseUrl('/books') }}" style="background:#8ECC4C;text-shadow:0 1px 1px rgba(0, 0, 0, 0.5)"><i class="zmdi zmdi-book"></i>{{ trans('entities.books') }}</a>
                            @if(!signedInUser())
                                <a href="{{ baseUrl('/register') }}" style="background:#f05330"><i class="zmdi zmdi-account-add"></i>Sign Up</a>
                                <a href="{{ baseUrl('/login') }}" style="background:transparent;box-shadow:0 2px 2px transparent">{{ trans('auth.log_in') }}</a>
                            @endif
                            @if(signedInUser())
                                <a href="{{ baseUrl('/books/create') }}" style="background:#f05330"><i class="zmdi zmdi-plus"></i>Create</a>
                            @endif
                        </div>
                        @if(signedInUser())
                            @include('partials._header-dropdown', ['currentUser' => user()])
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="content" class="block">
        @yield('content')
    </section>

    <div id="back-to-top">
        <div class="inner">
            <i class="zmdi zmdi-chevron-up"></i> <span>{{ trans('common.back_to_top') }}</span>
        </div>
    </div>
@yield('bottom')
<script src="https://doctub-cdn.firebaseapp.com/js/common.js"></script>
@yield('scripts')

</body>
</html>
