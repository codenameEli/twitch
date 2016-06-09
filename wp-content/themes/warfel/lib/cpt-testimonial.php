<?php

class CPT_Testimonial
{
    public function __construct()
    {
        $this->add_actions();
    }

    public function add_actions()
    {
        add_action( 'init', array( $this, 'register_cpt' ), 0 );
    }

    public function register_cpt()
    {
        $post_type = 'testimonial';
        $singular = 'Testimonial';
        $plural = $singular . 's';

        $labels = array(
            'name'                  => _x( $plural, 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( $singular, 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( $plural, 'text_domain' ),
            'name_admin_bar'        => __( $singular, 'text_domain' ),
            'archives'              => __( 'Item Archives', 'text_domain' ),
            'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
            'all_items'             => __( 'All ' . $plural, 'text_domain' ),
            'add_new_item'          => __( 'Add New ' . $singular, 'text_domain' ),
            'add_new'               => __( 'Add New', 'text_domain' ),
            'new_item'              => __( 'New ' . $singular, 'text_domain' ),
            'edit_item'             => __( 'Edit ' . $singular, 'text_domain' ),
            'update_item'           => __( 'Update ' . $singular, 'text_domain' ),
            'view_item'             => __( 'View ' . $singular, 'text_domain' ),
            'search_items'          => __( 'Search ' . $singular, 'text_domain' ),
            'not_found'             => __( 'Not found', 'text_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
            'featured_image'        => __( 'Featured Image', 'text_domain' ),
            'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
            'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
            'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
            'insert_into_item'      => __( 'Insert into ' . $singular, 'text_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this ' . $singular, 'text_domain' ),
            'items_list'            => __( $plural . ' list', 'text_domain' ),
            'items_list_navigation' => __( $plural . ' list navigation', 'text_domain' ),
            'filter_items_list'     => __( 'Filter ' . $plural . ' list', 'text_domain' ),
        );
        $args = array(
            'label'                 => __( $singular, 'text_domain' ),
            'description'           => __( 'Post Type Description', 'text_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor' ),
            'taxonomies'            => array(),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'menu_icon'             => 'dashicons-id',
        );

        register_post_type( $post_type, $args );
    }
}

new CPT_Testimonial();