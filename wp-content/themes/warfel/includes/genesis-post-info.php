<?php

add_filter( 'genesis_post_info', 'tower_post_info_filter' );

function tower_post_info_filter($post_info)
{
    $post_info = '[post_date]';
    return $post_info;
}
