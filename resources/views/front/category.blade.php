@extends('master')

@section('title')
    Kategori Artikel
@stop

@section('header')
    @include('front.partials.logo')
    @include('front.partials.nav')
    @include('front.partials.news')
@stop

@section('content')
    @include('front.partials.articles')
@stop

@section('sidebar')
    @include('front.partials.sidebar')
@stop

@section('footer')
    @include('front.partials.footer')
@stop