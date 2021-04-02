@extends(backpack_view('blank'))

<div>
    <p>DEMO Only.</p>
</div>

@php
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => trans('backpack::base.welcome'),
        'content'     => trans('backpack::base.use_sidebar'),
        'button_link' => backpack_url('/'),
        'button_text' => trans('Go Fullscreen'),
    ];
@endphp

@section('content')
@endsection