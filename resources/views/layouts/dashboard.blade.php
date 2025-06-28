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

        <!-- Vendors styles-->
        <link href="{{ asset('coreui/css/coreui.min.css') }}" rel="stylesheet">
        <!-- Main styles for this application-->
        <link href="{{ asset('css/dashboard_style.css') }}" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    </head>
    <body class="font-sans antialiased">
        @include('layouts.partials.sidebar')
        <div class="wrapper d-flex flex-column min-vh-100">
            @include('layouts.partials.header')
            {{-- Flash alerts ---------------------------------------------------------- --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- ---------------------------------------------------------------------- --}}

            @yield('content')
        </div>
        <footer class="footer px-4">
            <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io/product/free-bootstrap-admin-template/">Bootstrap Admin Template</a> &copy; 2025 creativeLabs.</div>
            <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
        <<!-- script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js"></script>
        <script>
            tinymce.init({ selector: 'textarea.rich-text' });
        </script> -->
        <!-- CoreUI JS -->
        <script src="{{ asset('coreui/js/coreui.bundle.min.js') }}"></script>
        <script src="//code.iconify.design/1/1.0.6/iconify.min.js"></script>

    </body>
</html>
