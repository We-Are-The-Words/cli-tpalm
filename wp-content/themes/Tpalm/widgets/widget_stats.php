<?php

class Aviators_Widget_Stats extends WP_Widget {
    function __construct( $id_base = null, $name = null, $widget_options = array(), $control_options = array() )  {
        if( !$id_base ) {
            $id_base = 'aviators_stats';
        }

        if ( ! $name ) {
            $name = __( 'Stats', 'realocation' );
        }

        $widget_ops = array( 'description' => __( 'Statistics with counter effect.', 'realocation' ) );

        parent::__construct( $id_base, $name, $widget_ops );
    }

    function widget( $args, $instance ) {

       ?>

        <?php echo wp_kses( $args['before_widget'], wp_kses_allowed_html( 'post' ) ); ?>

        <?php if ( ! empty( $instance['title'] ) ) : ?>
            <h2 class="widgettitle">
                <?php echo wp_kses( $instance[ 'title' ], wp_kses_allowed_html( 'post' ) ); ?>
            </h2><!-- /.widgettitle -->
        <?php endif; ?>
        <?php if ( ! empty( $instance['description'] ) ) : ?>
            <div class="description">
                <?php echo wp_kses( $instance[ 'description' ], wp_kses_allowed_html( 'post' ) ); ?>
            </div><!-- /.description -->
        <?php endif; ?>

            <div class="row">
                <?php for( $i = 1; $i <= 4; $i++) : ?>
                    <?php $title_id = 'title_' . $i; ?>
                    <?php $value_id = 'value_' . $i; ?>

                    <div class="col-sm-3 col-md-2 <?php if ( $i == 1 ) : ?>col-md-offset-2<?php endif; ?>">
                        <div class="block-stats background-dots background-primary color-white counting">
                            <strong class="stats-value" data-value="<?php echo wp_kses( $instance[ $value_id ], wp_kses_allowed_html( 'post' ) ); ?>">0</strong>
                            <div class="stat-content"><?php echo wp_kses( $instance[ $title_id ], wp_kses_allowed_html( 'post' ) ); ?></div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>

        <?php echo wp_kses( $args['after_widget'], wp_kses_allowed_html( 'post' ) ); ?>

    <?php
    }

    function update( $new_instance, $old_instance ) {
        return $new_instance;
    }

    function form( $instance ) {
        ?>

        <?php $title = ( isset( $instance[ 'title' ] ) ) ? $instance[ 'title' ] : ''; ?>
        <?php $description = ( isset( $instance[ 'description' ] ) ) ? $instance[ 'description' ] : ''; ?>

        <p>
            <?php echo __( 'Title:', 'realocation' ); ?>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"/>
        </p>

        <p>
            <?php echo __( 'Description:', 'realocation' ); ?>
            <textarea class="widefat" rows="3" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"><?php echo esc_attr( $description ); ?></textarea>
        </p>

        <?php for ( $i = 1; $i <= 4; $i++ ) : ?>
            <?php $title_id = 'title_' . $i; ?>
            <?php $value_id = 'value_' . $i; ?>

            <?php $title = !empty( $instance[$title_id] ) ? $instance[$title_id] : ''; ?>
            <?php $value = !empty( $instance[$value_id] ) ? $instance[$value_id] : ''; ?>

            <p class="nested-box-contact">
                <div class="widget">
                    <div class="widget-top">
                        <span class="dashicons dashicons-arrow-down" style="color: #aaa; cursor: pointer; float: right; padding: 12px 12px 0px; position: relative;"></span>
                        <div class="widget-title" style="cursor: pointer;">
                            <h4><?php echo esc_attr( $i . '. ' . $title ); ?></h4>
                        </div>
                    </div>
                    <div class="widget-inside">
                        <p>
                            <?php echo __( 'Integer Value:', 'realocation' ); ?>
                            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $value_id ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $value_id ) ); ?>" type="number" min="0" value="<?php echo esc_attr( $value ); ?>"/>
                        </p>

                        <p>
                            <?php echo __( 'Title:', 'realocation' ); ?>
                            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $title_id ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $title_id ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"/>
                        </p>
                    </div>
                </div>
            </p>

        <?php endfor; ?>

        <?php
    }
}