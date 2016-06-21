<?php
remove_action('genesis_loop', 'genesis_do_loop');

add_action( 'genesis_loop', 'tower_do_projects_loop' );

function tower_do_projects_loop()
{
    global $wp_query;
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