@extends('layouts.amp')

@section('page')
    <section class="lg:grid grid-flow-cols grid-cols-3 items-center">
        <div class="py-7 px-8">
            <img src="{{$article->image}}" alt="{{$article->title}}" class="block rounded-lg shadow-lg mx-auto" />

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

    <section class="content mx-auto lg:w-2/3 lg:px-0 px-8 py-10">
        {!! prosemirrorToHtml($article->content) !!}
    </section>
@endsection