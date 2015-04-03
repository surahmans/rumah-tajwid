<div class="row" id="slideshow">
    <div class="col-xs-12">
        <?php $active = 'slide--active'; ?>
        @foreach($slides as $slide)
            <div class="slide {{ $active }}">
                <img src="{{ asset('images/slide/'.$slide->cover) }}" class="img-rounded img-responsive" alt="Slide image"/>
                <div class="overlay">
                    <h3><a href="{{ action('ArticleController@show', [$slide->id]) }}">{{ $slide->title }}</a></h3>
                    <p>{{ $slide->excerpt }}</p>
                </div>
            </div>
            <?php $active = ''; ?>
        @endforeach
    </div>
</div>