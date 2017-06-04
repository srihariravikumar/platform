<!DOCTYPE html>
<html style="background:linear-gradient(to bottom left,#76c4e2,#8176b5)">
<head>
    <title>{{ setting('app-name') }}</title>

    @include('/assets')

</head>
<body class="@yield('body-class')" ng-app="bookStack">
@include('partials.notifications')
<section class="container">
    @yield('content')
</section>
<script src="{{ cdnUrl() }}/js/js-bundle.js"></script>
</body>
</html>