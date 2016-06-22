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
            <i class="fa fa-camera"></i>
            <a href="#social" target="_blank">Facebook</a>
        </div>
    </div>
    <a href="<?php echo get_field('photographer_information_link') ?>" target="_blank">PHOTOGRAPHER'S LINK</a>
    <h2 class="item-title"><?php echo get_the_title(); ?></h2>
    <address><?php echo get_field('photographer_information_address')['address']; ?></address>
    <span class="phone-number">PHONE: <?php echo get_field('photographer_information_phone_number'); ?></span>
    <span class="email-address"><?php echo get_field('photographer_information_email'); ?></span>
</div>