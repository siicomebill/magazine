@extends(backpack_view('blank'))

@php
    $widgets['after_content'] = [ 
        [
            'type'        => 'alert',
            'class'       => 'alert alert-dark',
            'heading'     => '👋 Ciao, <b>' . auth()->user()->name . '</b>!',
            'content'     => trans('backpack::base.use_sidebar'),
        ]
    ];
@endphp

@section('content')
    <img src="https://i.ibb.co/zrP4qQ7/billboard.png" alt class="mx-auto" style="max-width: 500px; width: 100%">
@endsection