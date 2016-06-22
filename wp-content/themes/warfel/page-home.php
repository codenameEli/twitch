<?php
use Tower\Component\Hero_Slideshow as Hero_Slideshow;
use Tower\Component\CTA_Slideshow as CTA_Slideshow;
use Tower\Component\Repeatable_Block as Repeatable_Block;
use Tower\Component\Social_Rotator as Social_Rotator;

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

add_action( 'genesis_before_content', 'tower_do_hero_slideshow' );
add_action( 'genesis_before_content', 'tower_do_cta_slideshows' );
add_action( 'genesis_before_content', 'tower_do_repeatable_blocks' );

function tower_do_hero_slideshow()
{
    $gallery = get_field( 'hero_slideshow_images' );
    $args = array(
        'autoplay' => false,
        'dots' => true,
        'arrows' => false,
        'adaptiveHeight' => true
//        'vertical' => true,
//        'verticalSwiping' => true
    );
    $hero_slideshow = new Hero_Slideshow( $gallery, $args );

    $hero_slideshow->render();
}
function tower_do_cta_slideshows()
{
    $repeater_groups = get_field( 'cta_slideshow_content' );
    ?>
    <section class="cta-section">
    <?php

    foreach ($repeater_groups as $index => $repeater_group) {
        $args = array(
            'autoplay' => false,
            'dots' => true,
            'arrows' => false,
            'appendDots' => '#dots-container-' . $index
        );

        $cta_slideshow = new CTA_Slideshow($repeater_group, $args, $index);

        $cta_slideshow->render();
    }

    ?>
    </section>
    <?php
}
function tower_do_repeatable_blocks()
{
    $repeater_groups = get_field( 'repeatable_blocks_content' );
    ?>
    <section class="grid-loop-container pattern-fill">
        <?php

        foreach ($repeater_groups as $repeater_group) {

            if ( $repeater_group['repeatable_blocks_content_is_a_social_rotator_block'] === false ) {
                $block = new Repeatable_Block($repeater_group);
            } else {
                $block = new Social_Rotator();
            }

            $block->render();
        }

        ?>
    </section>
    <?php
}

genesis();
