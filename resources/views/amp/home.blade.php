@extends('layouts.amp')

@section('page')
    <div class="py-4 px-6 xl:grid grid-cols-2">
        @foreach ($articles as $article)
        <div class="md:grid grid-cols-4 my-4 items-center">
            @if ($article->image)
                <a class="block" href="{{route('amp.articles.read', ($article->slug ?? $article->id))}}">
                    <img src="{{$article->image}}" alt="{{$article->title}}" class="rounded-lg shadow-lg w-full">
                </a>
            @endif
            <div class="px-4 py-2 col-span-3">
                <a class="block font-banner text-xl lg:text-3xl" href="{{route('amp.articles.read', ($article->slug ?? $article->id))}}">{{$article->title}}</a>
                <hr>
                <p>{{$article->snippet}}</p>

                <div class="mt-6">
                    <p class="font-handwritten text-4xl">Scritto da <a class="font-bold" href="{{route('amp.user.page', $article->author->id)}}">{{$article->author->name}}</a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection