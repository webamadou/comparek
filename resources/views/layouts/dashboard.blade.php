<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <base href="./">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
        <meta name="author" content="Łukasz Holeczek">
        <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">

        <title>{{ config('app.name', 'Comparek') }}</title>
        <link rel="icon" type="image/png" href="{{asset('assets/logo/favicon/favicon-96x96.png')}}" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="{{asset('assets/logo/favicon/favicon.svg')}}" />
        <link rel="shortcut icon" href="{{asset('assets/logo/favicon/favicon.ico')}}" />
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/logo/favicon/apple-touch-icon.png')}}" />
        <link rel="manifest" href="/comparek.sn" />

        <!-- Vendors styles-->
        {{--<link rel="stylesheet" href="node_modules/simplebar/dist/simplebar.css">
        <link rel="stylesheet" href="css/vendors/simplebar.css">--}}
        <link href="{{ asset('coreui/css/coreui.min.css') }}" rel="stylesheet">
        <!-- Main styles for this application-->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- We use those styles to show code examples, you should remove them in your application.-->
        <link href="css/examples.css" rel="stylesheet">
        @vite(['resources/js/app.js'])
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        @include('layouts.partials.sidebar')
        <div class="wrapper d-flex flex-column min-vh-100">
            @include('layouts.partials.header')
            @yield('content')
        </div>
        <footer class="footer px-4">
            <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io/product/free-bootstrap-admin-template/">Bootstrap Admin Template</a> &copy; 2025 creativeLabs.</div>
            <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div>
        </footer>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js"></script>
        <script>
            tinymce.init({ selector: 'textarea.rich-text' });
        </script>
        <!-- CoreUI JS -->
        <script src="{{ asset('coreui/js/coreui.bundle.min.js') }}"></script>
    </body>
</html>
