<?php

add_action( 'wp_enqueue_scripts', 'tower_enqueue_scripts', 99 );
add_action( 'login_enqueue_scripts', 'tower_enqueue_login_styles' );

function tower_enqueue_scripts()
{
    $version = '0.1.0';
    $assets_dir = get_stylesheet_directory_uri() . '/assets';

    wp_enqueue_style( 'tower-theme-css', $assets_dir . '/dist/theme.min.css', array(), $version );
    wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700', array(), $version );

    wp_enqueue_script( 'tower-theme-js', $assets_dir . '/dist/theme.min.js', array('jquery'), $version, true );
}

function tower_enqueue_login_styles()
{
    wp_enqueue_style( 'tower-login', get_stylesheet_directory_uri() . '/assets/dist/login.min.css', array(), $version );
}