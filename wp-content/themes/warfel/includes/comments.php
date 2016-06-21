<?php

// Reposition Genesis Comment Form
remove_action( 'genesis_comment_form', 'genesis_do_comment_form' );
add_action( 'genesis_list_comments', 'genesis_do_comment_form' , 5 );
