@extends('layouts.amp')

@section('page')
    <div>
        <section>
            <div>
                @if (isset($article->category))
                    <p>
                        Pubblicato da
                        <a href="{{ route('user.page', $article->author->id) }}">{{ $article->author->name }}</a>
                        in
                        <a
                            href="{{ route('categories.articles', $article->category->id) }}">{{ $article->category->name }}</a>
                        in data
                        <strong>{{ date('d M Y', strtotime($article->published_at)) }}</strong>
                    </p>
                @endif

                <h1>{{ $article->title }}</h1>

                <p>{{ $article->snippet }}</p>
                <hr/>
            </div>
        </section>

        <section>
            {!! prosemirrorToHtml($article->content) !!}
        </section>
    </div>
@endsection
