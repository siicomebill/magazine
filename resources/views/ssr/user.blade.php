@extends('layouts.content.compact')

@section('content')
    <div class="py-6">
        <div class="flex justify-center">
            <div class="block text-center">
                @component('components.image', [
                    "src" => $user->profile_photo_url,
                    "alt" => $user->name,
                    "class" => "block rounded-full h-24 border-4 border-white shadow-lg"
                ])
                @endcomponent
                <p class="font-handwritten text-4xl">{{$user->name}}</p>
            </div>
        </div>

        <section class="px-10">
            @foreach ($user->articles as $article)
                @component('components.card', [
                    'title' => $article->title,
                    'description' => $article->snippet,

                    'image' => $article->image,
                    'link' => route('articles.read', ($article->slug ?? $article->id)),
                ])
                    @if (isset($article->category))
                        @slot('header')
                            <a href="{{ route('categories.articles', $article->category->id) }}">{{ $article->category->name }}</a>
                        @endslot
                    @endif

                    @slot('footer')
                        <p class="font-handwritten text-4xl">Scritto da <a class="font-bold" href="{{route('user.page', $article->author->id)}}">{{$article->author->name}}</a></p>
                    @endslot
                @endcomponent
            @endforeach
        </section>
    </div>
@endsection