<div class="row">
    <nav class="navbar nav--space navbar-default clearfix" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Rumah Tajwid</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                @foreach($menus as $menu)
                    @if(count($menu->submenu) > 0)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{ $menu->name }} <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach($menu->submenu as $child)
                                    <li><a href="{{ $child->page }}">{{ $child->name }}</a></li>
                                @endforeach
                            </ul>
                         </li>
                    @else
                        @if(count($menu->parentMenu) == 0)
                           <li><a href="{{ $menu->page }}">{{ $menu->name }}</a></li>
                        @endif
                    @endif
                @endforeach
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>













