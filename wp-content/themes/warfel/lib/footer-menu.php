<?php

add_action( 'init', 'tower_register_footer_menu' );
add_action( 'genesis_footer', 'tower_do_footer_menu' );

function tower_register_footer_menu()
{
	register_nav_menu( 'footer-menu', __( 'Footer Navigation Menu' ) );
}

function tower_do_footer_menu()
{
	$args = array(
		'theme_location' => 'footer-menu',
		'depth' => 1
	);

	wp_nav_menu($args);
}