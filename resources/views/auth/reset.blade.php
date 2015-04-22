@extends('app')

@section('title')
    New password
@stop

@section('content')

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

    <h1>New Password</h1>

    <form class="uk-form uk-panel uk-panel-box uk-border-rounded" role="form" method="POST" action="{{ url('/password/reset') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="uk-form-row">
            <div class="uk-form-icon uk-width-1-1">
                <i class="uk-icon-envelope"></i>
                <input type="email" class="uk-form-large uk-width-1-1"  name="email" value="{{ old('email') }}" placeholder="Input your old email">
            </div>
        </div>

        <div class="uk-form-row">
            <div class="uk-form-icon uk-width-1-1">
                <i class="uk-icon-lock"></i>
                <input type="password" class="uk-form-large uk-width-1-1"  name="password" placeholder="Input new password">

            </div>
        </div>

        <div class="uk-form-row">
            <div class="uk-form-icon uk-width-1-1">
                <i class="uk-icon-repeat"></i>
                <input type="password" class="uk-form-large uk-width-1-1"  name="password_confirmation" placeholder="Re-input new password">
            </div>
        </div>

        <div class="uk-form-row">
            <button type="submit" class="uk-button uk-button-primary uk-button-large uk-border-rounded uk-width-1-1">
                Reset Password
            </button>
        </div>
    </form>

@endsection
