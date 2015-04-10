@extends('admin.master')

@section('title')
    Halaman Pengguna
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
    @include('admin.partials.content')
@stop

@section('script')
    @include('admin.partials.datatables.users')
@stop