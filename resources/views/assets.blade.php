    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ baseUrl('/') }}">
    <meta name="theme-color" content="#F48024">
    <meta charset="utf-8">

    <link rel="dns-prefetch" href="https://secure.gravatar.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">

    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="https://unpkg.com/doctub@12.0.0/images/favicon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://unpkg.com/doctub@12.0.0/css/core-bundle.css">
    <link rel="stylesheet" media="print" href="https://unpkg.com/doctub@12.0.0/css/core-bundle-1.css">
    <link rel="stylesheet" href="https://unpkg.com/doctub@12.0.0/css/fa-doctub.css">

    <script src="https://unpkg.com/doctub@12.0.0/js/doctub-query.min.js"></script>
    <script src="https://unpkg.com/doctub@12.0.0/js/doctub-query-ui.min.js"></script>
    <script src="{{ baseUrl('/translations') }}"></script>
    
    @include('partials/custom-styles')

    <!-- Custom user content -->
    @if(setting('app-custom-head'))
        {!! setting('app-custom-head') !!}
    @endif