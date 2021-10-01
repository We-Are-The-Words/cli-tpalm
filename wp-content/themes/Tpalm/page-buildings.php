
<?php

/*
 * Template Name: Buildings
 *
 * @package TheGem
 */

get_header( 'buildings' ); ?>

<div id="main-content" class="main-content">

<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'content', 'page' );
	endwhile;
?>

</div><!-- #main-content -->

<?php
get_footer();
