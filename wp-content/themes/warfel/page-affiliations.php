<?php

//* Template Name: Affiliations Template

remove_action('genesis_loop', 'genesis_do_loop');

add_action( 'genesis_before_loop', 'tower_do_affiliations_page_header' );
add_action( 'genesis_loop', 'tower_do_services_loop' );

function tower_do_affiliations_page_header()
{
    get_template_part( 'partials/archive-header' );
}

function tower_do_services_loop()
{
    global $wp_query;
    global $post;

    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'affiliation'
    );
    $wp_query = new WP_Query($args);
    ?>
    <section class="grid-loop-container fixed-width">
        <?php
        get_template_part('partials/loop/grid-loop');
        ?>
    </section>
    <?php
}
genesis();