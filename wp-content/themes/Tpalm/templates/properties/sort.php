<div class="properties-sort">
	<form method="get" action="?" id="sort-form">
		<?php $skip = array(
			'filter-sort-by',
		'filter-sort-order',
		); ?>

		<?php foreach ( $_GET as $key => $value ) : ?>
			<?php if ( ! in_array( $key, $skip ) ) : ?>
				<input type="hidden" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_html( $value ); ?>">
			<?php endif; ?>
		<?php endforeach; ?>

		<div class="properties-sort-inner">
			<div class="properties-filter-sort-title">
				<h3><?php echo __( 'Affiner votre recherche', 'realocation' ); ?></h3>
			</div><!-- /.filter-sort-title -->

			<div class="select-wrapper properties-filter-sort-by-wrapper">
				<select class="form-control" name="filter-sort-by">
					<option value=""><?php echo __( 'Trier par', 'realocation' ); ?></option>
					<option value="price" <?php if ( ! empty( $_GET['filter-sort-by'] ) && 'price' == $_GET['filter-sort-by'] ) :   ?>selected="selected"<?php endif; ?>><?php echo __( 'Prix', 'realocation' ); ?></option>
					<option value="title" <?php if ( ! empty( $_GET['filter-sort-by'] ) && 'title' == $_GET['filter-sort-by'] ) :   ?>selected="selected"<?php endif; ?>><?php echo __( 'Titre', 'realocation' ); ?></option>
					<option value="published" <?php if ( ! empty( $_GET['filter-sort-by'] ) && 'published' == $_GET['filter-sort-by'] ) :   ?>selected="selected"<?php endif; ?>><?php echo __( 'Date de publication', 'realocation' ); ?></option>
				</select>
			</div><!-- /.filter-sort-by-wrapper -->

			<div class="select-wrapper properties-filter-sort-order-wrapper">
				<select class="form-control" name="filter-sort-order">
					<option value=""><?php echo __( 'Ordre', 'realocation' ); ?></option>
					<option value="asc" <?php if ( ! empty( $_GET['filter-sort-order'] ) && 'asc' == $_GET['filter-sort-order'] ) :   ?>selected="selected"<?php endif; ?>><?php echo __( 'Moins récent', 'realocation' ); ?></option>
					<option value="desc" <?php if ( ! empty( $_GET['filter-sort-order'] ) && 'desc' == $_GET['filter-sort-order'] ) :   ?>selected="selected"<?php endif; ?>><?php echo __( 'Plus récent', 'realocation' ); ?></option>
				</select>
			</div><!-- /.filter-sort-order-wrapper-->
		</div><!-- /.properties-sort-inner -->
	</form>
</div><!-- /.properties-sort -->
