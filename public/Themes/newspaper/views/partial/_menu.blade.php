@foreach(menuItems() as $menu=>$m)
<li>
    <a href="{{$m['link']}}">{{$m['menu']}}</a>
    @if(array_key_exists('child',$m))
    <ul class="dropdown">
        @foreach($m['child'] as $menus)
            @include('partial._submenu', $menus)
        @endforeach
    </ul>
    @endif
</li>
@endforeach