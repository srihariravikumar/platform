<style id="custom-styles" data-color="{{ setting('app-color') }}" data-color-light="{{ setting('app-color-light') }}">
    header, .primary-background {
        border-top: 3px solid #F48024;
        background-color: {{ setting('app-color') }} !important;
    }
    #back-to-top {
        background-color: {{ setting('app-color') }} !important;
    }
    .faded-small, .primary-background-light {
        background-color: {{ setting('app-color-light') }};
    }
    .button-base, .button, input[type="button"], input[type="submit"] {
        background-color: {{ setting('app-color') }};
    }
    .button-base:hover, .button:hover, input[type="button"]:hover, input[type="submit"]:hover, .button:focus {
        background-color: {{ setting('app-color') }};
    }
    .nav-tabs a.selected, .nav-tabs .tab-item.selected {
        border-bottom-color: {{ setting('app-color') }};
    }
    .text-primary, p.primary, p .primary, span.primary:hover, .text-primary:hover, a, a:hover, a:focus, .text-button, .text-button:hover, .text-button:focus {
        color: #0288d1;
    }
</style>