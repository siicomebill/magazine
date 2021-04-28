<?php

namespace App\Classes;

use ProseMirrorToHtml\Nodes\Node;

// This is a PHP implementation of the vue-publisher's IFrame node => https://github.com/sinisimattia/vue-publisher/blob/master/src/custom-nodes/IFrame.js
class IFrameNode extends Node
{
    protected $nodeType = 'iframe';
    protected $tagName = 'iframe';

    public function tag()
    {
        return [
            [
                'tag' => $this->tagName,
                'attrs' => $this->node->attrs,
            ],
        ];
    }
}
