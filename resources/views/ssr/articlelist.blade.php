@extends('layouts.content.compact')

@section('content')
    <div class="pb-6">
        <div class="py-6 flex rounded-t-lg justify-center bg-primary banner">
            <div class="block text-center">
                @if (isset($category->image))
                    @component('components.image', [
                        "src" => $category->image,
                        "alt" => $category->name,
                        "class" => "mx-auto block rounded-lg h-80 border-4 border-white shadow-lg"
                    ])
                    @endcomponent
                @endif

                <p class="font-banner text-2xl">{{$category->name}}</p>

                <p class="text-xl">{{$category->description}}</p>
            </div>
        </div>

        @if (isset($category->children) && count($category->children))
            <div class="mb-4 py-4 text-center bg-gray-200">
                @foreach ($category->children as $child)
                    <a href="{{ route('categories.articles', $child->id) }}" class="px-6 font-banner underline">{{$child->name}}</a>
                @endforeach
            </div>
        @endif

        <section class="px-10">
            @foreach ($category->articles as $article)
                @component('components.card', [
                    'title' => $article->title,
                    'description' => $article->snippet,

                    'image' => $article->image,
                    'link' => route('articles.read', ($article->slug ?? $article->id)),
                ])
                    @slot('footer')
                        <p class="font-handwritten text-4xl">Scritto da <a class="font-bold" href="{{route('user.page', $article->author->id)}}">{{$article->author->name}}</a></p>
                    @endslot
                @endcomponent
            @endforeach
        </section>
    </div>
@endsection