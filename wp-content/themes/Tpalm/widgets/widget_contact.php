<?php

class Aviators_Widget_Contact extends WP_Widget {
    function __construct( $id_base = null, $name = null, $widget_options = array(), $control_options = array() )  {
        if( !$id_base ) {
            $id_base = 'aviators_contact';
        }

        if ( ! $name ) {
            $name = __( 'Contact Information', 'realocation' );
        }

        $widget_ops = array( 'description' => __( 'Contact information with icons.', 'realocation' ) );

        parent::__construct( $id_base, $name, $widget_ops );
    }

    function widget( $args, $instance ) {

       ?>

        <?php echo wp_kses( $args['before_widget'], wp_kses_allowed_html( 'post' ) ); ?>
            <?php if ( ! empty( $instance[ 'title' ] ) ) : ?>
                <h2 class="widgettitle">
                    <?php echo wp_kses( $instance[ 'title' ], wp_kses_allowed_html( 'post' ) ); ?>
                </h2><!-- /.widgettitle -->
            <?php endif; ?>
            <?php if ( ! empty( $instance[ 'description' ] ) ) : ?>
                <div class="description">
                    <?php echo wp_kses( $instance[ 'description' ], wp_kses_allowed_html( 'post' ) ); ?>
                </div><!-- /.description -->
            <?php endif; ?>

            <?php for( $i = 1; $i <= 3; $i++) : ?>
                <?php $title_id = 'title_' . $i; ?>
                <?php $content_id = 'content_' . $i; ?>
                <?php $icon_id = 'icon_' . $i; ?>

                <div class="contact-box">
                    <div class="title">
                        <span class="fa <?php echo wp_kses( $instance[ $icon_id ], wp_kses_allowed_html( 'post' ) ); ?>"></span>
                        <h3><?php echo wp_kses( $instance[ $title_id ], wp_kses_allowed_html( 'post' ) ); ?></h3>
                    </div>
                    <p><?php echo wp_kses( $instance[ $content_id ], wp_kses_allowed_html( 'post' ) ); ?></p>
                </div><!-- /.contact-box -->
            <?php endfor; ?>

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

        <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
            <?php $title_id = 'title_' . $i; ?>
            <?php $content_id = 'content_' . $i; ?>
            <?php $icon_id = 'icon_' . $i; ?>

            <?php $title = !empty( $instance[$title_id] ) ? $instance[$title_id] : ''; ?>
            <?php $content = !empty( $instance[$content_id] ) ? $instance[$content_id] : ''; ?>
            <?php $icon = !empty( $instance[$icon_id] ) ? $instance[$icon_id] : ''; ?>

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
                            <?php echo __( 'Title:', 'realocation' ); ?>
                            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $title_id ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $title_id ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"/>
                        </p>

                        <p>
                            <?php echo __( 'Content:', 'realocation' ); ?>
                            <textarea class="widefat" rows="3" id="<?php echo esc_attr( $this->get_field_id( $content_id ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $content_id ) ); ?>"><?php echo esc_attr( $content ); ?></textarea>
                        </p>

                        <p>
                            <?php echo __( 'Icon Class:', 'realocation' ); ?>
                            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $icon_id ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $icon_id ) ); ?>" type="text" value="<?php echo esc_attr( $icon ); ?>"/>
                            Add class in format <code>fa-[icon name]</code> (e.g. <code>fa-phone</code>).<br>See full icon list on <a href="<?php echo esc_url( 'http://fortawesome.github.io/Font-Awesome/icons/' ); ?>">FontAwesome</a>.
                        </p>
                    </div>
                </div>
            </p>

        <?php endfor; ?>

        <?php
    }
}