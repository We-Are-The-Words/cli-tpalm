<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<div class="container">
<div class="row">
       
	<div class="content col-sm-8 col-md-9">
    <h2><?php echo single_cat_title(); ?></h2>
		<?php dynamic_sidebar( 'sidebar-content-top' ); ?>



		<?php if ( have_posts() ) : ?>
						
			<?php
			/**
			 * realia_before_property_archive
			 */
			do_action( 'realia_before_property_archive' );
			?>

			<?php if ( get_theme_mod( 'realia_general_show_property_archive_as_grid', null ) == '1' ) : ?>
				<div class="row">
                <?php $counter = 0; ?>
			<?php endif; ?>

			<?php $index = 0; ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( get_theme_mod( 'realia_general_show_property_archive_as_grid', null ) == '1' ) : ?>
					<div class="property-container">
						<?php echo Realia_Template_Loader::load( 'properties/box' ); ?>
					</div><!-- /.property-container -->

					<?php if ( 0 == ( ( $index + 1 ) % 3 ) && Realia_Query::loop_has_next() ) : ?>
						</div><div class="properties-row">
					<?php endif; ?>
				<?php else : ?>
					<?php echo Realia_Template_Loader::load( 'properties/row' ); ?>
				<?php endif; ?>
				<?php $index++; ?>
			<?php endwhile; ?>

			<?php if ( get_theme_mod( 'realia_general_show_property_archive_as_grid', null ) == '1' ) : ?>
				</div><!-- /.row -->
			<?php endif; ?>

			<?php
			/**
			 * realia_after_property_archive
			 */
			do_action( 'realia_after_property_archive' );
			?>

			<?php the_posts_pagination( array(
				'prev_text'          => '<i class="fa fa-chevron-left"></i>',
				'next_text'          => '<i class="fa fa-chevron-right"></i>',
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'realocation' ) . ' </span>',
			) ); ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		<?php dynamic_sidebar( 'sidebar-content-bottom' ); ?>
	</div><!-- /.content -->

	<?php get_sidebar(); ?>
</div><!-- /.row -->
</div>
<?php get_footer(); ?>