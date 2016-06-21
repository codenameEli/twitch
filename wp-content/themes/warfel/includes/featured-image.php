<?php

add_action( 'genesis_entry_header', 'tower_do_featured_image', 5 );

function tower_do_featured_image()
{
    global $post;

    if ( ! is_singular() ) { return; }
    if ( ! has_post_thumbnail() ) { return; }

    the_post_thumbnail( 'tower-featured-image' );
}