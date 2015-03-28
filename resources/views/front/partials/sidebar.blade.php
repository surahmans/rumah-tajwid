<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-12">
            <div class="panel panel-info">
            	  <div class="panel-heading">
            			<h3 class="panel-title text-center"><strong>Jadwal Sholat</strong></h3>
            	  </div>
            	  <div class="panel-body">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aperiam blanditiis dolor et quaerat? Ab assumenda blanditiis commodi cumque error, exercitationem illum, incidunt inventore iste, nisi quae quasi totam vel!</p>
            	  </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="col-xs-12">
            <div class="panel with-nav-tabs panel-info">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#popular" data-toggle="tab">Populer</a></li>
                        <li><a href="#recent" data-toggle="tab">Terkini</a></li>
                        <li>
                            <a href="#comment" data-toggle="tab">
                                <span class="fa fa-comment"> Komentar</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <!-- Popular posts -->
                        <div class="tab-pane fade in active" id="popular">
                            @foreach($popular as $article)
                                <div class="list">
                                    <img src="{{ asset('images/article/thumb/' . $article->cover) }}" alt=""/>
                                    <a href="{{ action('ArticleController@show', [$article->id]) }}">{{ $article->title }}</a>
                                    <p>On {{ $article->published_at }}</p>
                                </div>
                            @endforeach
                        </div>
                        <!-- End of Popular posts -->
                        <!-- Recent posts -->
                        <div class="tab-pane fade" id="recent">
                            @foreach($recent as $article)
                                <div class="list">
                                    <img src="{{ asset('images/article/thumb/' . $article->cover) }}" alt=""/>
                                    <a href="{{ action('ArticleController@show', [$article->id]) }}">{{ $article->title }}</a>
                                    <p>On {{ $article->published_at }}</p>
                                </div>
                            @endforeach
                        </div>
                        <!-- End of recent posts -->
                        <!-- Comments post -->
                        <div class="tab-pane fade" id="comment">
                            <div class="disqus-comment">
                                <script type="text/javascript" src="http://rumahtajwid.disqus.com/recent_comments_widget.js?num_items=5&hide_avatars=0&avatar_size=90&excerpt_length=100"></script>
                            </div>
                        </div>
                        <!-- End of Comments post -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>