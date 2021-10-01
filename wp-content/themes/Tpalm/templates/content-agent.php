<div class="agent-detail">

    <div class="row">

        <div class="col-sm-3">
            <div class="agent-detail-picture">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail(); ?>
                <?php endif; ?>
            </div>
            <!-- /.agent-detail-picture -->

            <?php $email = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'email', true ); ?>
            <?php $web = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'web', true ); ?>
            <?php $phone = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'phone', true ); ?>
            <?php $address = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'address', true ); ?>

            <dl class="agent-contact-information">
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

        </div>

        <div class="col-sm-9">
            <h1>
                <?php the_title() ?>
            </h1>

            <div class="block-content">
                <?php the_content(); ?>
            </div>
            <!-- /.social-->
        </div>
    </div>
    <!-- /.row -->
</div>

<?php if ( is_single() ) : ?>
    <?php Realia_Query::loop_agent_properties(); ?>

    <hr>
    <?php if ( have_posts() ) : ?>
        <div class="row">

            <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-md-4 col-sm-6">
                    <?php echo Realia_Template_Loader::load( 'properties/box' ); ?>
                </div><!-- /.col-sm-4 -->
            <?php endwhile; ?>
        </div><!-- /.row -->
    <?php endif;?>

    <?php wp_reset_query(); ?>
<?php endif; ?>

<hr>
<?php echo Realia_Template_Loader::load( 'agents/contact-form' ); ?>

<?php if ( comments_open() || get_comments_number() ) : ?>
    <div class="box"><?php comments_template( '', true ); ?></div>
<?php endif; ?>



