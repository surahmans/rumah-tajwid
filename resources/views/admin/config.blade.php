@extends('admin.master')

@section('title')
    Halaman Pengaturan
@stop

@section('navbar')
    @include('admin.partials.navbar')
@stop

@section('sidebar')
    @include('admin.partials.sidebar')
@stop

@section('content')
    @if(Session::has('successMessage'))
        <div class="uk-grid uk-text-center">
            <div class="uk-width-1-1 uk-container-center">
                <div class="uk-alert uk-alert-success" data-uk-alert>
                    <a href="#" class="uk-alert-close uk-close"></a>
                    <p>{{ session('successMessage') }}</p>
                </div>
            </div>
        </div>
    @endif

    <h1>Konfigurasi web</h1>

    <hr/>

    @include('admin.partials.config_form')
@stop