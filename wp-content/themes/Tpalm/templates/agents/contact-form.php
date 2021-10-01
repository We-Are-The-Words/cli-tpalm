<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php $email = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'email', true ); ?>

<?php if ( ! empty( $_POST ) && array_key_exists( 'contact-form', $_POST ) ) : ?>
    <?php
	$is_form_filled = ! empty( $_POST['email'] ) && ! empty( $_POST['subject'] ) && ! empty( $_POST['message'] );
	$is_recaptcha = Realia_Recaptcha::is_recaptcha_enabled();
	$is_recaptcha_valid = array_key_exists( 'g-recaptcha-response', $_POST ) ? Realia_Recaptcha::is_recaptcha_valid( $_POST['g-recaptcha-response'] ) : false;
	?>

    <?php if ( ! ( $is_recaptcha && ! $is_recaptcha_valid ) && $is_form_filled ) : ?>
        <?php $headers = sprintf( "From: %s <%s>\r\n Content-type: text/html", $_POST['email'], $_POST['email'] ); ?>
        <?php $result = wp_mail( $email, $_POST['subject'], $_POST['message'], $headers ); ?>

        <?php if ( $result ) : ?>
            <div class="alert alert-success"><?php echo __( 'Your message has been successfully sent.', 'realocation' ); ?></div>
        <?php else : ?>
            <div class="alert alert-warning"><?php echo __( 'An error occured when sending an email.', 'realocation' ); ?></div>
        <?php endif; ?>
    <?php else : ?>
        <div class="alert alert-warning"><?php echo __( 'Form has been not filled correctly.', 'realocation' ); ?></div>
    <?php endif; ?>
<?php endif; ?>

<?php if ( ! empty( $email ) ) : ?>
    <div class="agent-contact">
        <h2><?php echo __( 'Contact Form', 'realocation' ); ?></h2>

        <div class="agent-contact-form box">
            <form method="post" action="?">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="subject"><?php echo __( 'Subject', 'realocation' ); ?></label>
                        <input type="text" class="form-control" name="subject">
                    </div><!-- /.form-group -->

                    <div class="form-group col-sm-6">
                        <label for="email"><?php echo __( 'E-mail', 'realocation' ); ?></label>
                        <input type="email" class="form-control" name="email">
                    </div><!-- /.form-group -->

                    <div class="form-group col-sm-12">
                        <label for="message"><?php echo __( 'Message', 'realocation' ); ?></label>
                        <textarea class="form-control" name="message" style="overflow: hidden; word-wrap: break-word; height: 68px;"></textarea>
                    </div><!-- /.form-group -->
                </div><!-- /.row -->

                <?php if ( Realia_Recaptcha::is_recaptcha_enabled() ) : ?>
                    <div id="recaptcha-agent-contact" class="recaptcha" data-sitekey="<?php echo get_theme_mod( 'realia_recaptcha_site_key' ); ?>"></div>
                <?php endif; ?>

                <button class="btn" name="contact-form"><?php echo __( 'Send message', 'realocation' ); ?></button>
            </form>
        </div><!-- /.agent-contact-form -->
    </div><!-- /.agent-contact-->
<?php endif; ?>
