<div class="row">
    <div class="col-xs-12 col-sm-6">
        <div class="row">
            <?php $col = 2; //set blog column ?>
            @foreach($blogs as $blog)

                @if($col > 0)
                        <?php $col--; //rest of column ?>
                        <?php $limit = $configs->category; $latest = 1; ?>

                        @if($limit > count($blog->articles))
                            <?php $limit = count($blog->articles); ?>
                        @endif

                        @foreach($blog->articles as $article)
                            @if($latest > 0)
                                <div class="col-xs-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">{{ $blog->name }}</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="blog">
                                                <div class="blog--latest">
                                                    <img src="{{ 'images/article/' . $article->cover }}" class="blog--latest--img img-rounded" alt=""/>
                                                    <h3 class="blog--latest--img__overlay img-rounded">
                                                        <a href="{{ action('ArticleController@show', [$article->id]) }}">{{ $article->title }}</a>
                                                    </h3>
                                                </div>
                                                <div class="blog--links">
                            @else
                                                    <a href="{{ action('ArticleController@show', [$article->id]) }}">{{ $article->title }}</a>
                            @endif

                            <?php $latest--; ?>
                            <?php $limit--; ?>

                            @if($limit <= 0 || count($blog->articles) == 0)
                                                    <a href="{{ action('ArticleController@category', [$blog->id]) }}" class="more">{{ $configs->viewall }}</a>
                                                </div> <!-- Blog links -->
                                            </div> <!-- Blog -->
                                        </div> <!-- Blog panel body -->
                                    </div> <!-- End of blog panel -->
                                </div> <!-- End of blog column -->
                                <?php break; //Next category ?>
                            @endif
                        @endforeach
                    @if($col == 0)
                        <?php $col = 2; //set blog column again ?>
                                </div> <!-- end of column -->
                            </div> <!-- end of blog row -->
                            <div class="col-xs-12 col-sm-6">
                                <div class="row">
                    @endif
                @endif
            @endforeach
        </div>
    </div> <!-- End of Blogs column -->
</div> <!-- End of Blogs row -->