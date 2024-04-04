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
                <li class="nav-item">
                    <a
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        class="nav-link"
                    >
                        <span class="d-none d-md-inline">تسجيل الخروج</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu" x-data="{ open: false }">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
           <a style="text-align:center" href="#" class="brand-link">
                <span style="text-align:center" class="brand-text font-weight-light">ترتـيل</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar os-host os-theme-light os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-scrollbar-vertical-hidden os-host-transition"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -8px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible os-viewport-native-scrollbars-overlaid"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="بحث" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div><div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item"><div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong></div><div class="search-path"></div></a></div></div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            @if(auth()->user()->isAdmin())
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        المستخدمين
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>المستخدمين</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            @endif
                            
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        تسجيل الحصص
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('tutoring-sessions.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>الحصص</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                      
                            @if(auth()->user()->isAdmin() || auth()->user()->isTutor())
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-link"></i>
                                    <p>
                                         الفواتير
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @if(auth()->user()->isAdmin())
                                    <li class="nav-item">
                                        <a href="{{ route('invoices.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>الفواتير</p>
                                        </a>
                                    </li>
                                    @endif

                                    @if(auth()->user()->isTutor())
                                    <li class="nav-item">
                                        <a href="{{ route('invoices.show', ['user' => auth()->user()->id]) }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>الفاتوره الشخصية</p>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </li>
                            @endif
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 100%; transform: translate(0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
            <!-- /.sidebar -->
        </aside>

        <aside class="control-sidebar control-sidebar-dark">
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
