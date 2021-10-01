<?php get_header(); ?>

<div id="main-content" class="main-content">

<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'content', 'page' );
?>

<div class="container block_promo">
<?php if (the_flexible_field("block_promo")):
        while(the_flexible_field("block_promo")): ?>
        
        
        
        
		<?php if(get_row_layout() == "block_catalogue"): // layout: block_catalogue ?>
	
			<div class="block_catalogue col-md-6">
				<a href="<?php the_sub_field("url"); ?>" class="hm-box">
					<div class="hm-content"><?php the_sub_field("text"); ?></div>
					<?php 
						$image = get_sub_field('image');
						if( !empty($image) ): ?>
							<img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php endif; ?>
				</a>
			</div>
	
		<?php elseif(get_row_layout() == "block_square"): // layout: block_square ?>
	
			<div class="block_square col-md-3">
				<a href="<?php the_sub_field("url"); ?>" class="hm-box">
					<div class="hm-content"><?php the_sub_field("text"); ?></div>
					<?php 
						$image = get_sub_field('image');					
						if( !empty($image) ): ?>
							<img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>
				</a>
			</div>
	
		<?php elseif(get_row_layout() == "block_news"): // layout: Featured Posts ?>
				<?php $posts = get_sub_field("relation_news");
					
					if( $posts ): ?>
				    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT)
			        setup_postdata($post);
							if ( has_post_thumbnail( $_post->ID ) ) {
				        $thumbnail = get_the_post_thumbnail_url( $_post->ID, 'image_downsize' );
				        //array( 300, 300, array( 'center', 'center')) );
					    }
			        ?>
			        <div class="block_square block_related col-md-3">
								<a href="<?php the_permalink(); ?>" class="hm-box" style="background-image: url(<?= $thumbnail; ?>)">
									<div class="hm-content"><?php the_title(); ?></div>									
								</a>
							</div>			        
				    <?php endforeach; ?>
				    </ul>
				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>
				 
				 <!-- ### -->
		<?php elseif(get_row_layout() == "line"): // layout: Featured Posts ?>
			<div class="block_line clear"></div>
		<?php endif; ?>
		
		
		
<?php endwhile;
  endif; ?>
</div>

<?php		
	endwhile;
?>

</div><!-- #main-content -->

<?php get_footer();
