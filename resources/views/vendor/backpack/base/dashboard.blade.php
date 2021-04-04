@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => '👋 Ciao, <b>' . auth()->user()->name . '</b>!',
        'content'     => trans('backpack::base.use_sidebar'),
        'button_link' => backpack_url('/'),
        'button_text' => trans('Go Fullscreen'),
    ];
@endphp

@section('content')
@endsection