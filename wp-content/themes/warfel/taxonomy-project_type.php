<?php
remove_action('genesis_loop', 'genesis_do_loop');

add_action( 'genesis_loop', 'tower_do_projects_loop' );

function tower_do_projects_loop()
{
    global $wp_query;

    get_template_part( 'partials/loop/grid-loop' );
    genesis_posts_nav();
}
genesis();