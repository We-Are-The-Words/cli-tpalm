<?php
	$thegem_page_id = is_singular() ? get_the_ID() : 0;
	if(is_404() && get_post(thegem_get_option('404_page'))) {
		$thegem_page_id = thegem_get_option('404_page');
	}
	if((is_post_type_archive('product') || is_tax('product_cat') || is_tax('product_tag')) && function_exists('wc_get_page_id')) {
		$thegem_page_id = wc_get_page_id('shop');
	}
	$thegem_header_params = thegem_get_sanitize_page_header_data($thegem_page_id);
	$thegem_effects_params = thegem_get_sanitize_page_effects_data($thegem_page_id);
	if($thegem_effects_params['effects_page_scroller']) {
		$thegem_header_params['header_hide_top_area'] = true;
		$thegem_header_params['header_transparent'] = true;
	}
	$thegem_header_light = $thegem_header_params['header_menu_logo_light'] ? '_light' : '';
?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta name="facebook-domain-verification" content="y7jjy2aipcj6thknq5wyrvf9ynekjx">
	<meta name="p:domain_verify" content="f86614edab49c28c4c983a15ca219d95"/>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php wp_head(); ?>
    <!--<script type='text/javascript' src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvIE14sR9Z2KFvj1A-RcJPiHrdlzP_w5s" async defer></script>-->
<?php /*	<!-- Facebook Pixel Code -->
	<meta name="detectify-verification" content="b9f3d48d257f9bb5e11a7f039937f98a" />
	<script>
	!function(f,b,e,v,n,t,s){
		if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window,document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '317559918602512'); 
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" src="https://www.facebook.com/tr?id=317559918602512&ev=PageView&noscript=1"/></noscript>
	<!-- End Facebook Pixel Code --> */ ?>
</head>

<?php
	$thegem_preloader_data = thegem_get_sanitize_page_preloader_data($thegem_page_id);
?>

<body <?php body_class(); ?>>

<?php do_action('gem_before_page_content'); ?>

<?php if ( thegem_get_option('enable_page_preloader') || ( $thegem_preloader_data && !empty($thegem_preloader_data['enable_page_preloader']) ) ) : ?>
	<div id="page-preloader"><div class="page-preloader-spin"></div></div>
	<?php do_action('gem_after_page_preloader'); ?>
<?php endif; ?>

<div id="page" class="layout-<?php echo esc_attr(thegem_get_option('page_layout_style', 'fullwidth')); ?><?php echo esc_attr(thegem_get_option('header_layout') == 'vertical' ? ' vertical-header' : '') ; ?>">

	<?php if(!thegem_get_option('disable_scroll_top_button')) : ?>
		<a href="#page" class="scroll-top-button"></a>
	<?php endif; ?>

	<?php if(!$thegem_effects_params['effects_hide_header']) : ?>

		<?php if(thegem_get_option('top_area_style') && !$thegem_header_params['header_hide_top_area'] && (thegem_get_option('header_layout') == 'vertical' && thegem_get_option('header_layout') != 'fullwidth_hamburger' || thegem_get_option('top_area_disable_fixed'))) : ?>
			<?php get_template_part('top_area'); ?>
		<?php endif; ?>

		<div id="site-header-wrapper"<?php echo ($thegem_header_params['header_transparent'] ? ' class="site-header-wrapper-transparent"' : ''); ?>>

			<?php if(thegem_get_option('header_layout') == 'fullwidth_hamburger') : ?><div class="hamburger-overlay"></div><?php endif; ?>

			<header id="site-header" class="site-header<?php echo (thegem_get_option('disable_fixed_header') || thegem_get_option('header_layout') == 'vertical' ? '' : ' animated-header'); ?><?php echo thegem_get_option('header_on_slideshow') ? ' header-on-slideshow' : ''; ?>" role="banner">
				<?php if(thegem_get_option('header_layout') == 'vertical') : ?><button class="vertical-toggle"><?php esc_html_e('Primary Menu', 'thegem'); ?><span class="menu-line-1"></span><span class="menu-line-2"></span><span class="menu-line-3"></span></button><?php endif; ?>
				<?php if(thegem_get_option('top_area_style') && !$thegem_header_params['header_hide_top_area'] && !thegem_get_option('top_area_disable_fixed') && thegem_get_option('header_layout') != 'vertical' && thegem_get_option('header_layout') != 'fullwidth_hamburger') : ?>
					<?php if($thegem_header_params['header_transparent']) : ?><div class="transparent-header-background" style="background-color: rgba(<?php echo esc_attr(implode(', ', hex_to_rgb(thegem_get_option('top_area_background_color')))); ?>, <?php echo intval($thegem_header_params['header_opacity'])/100; ?>);"><?php endif; ?>
					<?php get_template_part('top_area'); ?>
					<?php if($thegem_header_params['header_transparent']) : ?></div><?php endif; ?>
				<?php endif; ?>

				<?php if($thegem_header_params['header_transparent']) : ?><div class="transparent-header-background" style="background-color: rgba(<?php echo esc_attr(implode(', ', hex_to_rgb(thegem_get_option('top_background_color')))); ?>, <?php echo intval($thegem_header_params['header_opacity'])/100; ?>);"><?php endif; ?>
				<div class="container<?php echo (thegem_get_option('header_layout') == 'fullwidth' || thegem_get_option('header_layout') == 'fullwidth_hamburger' ? ' container-fullwidth' : ''); ?>">
					<div class="header-main logo-position-<?php echo esc_attr(thegem_get_option('logo_position', 'left')); ?><?php echo ($thegem_header_params['header_menu_logo_light'] ? ' header-colors-light' : ''); ?> header-layout-<?php echo esc_attr(thegem_get_option('header_layout')); ?> header-style-<?php echo esc_attr(thegem_get_option('header_layout') == 'vertical' || thegem_get_option('header_layout') == 'fullwidth_hamburger' ? 'vertical' : thegem_get_option('header_style')); ?>">
						<?php if(thegem_get_option('logo_position', 'left') != 'right') : ?>
							<div class="site-title">
								<?php thegem_print_logo($thegem_header_light); ?>
							</div>
							<?php if(has_nav_menu('primary')) : ?>
								<nav id="primary-navigation" class="site-navigation primary-navigation responsive" role="navigation">
									<button class="menu-toggle dl-trigger"><?php esc_html_e('Primary Menu', 'thegem'); ?><span class="menu-line-1"></span><span class="menu-line-2"></span><span class="menu-line-3"></span></button>
									<?php if(thegem_get_option('header_layout') == 'fullwidth_hamburger') : ?><button class="hamburger-toggle"><?php esc_html_e('Primary Menu', 'thegem'); ?><span class="menu-line-1"></span><span class="menu-line-2"></span><span class="menu-line-3"></span></button><?php endif; ?>
									<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu dl-menu styled ', 'container' => false)); ?>
								</nav>
							<?php endif; ?>
						<?php else : ?>
							<?php if(has_nav_menu('primary')) : ?>
								<nav id="primary-navigation" class="site-navigation primary-navigation responsive" role="navigation">
									<button class="menu-toggle dl-trigger"><?php esc_html_e('Primary Menu', 'thegem'); ?><span class="menu-line-1"></span><span class="menu-line-2"></span><span class="menu-line-3"></span></button>
									<?php if(thegem_get_option('header_layout') == 'fullwidth_hamburger') : ?><button class="hamburger-toggle"><?php esc_html_e('Primary Menu', 'thegem'); ?><span class="menu-line-1"></span><span class="menu-line-2"></span><span class="menu-line-3"></span></button><?php endif; ?>
									<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu dl-menu styled ', 'container' => false)); ?>
								</nav>
							<?php endif; ?>
							<div class="site-title">
								<?php thegem_print_logo($thegem_header_light); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<?php if($thegem_header_params['header_transparent']) : ?></div><?php endif; ?>
			</header><!-- #site-header -->
			<?php if(thegem_get_option('header_layout') == 'vertical') : ?>
				<div class="vertical-menu-item-widgets">
					<?php
						add_filter( 'get_search_form', 'thegem_serch_form_vertical_header' );
						get_search_form();
						remove_filter( 'get_search_form', 'thegem_serch_form_vertical_header' );
					?>
					<div class="menu-item-socials socials-colored"><?php thegem_print_socials('rounded'); ?></div></div>
			<?php endif; ?>
		</div><!-- #site-header-wrapper -->

	<?php endif; ?>

	<div id="main" class="site-main">

		
