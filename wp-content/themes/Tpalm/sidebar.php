<?php
/**
 * The Sidebar containing the main widget area
 */

if ( ! is_active_sidebar( 'page-sidebar' ) ) {
	return;
}
?>
<div class="sidebar col-sm-4 col-md-3" role="complementary">
	<?php dynamic_sidebar( 'page-sidebar' ); ?>
</div><!-- #page-sidebar -->
