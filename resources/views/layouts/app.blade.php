<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts._head')

<body
    class="hold-transition sidebar-mini"
    x-data="window.nav.make()"
    :class="{ 'sidebar-collapse' : collapsed }"
    x-on:resize.window="resize()"
    x-ref="body"
>

    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a
                        x-on:click="click()"
                        @click.away="clickAway()"
                        class="nav-link"
                        href="#"
                    >
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu" x-data="{ open: false }">
                    <a href="javascript:void(0)" class="nav-link" x-on:click="open= true">
                        <span class="d-none d-md-inline">{{ auth()->user()->email }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" x-show="open" x-bind:class="{ 'show': open }" x-on:click.away="open= false" x-cloak>
                        <li class="user-footer">
                            <a
                                href="#"
                                class="btn btn-default btn-flat float-right"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                            >
                                {{ __('Sign Out') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4 x-cloak">
            @if(auth()->user()->isAdmin())
                <a href="{{ route('users.index') }}" class="brand-link">
                    <span class="brand-text"> الأستاذة والمستخدمين</span>
                </a>
            @endif

            <a href="{{ route('tutoring-sessions.index') }}" class="brand-link">
                <span class="brand-text">الحصص</span>
            </a>

            <a href="{{ auth()->user()->isAdmin() ? route('invoices.index') : route('invoices.show', ['user' => auth()->user()->id]) }}" class="brand-link">
                <span class="brand-text">@if(auth()->user()->isAdmin()) الفواتير @else الفاتورة @endif</span>
            </a>
        </aside>

        <div class="content-wrapper">

            <section class="content-header">
                @yield('content-header')
            </section>

            <section class="content">
                @include('layouts._flash')

                @yield('content')
            </section>
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} <a href="https://tarteelcenter.com">TarteelCenter</a>.</strong>
        </footer>
    </div>

    @livewireScriptConfig
</body>

</html>
