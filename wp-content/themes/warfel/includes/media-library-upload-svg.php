<?php

add_filter( 'upload_mimes', 'tower_mime_types' );

function tower_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
