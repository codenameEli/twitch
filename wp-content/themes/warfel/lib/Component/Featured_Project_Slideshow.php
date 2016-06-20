<?php

namespace Tower\Component;

class Featured_Project_Slideshow
{
    public $Id;
    public $gallery;
    public $args = array();

    public function __construct($gallery, $args, $Id)
    {
        $this->Id = $Id;
        $this->gallery = $gallery;
        $this->args = $args;
    }

    public function render()
    {
        $this->before_loop();

        if ( empty( $this->gallery ) ) {
            $this->do_featured_image_markup();
        } else {
            $this->slick_before();
            $this->do_gallery_markup();
            $this->slick_after();
        }

        $this->after_loop();
    }

    public function do_featured_image_markup()
    {
        echo get_the_post_thumbnail();
    }

    public function add_featured_image_to_gallery()
    {
        array_unshift( $this->gallery, acf_get_attachment( get_post_thumbnail_id() ) );
    }

    public function do_gallery_markup()
    {
        $this->add_featured_image_to_gallery();

        foreach ( $this->gallery as $image ) {
            ?>
            <img class="featured-image" src="<?php echo $image['url']; ?>"/>
            <?php
        }
    }

    public function slick_before()
    {
        $slick_params = json_encode( $this->args );
        ?>
        <div class="slick" data-slick=<?php echo $slick_params; ?>>
        <?php
    }

    public function slick_after()
    {
        ?>
        </div>
        <?php
    }

    public function before_loop()
    {
        ?>
        <div id="featured-project-slideshow-<?php echo $this->Id; ?>" class="featured-project-slideshow">
        <?php
    }

    public function after_loop()
    {
        ?>
            <div class="featured-item-meta slideshow-content">
                <h2 class="featured-item-title"><?php echo get_the_title(); ?></h2>
                <p>Completion Date:</p>
                <p><?php echo get_field( 'completion_date_date' ); ?></p>
                <a class="grey-button" href="<?php echo get_permalink(); ?>">View Project</a>
                <div id="dots-container-<?php echo $this->Id; ?>" class="dashes-container"></div>
            </div>
        </div>
        <?php
    }
}