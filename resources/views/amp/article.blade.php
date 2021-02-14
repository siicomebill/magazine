@extends('layouts.amp')

@section('page')
    <section class="lg:grid grid-flow-cols grid-cols-3 items-center mt-32">
        <div class="py-7 px-8">
            <img src="{{$article->image}}" alt="{{$article->title}}" class="block rounded-lg shadow-lg mx-auto -mt-32" />

            <div class="flex justify-center -mt-12">
                <a class="block text-center" href="{{ route('amp.user.page', $article->author->id) }}">
                    <img src="{{$article->author->profile_photo_url}}" alt="{{$article->author->name}}" class="block rounded-full h-24 border-4 border-white shadow-lg" />
                    <p class="font-handwritten text-4xl">{{$article->author->name}}</p>
                </a>
            </div>
        </div>

        <div class="col-span-2 px-8">
            <h1 class="lg:text-5xl text-3xl font-banner">{{$article->title}}</h1>

            <p class="lg:text-2xl text-xl">{{$article->snippet}}</p>

            <p class="my-8 text-gray-600">{{date("d M Y", strtotime($article->published_at))}}</p>
        </div>
    </section>

    @if (isset($sponsors[0]))
        <section class="my-4 bg-blue-500 text-white banner py-8">
            <div class="p-4 mx-auto lg:w-2/3">
                <p class="text-white text-sm opacity-70">Sponsor</p>

                <div class="lg:grid grid-auto-cols grid-cols-3 gap-4 items-center">
                    <a class="block" href="{{$sponsors[0]->link}}" rel="sponsored">
                        <img src="{{ $sponsors[0]->image }}" class="max-h-96 lg:mx-auto rounded-lg shadow-lg" />
                    </a>

                    <div class="col-span-1 w-full">
                        <div class="mb-6">
                            <p class="font-banner text-3xl">{{$sponsors[0]->name}}</p>

                            <p class="text-xl">{{$sponsors[0]->snippet}}</p>
                        </div>

                        <a class="rounded-full bg-white text-blue-500 px-4 py-2 font-banner text-lg" href="{{$sponsors[0]->link}}" rel="sponsored">{{$sponsors[0]->cta}}</a>
                    </div>
                </div>
            </div>
            
        </section>
    @endif

    <section class="article content mx-auto lg:w-2/3 lg:px-0 px-8 py-10">
        {!! prosemirrorToHtml($article->content) !!}
    </section>

    <section class="bg-gray-200 text-center py-8 px-2">
        <p>Reazioni e commenti non disponibili nella versione lite, per mostrarli <a href="{{request()->canonicalUrl}}" class="underline font-bold text-blue-500">vai alla pagina originale</a> dell'articolo.</p>
    </section>

    @if (isset($sponsors) && count($sponsors) > 1)
        <p class="text-sm opacity-70 text-center pt-2 pb-4">Sponsors</p>
        <section class="my-4 bg-blue-500 text-white banner py-8">

            <div class="p-4 lg:w-5/6 mx-auto lg:grid grid-flow-cols grid-cols-2 gap-4">
                @foreach ($sponsors->forget(0) as $sponsor)
                    <div class="lg:grid grid-auto-cols grid-cols-3 gap-4 items-center my-20">
                        <a class="block" href="{{$sponsor->link}}" rel="sponsored">
                            <img src="{{ $sponsor->image }}" class="max-h-96 lg:mx-auto rounded-lg shadow-lg" />
                        </a>

                        <div class="col-span-1 w-full">
                            <div class="mb-6">
                                <p class="font-banner text-3xl">{{$sponsor->name}}</p>

                                <p class="text-xl">{{$sponsor->snippet}}</p>
                            </div>

                            <a class="rounded-full bg-white text-blue-500 px-4 py-2 font-banner text-lg" href="{{$sponsor->link}}" rel="sponsored">{{$sponsor->cta}}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </section>
    @endif

    <section class="px-10 lg:grid grid-cols-3 gap-4">
        @if (isset($article->category))
            @foreach ($suggested["ofAuthor"] as $a)
                @component('components.card', [
                    'title' => $a->title,
                    'description' => $a->snippet,

                    'image' => $a->image,
                    'link' => route('amp.articles.read', ($a->slug ?? $a->id)),
                ])
                @endcomponent
            @endforeach
        @endif
    </section>

    <section class="px-10 lg:grid grid-cols-3 gap-4 bg-primary banner rounded-b-lg">
        @if (isset($article->category))
            @foreach ($suggested["ofCategory"] as $a)
                @component('components.card', [
                    'title' => $a->title,
                    'description' => $a->snippet,

                    'image' => $a->image,
                    'link' => route('amp.articles.read', ($a->slug ?? $a->id)),
                ])
                @endcomponent
            @endforeach
        @endif
    </section>
@endsection