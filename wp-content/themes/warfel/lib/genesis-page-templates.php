<?php

add_filter( 'theme_page_templates', 'tower_remove_genesis_page_templates' );

function tower_remove_genesis_page_templates( $page_templates )
{
    unset( $page_templates['page_archive.php'] );
    unset( $page_templates['page_blog.php'] );

    return $page_templates;
}