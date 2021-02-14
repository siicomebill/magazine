@extends('layouts.amp')

@section('page')
    <div class="py-4 px-6 xl:grid grid-cols-2">
        @foreach ($articles as $article)
            @component('components.card', [
                'title' => $article->title,
                'description' => $article->snippet,

                'image' => $article->image,
                'link' => route('amp.articles.read', ($article->slug ?? $article->id)),
            ])
                @slot('footer')
                    <p class="font-handwritten text-4xl">Scritto da <a class="font-bold" href="{{route('amp.user.page', $article->author->id)}}">{{$article->author->name}}</a></p>
                @endslot
            @endcomponent
        @endforeach
    </div>

@endsection