<?php

// Globally loaded functions

function image(): App\Containers\ImageServiceContainer
{
    return resolve('\App\Containers\ImageServiceContainer');
}

function prosemirrorToHtml(array $data) : string
{
    $renderer = new \ProseMirrorToHtml\Renderer();

    $renderer->addNode(\App\Classes\IFrameNode::class);

    return $renderer->render($data);
}

function mime2ext($mime) : string
{
    return \App\Helpers\FormatHelpers::mime2ext($mime);
}