<?php
	$thegem_item_data = thegem_get_sanitize_testimonial_data(get_the_ID());
?>


<div id="post-<?php the_ID(); ?>" <?php post_class('gem-testimonial-item'); ?>>
	<?php if($thegem_item_data['link']) : ?><a href="<?php echo esc_url($thegem_item_data['link']); ?>" target="<?php echo esc_attr($thegem_item_data['link_target']); ?>"><?php endif; ?>
		<div class="gem-testimonial-wrapper">
			<div class="gem-testimonial-image">
				<?php thegem_post_thumbnail('thegem-testimonial'); ?>
			</div>
			<div class="gem-testimonial-content">

				<?php echo thegem_get_data($thegem_item_data, 'name', '', '<div class="gem-testimonial-name">', '</div>'); ?>
				<?php echo thegem_get_data($thegem_item_data, 'company', '', '<div class="gem-testimonial-company">', '</div>'); ?>
				<?php echo thegem_get_data($thegem_item_data, 'position', '', '<div class="gem-testimonial-position">', '</div>'); ?>

				<div class="gem-testimonial-text">
					<?php the_content(); ?>
				</div>
			</div>
	</div>
		
	<?php if($thegem_item_data['link']) : ?></a><?php endif; ?>
</div>

