<?php
use Tower\Component\Project_Slideshow as Project_Slideshow;

remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

add_action( 'genesis_entry_footer', 'tower_do_project_photography_credits' );
add_action( 'genesis_after_content', 'tower_do_project_additional_pictures_slideshow' );
add_action( 'genesis_before_footer', 'tower_do_next_prev_pagination' );

function tower_do_project_photography_credits()
{
    global $post;

    $post = get_field( 'photography_credits_photographer' );

    setup_postdata($post);

    $link = get_field( 'photographer_information_link' );
    ?>
    <div class="photography-credits">
        <span>Photo Credit:</span>
        <?php
        if ( !empty( $link ) ):
            ?>
            <b><a href="<?php echo $link; ?>" target="_blank"><?php echo get_the_title(); ?></a></b>
            <?php
        else:
            ?>
            <b><?php echo get_the_title(); ?></b>
            <?php
        endif;
        ?>
    </div>
    <?php
    wp_reset_postdata();
}

function tower_do_project_additional_pictures_slideshow()
{
    global $post;

    $gallery = get_field( 'project_gallery_additional_pictures' );

    if ( empty( $gallery ) ) { return; }
    ?>
    <section class="project-slideshow-section">
        <?php
        $args = array(
            'autoplay' => false,
            'dots' => false,
            'arrows' => false,
            'appendDots' => '#dots-container-' . $post->ID,
            'slidesToShow' => 3,
            'slidesToScroll' => 1
        );

        $project_slideshow = new Project_Slideshow($gallery, $args, $post->ID);

        $project_slideshow->render();
        ?>
    </section>
    <?php
}

function tower_do_next_prev_pagination()
{
   ?>
    <div class="project-pagination">
        <div class="prev-link">
            <?php previous_post_link( '%link', 'Previous Project <span>%title</span>' ) ?>
        </div>
        <div class="next-link">
            <?php next_post_link( '%link', 'Next Project <span>%title</span>' ) ?>
        </div>
    </div>
    <?php
}

genesis();