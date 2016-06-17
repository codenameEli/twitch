<?php

namespace Tower\Component;

class Hero_Slideshow
{
    public $gallery;
    public $args;

    public function __construct($gallery, $args)
    {
        $this->gallery = $gallery;
        $this->args = $args;
    }

    public function render()
    {
        $images = $this->gallery;

        $this->before_slick_loop();

        foreach ( $images as $image ) {
            ?>
            <img src="<?php echo $image['url']; ?>"/>
            <?php
        }

        $this->after_slick_loop();
    }

    public function before_slick_loop()
    {
        $slick_params = json_encode( $this->args );
        ?>
        <div class="hero-slideshow-container slick" data-slick=<?php echo $slick_params; ?>>
        <?php
    }

    public function after_slick_loop()
    {
        ?>
        </div>
        <?php
    }
}