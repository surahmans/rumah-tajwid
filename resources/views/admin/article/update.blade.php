@extends('admin.master')

@section('title')
    Ubah Artikel
@stop

@section('vendor')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@stop

@section('navbar')
    @include('admin.partials.navbar')
@stop

@section('sidebar')
    @include('admin.partials.sidebar')
@stop

@section('content')
    <h2>Ubah Artikel</h2>

    <div class="uk-panel uk-panel-box uk-panel-box-secondary uk-border-rounded">
        {!! Form::model($article, ['method' => 'PUT', 'action' => ['ArticleController@update', $article->id], 'class' => 'uk-form uk-form-horizontal']) !!}

        @include('admin.article._form')

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

@section('script')
    <script type="text/javascript" src="{{ url('') }}/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/tinymce/tinymce_editor.js"></script>
    <script type="text/javascript">
        editor_config.selector = "textarea";
        tinymce.init(editor_config);
    </script>
@stop