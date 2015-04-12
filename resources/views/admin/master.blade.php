<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<title>@yield('title')</title>
		<meta charset="UTF-8">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap and Custom CSS -->
		<link href="{{ asset('css/backend.css') }}" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="{{ asset('package/datatable/css/jquery.dataTables.min.css') }}"/>
		<script src="{{ asset('js/modernizr.js') }}"></script>
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/img/favicon.ico') }}"/>
	</head>
	<body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <div class="uk-grid uk-grid-collapse" >
            <div class="uk-width-1-5">
                @yield('sidebar')
            </div>
            <div class="uk-width-4-5">
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        @yield('navbar')
                    </div>

                    <div class="uk-width-1-1">
                        <div class="uk-width-9-10 uk-overflow-container uk-margin-large-left uk-margin-large-top">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<!-- jQuery and UIkit -->
		<script src="{{ asset('js/back.js') }}"></script>
		<script src="{{ asset('package/datatable/js/jquery.dataTables.min.js') }}"></script>
		@yield('script')
		@include('admin.partials.slideup')
	</body>
</html>