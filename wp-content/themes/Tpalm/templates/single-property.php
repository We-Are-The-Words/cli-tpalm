<?php get_header(); ?>

    <div class="row">
        <div class="content <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>col-sm-8 col-md-9<?php else : ?>col-sm-12<?php endif; ?>">
            <?php dynamic_sidebar( 'sidebar-content-top' ); ?>

            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php echo Realia_Template_Loader::load('content-property'); ?>
                <?php endwhile; ?>

            <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>
            <?php endif; ?>

            <?php dynamic_sidebar( 'sidebar-content-bottom' ); ?>
        </div><!-- /.content -->

        <?php get_sidebar(); ?>
    </div><!-- /.row -->

<?php get_footer(); ?>