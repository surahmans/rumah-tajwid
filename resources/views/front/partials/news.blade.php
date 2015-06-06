<div class="row newsfeed">
    <div class="col-xs-12">
        <p class="news">
            @foreach($popular as $article)
                <span class="fa fa-circle-o"></span>
                <a href="{{ action('ArticleController@show', [$article->slug]) }}">
                    {{ $article->title }}
                </a>
            @endforeach
        </p>
    </div>
</div>