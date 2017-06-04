<!DOCTYPE html>
<html>
<head>
    <title>{{ setting('app-name') }}</title>

    @include('/assets')
    
    @yield('head')

</head>
<body class="@yield('body-class')" ng-app="bookStack">

@include('partials.notifications')

<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <a href="{{ baseUrl('/') }}" class="logo">
                    @if(setting('app-logo', '') !== 'none')
                        <img class="logo-image" src="{{ cdnUrl() }}/images/logo-250.png" alt="Logo">
                    @endif
                    @if (setting('app-name-header'))
                        <span class="logo-text"><b>Doc</b><i>Tub</i></span>
                    @endif
                </a>
            </div>
            <div class="col-sm-6">
                <div class="float right">
                    <div class="links text-center">
                        @yield('header-buttons')
                    </div>
                    @if(isset($signedIn) && $signedIn)
                        @include('partials._header-dropdown', ['currentUser' => $currentUser])
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
<section class="container">
    @yield('content')
</section>
<script src="{{ cdnUrl() }}/js/js-bundle.js"></script>
</body>
</html>
