<li>
    <a href="{{$menus['link']}}">{{$menus['menu']}}</a>
    @if(array_key_exists('child',$menus))
    <ul class="dropdown">
        @foreach($menus['child'] as $menus)
            @include('partial._submenu', $menus)
        @endforeach
    </ul>
    @endif
</li>
