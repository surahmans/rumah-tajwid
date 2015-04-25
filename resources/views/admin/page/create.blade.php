@extends('admin.master')

@section('title')
    Tambah Artikel
@stop

@section('navbar')
    @include('admin.partials.navbar')
@stop

@section('sidebar')
    @include('admin.partials.sidebar')
@stop

@section('content')
    <h2>Tambah Halaman Statis</h2>

    @if($errors->any())
        <div class="uk-alert uk-alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="uk-panel uk-panel-box uk-panel-box-secondary uk-border-rounded">
        {!! Form::open(['method' => 'POST', 'url' => Auth::user()->level . '/page', 'class' => 'uk-form uk-form-horizontal']) !!}

        @include('admin.page._form')

        {!! Form::close() !!}

    </div>
@stop

@section('script')
    <script type="text/javascript" src="{{ url('') }}/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/tinymce/tinymce_editor.js"></script>
    <script type="text/javascript">
        editor_config.selector = "textarea";
        tinymce.init(editor_config);
    </script>
@stop