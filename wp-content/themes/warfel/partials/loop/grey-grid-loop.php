<?php
global $wp_query;
?>
<section class="grid-loop-container">
<?php
if ( $wp_query->have_posts() ):
    while ( $wp_query->have_posts() ): the_post();
        if ( get_post_type() === 'location' ):
            get_template_part( 'partials/loop/grid-item-location' );
        endif;
    endwhile;
endif;
wp_reset_postdata();
?>
</section>
<?php
