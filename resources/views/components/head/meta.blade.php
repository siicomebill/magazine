<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="canonical" href="{{request()->canonicalUrl}}">


<title>{!! Meta::get('title') !!}</title>

{{-- Set default values (from configuration maybe?) --}}

{!! Meta::tag('description') !!}
{!! Meta::tag('author') !!}
{!! Meta::tag('image') !!}

{!! Meta::tag('canonical') !!}
{!! Meta::tag('robots') !!}