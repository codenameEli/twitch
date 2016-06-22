<?php

//* Template Name: About Us Template

//remove_action('genesis_loop', 'genesis_do_loop');
remove_action( 'genesis_entry_header', 'tower_do_featured_image', 5 );

add_action( 'genesis_before_entry', 'tower_do_about_us_page_header' );
add_action( 'genesis_loop', 'tower_do_executive_team_loop' );

function tower_do_about_us_page_header()
{
    ?>
    <div class="archive-description">
        <p>More than 100 years of doing<br/>what we do best.</p>
    </div>
    <?php
}

function tower_do_executive_team_loop()
{
    global $wp_query;
    global $post;
    ?>
    <h1>Meet our executive team</h1>
    <?php
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'executive',
        'orderby' => 'menu_order',
        'order' => 'ASC'
    );
    $wp_query = new WP_Query($args);

    get_template_part('partials/loop/grid-loop');
}
genesis();