<?php

add_action( 'genesis_setup', 'tower_load_include_files', 15 );

function tower_load_include_files()
{
    foreach ( glob( dirname( __FILE__ ) . '/includes/*.php' ) as $file ) { include $file; }
}
