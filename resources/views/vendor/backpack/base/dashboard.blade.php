@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => config('backpack.base.project_logo'),
        'content'     => trans('backpack::base.use_sidebar'),
        'button_link' => backpack_url('/'),
        'button_text' => trans('Go Fullscreen'),
    ];

    $widgets['after_content'][] = [
        'type'         => 'alert',
        'class'        => 'alert alert-danger mb-2',
        'heading'      => 'DEMO',
        'content'      => 'Questa nuova dashboard è ancora in fase di testing.',
        'close_button' => true, // show close button or not
    ];
@endphp

@section('content')
@endsection