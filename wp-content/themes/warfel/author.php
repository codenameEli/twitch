<?php

//* Template Name: Author

remove_action('genesis_loop', 'genesis_do_loop');

add_action( 'genesis_before_content', 'tower_do_author_header' );
add_action( 'genesis_loop', 'tower_do_services_loop' );

function tower_do_author_header()
{
    get_template_part( 'partials/author-header' );
}

function tower_do_services_loop()
{
    ?>
    <section class="grid-loop-container">
        <?php
        get_template_part('partials/loop/grid-loop');
        ?>
    </section>
    <?php
    genesis_posts_nav();
}

genesis();