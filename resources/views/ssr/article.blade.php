@extends('layouts.content.compact')

@section('content')
    <section class="lg:grid grid-flow-cols grid-cols-3 items-center mt-32">
        <div class="py-7 px-8">
            <div class="-mt-32">
                @if ($article->image)
                    @include('components.image', [
                    "src" => $article->image,
                    "alt" => $article->title,
                    "class" => "block rounded-lg shadow-lg mx-auto"
                    ])
                @endif
            </div>

            <div class="flex justify-center -mt-12">
                <a class="block" href="{{ route('user.page', $article->author->id) }}">
                    @include('components.image', [
                        "src" => $article->author->profile_photo_url,
                        "alt" => $article->author->name,
                        "class" => "block rounded-full border-4 border-white shadow-lg",
                        "containerClass" => "w-20",
                        "aspectRatio" => "square",
                    ])
                    <p class="font-handwritten text-4xl text-center">{{ $article->author->name }}</p>
                </a>
            </div>
        </div>

        <div class="col-span-2 px-8">
            @if (isset($article->category))
                <p>
                    Pubblicato in
                    <a class="font-bold"
                        href="{{ route('categories.articles', $article->category->id) }}">{{ $article->category->name }}</a>
                </p>
            @endif
            <h1 class="lg:text-5xl text-3xl font-banner">{{ $article->title }}</h1>

            <p class="lg:text-2xl text-xl">{{ $article->snippet }}</p>

            <p class="my-8 text-gray-600">{{ date('d M Y', strtotime($article->published_at)) }}</p>
        </div>
    </section>

    @if (isset($sponsors[0]))
        <section class="my-4 bg-blue-500 text-white banner py-8">
            <div class="p-4 mx-auto lg:w-2/3">
                <p class="text-white text-sm opacity-70">Sponsor</p>

                <div class="lg:grid grid-auto-cols grid-cols-3 gap-4 items-center">
                    <a class="block" href="{{ $sponsors[0]->link }}" rel="sponsored">
                        @include('components.image', [
                        "src" => $sponsors[0]->image,
                        "class" => "max-h-96 lg:mx-auto rounded-lg shadow-lg"
                        ])
                    </a>

                    <div class="col-span-1 w-full">
                        <div class="mb-6">
                            <p class="font-banner text-3xl">{{ $sponsors[0]->name }}</p>

                            <p class="text-xl">{{ $sponsors[0]->snippet }}</p>
                        </div>

                        <a class="rounded-full bg-white text-blue-500 px-4 py-2 font-banner text-lg"
                            href="{{ $sponsors[0]->link }}" rel="sponsored">{{ $sponsors[0]->cta }}</a>
                    </div>
                </div>
            </div>

        </section>
    @endif

    <section class="article content mx-auto lg:w-2/3 lg:px-0 px-8 py-10">
        {!! prosemirrorToHtml($article->content) !!}
    </section>

    @include('components.disqus')

    @if (isset($sponsors) && count($sponsors) > 1)
        <p class="mt-4 mb-0 text-sm text-blue-500 text-center pt-2 pb-2">Sponsors</p>
        <section class="mb-4 bg-blue-500 text-white banner py-8">

            <div class="p-4 lg:w-5/6 mx-auto lg:grid grid-flow-cols grid-cols-2 gap-4">
                @foreach ($sponsors->forget(0) as $sponsor)
                    <div class="lg:grid grid-auto-cols grid-cols-3 gap-4 items-center my-20">
                        <a class="block" href="{{ $sponsor->link }}" rel="sponsored">
                            @include('components.image', [
                            "src" => $sponsor->image,
                            "class" => "max-h-96 lg:mx-auto rounded-lg shadow-lg"
                            ])
                        </a>

                        <div class="col-span-1 w-full">
                            <div class="mb-6">
                                <p class="font-banner text-3xl">{{ $sponsor->name }}</p>

                                <p class="text-xl">{{ $sponsor->snippet }}</p>
                            </div>

                            <a class="rounded-full bg-white text-blue-500 px-4 py-2 font-banner text-lg"
                                href="{{ $sponsor->link }}" rel="sponsored">{{ $sponsor->cta }}</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </section>
    @endif

    @if (isset($suggested['ofAuthor']))
        <p class="text-center font-banner text-2xl">Altri articoli di <span
                class="text-primary">{{ $article->author->name }}</span></p>
        <section class="px-10 lg:grid lg:grid-cols-2 gap-4">
            @foreach ($suggested['ofAuthor'] as $a)
                @include('components.articlecard', [
                'title' => $a->title,
                'description' => $a->snippet,

                'category' => $a->category,

                'image' => $a->image,
                'identifier' => ($a->slug ?? $a->id),
                ])
            @endforeach
        </section>
    @endif

    @if (isset($article->category) && isset($suggested['ofCategory']))
        <div class="bg-primary banner rounded-b-lg mt-10 pt-5">
            <p class="text-center font-banner text-2xl">Altri articoli in <span>{{ $article->category->name }}</span></p>

            <section class="px-10 lg:grid lg:grid-cols-2 gap-4">
                @foreach ($suggested['ofCategory'] as $a)
                    @include('components.articlecard', [
                    'title' => $a->title,
                    'description' => $a->snippet,
    
                    'author' => $a->author,
    
                    'category' => $a->category,
    
                    'image' => $a->image,
                    'identifier' => ($a->slug ?? $a->id),
                    ])
                @endforeach
            </section>
        </div>
    @endif
@endsection
