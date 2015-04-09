@extends('admin.master')

@section('title')
    Tambah Pengguna
@stop

@section('navbar')
    @include('admin.partials.navbar')
@stop

@section('sidebar')
    @include('admin.partials.sidebar')
@stop

@section('content')
    <h2>Tambah Pengguna</h2>

    <div class="uk-panel uk-panel-box uk-panel-box-secondary uk-border-rounded">

        {!! Form::open(['action' => 'UserController@store', 'class' => 'uk-form uk-form-horizontal']) !!}

            @include('admin.users._form')

        {!! Form::close() !!}

    </div>
@stop