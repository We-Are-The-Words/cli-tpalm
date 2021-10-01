
<?php

/*
 * Template Name: immo - appartment
 *
 * @package TheGem
 */

get_header( 'immo' ); ?>

<div id="main-content" class="main-content">

<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'content', 'page' );
	endwhile;
?>

</div><!-- #main-content -->

<?php
get_footer();
