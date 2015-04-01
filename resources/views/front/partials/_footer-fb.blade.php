@foreach($configs as $config)
    @if($config->name == "facebook")
        <div class="col-xs-12 col-md-4">
            <h3>Facebook</h3>
            <div class="fb-like-box" data-href="{{ $config->value }}" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
        </div>
    @endif
@endforeach

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=272843922879831&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>