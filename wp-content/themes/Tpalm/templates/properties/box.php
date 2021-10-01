<?php $property = isset( $property ) ? $property : get_post(); ?>

<div class="property-box">
    <div class="property-box-inner">

        <?php $is_sticky = get_post_meta( $property->ID, REALIA_PROPERTY_PREFIX . 'sticky', true ); ?>
        <?php if ( $is_sticky ) : ?>
            <div class="property-box-label-top">
                <span class="property-badge property-badge-sticky"><?php echo __( 'TOP', 'realocation' ); ?></span>
            </div><!-- /.property-box-label-left -->
        <?php endif; ?>

        <div class="property-box-header">
            
            <h3 class="property-box-title"><a href="<?php the_permalink( $property->ID ); ?>"><?php echo get_the_title( $property ) ?></a></h3>
            <div class="property-box-subtitle">
                <?php $location = Realia_Query::get_property_location_name( $property->ID, ',' ); ?>
                <div class="property-box-picture">
            
            </div>
        </div><!-- /.property-box-header -->

       

            <div class="property-box-picture-inner">
                <a href="<?php echo get_permalink( $property->ID ); ?>" class="property-box-picture-target forty_pc_h">
                    <?php echo get_the_post_thumbnail( $property ); ?>
                </a><!-- /.property-box-picture-target -->
            </div><!-- /.property-picture-inner -->
        </div><!-- /.property-picture -->

        <div class="property-box-meta">
            <?php $is_featured = get_post_meta( $property->ID, REALIA_PROPERTY_PREFIX . 'featured', true ); ?>
            <?php $is_reduced = get_post_meta( $property->ID, REALIA_PROPERTY_PREFIX . 'reduced', true ); ?>
            <?php if ( $is_featured || $is_reduced ) : ?>
                <div class="property-box-label">
                    <?php if ( $is_featured && $is_reduced ) : ?>
                        <span class="property-badge"><?php echo __( 'Featured', 'realocation' ); ?> / <?php echo __( 'Reduced', 'realocation' ); ?></span>
                    <?php elseif ( $is_featured ) : ?>
                        <span class="property-badge"><?php echo __( 'Featured', 'realocation' ); ?></span>
                    <?php elseif ( $is_reduced ) : ?>
                        <span class="property-badge"><?php echo __( 'Reduced', 'realocation' ); ?></span>
                    <?php endif; ?>
                </div><!-- /.property-box-label-right -->
            <?php endif; ?>

            <?php $beds = get_post_meta( $property->ID, REALIA_PROPERTY_PREFIX . 'beds', true ); ?>
            <?php if ( ! empty( $beds ) ) : ?>
                <div class="field-item">
                    <div class="label"><?php echo __( 'Nombre de chambres ', 'realocation' ); ?> : <?php echo esc_attr( $beds ); ?> </div>
                    
                </div>
            <?php endif; ?>

           

            

            <?php $home_area = get_post_meta( $property->ID, REALIA_PROPERTY_PREFIX . 'Surface ', true ); ?>
            <?php if ( ! empty( $home_area ) ) : ?>
                <div class="field-item">
                    <div class="label"><?php echo __( 'Surface', 'realocation' ); ?></div>
                    <?php echo esc_attr( $home_area ); ?>
                </div>
            <?php endif; ?>
            <div class="property-box-price">
                <?php $price = get_post_meta( $property->ID, REALIA_PROPERTY_PREFIX . 'price', true ); ?>
                <?php if ( ! empty( $price ) ) : ?>
                    <?php echo Realia_Price::get_property_price( $property->ID ); ?>
                <?php endif; ?>
            </div><!-- /.property-box-price -->
        </div><!-- /.property-box-meta -->
    </div><!-- /.property-box-inner -->
</div><!-- /.property-box -->
