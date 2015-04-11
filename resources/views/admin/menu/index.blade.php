@extends('admin.master')

@section('title')
    Halaman Menu
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

    <h1>Menu</h1>

    <hr/>

    <table id="menu" class="display">
    </table>

    <hr/>

    <a class="uk-button uk-button-primary" href="{{action('MenuController@create')}}">
        <i class="uk-icon-plus"></i>
         Tambah
    </a>
@stop

@section('script')
    @include('admin.menu._datatables')
    <script type="text/javascript">
        function pesan() {
            $result = confirm('Apakah Anda yakin ingin menghapusnya?');

            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@stop