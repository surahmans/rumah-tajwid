@extends('app')

@section('title')
    Reset password
@stop

@section('content')

    @if (session('status'))
        <div class="uk-alert-success">
            {{ session('status') }} <br/>
            <p>Please check your inbox early.</p>
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="uk-alert uk-alert-warning">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Reset Password</h1>

    <form class="uk-form uk-panel uk-panel-box uk-border-rounded" role="form" method="POST" action="{{ url('/password/email') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="uk-form-row">
            <div class="uk-width-1-1">
                <div class="uk-form-icon uk-width-1-1">
                    <i class="uk-icon-envelope"></i>
                    <input type="email" class="uk-width-1-1 uk-form-large uk-border-rounded" name="email" value="{{ old('email') }}" placeholder="Input your email...">
                </div>
            </div>
        </div>

        <div class="uk-form-row">
            <div class="uk-width-1-1">
                <button type="submit" class="uk-width-1-1 uk-button uk-button-primary uk-button-large uk-border-rounded">
                    Send reset password link
                </button>
            </div>
        </div>
    </form>
@endsection
