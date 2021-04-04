@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => config('backpack.base.project_logo'),
        'content'     => trans('backpack::base.use_sidebar'),
        'button_link' => backpack_url('/'),
        'button_text' => trans('Go Fullscreen'),
    ];
@endphp

@section('content')
@endsection