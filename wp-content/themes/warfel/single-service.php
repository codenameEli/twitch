<?php
use Tower\Component\Testimonials_Slideshow as Testimonials_Slideshow;

remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

add_action( 'genesis_after_content', 'tower_do_testimonial_slideshow', 10 );
add_action( 'genesis_after_content', 'tower_do_related_projects', 15 );

function tower_do_testimonial_slideshow()
{
    global $post;

    $testimonials = get_field( 'testimonials_slideshow_testimonials' );
    ?>
    <section class="testimonials-slideshow-section">
    <?php
        $args = array(
            'autoplay' => false,
            'dots' => true,
            'arrows' => false,
            'appendDots' => '#dots-container-' . $post->ID,
            'adaptiveHeight' => true
        );

        $testimonials_slideshow = new Testimonials_Slideshow($testimonials, $args, $post->ID);

        $testimonials_slideshow->render();
    ?>
    </section>
    <?php
}

function tower_do_related_projects()
{
    global $wp_query;

    $project_ids = get_field( 'related_projects_projects' );
    $args = array(
        'posts_per_page' => 3,
        'post_type' => 'project',
        'post__in' => $project_ids
    );
    $wp_query = new WP_Query($args);
    ?>
    <section class="grid-loop-container">
        <?php
        get_template_part('partials/loop/grid-loop');
        ?>
    </section>
    <?php
}

genesis();