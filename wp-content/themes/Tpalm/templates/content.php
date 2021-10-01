<div <?php post_class() ?>>
    <div class="clearfix">
        <?php if( ! is_front_page() && ! is_page_template('page-no-title.php') && ! is_home() ) : ?>
            <h2>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <p class="post-tags"><?php the_tags( '<i class="fa fa-tag"></i>', ', ' ) ?></p>
        <?php endif; ?>

        <div class="content-wrapper">

            <?php if( get_the_content() || get_the_excerpt() ) : ?>
                <div class="content">
                    <?php if ( is_single() || is_page() ) : ?>
                        <?php the_content(); ?>

                    <?php else: ?>
                        <div class="row post-row">
                            <div class="<?php echo ( has_post_thumbnail() ) ? 'col-sm-4' : 'col-sm-12'; ?>">
                                <div class="post-date">
                                    <i class="fa fa-calendar"></i>
                                    <div class="post-month"><?php echo get_the_date('M'); ?></div>
                                    <div class="post-day"><?php echo get_the_date('j'); ?></div>
                                </div><!-- /.post-date -->

                            <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail'); ?></a>
                                    </div><!-- /.post-thumbnail -->

                                </div><!-- /.col-sm-4 -->
                                <div class="col-sm-8">
                            <?php endif; ?>

                                <div class="post-data">
                                    <h2>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <p class="post-tags"><?php the_tags( '<i class="fa fa-tag"></i>', ', ' ) ?></p>
                                    <?php the_excerpt(); ?>
                                    <a href="<?php echo get_the_permalink( get_the_ID() ); ?>" class="btn"><?php echo __('Read', 'realocation'); ?></a>
                                </div><!-- /.post-data -->
                            </div><!-- /.col-sm-8 -->
                        </div><!-- /.row -->
                    <?php endif; ?>
                </div><!-- /.content -->
            <?php endif; ?>

        </div><!-- /.content-wrapper -->
    </div>
</div>
