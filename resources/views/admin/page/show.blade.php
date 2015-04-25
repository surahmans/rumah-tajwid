@extends('master')

@section('title')
    {{ $page->title }}
@stop

@section('header')
    @include('front.partials.logo')
    @include('front.partials.nav')
    @include('front.partials.news')
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <article class="article">
                <h2>{{ $page->title }}</h2>

                <span class="fa fa-calendar"> {{ Date::parse($page->published_at)->format('l, j F Y') }}</span>
                <span class="fa fa-user"> {{ $page->user->name }}</span>
                <hr/>

                {!! $page->body !!}

                <div class="share">
                    <span>Share this:</span>
                    <br/><br/>
                    <a class="fb" onClick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ action('PageController@show', [$page->slug]) }}','sharer','toolbar=0,status=0,width=580,height=325'); return false;" href="javascript: void(0)"><span class="fa fa-facebook fa-fw"></span> Share</a>

                    <a class="tweet" onClick="window.open('https://twitter.com/intent/tweet?url={{ action('PageController@show', [$page->slug]) }}','sharer','toolbar=0,status=0,width=580,height=325'); return false;" href="javascript: void(0)"><span class="fa fa-twitter fa-fw"></span> Tweet</a>

                    <a class="google" onClick="window.open('https://plus.google.com/share?url={{ action('PageController@show', [$page->slug]) }}','sharer','toolbar=0,status=0,width=580,height=325'); return false;" href="javascript: void(0)"><span class="fa fa-google-plus fa-fw"></span> Share</a>
                </div>

                <hr/>

            </article>
        </div>
    </div>
@stop

@section('sidebar')
    @include('front.partials.sidebar')
@stop

@section('footer')
    @include('front.partials.footer')
@stop

