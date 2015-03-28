@extends('master')

@section('title')
    {{ $article->title }}
@stop

@section('header')
    @include('front.partials.logo')
    @include('front.partials.nav')
    @include('front.partials.news')
@stop

@section('content')
    @include('front.partials.single-article')
@stop

@section('sidebar')
    @include('front.partials.sidebar')
@stop

@section('footer')
    @include('front.partials.footer')
@stop