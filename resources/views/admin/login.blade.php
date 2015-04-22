<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<title>Halaman Login</title>
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

        @if(Session::has('unsuccessful'))
            <div class="uk-grid uk-text-center">
                <div class="uk-width-5-10 uk-container-center uk-margin-large-top">
                    <div class="uk-alert uk-alert-warning" data-uk-alert>
                        <a href="#" class="uk-alert-close uk-close"></a>
                        <p>{{ session('unsuccessful') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="uk-grid uk-text-center">
            <div class="uk-container-center uk-margin-large-top" style="width: 250px">
                <h1>Log in</h1>
                {!! Form::open(array ('url' => 'authenticate', 'class' => 'uk-form uk-panel uk-panel-box uk-border-rounded')) !!}
                    <div class="uk-form-row">
                        <div class="uk-form-icon">
                            <i class="uk-icon-user"></i>
                            {!! Form::text('email', null, array('class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'Username')) !!}
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <div class="uk-form-icon">
                            <i class="uk-icon-lock"></i>
                            {!! Form::password('password', array('class' => 'uk-width-1-1 uk-form-large uk-border-rounded', 'placeholder' => 'Password')) !!}
                        </div>
                    </div>
                    <div class="uk-form-row">
                        {!! Form::button('Login', array('class' => 'uk-width-1-1 uk-button uk-button-primary uk-button-large uk-border-rounded', 'type' => 'submit')) !!}
                    </div>
                    <div class="uk-form-row">
                        <a href="{{ url('password/email') }}" class="uk-text-small">Forgot password?</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

		<!-- jQuery and UIkit -->
		<script src="{{ asset('js/back.js') }}"></script>
	</body>
</html>