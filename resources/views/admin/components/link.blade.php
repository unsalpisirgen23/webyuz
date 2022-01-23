<a {{$href != null ? 'href='.$href.'' : null }}  {{$route != null ? 'href='.route($route,$params).'' : null }}  {!!  $class != null ? 'class="'.$class.'"' : null !!} {{$id != null ? 'id="'.$id.'"' : null }}  {{$onClick != null ? 'onclick="'.$onClick.'"' : null }}   {{$target != null ? 'target="'.$target.'"' : null}}
    {!!  $title != null ? 'title="'.$title.'"' : null !!}  >{!! $slot !!}</a>
