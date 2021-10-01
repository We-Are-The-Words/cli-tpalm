<div class="agent-row">
    <div class="row">
        <?php if(has_post_thumbnail(get_the_ID())): ?>
            <div class="agent-row-picture col-sm-3">
                <div class="agent-row-picture-inner">
                    <a href="<?php the_permalink() ?>" class="agent-row-picture-target">
                        <?php the_post_thumbnail( 'post-thumbnail' ); ?>
                    </a><!-- /.agent-row-picture-target -->
                </div><!-- /.agent-row-picture-inner -->
            </div><!-- /.agent-row-picture -->
        <?php endif; ?>

        <div class="agent-row-content col-sm-9">

            <div class="agent-row-body">
                <h3 class="agent-row-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3><!-- /.agent-row-title -->

                <?php $properties_count = Realia_Query::get_agent_properties()->post_count; ?>
                <?php if ( $properties_count > 0 ) : ?>
                    <div class="agent-row-properties">
                        <?php if ( ! empty( $properties_count ) ) : ?>
                            <div class="agent-row-subtitle">
                                <?php echo esc_attr( $properties_count ); ?> <?php echo __( 'properties', 'realocation' ); ?>
                            </div><!-- /.agent-row-subtitle -->
                        <?php endif; ?>
                    </div><!-- /.agent-row-properties -->
                <?php endif; ?>

                <?php the_excerpt(); ?>
            </div><!-- /.agent-row-body -->

            <?php $email = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'email', true ); ?>
            <?php $web = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'web', true ); ?>
            <?php $phone = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'phone', true ); ?>
            <?php $address = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'address', true ); ?>

            <?php if ( ! empty( $email ) && ! empty( $web ) && ! empty( $phone ) && ! empty( $address ) ) :?>
                <div class="agent-row-overview">

                    <h4 class="agent-row-overview-title">
                        <?php echo __( 'Contact Information', 'realocation' ); ?>
                    </h4><!-- /.agency-row-overview -->

                    <dl>
                        <?php if ( ! empty( $email ) ) : ?>
                            <dt><i class="fa fa-envelope-o"></i></dt>
                            <dd>
                                <a href="mailto:<?php echo esc_attr( $email ); ?>">
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
                </div><!-- /.agent-overview -->
            <?php endif;?>


        </div><!-- /.agent-row-content -->
    </div><!-- /.row -->
</div><!-- /.agent-row -->