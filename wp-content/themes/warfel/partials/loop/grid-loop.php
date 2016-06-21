<?php
use Tower\Component\Repeatable_Block as Repeatable_Block;
use Tower\Component\Social_Rotator as Social_Rotator;

global $post;
$repeater_groups = get_field( 'repeatable_blocks_content' );

if ( $wp_query->have_posts() ):
    while ( $wp_query->have_posts() ): the_post();
        if ( is_tax('project_type') && $wp_query->current_post === 0 ):
            get_template_part( 'partials/loop/featured-grid-item' );
        elseif ( get_post_type() === 'location' ):
            get_template_part( 'partials/loop/grid-loop-item-location' );
        elseif ( get_post_type() === 'executive' ):
            get_template_part( 'partials/loop/grid-loop-item-executive' );
        elseif ( get_post_type() === 'project' ):
            get_template_part( 'partials/loop/grid-loop-item-image' );
        else:
            get_template_part( 'partials/loop/grid-loop-item-default' );
        endif;
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