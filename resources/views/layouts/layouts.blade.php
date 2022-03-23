<html>
    <head>
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <script src="{{ mix('js/app.js') }}"></script>
    </head>
    <body>
        <!-- header.blade.phpを読み込む -->
        @component('components.header')
        @endcomponent
        <div class="container pt-5 pb-5">
            <!-- flash.blade.phpを読み込む -->
            @component('components.flash')
            @endcomponent
            @yield('content')
        </div>
        <!-- footer.blade.phpを読み込む -->
        @component('components.footer')
        @endcomponent
    </body>
</html> 