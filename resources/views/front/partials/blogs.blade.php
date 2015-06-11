@foreach ($blogs->chunk(2) as $row)
    <div class="row">
        @foreach ($row as $blog)
            <div class="col-xs-12 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $blog->name }}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="blog">
                            <div class="blog--latest">
                                @foreach($blog->articles->slice(0,1) as $article)
                                    <img src="{{ 'images/blog/' . $article->cover }}" class="blog--latest--img img-rounded" alt=""/>
                                    <h3 class="blog--latest--img__overlay img-rounded">
                                        <a href="{{ action('ArticleController@show', [$article->slug]) }}">{{ $article->title }}</a>
                                    </h3>
                                @endforeach
                            </div>
                            <div class="blog--links">
                                @foreach ($blog->articles->slice(1,$configs->category) as $article)
                                   <a href="{{ action('ArticleController@show', [$article->slug]) }}">{{ $article->title }}</a>
                                @endforeach
                                <a href="{{ action('ArticleController@category', [$blog->slug]) }}" class="more">{{ $configs->viewall }}</a>
                            </div> <!-- Blog links -->
                        </div> <!-- Blog -->
                    </div> <!-- Blog panel body -->
                </div> <!-- End of blog panel -->
            </div> <!-- End of Blogs column -->
        @endforeach           
    </div> <!-- End of Blogs row -->
@endforeach