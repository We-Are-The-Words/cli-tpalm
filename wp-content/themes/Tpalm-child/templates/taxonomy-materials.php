<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

 get_header(); ?> 
<div class="container">
<div class="row">
       
	<div class="content col-sm-12 col-md-12">
    
        <h4 class="widget-title"><?php echo single_cat_title(); ?>  </h4>
        <br/>
		<?php dynamic_sidebar( 'filtre' ); ?>
<br/>


		<?php if ( have_posts() ) : ?>
						
			coaca
		<?php else : ?>
		
			COCO
		
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		
	</div><!-- /.content -->


</div><!-- /.row -->
</div>
<?php get_footer(); ?>
