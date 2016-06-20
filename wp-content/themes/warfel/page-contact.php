<?php

//* Template Name: Contact Template

add_action( 'genesis_entry_footer', 'tower_do_follow_us_social_links', 10 );
add_action( 'genesis_after_loop', 'tower_do_location_blocks', 15 );

function tower_do_follow_us_social_links()
{
    ?>
    <section class="follow-us-container">
        <span>Follow Us</span>
        <?php
        get_template_part( 'partials/radial-swoop-social-icons' );
        ?>
    </section>
    <?php
}

function tower_do_location_blocks()
{
    global $wp_query;

    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'location'
    );
    $wp_query = new WP_Query($args);
    ?>
    <section class="grid-loop-container fixed-width pattern-fill">
    <?php
    get_template_part('partials/loop/grid-loop');
    ?>
    </section>
    <?php
}

genesis();