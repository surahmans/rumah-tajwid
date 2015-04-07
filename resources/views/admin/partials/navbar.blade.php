<div class="uk-width-1-1">
    <nav class="uk-navbar">
        <div class="uk-navbar-flip">
            <ul class="uk-navbar-nav">
                <li class="uk-parent" data-uk-dropdown>
                    <a href="#">
                        Halo, {{ Auth::user()->name }}
                        <i class="uk-icon-caret-down"></i>
                    </a>
                    <div class="uk-dropdown uk-dropdown-navbar">
                        <ul class="uk-nav uk-nav-navbar">
                            <li>
                                <a href="{{ url('/user/settings/' . Auth::user()->email) }}">
                                    <i class="uk-icon-cog"></i>
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('logout') }}">
                                    <i class="uk-icon-sign-out"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>