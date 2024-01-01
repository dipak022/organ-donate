<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Capital General Hospital Ltd.</title>
    @include('admin.layouts.header')
    

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- wrapper -->
    <div class="wrapper">

        <!-- Navbar -->
        @include('admin.layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.layouts.sidebar')
        <!-- /. Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('content')
            <!-- /. Content Header (Page header) -->
        </div>
        <!-- /. Content Wrapper. Contains page content -->

        <!-- Footer -->
        @include('admin.layouts.footer')
        <!-- /. Footer -->

    </div>
    <!-- ./wrapper -->
    @include('admin.layouts.script')

    
   
</body>

</html>
