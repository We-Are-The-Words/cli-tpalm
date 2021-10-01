<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php $create_page_id = get_theme_mod( 'realia_submission_create_page', null ); ?>

<?php if ( ! empty( $create_page_id ) ) : ?>
	<?php if ( Realia_Packages::is_allowed_to_add_submission( get_current_user_id() ) ) :   ?>
		<a href="<?php echo get_permalink( $create_page_id ); ?>" class="property-create"><?php echo __( 'Create Property', 'realocation' ); ?></a>
	<?php endif; ?>
<?php endif; ?>

<?php $paged = ( get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1; ?>

<?php query_posts( array(
	'post_type'     => 'property',
	'post_status'   => 'any',
	'paged'         => $paged,
	'author'        => get_current_user_id(),
) ); ?>

<?php if ( have_posts() ) : ?>
	<table class="table table-striped">
		<tbody>
		<?php while ( have_posts() ) : the_post(); ?>
			<tr>
				<td class="property-table-info">
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" class="property-table-info-image">
							<?php the_post_thumbnail(); ?>
						</a><!-- /.property-table-info-image -->
					<?php else : ?>
						<a href="<?php the_permalink(); ?>" class="property-table-info-image-none">
							<?php echo __( 'No image', 'realocation' ); ?>
						</a><!-- /.property-table-info-image-none -->
					<?php endif; ?>

					<div class="property-table-info-content">
						<div class="property-table-info-content-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</div><!-- /.property-table-info-content-title -->

						<?php $location = Realia_Query::get_property_location_name(); ?>
						<?php if ( ! empty( $location ) ) : ?>
							<div class="property-table-info-content-location">
								<?php echo wp_kses( $location, wp_kses_allowed_html( 'post' ) ); ?>
							</div><!-- /.property-table-info-content-location -->
						<?php endif; ?>

						<?php $price = Realia_Price::get_property_price(); ?>
						<?php if ( ! empty( $price ) ) : ?>
							<div class="property-table-info-content-price">
								<?php echo wp_kses( $price, wp_kses_allowed_html( 'post' ) ); ?>
							</div><!-- /.property-table-info-content-price -->
						<?php endif; ?>
					</div><!-- /.property-table-info-content -->
				</td>
                <td class="property-table-status min-width center">
                    <?php if ( get_post_status() == 'pending' ) : ?>
                        <div class="label-status pending">
                            <i class="fa fa-clock"></i><span><?php echo __('Pending', 'realocation'); ?></span>
                        </div>
                    <?php elseif ( get_post_status() == 'publish' ) : ?>
                        <div class="label-status publish">
                            <i class="fa fa-check"></i><span><?php echo __('Published', 'realocation'); ?></span>
                        </div>
                    <?php elseif ( get_post_status() == 'draft' ) : ?>
                        <div class="label-status draft">
                            <i class="fa fa-times"></i><span><?php echo __('Draft', 'realocation'); ?></span>
                        </div>
                    <?php endif; ?>
                </td>
				<td class="property-table-actions min-width nowrap">
					<div class="property-table-actions-inner">
						<?php $payment_page_id = get_theme_mod( 'realia_submission_payment_page', null ); ?>

						<?php if ( ! empty( $payment_page_id ) ) : ?>

							<!-- STICKY -->
							<?php $is_sticky = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'sticky', true ); ?>
							<?php if ( ! $is_sticky ) : ?>
								<?php $enable_sticky = get_theme_mod( 'realia_submission_enable_sticky', false ); ?>
								<?php if ( ! empty( $enable_sticky ) ) : ?>
									<?php $price = get_theme_mod( 'realia_submission_sticky_price', null ); ?>
									<?php if ( ! empty( $price ) ) : ?>
										<form method="post" action="<?php echo get_permalink( $payment_page_id ); ?>">
											<input type="hidden" name="payment_type" value="pay_for_sticky">
											<input type="hidden" name="object_id" value="<?php the_ID(); ?>">

											<button type="submit">
												<?php echo __( 'Make TOP', 'realocation' ); ?> <span class="label label-primary"><?php echo Realia_Price::format_price( $price ); ?></span>
											</button>
										</form>
									<?php endif; ?>
								<?php endif; ?>
							<?php else : ?>
								<button class="disabled">
									<?php echo __( 'Sticky', 'realocation' ); ?>
								</button>
							<?php endif; ?>

							<!-- FEATURED -->
							<?php $is_featured = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'featured', true ); ?>
							<?php if ( ! $is_featured ) : ?>
								<?php $enable_featured = get_theme_mod( 'realia_submission_enable_featured', false ); ?>
								<?php if ( ! empty( $enable_featured ) ) : ?>
									<?php $price = get_theme_mod( 'realia_submission_featured_price', null ); ?>

									<?php if ( ! empty( $price ) ) : ?>
										<form method="post" action="<?php echo get_permalink( $payment_page_id ); ?>">
											<input type="hidden" name="payment_type" value="pay_for_featured">
											<input type="hidden" name="object_id" value="<?php the_ID(); ?>">

											<button type="submit">
												<?php echo __( 'Make featured', 'realocation' ); ?> <span class="label label-primary"><?php echo Realia_Price::format_price( $price ); ?></span>
											</button>
										</form>
									<?php endif; ?>
								<?php endif; ?>
							<?php else : ?>
								<button class="disabled">
									<?php echo __( 'Featured', 'realocation' ); ?>
								</button>
							<?php endif; ?>

							<!-- PUBLISHED -->
							<?php $submission_type = get_theme_mod( 'realia_submission_type', false ); ?>
							<?php $property_status = get_post_status(); ?>
							<?php if ( 'publish' == $property_status ) : ?>
								<button class="disabled">
									<?php echo __( 'Published', 'realocation' ); ?>
								</button>
							<?php else : ?>
								<!-- PAY PER POST -->
								<?php if ( 'pay-per-post' == $submission_type ) : ?>
									<?php $price = get_theme_mod( 'realia_submission_pay_per_post_price', null ); ?>
									<?php if ( ! empty( $price ) ) : ?>
										<form method="post" action="<?php echo get_permalink( $payment_page_id ); ?>">
											<input type="hidden" name="payment_type" value="pay_per_post">
											<input type="hidden" name="object_id" value="<?php the_ID(); ?>">

											<button type="submit">
												<?php echo __( 'Publish', 'realocation' ); ?> <span class="label label-primary"><?php echo Realia_Price::format_price( $price ); ?></span>
											</button>
										</form>
									<?php endif; ?>
								<?php elseif ( 'packages' == $submission_type ) : ?>
									<?php // Nothing to do ?>
								<?php endif; ?>
							<?php endif; ?>
						<?php endif; ?>
					</div><!-- /.property-table-actions-inner -->
				</td><!-- /.property-table-actions -->
                <td class="property-table-buttons min-width lr-padding">
                    <?php $edit_page_id = get_theme_mod( 'realia_submission_edit_page', null ); ?>
                    <?php $remove_page_id = get_theme_mod( 'realia_submission_remove_page', null ); ?>

                    <?php if ( ! empty( $edit_page_id ) ) : ?>
                        <a href="<?php echo get_permalink( $edit_page_id ); ?>?id=<?php the_ID(); ?>" class="property-table-action">
                            <i class="fa fa-edit"></i><span><?php echo __( 'Edit', 'realocation' ); ?></span>
                        </a>
                    <?php endif; ?>

                    <?php if ( ! empty( $remove_page_id ) ) : ?>
                        <a href="<?php echo get_permalink( $remove_page_id ); ?>?id=<?php the_ID(); ?>" class="property-table-action property-button-delete">
                            <i class="fa fa-trash"></i><span><?php echo __( 'Remove', 'realocation' ); ?></span>
                        </a>
                    <?php endif; ?>
                </td>
			</tr>
		<?php endwhile; ?>
		</tbody>
	</table>

	<?php the_posts_pagination( array(
		'prev_text'          => __( 'Previous page', 'realocation' ),
		'next_text'          => __( 'Next page', 'realocation' ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'realocation' ) . ' </span>',
	) ); ?>

	<?php wp_reset_query(); ?>
<?php else : ?>
	<div class="alert alert-warning">
		<p><?php echo __( 'You don\'t have any properties, yet. Start by creating new one.' )?></p>
	</div>
<?php endif; ?>
