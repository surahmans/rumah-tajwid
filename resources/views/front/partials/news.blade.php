<div class="row newsfeed">
    <div class="col-xs-12">
        <p class="news">
            @foreach($popular as $article)
                <span class="fa fa-hand-o-right"></span>
                <a href="{{ action('ArticleController@show', [$article->id]) }}">
                    {{ $article->title }}
                </a>
            @endforeach
        </p>
    </div>
</div>