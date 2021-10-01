<div id="top-area" class="top-area top-area-style-default top-area-alignment-<?php echo esc_attr(thegem_get_option('top_area_alignment', 'left')); ?>">
	<div class="container">
		<div class="top-area-items inline-inside">
			<?php if(thegem_get_option('top_area_contacts')) : ?> 
				<div class="top-area-block top-area-contacts"/><div class="gem-contacts inline-inside"><div class="gem-contacts-item gem-contacts-phone"><a href="tel:<?php _e( '+3287871010', 'top-area' ); ?>"><?php _e( '+32 87 87 10 10', 'top-area' ); ?></a></div></div></div>
			<?php endif; ?>
			<?php if(thegem_get_option('top_area_socials')) : ?>
				<div class="top-area-block top-area-socials<?php echo esc_attr(thegem_get_option('top_area_style') == 1 ? ' socials-colored-hover' : ''); ?>"><?php thegem_print_socials(); ?></div>
			<?php endif; ?>
			<?php if(has_nav_menu('top_area') || thegem_get_option('top_area_button_text')) : ?>
				<div class="top-area-block top-area-menu">
					<?php if(has_nav_menu('top_area')) : ?>
						<nav id="top-area-menu">
							<?php wp_nav_menu(array('theme_location' => 'top_area', 'menu_id' => 'top-area-navigation', 'depth' => 1, 'menu_class' => 'nav-menu styled inline-inside', 'container' => false, 'walker' => new thegem_walker_footer_nav_menu)); ?>
						</nav>
					<?php endif; ?>
						<?php if(thegem_get_option('top_area_button_text')) : ?>
				<div class="top-area-block top-area-button right"><div class="gem-button-container gem-button-position-inline"><a class="gem-button gem-button-size-tiny gem-button-style-flat gem-button-text-weight-normal gem-button-no-uppercase" style="border-radius: 3px;" onmouseleave="" onmouseenter="" href="<?php _e( '/fr/contact-construction-maison/', 'top-area' ); ?>" target="_self"><?php _e( 'DEMANDER VOTRE CATALOGUE', 'top-area' ); ?></a></div></div>
			<?php endif; ?>
				</div>
			<?php endif; ?>
   <?php do_action('icl_language_selector'); ?>
		</div>
	</div>
</div>



