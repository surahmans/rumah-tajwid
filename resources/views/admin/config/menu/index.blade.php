@extends('admin.master')

@section('title')
    Halaman Order Menu
@stop

@section('navbar')
    @include('admin.partials.navbar')
@stop

@section('sidebar')
    @include('admin.partials.sidebar')
@stop

@section('content')
    <h1>Order Menu</h1>
    <hr>
    <ul class="sortable uk-list uk-list-striped">
        @foreach($menu as $item)
            <li class="uk-text-large" id="{{ $item->id }}">
                <i class="uk-icon-chevron-right"></i>
                {{ $item->name }}
            </li>
        @endforeach
    </ul>
    <hr>
    <p class="uk-text-muted">Drag menu ke atas atau ke bawah untuk mengubah urutan menu.</p>
@stop

@section('script')
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
        $(function() {
            $('.sortable').sortable({
                axis: 'y',
                stop: function(){
                    $.map($(this).find('li'), function(el) {
                        var itemID = el.id;
                        var itemIndex = $(el).index();

                        $.ajax({
                            url: "{!! URL::route('admin.config.menu.order') !!}",
                            type: "POST",
                            dataType: 'json',
                            data: {itemID: itemID, itemIndex: itemIndex, "_token":"{{ csrf_token() }}"},
                        })
                    });
                }
            });
        });
    </script>
@stop