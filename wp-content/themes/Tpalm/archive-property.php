
<?php get_header(); ?>
<div class="container">
<div class="row">
	<div class="content col-sm-8 col-md-9">
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

			<?php while ( have_posts() ) : the_post(); ?>
                <?php if ( get_theme_mod( 'realia_general_show_property_archive_as_grid', null ) == '1' ) : ?>
                    <div class="col-sm-4">
                        <?php echo Realia_Template_Loader::load( 'properties/box' ); ?>
                    </div><!-- /.col-sm-4 -->
                    <?php if ( $counter++ % 3 == 2) : ?>
                        </div><div class="row">
                    <?php endif; ?>
				<?php else : ?>
					<?php echo Realia_Template_Loader::load( 'properties/row' ); ?>	
        <?php //var_dump(the_post()) ?>
				<?php endif; ?>
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
