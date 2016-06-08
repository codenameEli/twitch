<?php
//Remove Header Information
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_after_header', 'genesis_do_nav' );

//Header
add_action('genesis_header', 'dt_header');
function dt_header()
{
    ?>
    <!-- HEADER CONTENT -->
    <?php
}
//Header
