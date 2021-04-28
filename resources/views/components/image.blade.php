@if (isset($src))
    <div class="relative block {{$containerClass ?? ''}}">
        <div class="{{isset($aspectRatio) ? "aspect-ratio-" . $aspectRatio : ''}}">
            <img
                src="{{$src}}"
                alt="{{$alt ?? ''}}"
                class="{{$class ?? ''}} {{ isset($aspectRatio) ? "absolute z-0 object-cover inset-0": ''}}"
                {{$additional ?? ''}}
            />
        </div>
    </div>
@endif