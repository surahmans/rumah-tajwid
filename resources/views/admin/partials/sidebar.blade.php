<aside class="uk-width-1-1">
    <div class="uk-panel uk-panel-box">
        <h3 class="uk-panel-title uk-text-center">Rumah Tajwid</h3>
        <ul class="uk-nav uk-nav-side uk-nav-parent-icon" data-uk-nav>
            @unless(Auth::user()->level == 'author')
                <li class="uk-nav-divider"></li>
                <li><a href="{{ url('admin/user') }}">User</a></li>
                <li class="uk-parent">
                    <a href="#">Menu</a>
                    <ul class="uk-nav-sub">
                        <li><a href="{{ url('admin/menu') }}">Parent</a></li>
                        <li><a href="{{ url('admin/submenu') }}">Child</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('admin/slide') }}">Slide</a></li>
                <li><a href="{{ url('admin/category') }}">Category</a></li>
                <li class="uk-nav-divider"></li>
                <li class="uk-nav-header">Config</li>
                <li><a href="{{ url('admin/basic') }}">Basic</a></li>
                <li><a href="{{ url('admin/widget') }}">Widgets</a>
                </li>
            @endunless
            <li class="uk-nav-divider"></li>
            @if(Auth::user()->level == 'admin')
                <li><a href="{{ url('admin/article') }}">Articles</a></li>
                <li><a href="{{ url('admin/tag') }}">Tags</a></li>
            @else
                <li><a href="{{ url('author/article') }}">Articles</a></li>
            @endif
        </ul>
    </div>
</aside>