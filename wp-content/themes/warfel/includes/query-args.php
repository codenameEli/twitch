<?php

add_filter( 'pre_get_posts', 'tower_modify_query' );

function tower_modify_query( $query )
{
    if ( is_admin() ) { return; }
    
    if( $query->is_main_query() ) { // Defaults
        $query->set( 'posts_per_page', 6 );
    }
}