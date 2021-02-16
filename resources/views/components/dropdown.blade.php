<div x-data="{ open: false }" class="inline-flex relative items-center">
    <span @click="open = true" class="flex items-center focus:outline-none cursor-pointer">
        <span>
            @if (isset($title))
                {{$title}}
            @endif
        </span>

        <span class="block pl-2">
            <img src="/img/arrow-down.svg" alt class="h-4 w-4" x-bind:class="{ 'transform rotate-180': open }" />
        </span>
    </span>

    <div
        x-show="open"
        @click.away="open = false"

        class="order-first flex-col absolute top-full z-40 align-items-center shadow-lg bg-white text-black border-2 border-black py-2 px-4 rounded-lg"
    >
        {{$body ?? ''}}
    </div>
</div>