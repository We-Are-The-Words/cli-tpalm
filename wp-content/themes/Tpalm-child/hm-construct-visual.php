<?php

	/* Template Name: TP - Construire & Visual Composer */
	
	get_header(); ?>

<div id="main-content" class="main-content">

<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'content', 'page' );
	endwhile;
?>


<?php
	
	$args = array( 'post_type' => 'thegem_pf_item', 'posts_per_page' => 6 );
	$loop = new WP_Query( $args );
	if ( $loop ): ?>
	<div class="slider">	
		<div class="container">
<?php
		while ( $loop->have_posts() ) : $loop->the_post();
				get_template_part( 'hm/modules/content', 'slider' );
		endwhile; ?>
		<a class="ubtn-link ult-adjust-bottom-margin ubtn-left ubtn-large fullwidth" href="/fr/nos-realisations"><button type="button" id="ubtn-8830" class="ubtn ult-adjust-bottom-margin ult-responsive ubtn-large ubtn-no-hover-bg  none  ubtn-left   tooltip-59d60f335c676" data-hover="#ffffff" data-border-color="#93c01f" data-bg="#ffffff" data-hover-bg="#93c01f" data-border-hover="" data-shadow-hover="" data-shadow-click="none" data-shadow="" data-shd-shadow="" data-ultimate-target="#ubtn-8830" data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:20px;&quot;,&quot;line-height&quot;:&quot;&quot;}" style="font-weight:normal;border-radius:0px;border-width:2px;border-color:#93c01f;border-style:solid;background: #ffffff;color: #93c01f;"><span class="ubtn-hover" style="background: rgb(147, 192, 31);"></span><span class="ubtn-data ubtn-text ">Consulter nos réalisations</span></button></a>
		</div>
	</div>
<?php
	endif;
	wp_reset_query();
?>

</div><!-- #main-content -->

<?php get_footer();
