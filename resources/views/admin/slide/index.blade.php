@extends('admin.master')

@section('title')
    Halaman Slideshow
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

    <h1>Slideshow</h1>

    <hr/>

    <table id="slide" class="display">
    </table>

    <hr/>
@stop

@section('script')
    @include('admin.slide._datatables')
@stop