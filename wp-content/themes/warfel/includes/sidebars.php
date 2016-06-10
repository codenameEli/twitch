<?php

function tower_remove_genesis_sidebars()
{
	unregister_sidebar( 'header-right' );
	unregister_sidebar('header-right');
	unregister_sidebar('sidebar');
	unregister_sidebar('sidebar-alt');
}