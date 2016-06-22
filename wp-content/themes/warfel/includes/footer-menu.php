<?php

remove_action( 'genesis_footer', 'genesis_do_footer' );

add_action( 'init', 'tower_register_footer_menu' );
add_action( 'genesis_footer', 'tower_do_footer_left' );
add_action( 'genesis_footer', 'tower_do_footer_right' );

function tower_register_footer_menu()
{
	register_nav_menu( 'footer-menu', __( 'Footer Navigation Menu' ) );
}

function tower_do_footer_left()
{
	$args = array(
		'theme_location' => 'footer-menu',
		'depth' => 1,
	);
    ?>
    <div class="footer-container-left">
        <?php wp_nav_menu($args); ?>
        <div class="company-information">
            <b><?php bloginfo('name'); ?></b>&nbsp;&nbsp;&nbsp;&verbar;&nbsp;&nbsp;&nbsp;<b>Corporate Office</b> 1110 Enterprise Road, East Petersburg, PA 17520&nbsp;&nbsp;&nbsp;&verbar;&nbsp;&nbsp;&nbsp;<b>717-299-4500</b>
        </div>
    </div>
    <?php
}

function tower_do_footer_right()
{
    ?>
    <div class="footer-container-right">
        <?php get_template_part( 'partials/small-social-icons-red' ); ?>
        <div class="additional-information">
            <a href="<?php echo site_url() . '/privacy-policy'; ?>">Privacy Policy</a>&nbsp;&nbsp;&nbsp;&verbar;&nbsp;&nbsp;&nbsp;Copyright &copy; <?php echo date('Y'); ?>
        </div>
    </div>
    <?php
}