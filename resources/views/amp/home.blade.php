@extends('layouts.amp')

@section('page')
    <div class="p-4 text-center border-b border-gray-400 rounded-t-lg">
        <a href="{{route('amp.categories')}}" class="font-bold text-primary">Vai alle categorie</a>
    </div>

    <div class="py-4 px-6 xl:grid grid-cols-2">
        @foreach ($articles as $article)
            @component('components.card', [
                'title' => $article->title,
                'description' => $article->snippet,

                'image' => $article->image,
                'link' => route('amp.articles.read', ($article->slug ?? $article->id)),
            ])
                @if (isset($article->category))
                    @slot('header')
                        <a href="{{ route('amp.categories.articles', $article->category->id) }}">{{ $article->category->name }}</a>
                    @endslot
                @endif

                @slot('footer')
                    <p class="font-handwritten text-4xl">Scritto da <a class="font-bold" href="{{route('amp.user.page', $article->author->id)}}">{{$article->author->name}}</a></p>
                @endslot
            @endcomponent
        @endforeach
    </div>

@endsection