<?php

//* Template Name: Services Archive

remove_action('genesis_loop', 'genesis_do_loop');

add_action( 'genesis_before_loop', 'tower_do_archive_page_header' );
add_action( 'genesis_loop', 'tower_do_services_loop' );

function tower_do_archive_page_header()
{
   get_template_part( 'partials/archive-header' );
}

function tower_do_services_loop()
{
    global $wp_query;
    global $post;

    $args = array(
        'posts_per_page' => 9,
        'post_type' => 'service',
        'paged' => get_query_var('page')
    );
    $wp_query = new WP_Query($args);

    get_template_part( 'partials/loop/grid-loop' );
}
genesis();