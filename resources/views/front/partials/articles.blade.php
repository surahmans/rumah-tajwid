<div class="row">
    @foreach($articles as $article)
        <div class="col-xs-12 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <img src="{{ asset('images/article/' . $article->cover) }}" class="img-intro img-rounded" alt=""/>
                    <h3 class="h4">{{ $article->title }}</h3>
                    <p>{{ $article->excerpt }}</p>
                    <p>
                        <a href="{{ action('ArticleController@show', [$article->slug]) }}" class="readmore pull-right">{{ $configs->readmore }}</a>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@include('front.partials.pagination', $articles)