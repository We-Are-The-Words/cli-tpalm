<div class="agency-detail">

    <div class="row">
        <div class="col-sm-3">
            <div class="agency-detail-picture">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'thumbnail' ); ?>
                <?php endif; ?>
            </div><!-- /.agency-detail-picture -->

            <?php $email = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'email', true ); ?>
            <?php $web = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'web', true ); ?>
            <?php $phone = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'phone', true ); ?>
            <?php $address = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'address', true ); ?>

            <?php if ( ! empty( $email ) || ! empty( $web ) || ! empty( $phone ) || ! empty( $address ) ) : ?>
                <dl class="agency-contact-information">
                    <?php if ( ! empty( $email ) ) : ?>
                        <dt><i class="fa fa-envelope-o"></i></dt>
                        <dd>
                            <a href="mailto:<?php echo $email; ?>">
                                <?php echo esc_attr( $email ); ?>
                            </a>
                        </dd>
                    <?php endif; ?>
                    <br>
                    <?php if ( ! empty( $web ) ) : ?>
                        <dt><i class="fa fa-globe"></i></dt>
                        <dd>
                            <a href="<?php echo esc_attr( $web ); ?>">
                                <?php echo esc_attr( $web ); ?>
                            </a>
                        </dd>
                    <?php endif; ?>
                    <br>
                    <?php if ( ! empty( $phone ) ) : ?>
                        <dt><i class="fa fa-phone"></i></dt>
                        <dd><?php echo esc_attr( $phone ); ?></dd>
                    <?php endif; ?>
                    <br>
                    <?php if ( ! empty( $address ) ) : ?>
                        <dt><i class="fa fa-map-marker"></i></dt>
                        <dd><?php echo wp_kses( nl2br( $address ), wp_kses_allowed_html( 'post' ) ); ?></dd>
                    <?php endif; ?>
                </dl>
            <?php endif; ?>
        </div><!-- /.col-sm-3 -->

        <div class="col-sm-9">
            <h1>
                <?php the_title() ?>
            </h1>

            <div class="block-content">
                <?php the_content(); ?>
            </div><!-- /.block-content -->
        </div>
    </div><!-- /.row -->

    <?php if ( is_single() ) : ?>

        <!-- Agency's location -->
        <?php $location = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'location', true ); ?>

        <?php if ( ! empty( $location ) && 2 == count( $location ) ) : ?>
            <hr>

            <!-- MAP -->
            <div class="map-position">
                <div id="simple-map"
                     data-latitude="<?php echo esc_attr( $location['latitude'] ); ?>"
                     data-longitude="<?php echo esc_attr( $location['longitude'] ); ?>"
                     data-transparent-marker-image="<?php echo get_template_directory_uri(); ?>/assets/img/transparent-marker-image.png"
                     data-zoom="15">
                </div><!-- /#map-property -->
            </div><!-- /.map-property -->
        <?php endif; ?>

        <!-- Agency's agents -->
        <?php Realia_Query::loop_agency_agents(); ?>

        <?php if ( have_posts() ) : ?>
            <hr>

            <div class="agency-agents">
                <div class="row">
                <?php $counter = 0; ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="col-sm-4">
                        <div class="agent-box-wrapper"><?php echo Realia_Template_Loader::load( 'agents/box' ); ?></div>
                    </div><!-- /.col-sm-4 -->
                    <?php if ( $counter++ % 3 == 2) : ?>
                        </div><div class="row">
                    <?php endif; ?>
                <?php endwhile; ?>
                </div><!-- /.row -->
            </div><!-- /.agency-agents -->
        <?php endif;?>

        <?php wp_reset_query(); ?>
    <?php endif; ?>

    <?php wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'realocation' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'realocation' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ) ); ?>

    <?php if ( comments_open() || get_comments_number() ) : ?>
        <div class="box"><?php comments_template( '', true ); ?></div>
    <?php endif; ?>

</div>
