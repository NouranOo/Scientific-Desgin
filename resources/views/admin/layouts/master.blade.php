<!DOCTYPE html>
<html>
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('public/img/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('public/img/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('public/img/favicon-16x16.png')}}">
    <link rel="manifest" href="{{url('public/img/site.webmanifest')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @yield('css')
    @include('admin.includes.css')
<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    {{--<link rel="stylesheet" href="../../plugins/select2/select2.min.css">--}}
    <!-- Latest compiled and minified JavaScript -->

</head>
<body class="hold-transition skin-purple sidebar-mini" >
<!-- Site wrapper -->
<div class="wrapper">
@include('admin.includes.header')
<!-- =============================================== -->
    <!-- Left side column. contains the sidebar -->
@include('admin.includes.aside')
<!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.includes.msg')
       @yield('page-header')
        <!-- Main content -->
        @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@include('admin.includes.footer')
<!-- Control Sidebar -->
</div>
<!-- ./wrapper -->
@include('admin.includes.js')
@yield('js')
</body>
</html>
