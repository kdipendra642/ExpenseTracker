<!DOCTYPE html>
<html lang="en">

<head>
    <title>Expense Tracker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    
    

</head>
<body class="">
	<!-- [ navigation menu ] start -->
	@include('backend.layouts.sidebar')
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	@include('backend.layouts.header')
	<!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    @yield('content')
    <!-- [ Main Content ] end -->

    <!-- Required Js -->
    <script src="{{ asset('assets/js/vendor-all.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/pcoded.min.js')}}"></script>
</body>

</html>
