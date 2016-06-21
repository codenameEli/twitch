<?php

remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_entry_header', 'tower_do_featured_image', 5 );

add_action( 'genesis_entry_footer', 'tower_do_single_featured_image', 10 );
add_action( 'genesis_entry_footer', 'tower_do_single_share_this_article', 15 );
add_action( 'genesis_before_comments', 'tower_do_single_related_articles' );

function tower_do_single_featured_image()
{
    the_post_thumbnail('tower-archive-featured-image');
}

function tower_do_single_share_this_article()
{   
    global $post;
    
    get_template_part( 'partials/share-this-article' );
}

function tower_do_single_related_articles()
{
    global $post;

    $args = array(
        'posts_per_page' => 3,
        'post_type' => 'post',
        'post__not_in' => array($post->ID),
    );
    $custom_query = new WP_Query($args);
    ?>
    <section class="related-posts-container grid-loop-container">
        <h1>Similar Articles</h1>
    <?php
    foreach ($custom_query->posts as $related_post) {
        $thumbnail_url = has_post_thumbnail($related_post->ID) ? get_the_post_thumbnail_url( $related_post->ID, 'tower-archive-featured-image' ) : get_stylesheet_directory_uri() . '/assets/images/default-archive-featured-image.jpg';
        ?>
        <div class="related-post grid-loop-item grid-loop-item-image">
            <img src="<?php echo $thumbnail_url; ?>"/>
            <h2 class="item-title">
                <a href="<?php echo get_the_permalink($related_post->ID); ?>"><?php echo get_the_title($related_post->ID); ?></a>
            </h2>
        </div>
        <?php
    }
    ?>
    </section>
    <?php
}


genesis();