<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<title>@yield('title')</title>
		<meta charset="UTF-8">
        @if (isset($article))
            <meta name="description" content="{{ substr(strip_tags($article->body), 0, 250) }}">
        @else
            <meta name="description" content="Yayasan Rumah Tajwid Indonesia, pusat pendidikan Al-Quran semua usia dan semua level." />
            <meta name="keywords" content="belajar tajwid, baca quran, rumah tajwid, yayasan tajwid, pendidikan al-quran" />
        @endif
        
        @if (isset($og))
            {!! $og !!}
        @endif
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap and Custom CSS -->
		<link href="{{ asset('css/style.css') }}" rel="stylesheet" media="screen">
		<script src="{{ asset('js/modernizr.js') }}"></script>
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/img/favicon.ico') }}"/>
		{!! $widget->head !!}
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
		{!! $widget->body !!}
	</body>
</html>