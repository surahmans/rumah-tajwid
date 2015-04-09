<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<title>@yield('title')</title>
		<meta charset="UTF-8">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap and Custom CSS -->
		<link href="{{ asset('css/style.css') }}" rel="stylesheet" media="screen">
		<script src="{{ asset('js/modernizr.js') }}"></script>
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/img/favicon.ico') }}"/>
	</head>
	<body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
            @yield('header')

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        @yield('content')
                    </div>
                    <div class="col-xs-12 col-md-4">
                        @yield('sidebar')
                    </div>
                </div>
                <hr/>
                <div class="row">
                    @yield('footer')
                </div>
            </div>

		<!-- jQuery and Bootstrap -->
		<script src="{{ asset('js/app.js') }}"></script>
	</body>
</html>