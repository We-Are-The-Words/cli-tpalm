<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
     <div class="breadcrumbs single_prop" typeof="BreadcrumbList" vocab="http://schema.org/">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>

<h2 class="widget-title title-prop"><?php the_title(); ?></h2>

<div class="property-detail-actions">
    <?php do_action( 'property_actions', get_the_ID() ); ?>
</div><!-- /.property-detail-actions -->

<div class="property-detail-subtitle">
    <div >
        <?php $location = Realia_Query::get_property_location_name( null, "," ); ?>
        <?php if ( ! empty ( $location ) ) : ?>
            <?php echo wp_kses( $location, wp_kses_allowed_html( 'post' ) ); ?>
        <?php endif; ?>
    </div>
    <?php $price = Realia_Price::get_property_price(); ?>
	<?php if ( ! empty( $price ) ) : ?>
		<div class="property-price">        
			<?php echo wp_kses( $price, wp_kses_allowed_html( 'post' ) ); ?>
		</div>
	<?php endif; ?>
</div>
<br/>
<div class="entry-content">

    <?php $gallery = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'gallery', true ); ?>
    <?php if ( ! empty( $gallery ) && is_array( $gallery ) ) : ?>
        <div class="property-detail-section" id="property-detail-section-gallery">

            <div class="property-detail-gallery-wrapper">
                <div class="property-detail-gallery">
                    <?php $index = 0; ?>
                    <?php foreach ( $gallery as $id => $src ) : ?>
                        <?php $img = wp_get_attachment_image_src( $id, 'large' ); ?>
                        <?php $src = $img[0]; ?>
                        <a href="<?php echo esc_url( $src ); ?>" rel="property-gallery" data-item-id="<?php echo esc_attr( $index++ ); ?>">
                            <span class="item-image" data-background-image="<?php echo esc_url( $src ); ?>"></span><!-- /.item-image -->
                        </a>
                    <?php endforeach; ?>
                </div><!-- /.property-detail-gallery -->

                <div class="property-detail-gallery-preview" data-count="<?php echo count( $gallery ) ?>">
                    <div class="property-detail-gallery-preview-inner">
                        <?php $index = 0; ?>
                        <?php foreach ( $gallery as $id => $src ) : ?>
                            <div data-item-id="<?php echo esc_attr( $index++ ); ?>">
                                <?php $img = wp_get_attachment_image_src( $id, 'thumbnail' ); ?>
                                <?php $img_src = $img[0]; ?>
                                <img src="<?php echo $img_src; ?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    </div><!-- /.property-detail-gallery-preview-inner -->
                </div><!-- /.property-detail-gallery-preview -->
            </div><!-- /.property-detail-gallery-wrapper -->
        </div><!-- /.property-detail-section -->
    <?php endif; ?>

    <div class="tabs">




        <input id="tab-1" type="radio" name="tab-group-1" checked>
        <label for="tab-1"><?=_e('Description')?></label>

        <input id="tab-2" type="radio" name="tab-group-1">
        <label for="tab-2"><?=_e('Informations techniques')?></label>

        <input id="tab-3" type="radio" name="tab-group-1">
        <label for="tab-3"><?=_e('Plans')?></label>

        <input id="tab-4" type="radio" name="tab-group-1">
        <label for="tab-4"><?=_e('Google maps')?></label>

        <input id="tab-5" type="radio" name="tab-group-1">
        <label for="tab-5"><?=_e('A proximité')?></label>
        <div class="clear"></div>
        <div id="contentT1" class="contentT">
     
            <!-- DESCRIPTION -->
            
            <?php the_content(); ?>
      
        </div>
        <div id="contentT2" class="contentT">
            <?php $is_featured = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'featured', true ); ?>
            <?php $is_reduced = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'reduced', true ); ?>

            <?php if ( $is_featured && $is_reduced ) : ?>
                <div class="property-badge"><?php echo __( 'Featured', 'realocation' ); ?> / <?php echo __( 'Reduced', 'realocation' ); ?></div>
            <?php elseif ( $is_featured ) : ?>
                <div class="property-badge"><?php echo __( 'Featured', 'realocation' ); ?></div>
            <?php elseif ( $is_reduced ) : ?>
                <div class="property-badge"><?php echo __( 'Reduced', 'realocation' ); ?></div>
            <?php endif; ?>

            <div class="table-group overview property-overview">
                <table class="table table-striped">
                    <?php $id = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'id', true ); ?>
                    <?php if ( ! empty( $id ) ) : ?>
                        <tr><td><?php echo __( 'ID', 'realocation' ); ?></td><td><?php echo esc_attr( $id ); ?></td></tr>
                    <?php endif; ?>

                    <?php $contact_name = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'contact_name', true ); ?>
                    <?php if ( ! empty( $contact_name ) ) : ?>
                        <tr><td><?php echo __( 'Personne de contact', 'realia' ); ?></td><td><?php echo esc_attr( $contact_name ); ?></td></tr>
                    <?php endif; ?>

                    <?php $contact_phone = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'contact_phone', true ); ?>
                    <?php if ( ! empty( $contact_phone ) ) : ?>
                        <tr><td><?php echo __( 'Numéro de téléphone', 'realia' ); ?></td><td><?php echo esc_attr( $contact_phone ); ?></td></tr>
                    <?php endif; ?>

                    <?php $year_built = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'year_built', true ); ?>
                    <?php if ( ! empty( $year_built ) ) : ?>
                        <tr><td><?php echo __( 'Année de construction', 'realocation' ); ?></td><td><?php echo esc_attr( $year_built ); ?></td></tr>
                    <?php endif; ?>

                    <?php $type = Realia_Query::get_property_type_name(); ?>
                    <?php if ( ! empty ( $type ) ) : ?>
                        <tr><td><?php echo __( 'Type de bien', 'realocation' ); ?></td><td><?php echo esc_attr( $type ); ?></td></tr>
                    <?php endif; ?>

                    <?php $sold = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'sold', true ); ?>
                        <tr><td><?php echo __( 'Déjà construit', 'realocation' ); ?></td>
                            <td>
                                <?php  
                                    switch($sold):
                                        case 'REALIA_SOLD_YES':
                                            echo __( 'Oui', 'realocation' );
                                        break;
                                        case 'REALIA_SOLD_NO':
                                            echo __( 'Non', 'realocation' );
                                        break;
                                        case 'REALIA_SOLD_NOTYET':
                                            echo __( 'En cours', 'realocation' );
                                        break;
                                    endswitch;
                                ?>
                            </td>
                        </tr>

                    <?php $contract = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'contract', true ); ?>
                    <?php if ( ! empty ( $contract ) ) : ?>
                        <tr><td><?php echo __( 'Option', 'realocation' ); ?></td>
                            <td>
                                <?php if ( $contract == REALIA_CONTRACT_RENT ) : ?>
                                    <?php echo __( 'Oui', 'realocation' ); ?>
                                <?php elseif ( REALIA_CONTRACT_SALE == $contract ) : ?>
                                    <?php echo __( 'Non', 'realocation' ); ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php $status = Realia_Query::get_property_status_name(); ?>
                    <?php if ( ! empty ( $status ) ) : ?>
                        <tr><td><?php echo __( 'Status', 'realocation' ); ?></td><td><?php echo esc_attr( $status ); ?></td></tr>
                    <?php endif; ?>

                    <?php $home_area = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'home_area', true ); ?>
                    <?php if ( ! empty( $home_area ) ) : ?>
                        <tr><td><?php echo __( 'Surface habitable', 'realocation' ); ?></td><td><?php echo esc_attr( $home_area ); ?>
                            <?php echo get_theme_mod( 'realia_measurement_area_unit', 'sqft' ); ?></td></tr>
                    <?php endif; ?>

                    <?php $lot_dimensions = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'lot_dimensions', true ); ?>
                    <?php if ( ! empty( $lot_dimensions ) ) : ?>
                        <tr><td><?php echo __( 'Surface parcelle', 'realocation' ); ?></td><td><?php echo esc_attr( $lot_dimensions ); ?>
                            <?php echo get_theme_mod( 'realia_measurement_distance_unit', 'ft' ); ?></td></tr>
                    <?php endif; ?>

                    <?php $lot_area = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'lot_area', true ); ?>
                    <?php if ( ! empty( $lot_area ) ) : ?>
                        <tr><td><?php echo __( 'Surface totale', 'realocation' ); ?></td><td><?php echo esc_attr( $lot_area ); ?>
                            <?php echo get_theme_mod( 'realia_measurement_area_unit', 'sqft' ); ?></td></tr>
                    <?php endif; ?>

                    <?php $material = Realia_Query::get_property_material_name(); ?>
                    <?php if ( ! empty ( $material ) ) : ?>
                        <tr><td><?php echo __( 'Material', 'realocation' ); ?></td><td><?php echo wp_kses( $material, wp_kses_allowed_html( 'post' ) ); ?></td></tr>
                    <?php endif; ?>

                    <?php $rooms = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'rooms', true ); ?>
                    <?php if ( ! empty( $rooms ) ) : ?>
                        <tr><td><?php echo __( 'Nombres de pièces', 'realocation' ); ?></td><td><?php echo esc_attr( $rooms ); ?></td></tr>
                    <?php endif; ?>

                    <?php $beds = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'beds', true ); ?>
                    <?php if ( ! empty( $beds ) ) : ?>
                        <tr><td><?php echo __( 'Chambres', 'realocation' ); ?></td><td><?php echo esc_attr( $beds ); ?></td></tr>
                    <?php endif; ?>

                    <?php $baths = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'baths', true ); ?>
                    <?php if ( ! empty( $baths ) ) : ?>
                        <tr><td><?php echo __( 'Salle de bain', 'realocation' ); ?></td><td><?php echo esc_attr( $baths ); ?></td></tr>
                    <?php endif; ?>

                    <?php $garages = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'garages', true ); ?>
                    <?php if ( ! empty( $garages ) ) : ?>
                        <tr><td><?php echo __( 'Garages', 'realocation' ); ?></td><td><?php echo esc_attr( $garages ); ?></td></tr>
                    <?php endif; ?>
                </table>
               
            </div><!-- /.property-overview -->
        </div>
        <div id="contentT3" class="contentT">
     
            <!-- FLOOR PLANS -->
            <?php $images = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'plans', true ); ?>

            <?php if ( ! empty( $images ) ) : ?>
                <?php foreach ( $images as $id => $url ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" rel="property-plans">
                        <?php echo wp_get_attachment_image( $id, 'thumbnail' ); ?>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div id="contentT4" class="contentT" style="display:block">
     
            <!-- MAP LOCATION -->
            <?php $map_location = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'map_location', true ); ?>

            <?php if ( ! empty( $map_location ) && count( $map_location ) == 2) : ?>
                <!-- MAP -->
                <div class="map-position">
                    <div class="map" id="simple-map" style="height: 300px"
                         data-latitude="<?php echo esc_attr( $map_location['latitude'] ); ?>"
                         data-longitude="<?php echo esc_attr( $map_location['longitude'] ); ?>"
                         data-transparent-marker-image="<?php echo get_template_directory_uri(); ?>/assets/img/transparent-marker-image.png"
                         data-zoom="15"
                        >
                    </div><!-- /.map -->
                </div><!-- /.map-position -->
            <?php endif; ?>
            <script>
                (function($,undef){
                    $(document).ready(function(){
                        window.setTimeout(function(){$('#contentT4').attr('style','')},1000)
                    })
                })(jQuery);
            </script>
        </div>
        <div id="contentT5" class="contentT">
     
            <!-- PUBLIC FACILITIES -->
            <?php $facilities = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'public_facilities_group', true ); ?>

            <?php if ( ! empty( $facilities ) && is_array( $facilities ) ) : ?>
                <?php foreach( $facilities as $facility ) : ?>
                    <div class="property-public-facility-wrapper">
                        <div class="property-public-facility-title">
                            <span><?php echo esc_attr( $facility[REALIA_PROPERTY_PREFIX . 'public_facilities_key'] ); ?></span>
                        </div><!-- /.property-public-facility-title -->

                        <div class="property-public-facility-info">
                            <?php echo esc_attr( $facility[REALIA_PROPERTY_PREFIX . 'public_facilities_value'] ); ?>
                        </div><!-- /.property-public-facility-info -->
                    </div><!-- /.property-public-facility-wrapper -->
                <?php endforeach; ?>
            
            <?php endif; ?>
      
        </div>
    
</div>

    
<div class="clear"></div>


    


    
<div class="clear"></div>
    <!-- AMENITIES -->
    <?php $amenities = get_categories( array(
        'taxonomy' 		=> 'amenities',
        'hide_empty' 	=> false,
    ) ) ; ?>

    <?php $hide = get_theme_mod( 'realia_general_hide_unassigned_amenities', false ); ?>
    <?php if ( is_array( $amenities ) && ! empty( $amenities ) ) : ?>
	
		<?php $assigned_amenities_count = 0; ?>        
        <?php foreach ( $amenities as $amenity ) : ?>
			<?php $has_term = has_term( $amenity->term_id, 'amenities' ); ?>
			<?php if ( $has_term ) : ?>
				<?php $assigned_amenities_count++; ?>
			<?php endif; ?>
		<?php endforeach; ?>
        
        <?php if ( $assigned_amenities_count > 0 ) : ?>
			<h2 class='section-title'><?php echo __('Amenities', 'realocation'); ?></h2>
			<div class="property-detail-amenities">
				<ul>
					<?php foreach ( $amenities as $amenity ) : ?>
						<?php $has_term = has_term( $amenity->term_id, 'amenities' ); ?>

						<?php if ( ! $hide || ( $hide  && $has_term ) ) : ?>
							<li <?php if ( $has_term ): ?>class="yes"<?php else : ?>class="no"<?php endif; ?>><?php echo esc_html( $amenity->name ); ?></li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</div><!-- /.property-amenities -->
        <?php endif; ?>
    <?php endif; ?>

   

    

   

    <!-- SUBPROPERTIES -->
    <?php $post = get_post(); ?>
    <?php $author_id = $post->post_author; ?>
    <?php $subproperties = Realia_Post_Type_Property::get_properties( $author_id, "publish", get_the_ID() ); ?>

    <?php if ( is_array( $subproperties ) && ! empty( $subproperties ) ) : ?>
        <div class="subproperties">
            <h2 class="section-title"><?php echo __( 'Biens liés', 'realocation' ); ?></h2>
            <?php $parentId = Realia_Post_Type_Property::get_parent_property_id(get_the_ID());
            if($parentId):
                $parent_post = get_post($parentId);
             ?>
                <div class="gem-button-container gem-button-position-inline property-bouton-parent">
                    <a class="gem-button gem-button-size-tiny gem-button-style-flat gem-button-text-weight-normal gem-button-no-uppercase" style="border-radius: 3px;" onmouseleave="" onmouseenter="" href="<?=get_permalink($parentId)?>" target="_self"><?=$parent_post->post_title?></a>
                </div>
            <?php endif; ?>
            <div class="row">
                <?php foreach ( $subproperties as $subproperty ): ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="property-box-wrapper">
                            <?php echo Realia_Template_Loader::load( 'properties/box', array( 'property' => $subproperty ) ); ?>
                        </div>
                    </div><!-- /.col-sm-4 -->
                <?php endforeach; ?>
            </div><!-- /.row -->
        </div><!-- /.subproperties -->
    <?php endif?>

  
    

    <?php wp_reset_query(); ?>

    <?php wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'realocation' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'realocation' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
    ?>

    <?php if ( comments_open() || get_comments_number() ): ?>
        <?php comments_template( '', true ); ?>
    <?php endif; ?>
    
    
    
</div><!-- .entry-content -->

</article><!-- #post-## -->

