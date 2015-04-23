@extends('admin.master')

@section('title')
    Ubah Artikel
@stop

@section('vendor')
    <link rel="stylesheet" href="{{ asset('css/all.css') }}"/>
@stop

@section('navbar')
    @include('admin.partials.navbar')
@stop

@section('sidebar')
    @include('admin.partials.sidebar')
@stop

@section('content')
    <h2>Ubah Artikel</h2>

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
        {!! Form::model($article, ['method' => 'PUT', 'url' => Auth::user()->level . '/article/' . $article->id, 'class' => 'uk-form uk-form-horizontal', 'files' => 'true']) !!}

        @include('admin.article._form')

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
    <script type="text/javascript">
        $('#select2').select2();
    </script>
@stop