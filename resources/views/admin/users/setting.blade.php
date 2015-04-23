@extends('admin.master')

@section('title')
    Ubah Pengguna
@stop

@section('navbar')
    @include('admin.partials.navbar')
@stop

@section('sidebar')
    @include('admin.partials.sidebar')
@stop

@section('content')
    <h2>Ubah Profil</h2>

    <div class="uk-panel uk-panel-box uk-panel-box-secondary uk-border-rounded">

        {!! Form::model($user, ['method' => 'PUT', 'url' => Auth::user()->level . '/settings/' . $user->id, 'class' => 'uk-form uk-form-horizontal', 'files' => 'true']) !!}

        <div class="uk-form-row">
            <label class="uk-form-label" for="name">Nama</label>
            <div class="uk-form-controls">
                {!! Form::text('name', null, array('class' => 'uk-form-large', 'placeholder' => 'Masukan nama')) !!}
            </div>
        </div>

        <div class="uk-form-row">
            <label class="uk-form-label" for="email">Email</label>
            <div class="uk-form-controls">
                {!! Form::text('email', null, array('class' => 'uk-form-large uk-form-width-large', 'placeholder' => 'Masukan email')) !!}
            </div>
        </div>

        <div class="uk-form-row">
            <label class="uk-form-label" for="password">Password baru</label>
            <div class="uk-form-controls">
                {!! Form::password('password', array('class' => 'uk-form-large', 'placeholder' => 'Masukan kata sandi', 'autocomplete' => 'off')) !!}
                <p class="uk-text-muted">Kosongkan kata sandi jika tidak ingin mengubahnya.</p>
            </div>
        </div>

        <div class="uk-form-row">
            <label class="uk-form-label" for="password_confirmation">Ulangi kata sandi</label>
            <div class="uk-form-controls">
                {!! Form::password('password_confirmation', array('class' => 'uk-form-large', 'placeholder' => 'Ulangi kata sandi', 'autocomplete' => 'off')) !!}
            </div>
        </div>

        <div class="uk-form-row">
            <div class="uk-form-controls">
                {!! Form::button('Simpan', array('class' => 'uk-button uk-button-primary uk-button-large uk-border-rounded', 'type' => 'submit')) !!}
            </div>
        </div>

        {!! Form::close() !!}

    </div>

    @if($errors->any())
        <div class="uk-alert uk-alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@stop