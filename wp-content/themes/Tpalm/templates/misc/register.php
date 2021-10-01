<?php if ( ! get_option( 'users_can_register' ) ): ?>
    <div class="alert alert-warning">
        <?php echo __( 'Registrations are not allowed.', 'realocation' ); ?>
    </div><!-- /.alert -->
<?php else: ?>
    <form method="post" action="<?php the_permalink(); ?>">
        <div class="form-group">
            <label><?php echo __( 'Username', 'realocation' ); ?></label>
            <input type="text" name="name" class="form-control" required="required">
        </div><!-- /.form-group -->

        <div class="form-group">
            <label><?php echo __( 'E-mail', 'realocation' ); ?></label>
            <input type="email" name="email" class="form-control" required="required">
        </div><!-- /.form-group -->

        <div class="form-group">
            <label for="register-form-first-name"><?php echo __( 'First name', 'realia' ); ?></label>
            <input id="register-form-first-name" type="text" name="first_name" class="form-control">
        </div><!-- /.form-group -->

        <div class="form-group">
            <label for="register-form-last-name"><?php echo __( 'Last name', 'realia' ); ?></label>
            <input id="register-form-last-name" type="text" name="last_name" class="form-control">
        </div><!-- /.form-group -->

        <div class="form-group">
            <label for="register-form-phone"><?php echo __( 'Phone', 'realia' ); ?></label>
            <input id="register-form-phone" type="text" name="phone" class="form-control">
        </div><!-- /.form-group -->

        <div class="form-group">
            <label><?php echo __( 'Password', 'realocation' ); ?></label>
            <input type="password" name="password" class="form-control" required="required">
        </div><!-- /.form-group -->

        <div class="form-group">
            <label><?php echo __( 'Retype Password', 'realocation' ); ?></label>
            <input type="password" name="password_retype" class="form-control" required="required">
        </div><!-- /.form-group -->

        <?php $terms = get_theme_mod( 'realia_submission_terms' ); ?>

        <?php if ( ! empty( $terms ) ) : ?>
            <div class="form-group terms-conditions-input">
                <input type="checkbox" name="agree_terms" id="agree_terms">
                <label for="agree_terms"><?php echo sprintf( __( 'I agree with <a href="%s">terms & conditions</a>', 'realocation' ), get_permalink( $terms ) ); ?></label>
            </div><!-- /.form-group -->
        <?php endif; ?>

        <button type="submit" name="register_form"><?php echo __( 'Sign Up', 'realocation' ); ?></button>

    </form>
<?php endif; ?>