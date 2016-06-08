<?php

remove_action( 'genesis_footer', 'genesis_do_footer' );

add_action( 'genesis_after_footer', 'tower_do_footer_creds' );

function tower_do_footer_creds()
{
	$company = '';
	?>
	<p class="copyright">Copyright &copy; <?php echo $company; ?> <?php echo date('Y'); ?></p>
	<?php
}