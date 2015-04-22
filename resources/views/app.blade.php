<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<title>@yield('title')</title>
		<meta charset="UTF-8">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap and Custom CSS -->
		<link href="{{ asset('css/backend.css') }}" rel="stylesheet" media="screen">
		<script src="{{ asset('js/modernizr.js') }}"></script>
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/img/favicon.ico') }}"/>
	</head>
	<body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="uk-grid uk-text-center">
            <div class="uk-container-center uk-margin-large-top" style="width: 350px">
                @yield('content')
            </div>
        </div>

		<!-- jQuery and UIkit -->
		<script src="{{ asset('js/back.js') }}"></script>
		@include('admin.partials.slideup')
	</body>
</html>