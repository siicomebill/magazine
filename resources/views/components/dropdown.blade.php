<div class="flex items-center justify-center p-12">
    <div class="relative inline-block text-left dropdown">
        <span class="rounded-md"><button
                class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium leading-5 transition duration-150 ease-in-out rounded-md focus:outline-none focus:shadow-outline-blue active:bg-gray-50"
                type="button" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-117">
                <a href="{{ $link ?? "javascript:void(0)" }}">
                    @if (isset($label))
                        {{ $label }}
                    @endif
                </a>
                <svg class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button></span>
        <div
            class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
            <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">

                @if (isset($items))
                    <div class="py-1">
                        @foreach ($items as $item)
                            @if (isset($item['items']))
                                @include('components.dropdown', [
                                    'label' => $item['label'],
                                    'link' => $item['link'],
                                    'items' => $item['items']
                                ])
                            @else
                                <a href="{{ $item['link'] ?? 'javascript:void(0)' }}" tabindex="0"
                                    class="flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"
                                    role="menuitem">{{ $item['label'] }}</a>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
