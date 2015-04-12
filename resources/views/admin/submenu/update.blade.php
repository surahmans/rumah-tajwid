@extends('admin.master')

@section('title')
    Ubah Submenu
@stop

@section('navbar')
    @include('admin.partials.navbar')
@stop

@section('sidebar')
    @include('admin.partials.sidebar')
@stop

@section('content')
    <h2>Ubah Data Submenu</h2>

    <div class="uk-panel uk-panel-box uk-panel-box-secondary uk-border-rounded">

        {!! Form::model($submenu, ['method' => 'PUT', 'action' => ['SubmenuController@update', $submenu->id], 'class' => 'uk-form uk-form-horizontal']) !!}

        @include('admin.submenu._form')

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