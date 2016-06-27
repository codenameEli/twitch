<?php
$left_side_gallery = get_field('dual_rotating_slideshow_left_side_gallery');
$right_side_gallery = get_field('dual_rotating_slideshow_right_side_gallery');
$left_side_slick_args = array(
    'autoplay' => true,
    'autoplaySpeed' => 4500,
    'speed' => 1500,
    'dots' => true,
    'arrows' => false,
    'adaptiveHeight' => true,
    'cssEase' => false,
    'easing' => false,
    'useCSS' => false,
    'useTransform' => false,
    'vertical' => true,
    'verticalSwiping' => true
);
$right_side_slick_args = array(
    'autoplay' => true,
    'autoplaySpeed' => 6500,
    'speed' => 1500,
    'dots' => true,
    'arrows' => false,
    'adaptiveHeight' => true,
    'cssEase' => false,
    'easing' => false,
    'useCSS' => false,
    'useTransform' => false,
    'vertical' => true,
    'verticalSwiping' => true
);
?>
<div class="dual-rotating-slideshow-container">
    <div id="leftSideSlideshow" class="left-side-slideshow slideshow slick slick-cube-rotator" data-slick=<?php echo json_encode( $left_side_slick_args ); ?>>
        <?php
        foreach ( $left_side_gallery as $image ) {
            ?>
            <img src="<?php echo $image['sizes']['tower-hero-slideshow-image']; ?>"/>
            <?php
        }
        ?>
    </div>
    <div id="rightSideSlideshow" class="right-side-slideshow slideshow slick slick-cube-rotator" data-slick=<?php echo json_encode( $right_side_slick_args ); ?>>
        <?php
        foreach ( $right_side_gallery as $image ) {
            ?>
            <img src="<?php echo $image['sizes']['tower-hero-slideshow-image']; ?>"/>
            <?php
        }
        ?>
    </div>
</div>
