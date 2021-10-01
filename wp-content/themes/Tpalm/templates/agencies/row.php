<div class="agency-row clearfix">

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="agency-row-picture col-sm-3">
            <div class="agency-row-picture-inner">
                <a href="<?php the_permalink(); ?>" class="agency-row-picture-target">
                    <?php the_post_thumbnail( 'post-thumbnail' ); ?>
                </a><!-- /.agency-row-picture-target -->
            </div><!-- /.agency-row-picture-inner -->
        </div><!-- /.agency-row-picture  -->
    <?php endif; ?>

    <div class="agency-row-content col-sm-9">
        <div class="agency-row-body">
            <h3 class="agency-row-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>

            <?php $agents_count = Realia_Query::get_agency_agents()->post_count; ?>

            <?php if ( $agents_count > 0 ) : ?>
                <div class="agency-row-agents">
                    <?php if ( ! empty( $agents_count ) ) : ?>
                        <div class="agency-row-subtitle">
                            <?php echo esc_attr( $agents_count ); ?> <?php echo __( 'agents', 'realocation' ); ?>
                        </div><!-- /.agency-row-subtitle -->
                    <?php endif; ?>
                </div><!-- /.agency-row-agents -->
            <?php endif; ?>

            <?php the_excerpt(); ?>
        </div><!-- /.agency-row-body -->

        <div class="agency-row-overview">
            <?php $email = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'email', true ); ?>
            <?php $web = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'web', true ); ?>
            <?php $phone = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'phone', true ); ?>
            <?php $address = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'address', true ); ?>

            <?php if ( ! empty( $email ) || ! empty( $web ) || ! empty( $phone ) || ! empty( $address ) ) : ?>
                <h4 class="agency-row-overview-title">
                    <?php echo __( 'Contact Information', 'realocation' ); ?>
                </h4><!-- /.agency-row-overview -->

                <dl>
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
        </div><!-- /.agency-row-overview -->
    </div><!-- /.agency-row-content -->
</div>
