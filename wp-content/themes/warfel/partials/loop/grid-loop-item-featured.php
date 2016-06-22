<div class="grid-loop-item grid-loop-item-featured">
<?php
use Tower\Component\Featured_Project_Slideshow as Featured_Project_Slideshow;

$gallery = get_field( 'project_gallery_additional_pictures' );
$args = array(
    'autoplay' => false,
    'dots' => true,
    'arrows' => false,
    'appendDots' => '#dots-container-' . get_the_ID()
);

$slideshow = new Featured_Project_Slideshow( $gallery, $args, get_the_ID() );
$slideshow->render();
?>
</div>
