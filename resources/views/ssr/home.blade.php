@extends('layouts.ssr')

@section('page')
    <header class="p-6 xl:grid grid-cols-2 items-center">
        <div class="text-center mx-auto">
            @if (isset($config['logo']['big']))
                <img src="{{ $config['logo']['big'] }}" alt="Logo" class="sm:max-w-sm" />
            @endif

            @if (isset($config['banner']))
                <div class="font-handwritten content">
                    {!! prosemirrorToHtml($config['banner']) !!}
                </div>
            @endif
        </div>

        @if (isset($articles) && count($articles) >= 2)
            <div>
                <p class="font-banner text-3xl text-center">✨ Ultimi articoli ✨</p>
                @foreach ($articles->take(2) as $id => $article)
                    @include('components.articlecard', [
                        'identifier' => $article->slug ?? $article->id,

                        'title' => $article->title,
                        'description' => $article->snippet,
                        'image' => $article->image,
                        'author' => $article->author,
                        'category' => $article->category,
                    ])
                @endforeach
            </div>
        @endif
    </header>

    <div class="xl:grid grid-cols-2 items-center">
        @foreach ($articles->slice(2) as $id => $article)
            <div class="py-4 px-6">
                @include('components.articlecard', [
                    'identifier' => $article->slug ?? $article->id,

                    'title' => $article->title,
                    'description' => $article->snippet,
                    'image' => $article->image,
                    'author' => $article->author,
                    'category' => $article->category,
                ])
            </div>

            @if (isset($sponsors[max($id - 2, 0)]) && ($id - 1) % 2 == 0)
                <section class="my-4 col-span-2 text-white py-2">
                    <div class="p-4 mx-auto lg:w-2/3">
                        <p class="text-white text-sm opacity-70">Sponsor</p>

                        <div class="lg:grid grid-auto-cols grid-cols-3 gap-4 items-center">
                            <a class="block" href="{{ $sponsors[max($id - 2, 0)]->link }}" rel="sponsored">
                                @include('components.image', [
                                    'src' => $sponsors[max($id - 2, 0)]->image,
                                    'class' => 'w-full lg:mx-auto rounded-lg shadow-lg',
                                ])
                            </a>

                            <div class="col-span-1 w-full">
                                <div class="mb-6">
                                    <p class="font-banner text-3xl">{{ $sponsors[max($id - 2, 0)]->name }}</p>

                                    <p class="text-xl">{{ $sponsors[max($id - 2, 0)]->snippet }}</p>
                                </div>

                                <a class="inline-block rounded-full bg-white text-blue-500 px-4 py-2 font-banner text-lg"
                                    href="{{ $sponsors[max($id - 2, 0)]->link }}"
                                    rel="sponsored">{{ $sponsors[max($id - 2, 0)]->cta }}</a>
                            </div>
                        </div>
                    </div>

                </section>
            @endif
        @endforeach
    </div>

@endsection
