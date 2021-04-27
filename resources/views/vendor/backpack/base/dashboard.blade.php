@extends(backpack_view('blank'))

@php
    $widgets['after_content'] = [ 
        [
            'type'        => 'jumbotron',
            'heading'     => '👋 Ciao, <b>' . auth()->user()->name . '</b>!',
            'content'     => trans('backpack::base.use_sidebar'),
            'button_link' => backpack_url('/'),
            'button_text' => trans('Go Fullscreen'),
        ]
    ];
@endphp

@section('content')
    <img src="https://i.ibb.co/zrP4qQ7/billboard.png" alt class="mx-auto" style="max-width: 500px; width: 100%">
@endsection