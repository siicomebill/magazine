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