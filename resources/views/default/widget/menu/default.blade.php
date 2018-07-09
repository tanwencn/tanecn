<ul class="nav navbar-nav ml-auto">
    @foreach($data as $link)
        <li class="nav-item {{ $link->children->isNotEmpty()?'dropdown':'' }}">
            <a href="{{ $link->url }}"
               @if($link->children->isNotEmpty())
               data-toggle="dropdown" class="dropdown-toggle"
                    @endif
            >{{ $link->title }} <b class="caret"></b></a>
            @if($link->children->isNotEmpty())
                <ul class="dropdown-menu">
                    @foreach($link->children as $submenu)
                        <li class="dropdown-item"><a href="{{ $submenu->url }}" class="nav-link">{{ $submenu->title }}</a></li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>