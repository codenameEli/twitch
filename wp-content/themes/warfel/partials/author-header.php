<?php
global $wp_query;

$author = $wp_query->get_queried_object();
$user_id = $author->ID;
$acf_id = 'user_' . $user_id;
?>
<img src="<?php echo get_field( 'warfel_author_information_headshot', $acf_id )['sizes']['tower-author-headshot-image']; ?>"/>
<h1><?php echo $author->first_name . ' ' . $author->last_name; ?></h1>
<p class="author-position"><?php echo get_field( 'warfel_author_information_position', $acf_id ); ?></p>
<p class="author-description"><?php echo get_field( 'warfel_author_information_description', $acf_id ); ?></p>
<div class="social-icon">
    <b>Let's Connect!</b>
    <i class="fa fa-linkedin"></i>
    <a href="<?php echo get_field( 'warfel_author_information_linkedin_url', $acf_id ); ?>" target="_blank">LinkedIn</a>
</div>
<?php