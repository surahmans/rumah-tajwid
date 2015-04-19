<div class="row">
    <div class="col-xs-12">
        <article class="article">
            <img src="{{ asset('images/article/' . $article->cover) }}" class="article--img img-rounded" alt=""/>

            <h2>{{ $article->title }}</h2>

            <span class="fa fa-calendar"> {{ Date::parse($article->published_at)->format('l, j F Y') }}</span>
            <span class="fa fa-user"> {{ $article->user->name }}</span>
            <hr/>

            <p>
                {!! $article->body !!}
            </p>

            <div class="share">
                <span>Share this:</span>
                <br/><br/>
                <a class="fb" onClick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ action('ArticleController@show', [$article->id]) }}','sharer','toolbar=0,status=0,width=580,height=325'); return false;" href="javascript: void(0)"><span class="fa fa-facebook fa-fw"></span> Share</a>

                <a class="tweet" onClick="window.open('https://twitter.com/intent/tweet?url={{ action('ArticleController@show', [$article->id]) }}','sharer','toolbar=0,status=0,width=580,height=325'); return false;" href="javascript: void(0)"><span class="fa fa-twitter fa-fw"></span> Tweet</a>

                <a class="google" onClick="window.open('https://plus.google.com/share?url={{ action('ArticleController@show', [$article->id]) }}','sharer','toolbar=0,status=0,width=580,height=325'); return false;" href="javascript: void(0)"><span class="fa fa-google-plus fa-fw"></span> Share</a>
            </div>

            <div class="tags">
                <h4 class="fa fa-tags"> Tags:</h4>

                @foreach($article->tags as $tag)
                    <a href="{{ action('ArticleController@tag', [$tag->id]) }}">{{ $tag->name }}</a>
                @endforeach
            </div>

            <hr/>

            <div class="row article--relations">
                <div class="row">
                    <div class="col-xs-12">
                        <h3>Artikel terkait:</h3>
                    </div>
                </div>
                <div class="row">
                    @foreach($related as $article)
                        <div class="col-xs-4">
                            <a href="{{ action('ArticleController@show', [$article->id]) }}">
                                <img src="{{ asset('images/slide/' . $article->cover) }}" class="img-rounded" alt=""/>
                                <h4 class="text-center">{{ $article->title }}</h4>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row">
                @include('front.partials._comment')
            </div>
        </article>
    </div>
</div>