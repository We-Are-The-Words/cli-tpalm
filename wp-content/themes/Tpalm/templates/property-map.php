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
             data-marker-image="https://tpalm.be/wp-content/uploads/2017/01/map_marker_tpalm-1.png"
            >
        </div><!-- /.map -->
    </div><!-- /.map-position -->
<?php endif; ?>