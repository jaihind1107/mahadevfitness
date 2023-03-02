<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <ul class="nav-item dropdown show">
                    <li class=" nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="">
                            <i class="far fa-user"> <?php $name = Auth::user()->name;
                                                    echo $name;
                                                    ?></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="min-width: 138px;">
                            <!-- <span class="dropdown-item dropdown-header">Logout</span> -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                this.closest('form').submit(); ">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #4d148c">
            <!-- Brand Logo -->

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->

                <div class="user-panel  pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="  {{ asset('public/dist/img/logo.jpg') }}" class=" mt-3 ml-4" alt="User Image" style="width: 150px">
                    </div>

                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item ">
                            <a href="{{ route('dashboard') }}" class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }} ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('register') }}" class="nav-link {{ request()->is('register') ? 'active' : '' }}">
                                <i class="nav-icon nav-icon fas fa-user"></i>
                                <p>Registration</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('fee') }}" class="nav-link {{ request()->is('fee') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-truck"></i>
                                <p>Fees</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('fee_report') }}" class="nav-link {{ request()->is('fee_report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>Fees Report</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>