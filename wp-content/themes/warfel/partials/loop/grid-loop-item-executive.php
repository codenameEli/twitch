<?php
if ( $wp_query->current_post % 3 === 0 ):
?>
<section class="grid-loop-container fixed-width pattern-fill">
<?php
endif;
?>
<div class="grid-loop-item grid-loop-item-text grid-loop-item-executive">
    <div class="headshot">
        <?php the_post_thumbnail( 'tower-headshot-image' ); ?>
    </div>
    <h2 class="item-title"><?php echo get_the_title(); ?></h2>
    <span class="executive-position"><?php echo get_field( 'job_description_position' ); ?></span>
    <button class="grey-button view-bio">View Bio</button>
    <button class="grey-button close-bio">Close Bio</button>
    <div class="executive-bio">
        <button class="close-bio">X</button>
        <p><?php echo get_the_content(); ?></p>
    </div>
</div>
<?php
if ( $wp_query->current_post % 3 === 2 && $wp_query->current_post !== 0 || $wp_query->current_post === $wp_query->post_count-1 ):
?>
</section>
<?php
endif;
