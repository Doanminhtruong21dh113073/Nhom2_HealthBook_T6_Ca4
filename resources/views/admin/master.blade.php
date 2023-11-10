<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.blocks.head')
    @stack('css')
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('admin.blocks.nav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.blocks.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('admin.blocks.content-header')

            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(Session::has('success'))
                    <p class="alert alert-info">{{ Session::get('success') }}</p>
                @endif
                @if(Session::has('error'))
                    <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif

                @yield('content')
              



            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('admin.blocks.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('admin.blocks.foot')
    @stack('js')

    @stack('jshand')
    @stack('date')
    @stack('datejs')
</body>
</html>