@if (isset($src))
    <div class="relative block {{ isset($aspectRatio) ? 'h-full w-full' : '' }}">
        <div class="{{isset($aspectRatio) ? "h-full w-full aspect-ratio-" . $aspectRatio : ''}}">
            <img
                src="{{$src}}"
                alt="{{$alt ?? ''}}"
                class="{{$class ?? ''}} {{ isset($aspectRatio) ? 'h-full w-full absolute z-0 object-cover inset-0': ''}}"
                {{$additional ?? ''}}
            />
        </div>
    </div>
@endif