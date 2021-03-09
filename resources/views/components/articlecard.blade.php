<span
    x-data="{ fixed: {{$fixed ?? 'false'}} }"
    class="my-4 rounded-lg bg-dark text-white items-center grid-cols-4 border-2 border-white overflow-hidden"
    :class="{ 'block': fixed, 'block lg:grid': !fixed, }"
>
    @if (isset($image))
        <a
            href="{{ route('amp.articles.read', $identifier) }}"
            class="text-center overflow-hidden border-white border-b-2"
            :class="{'h-full lg:border-r-2 lg:border-b-0 lg:rounded-r-0': !fixed}"
        >
            @component('components.image', [
                "src" => $image,
                "alt" => $title,
                "aspectRatio" => "square",
                "class" => "flex object-cover",
            ])
            @endcomponent
            {{-- <Thumbnail
                :src="image"
                square
                :class="{'h-full lg:rounded-r-0': !fixed}"
            /> --}}
        </a>
    @endif

    <div
        class="col-span-3 flex flex-col p-4 justify-between leading-normal w-full break-normal"
    >
        @if (isset($category))
            <div
                class="items-center text-center lg:text-left lg:flex gap-4"
            >
                @if (isset($category->parent))
                    <a
                        href="{{ route('amp.categories.articles', $category->parent->id) }}"
                        class="block text-xl font-banner capitalize mb-3 lg:mb-0"
                    >
                        <span class="text-primary">#</span>
                        <span>{{ $category->parent->name }}</span>
                    </a>
                @endif

                <div>
                    <a
                        href="{{ route('amp.categories.articles', $category->id) }}"
                        class="bg-primary py-1 px-4 text-black rounded-full font-banner uppercase text-lg"
                    >
                        {{ $category->name }}
                    </a>
                </div>
            </div>
        @endif

        <div class="mt-4">
            <a class="block font-banner text-xl xl:text-3xl mb-2 break-words" href="{{ route('amp.articles.read', $identifier) }}">
                {{ $title }}
            </a>
            <div class="my-3" v-if="snippet">
                <div class="mb-3">
                    <p class="leading-none">{{ $description }}</p>
                </div>
            </div>

            <div>
                <slot></slot>
            </div>
        </div>

        @if (isset($author))
            <div class="text-4xl font-handwritten">
                <a href="{{route('amp.user.page', $author->id)}}">{{$author->name}}</a>
            </div>
        @endif

        <div>
            @slot('footer')
                footer
            @endslot
        </div>
    </div>
</span>