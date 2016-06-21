<?php
$thumbnail_url = has_post_thumbnail() ? get_the_post_thumbnail_url( $post, 'tower-archive-featured-image' ) : get_stylesheet_directory_uri() . '/assets/images/default-archive-featured-image.jpg';
?>
<article class="grid-loop-item grid-loop-item-default grid-loop-item-text" itemtype="http://schema.org/CreativeWork">
    <div class="featured-image">
        <img src="<?php echo $thumbnail_url; ?>"/>
    </div>
    <div class="content-wrapper">
        <?php
        genesis_entry_header_markup_open();
            genesis_do_post_title();
            genesis_post_info();
        genesis_entry_header_markup_close();
        ?>
        <div class="entry-content" itemprop="text">
            <?php
            genesis_do_post_content();
            ?>
        </div>
    </div>
</article>
