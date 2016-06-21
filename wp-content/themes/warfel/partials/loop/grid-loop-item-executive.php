<div class="grid-loop-item grid-loop-item-text grid-loop-item-executive">
    <div class="headshot">
        <?php the_post_thumbnail( 'tower-headshot-image' ); ?>
    </div>
    <h2 class="item-title"><?php echo get_the_title(); ?></h2>
    <span class="executive-position"><?php echo get_field( 'job_description_position' ); ?></span>
</div>