@extends('admin.master')

@section('navbar')
    @include('admin.partials.navbar')
@stop

@section('sidebar')
    @include('admin.partials.sidebar')
@stop

@section('content')
    @include('admin.partials.content')
@stop

@section('script')
    @include('admin.partials.datatables.users')
@stop