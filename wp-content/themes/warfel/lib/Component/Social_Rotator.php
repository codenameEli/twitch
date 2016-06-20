<?php

namespace Tower\Component;

class Social_Rotator
{
    public $Id = 767;

    public function __construct()
    {
        $this->args = array(
            'autoplay' => false,
            'dots' => true,
            'arrows' => false,
            'appendDots' => '#dots-container-767'
        );
    }

    public function render()
    {
        $social_networks = array('twitter', 'facebook', 'linkedin');
        $this->before_slick_loop();

        foreach ( $social_networks as $social_network ) {
            $this->get_item($social_network);
        }

        $this->after_slick_loop();
    }

    public function before_slick_loop()
    {
        $slick_params = json_encode( $this->args );
        ?>
        <div class="social-rotator-container block">
            <div class="slick" data-slick=<?php echo $slick_params; ?>>
        <?php
    }

    public function after_slick_loop()
    {
        ?>
            </div>
            <div id="dots-container-<?php echo $this->Id; ?>" class="dashes-container"></div>
        </div>
        <?php
    }

    private function get_item($social_network)
    {
        $item;

//        switch ( $social_network ) {
//
//            case 'twitter':
//                $item = $this->get_twitter_item();
//                break;
//
//            case 'facebook':
//                $item = $this->get_facebook_item();
//                break;
//
//            case 'linkedin':
//                $item = $this->get_linkedin_item();
//                break;
//
//            default:
//                break;
//        }

        ?>
        <div class="social-item">
            <div class="social-content">
                <div class="social-icon <?php echo $social_network; ?>-icon radial-swoop primary-color">
                    <div class="circle">
                        <div class="mask full">
                            <div class="fill"></div>
                        </div>
                        <div class="mask half">
                            <div class="fill"></div>
                            <div class="fill fix"></div>
                        </div>
                    </div>
                    <div class="inset">
                        <i class="fa fa-facebook"></i>
                        <a href="#social" target="_blank">Facebook</a>
                    </div>
                </div>
                <span class="timestamp">April 15</span>
                <p>We love seeing our clients enjoy their new space! Here, members of The Baldwin School Maskers Club enjoy the features of the new (...)</p>
            </div>
        </div>
        <?php
    }
}