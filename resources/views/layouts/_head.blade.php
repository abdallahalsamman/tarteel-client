<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <title>{{ config('app.name', 'Laravel') }} | @yield('title', '')</title> --}}
    <title>@yield('title', '')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite([
    'resources/css/font-awesome.css',
    'resources/css/google-font.css',
    'resources/css/icheck-bootstrap.css',
    'resources/css/adminlte.min.css',
    'resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
    'resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
    'resources/plugins/datatables-buttons/css/buttons.bootstrap4.min.css',

    'resources/css/custom.css',
    ])

    @livewireStyles
    @vite([
    'resources/js/jquery.min.js',
    'resources/js/bootstrap.bundle.min.js',
    'resources/plugins/datatables/jquery.dataTables.min.js',
    'resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
    'resources/plugins/datatables-responsive/js/dataTables.responsive.min.js',
    'resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
    'resources/plugins/datatables-buttons/js/dataTables.buttons.min.js',
    'resources/plugins/datatables-buttons/js/buttons.bootstrap4.min.js',
    'resources/plugins/jszip/jszip.min.js',
    'resources/plugins/pdfmake/pdfmake.min.js',
    'resources/plugins/datatables-buttons/js/buttons.html5.min.js',
    'resources/plugins/datatables-buttons/js/buttons.print.min.js',
    'resources/plugins/datatables-buttons/js/buttons.colVis.min.js',
    'resources/js/adminlte.min.js',
    'resources/js/demo.js',
    'resources/plugins/pdfmake/vfs_fonts.js',

    'resources/js/app.js',
    ])
</head>