<?php

/*
 * Template Name: maisons témoins
 *
 * @package TheGem
 */

get_header(); ?>

<div id="main-content" class="main-content">
<?php echo do_shortcode('[put_wpgm id=2]') ?>
<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'content', 'page' );
	endwhile;
?>
    

</div><!-- #main-content -->


<?php
get_footer();
