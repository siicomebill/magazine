<div class="md:grid grid-cols-4 my-4 items-center">
    @if ($image)
        <a class="block" href="{{$link}}">
            <img src="{{$image}}" alt="{{$title}}" class="rounded-lg shadow-lg w-full">
        </a>
    @endif
    <div class="px-4 py-2 col-span-3">
        <a class="block font-banner text-xl lg:text-3xl" href="{{$link}}">{{$title}}</a>
        <hr>
        <p>{{$description}}</p>

        <div class="mt-6">
            {{ $footer }}
        </div>
    </div>
</div>