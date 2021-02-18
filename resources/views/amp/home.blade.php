@extends('layouts.amp')

@section('page')
    <div class="xl:grid grid-cols-2">
        @foreach ($articles as $id => $article)
            <div class="py-4 px-6">
                @component('components.articlecard', [
                    "identifier" => $article->slug ?? $article->id,

                    "title" => $article->title,
                    "description" => $article->snippet,
                    "image" => $article->image,
                    "author" => $article->author,
                    "category" => $article->category,
                ])
                @endcomponent
            </div>

            @if (isset($sponsors[max($id - 2, 0)]) && ($id - 1) % 2 == 0)
                <section class="my-4 bg-blue-500 col-span-2 text-white banner py-8">
                    <div class="p-4 mx-auto lg:w-2/3">
                        <p class="text-white text-sm opacity-70">Sponsor</p>

                        <div class="lg:grid grid-auto-cols grid-cols-3 gap-4 items-center">
                            <a class="block" href="{{$sponsors[max($id - 2, 0)]->link}}" rel="sponsored">
                                @component('components.image', [
                                    "src" => $sponsors[max($id - 2, 0)]->image,
                                    "class" => "max-h-96 lg:mx-auto rounded-lg shadow-lg"
                                ])
                                @endcomponent
                            </a>

                            <div class="col-span-1 w-full">
                                <div class="mb-6">
                                    <p class="font-banner text-3xl">{{$sponsors[max($id - 2, 0)]->name}}</p>

                                    <p class="text-xl">{{$sponsors[max($id - 2, 0)]->snippet}}</p>
                                </div>

                                <a class="rounded-full bg-white text-blue-500 px-4 py-2 font-banner text-lg" href="{{$sponsors[max($id - 2, 0)]->link}}" rel="sponsored">{{$sponsors[max($id - 2, 0)]->cta}}</a>
                            </div>
                        </div>
                    </div>
                    
                </section>
            @endif
        @endforeach
    </div>

@endsection