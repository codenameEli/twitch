<?php

namespace Tower\Component;

class Testimonials_Slideshow
{
    public $Id;
    public $testimonials;
    public $args = array();

    public function __construct($testimonials, $args, $Id)
    {
        $this->Id = $Id;
        $this->testimonials = $testimonials;
        $this->args = $args;
    }

    public function render()
    {
        $this->before_loop();

        $this->slick_before();
        $this->do_testimonial_markup();
        $this->slick_after();

        $this->after_loop();
    }

    public function do_testimonial_markup()
    {
        global $post;

        foreach ( $this->testimonials as $testimonial ):
            $post = $testimonial;
            setup_postdata($post);

            ?>
            <div class="single-testimonial">
                <i><?php echo get_the_content(); ?></i>
                <b><?php echo get_the_title(); ?></b>
                <p><?php echo get_field('job_description_position'); ?></p>
            </div>
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