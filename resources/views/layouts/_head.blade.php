<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <title>{{ config('app.name', 'Laravel') }} | @yield('title', '')</title> --}}
    <title>@yield('title', '')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/font-awesome.css"/>
    <link rel="stylesheet" href="/css/google-font.css"/>
    <link rel="stylesheet" href="/css/icheck-bootstrap.css"/>
    <link rel="stylesheet" href="/css/adminlte.min.css"/>
    <link rel="stylesheet" href="/js/datatables-bs4/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="/js/datatables-responsive/css/responsive.bootstrap4.min.css"/>
    <link rel="stylesheet" href="/js/datatables-buttons/css/buttons.bootstrap4.min.css"/>
    @livewireStyles
    @vite([
    'resources/css/custom.css',
    ])

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/datatables/jquery.dataTables.min.js"></script>
    <script src="/js/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/js/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/js/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/js/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/js/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/js/jszip/jszip.min.js"></script>
    <script src="/js/pdfmake/pdfmake.min.js"></script>
    <script src="/js/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/js/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/js/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="/js/adminlte.min.js"></script>
    <script src="/js/pdfmake/vfs_fonts.js"></script>
</head>