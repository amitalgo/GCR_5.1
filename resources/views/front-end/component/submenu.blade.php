
<ul class="{{!$subsolution->getChildren()->isEmpty()?'dropdown-menu':''}}">
        @foreach($subsolution->getChildren() as $children)
                @if($children->getIsActive())
        <li class="{{!$children->getChildren()->isEmpty()?'dropdown-submenu':''}}"><a href="{{route('solution.show', ['id'=>$children->getUrlSlug()  ])}}">{{$children->getTagName()}}</a>
                @if(!$children->getChildren()->isEmpty())
                        {!! view('front-end.component.submenu',['subsolution'=>$children])  !!}
                @endif
        </li>
                @endif
        @endforeach

</ul>
