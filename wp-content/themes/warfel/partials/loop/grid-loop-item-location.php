<?php
$location = get_field('location_information_address');
?>
<div class="grid-loop-item grid-loop-item-text grid-loop-item-location">
    <div class="social-icon primary-color radial-swoop">
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
            <i class="fa fa-map-marker"></i>
            <a href="#social" target="_blank">Facebook</a>
        </div>
    </div>
    <a href="https://www.google.com/maps/place/<?php echo $location['address']; ?>" target="_blank">DIRECTIONS LINK</a>
    <h2 class="item-title"><?php echo get_the_title(); ?></h2>
    <address><?php echo $location['address']; ?></address>
    <span class="phone-number">PHONE: <?php echo get_field('location_information_phone_number'); ?></span>
    <span class="fax-number">FAX: <?php echo get_field('location_information_fax_number'); ?></span>
</div>