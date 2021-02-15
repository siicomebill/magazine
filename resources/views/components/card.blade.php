<div class="md:grid grid-cols-4 my-4 items-center">
    @if (isset($image))
        <a class="block" href="{{$link}}">
            @component('components.image', [
                "src" => $image,
                "alt" => $title,
                "class" => "rounded-lg shadow-lg w-full"
            ])
            @endcomponent
        </a>
    @endif
    <div class="px-4 py-2 col-span-3">
        @if (isset($header))
            <div class="mb-4">
                {{ $header }}
            </div>
        @endif

        <a class="block font-banner text-xl lg:text-3xl" href="{{$link ?? ''}}">{{$title}}</a>
        <p>{{$description ?? ''}}</p>

        @if (isset($footer))
            <div class="mt-6">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>