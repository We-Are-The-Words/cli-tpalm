<?php

	/* Template Name: TP - Construire */
	
get_header(); ?>

<div id="main-content" class="main-content">

<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'hm/page/content', 'construire' );
	endwhile;
?>

</div><!-- #main-content -->



<?php 
	/* SECTION CONSTRUCT_HEADER */
	$construct_header_bg = get_field('construct_header_bg');
?>
<section id="construct_header" class="clearfix"<?php echo isset($construct_header_bg) ? 'style="background-image: url(' . $construct_header_bg .')"' : NULL; ?>>
	
	<div class="container">
		<div class="col-md-12">
			<h2 class="aling-center"><?php the_field('construct_header_title'); ?></h2>
			<?php
			if(get_field('construct_header_buttons')): ?>
				<ul>
			    <?php while(the_repeater_field('construct_header_buttons')): ?>
			      <li><a class="hbtn hbtn-outline" href="<?php the_sub_field('btn-link'); ?>">
							<button type="button">
								<i class="fa fa-<?php the_sub_field('btn-icon'); ?>"></i>
								<span class="hbtn-text"><?php the_sub_field('btn-title'); ?></span>
							</button>
						</a></li>
			    <?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
	
</section>




<section id="construct_pa">
	<div class="container">
		<h2><?php the_field('construct_pa_title'); ?></h2>
		
		<?php
		// check if the flexible content field has rows of data
		if( have_rows('construct_pa_rte') ):
	     // loop through the rows of data
	    while ( have_rows('construct_pa_rte') ) : the_row();
        if( get_row_layout() == 'section' ): ?>

					<div class="row">
						<div class="col-md-6 col-xs-12"><?php the_sub_field('col-1'); ?></div>
						<div class="col-md-6 col-xs-12"><?php the_sub_field('col-2'); ?></div>
					</div>

		<?php
        endif;
	    endwhile;
		endif;
		?>
		
	</div>
</section>


<?php
	$args = array( 'post_type' => 'property', 'posts_per_page' => 6 );
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


<?php
get_footer();
