<?php

// Globally loaded functions

function image(): App\Containers\ImageServiceContainer
{
    return resolve('\App\Containers\ImageServiceContainer');
}

function prosemirrorToHtml(array $data) : string
{
    return (new \ProseMirrorToHtml\Renderer)->render($data);
}

function mime2ext($mime) : string
{
    return \App\Helpers\FormatHelpers::mime2ext($mime);
}