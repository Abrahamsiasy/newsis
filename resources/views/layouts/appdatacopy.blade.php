<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'JU CLINIC') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/all.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/toast.css') }}">

    {{-- Datatable css --}}
    <link rel="stylesheet" href="{{ asset('css/datatable/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/bootstrap4.min.css') }}">





    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('allinone/all.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('allinone/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('allinone/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('allinone/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('allinone/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('allinone/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('allinone/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('allinone/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('allinone/bs-stepper.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('allinone/dropzone.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('allinone/adminlte.min.css') }}">




    @yield('styles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px;">
                        <a href="{{ route('profile.show') }}" class="dropdown-item">
                            <i class="mr-2 fas fa-file"></i>
                            {{ __('My profile') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="mr-2 fas fa-sign-out-alt"></i>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="{{ asset('images/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Jimma Univercity</span>
            </a>

            @include('layouts.navigation')
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->

            <!-- Default to the left -->
            <strong>Copyright &copy; 2023 <a href="https://adminlte.io">Jimma Univercity</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    @vite('resources/js/app.js')
    <!-- AdminLTE App -->
    <script src="{{ asset('allinone/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/adminlte.min.js') }}" defer></script>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <!-- Bootstrap 4 -->
    <script src="{{ asset('allinone/bootstrap.bundle.min.js') }}" defer></script>
    <!-- Select2 -->
    <script src="{{ asset('allinone/select2.full.min.js') }}" defer></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('allinone/jquery.bootstrap-duallistbox.min.js') }}" defer></script>
    <!-- InputMask -->
    <script src="{{ asset('allinone/moment.min.js') }}" defer></script>
    <script src="{{ asset('allinone/jquery.inputmask.min.js') }}" defer></script>
    <!-- date-range-picker -->
    <script src="{{ asset('allinone/daterangepicker.js') }}" defer></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('allinone/bootstrap-colorpicker.min.js') }}" defer></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('allinone/tempusdominus-bootstrap-4.min.js') }}" defer></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('allinone/bootstrap-switch.min.js') }}" defer></script>
    <!-- BS-Stepper -->
    <script src="{{ asset('allinone/bs-stepper.min.js') }}" defer></script>
    <!-- dropzonejs -->
    <script src="{{ asset('allinone/dropzone.min.js') }}" defer></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('allinone/adminlte.min.js') }}" defer></script>
    <!-- AdminLTE for demo purposes -->

    <script src="{{ asset('js/datatable/jquery-3.5.1.js') }}" defer></script>
    <script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('js/datatable/bootstrap4.min.js') }}" defer></script>





    @yield('scripts')
</body>

</html>
