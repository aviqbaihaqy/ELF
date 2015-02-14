<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>ELF - Project</title>

	<!-- Bootstrap-->
	<link rel="stylesheet" href="{{ asset('packages/bootstrap/dist/css/bootstrap.min.css') }}"/>
	{{--<link rel="stylesheet" href="{{ asset('packages/bootstrap/dist/css/bootstrap-theme.min.css') }}"/>--}}

	<link href="/css/app.css" rel="stylesheet">

</head>
<body>

	@include('partials.navbar')

	<!-- Error Message -->
	<div class="container">
		@include('flash::message')
	</div>

	<!-- Content -->
	@yield('content')

	<!-- Scripts -->
	<script src="{{ asset('packages/jquery/jquery-2.1.1.min.js') }}"></script>
	<script src="{{ asset('packages/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
