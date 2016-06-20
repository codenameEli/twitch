<?php
use Tower\Component\Repeatable_Block as Repeatable_Block;
use Tower\Component\Social_Rotator as Social_Rotator;

$repeater_groups = get_field( 'repeatable_blocks_content' );
?>
<section class="grid-loop-container">
<?php
if ( $wp_query->have_posts() ):
    while ( $wp_query->have_posts() ): the_post();
        if ( $wp_query->current_post === 0 ) { // is the first post
            get_template_part( 'partials/loop/featured-grid-item' );
        }
        else {
            get_template_part( 'partials/loop/grid-item' );
        }
    endwhile;
endif;
wp_reset_postdata();

if ( !empty( $repeater_groups ) ):
    foreach ( $repeater_groups as $repeater_group ):

    if ( $repeater_group['repeatable_blocks_content_is_a_social_rotator_block'] === false ) {
        $block = new Repeatable_Block($repeater_group);
    } else {
        $block = new Social_Rotator();
    }

    $block->render();

    endforeach;
endif;
?>
</section>
