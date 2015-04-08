<aside class="uk-width-1-1">
    <div class="uk-panel uk-panel-box">
        <h3 class="uk-panel-title uk-text-center">Rumah Tajwid</h3>
        <ul class="uk-nav uk-nav-side uk-nav-parent-icon" data-uk-nav>
            @unless(Auth::user()->level == 'author')
                <li class="uk-nav-divider"></li>
                <li><a href="#">User</a></li>
                <li class="uk-parent">
                    <a href="#">Menu</a>
                    <ul class="uk-nav-sub">
                        <li><a href="#">Parent</a></li>
                        <li><a href="#">Child</a></li>
                    </ul>
                </li>
                <li><a href="#">Slide</a></li>
                <li><a href="#">Category</a></li>
                <li class="uk-nav-divider"></li>
                <li class="uk-nav-header">Config</li>
                <li><a href="#">Basic</a></li>
                <li class="uk-parent">
                    <a href="#">Sidebar</a>
                    <ul class="uk-nav-sub">
                        <li><a href="#">Top</a></li>
                        <li><a href="#">Bottom</a></li>
                    </ul>
                </li>
            @endunless
            <li class="uk-nav-divider"></li>
            <li><a href="#">Articles</a></li>
        </ul>
    </div>
</aside>