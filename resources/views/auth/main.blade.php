<!DOCTYPE html>
<html lang="en">

<head>

	<title>Expense Tracker</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<!-- vendor css -->
	<link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
        @yield('authContent')
	
	</div>
</div>

</body>

</html>
