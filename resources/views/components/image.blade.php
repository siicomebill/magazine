@if (isset($src))
    <img src="{{$src}}" alt="{{$alt ?? ''}}" class="{{$class ?? ''}}" {{$additional ?? ''}} />
@endif