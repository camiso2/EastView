<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="dashboard">
    <meta name="Jaiver Ocampo" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="dash/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="dash/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



</head>

<body id="page-top">
    @include('sections.sweet')
    @include('sections.preload')
    @yield('content')

     <!-- Bootstrap core JavaScript-->
     <script src="dash/vendor/jquery/jquery.min.js"></script>
     <script src="dash/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

     <!-- Core plugin JavaScript-->
     <script src="dash/vendor/jquery-easing/jquery.easing.min.js"></script>

     <!-- Custom scripts for all pages-->
     <script src="dash/js/sb-admin-2.min.js"></script>

     <!-- Page level plugins -->
     <script src="dash/vendor/chart.js/Chart.min.js"></script>

     <!-- Page level custom scripts -->
     <script src="dash/js/demo/chart-area-demo.js"></script>
     <script src="dash/js/demo/chart-pie-demo.js"></script>

</body>
<html>

