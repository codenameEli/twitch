<?php

//* Template Name: Portfolio Template

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
    
    $args = array(
        'taxonomy' => 'project_type',
    );
    $terms = get_terms($args);
//    $wp_query = new WP_Query;
    $wp_query = $terms;
    ?>
    <section class="grid-loop-container">
        <?php
        get_template_part('partials/loop/grid-loop-item-image');
        ?>
    </section>
    <?php
}
genesis();