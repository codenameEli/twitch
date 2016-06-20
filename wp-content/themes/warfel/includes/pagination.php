<?php

add_filter ( 'genesis_next_link_text' , 'tower_next_link_text' );
add_filter ( 'genesis_prev_link_text' , 'tower_prev_link_text' );

function tower_next_link_text( $text )
{
    return 'NEXT';
}

function tower_prev_link_text( $text )
{
    return 'PREV';
}