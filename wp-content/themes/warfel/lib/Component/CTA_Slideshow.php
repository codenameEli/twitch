<?php

namespace Tower\Component;

class CTA_Slideshow
{
    public $Id;
    public $repeater_group;
    public $args = array();

    public function __construct($repeater_group, $args, $index)
    {
        $this->Id = $index;
        $this->repeater_group = $repeater_group;
        $this->args = $args;
    }

    public function render()
    {
        $images = $this->repeater_group['cta_slideshow_content_gallery'];

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
        <div id="cta-slideshow-<?php echo $this->Id; ?>" class="cta-slideshow-container">
            <div class="slick" data-slick=<?php echo $slick_params; ?>>
        <?php
    }

    public function after_slick_loop()
    {
        $text = $this->repeater_group['cta_slideshow_content_text'];
        $button_text = $this->repeater_group['cta_slideshow_content_button_text'];
        $button_link = $this->repeater_group['cta_slideshow_content_button_link'];

        ?>
            </div>
            <div class="cta-slideshow-content">
                <p><?php echo $text; ?></p>
                <a href="<?php echo $button_link; ?>" class="grey-button">
                    <?php echo $button_text; ?>
                </a>
                <div id="dots-container-<?php echo $this->Id; ?>" class="dashes-container"></div>
            </div>
        </div>
        <?php
    }
}