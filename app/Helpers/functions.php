<?php

// Globally loaded functions

function image(): App\Containers\ImageServiceContainer {
    return resolve('\App\Containers\ImageServiceContainer');
}