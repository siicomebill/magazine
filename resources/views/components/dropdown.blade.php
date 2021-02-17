<div x-data="{ open: false }" class="flex relative items-center {{$class ?? ''}}">
    <span @click="open = !open" class="flex items-center focus:outline-none cursor-pointer {{ ($mobileOnly ?? '') ? 'lg:hidden' : '' }}">
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
        x-bind:class="{ '{{ ($mobileOnly ?? '') ? 'hidden lg:block' : 'hidden' }}': !open }"
        @click.away="open = false"

        class="order-first flex-col absolute right-0 top-full z-40 align-items-center shadow-lg bg-white text-black border-2 border-black rounded-lg {{($mobileOnly ?? '') ? 'lg:relative lg:border-none lg:shadow-none lg:p-0' : 'py-2 px-4'}}"
    >
        {{$body ?? ''}}
    </div>
</div>