<?php

remove_action( 'genesis_after_header', 'genesis_do_subnav' );
remove_action( 'genesis_after_header', 'genesis_do_nav' );

add_filter( 'genesis_search_button_text', 'sp_search_button_text' );
function sp_search_button_text( $text ) {
    return '&#xf002;';
}

add_action( 'genesis_header', 'genesis_do_nav', 10 );
add_action( 'genesis_header', 'tower_do_search_form', 11 );

function tower_do_search_form()
{
    ?>
    <div class="search-form-container">
        <div id="openSearchForm"><i class="fa fa-search"></i></div>
        <?php echo genesis_search_form(); ?>
    </div>
    <?php
}

add_action( 'genesis_after', 'tower_do_backdrop_overlay' );

function tower_do_backdrop_overlay()
{
    ?>
    <div id="backdropOverlayContainer"></div>
    <?php
}