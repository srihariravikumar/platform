<!DOCTYPE html>
<html class="@yield('body-class')">
<head>
    <title>{{ isset($pageTitle) ? $pageTitle . ' | ' : '' }}{{ setting('app-name') }}</title>

    @include('/assets')

</head>
<body class="@yield('body-class')" ng-app="bookStack">

    @include('partials/notifications')
    <section id="content" class="block">
        @yield('content')
    </section>
@yield('bottom')
<script src="{{ cdnUrl() }}/js/js-bundle.js"></script>
@yield('scripts')
</body>
</html>
