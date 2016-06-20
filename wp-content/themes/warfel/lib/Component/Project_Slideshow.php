<?php

namespace Tower\Component;

class Project_Slideshow
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

        $this->slick_before();
        $this->do_gallery_markup();
        $this->slick_after();

        $this->after_loop();
    }

    public function do_gallery_markup()
    {
        global $post;

        foreach ( $this->gallery as $image ):
            ?>
            <img src="<?php echo $image['sizes']['tower-archive-featured-image']; ?>"/>
            <?php
        endforeach;

        wp_reset_postdata();
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
        <div id="testimonials-slideshow-<?php echo $this->Id; ?>" class="testimonials-slideshow">
        <?php
    }

    public function after_loop()
    {
        ?>
        </div>
        <div id="dots-container-<?php echo $this->Id; ?>" class="dashes-container"></div>
        <?php
    }
}