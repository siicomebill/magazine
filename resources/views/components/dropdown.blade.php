<div class="group-scope inline-block">
    <button class="outline-none focus:outline-none rounded-lg text-left flex items-center min-w-32">
        @if (isset($label))
            <a href="{{ $link ?? 'javascript:void(0)' }}" class="pr-1 font-semibold flex-1">{{ $label }}</a>
        @endif

        @if(isset($items))
            <svg class="fill-current h-4 w-4 transform group-scope-hover:-rotate-180 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
            </svg>
        @endif
    </button>
    <ul class="bg-white text-black border-2 border-black rounded-lg transform hidden group-scope-hover:block absolute left-0 right-0 transition duration-150 ease-in-out origin-top min-w-32">
        @if (isset($items))
            @foreach ($items as $item)
                <li class="px-3 py-1 hover:bg-gray-100 rounded-lg">
                    @if (isset($item['items']) && count($item['items']) > 0)
                        @include('components.dropdown', [
                        'label' => $item['label'],
                        'link' => $item['link'],
                        'items' => $item['items']
                        ])
                    @else

                        <a href="{{ $item['link'] ?? '' }}">
                            <span>{{ $item['label'] }}</span>
                        </a>
                    @endif
                </li>
            @endforeach
        @endif
    </ul>
</div>
