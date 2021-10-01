<?php $is_sticky = get_post_meta( get_the_ID(), REALIA_PROPERTY_PREFIX . 'sticky', true ); ?>

<div class="agent-box">
    <?php if(has_post_thumbnail()): ?>
        <div class="agent-box-picture">
            <div class="agent-box-picture-inner">
                <a href="<?php print get_permalink(); ?>" class="agent-box-picture-target">
                    <?php the_post_thumbnail(); ?>
                </a><!-- /.agent-box-picture-target -->
            </div><!-- /.agent-box-picture-inner -->
        </div><!-- /.agent-box-picture -->
    <?php endif; ?>

    <div class="agent-box-content">
        <h3 class="agent-box-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3><!-- /.agent-box-title -->

        <?php $properties_count = Realia_Query::get_agent_properties()->post_count; ?>
        <?php if ( $properties_count > 0 ) : ?>
            <?php if ( ! empty( $properties_count ) ) : ?>
                <div class="agent-box-subtitle">
                    <?php echo esc_attr( $properties_count ); ?> <?php echo __( 'properties', 'realocation' ); ?>
                </div><!-- /.agent-box-subtitle -->
            <?php endif; ?>
        <?php endif; ?>

        <?php $email = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'email', true ); ?>
        <?php $phone = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'phone', true ); ?>

        <?php if ( ! empty( $email ) && ! empty( $phone ) ) :?>
            <div class="agent-box-overview">
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
                    <?php if ( ! empty( $phone ) ) : ?>
                        <dt><i class="fa fa-phone"></i></dt>
                        <dd><?php echo esc_attr( $phone ); ?></dd>
                    <?php endif; ?>
                    <br>
                </dl>
            </div><!-- /.agent-overview -->
        <?php endif; ?>
    </div><!-- /.agent-box-content -->
</div><!-- /.agent-box -->
