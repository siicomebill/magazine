@extends('layouts.amp')

@section('page')
    <div class="py-6">
        <section class="px-10">
            @foreach ($categories as $category)
                @component('components.card', [
                    'title' => $category->name,
                    'description' => $category->snippet,

                    'image' => $category->image,
                    'link' => route('amp.categories.articles', ($category->id)),
                ])
                    @if (isset($category->parent))
                        @slot('header')
                            <a href="{{ route('amp.categories.articles', $category->parent->id) }}">{{ $category->parent->name }}</a>
                        @endslot
                    @endif
                @endcomponent
            @endforeach
        </section>
    </div>
@endsection