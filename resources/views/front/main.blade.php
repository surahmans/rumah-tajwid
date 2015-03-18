@extends('master')

@section('title')
    Rumah Tajwid Indonesia
@stop

@section('header')
    @include('front.partials.logo')
    @include('front.partials.nav')
    @include('front.partials.news')
@stop

@section('content')
    @include('front.partials.slide')
    @include('front.partials.blogs')
@stop

@section('sidebar')
    @include('front.partials.sidebar')
@stop

@section('footer')
    @include('front.partials.footer')
@stop