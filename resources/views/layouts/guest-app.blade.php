<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts._head')

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>Admin</b> Dashboard</a>
        </div>

        @yield('content')
    </div>
    
    {{-- @livewireScripts --}}

    {{-- @vite('resources/js/app.js') --}}
</body>

</html>