<?php

class Aviators_Widget_Accordion extends WP_Widget {
    function __construct( $id_base = null, $name = null, $widget_options = array(), $control_options = array() )  {
        if( !$id_base ) {
            $id_base = 'aviators_accordion';
        }

        if ( ! $name ) {
            $name = __( 'Accordion', 'realocation' );
        }

        $widget_ops = array( 'description' => __( 'Accordion panels with title and content.', 'realocation' ) );

        parent::__construct( $id_base, $name, $widget_ops );
    }

    function widget( $args, $instance ) {
        extract( $args );

       ?>

        <?php echo wp_kses( $args['before_widget'], wp_kses_allowed_html( 'post' ) ); ?>

        <?php if ( $instance[ 'title' ] ) : ?>
            <h2 class="widgettitle">
                <?php echo wp_kses( $instance[ 'title' ], wp_kses_allowed_html( 'post' ) ); ?>
            </h2><!-- /.widgettitle -->
        <?php endif; ?>

        <?php if ( $instance[ 'description' ] ) : ?>
            <div class="description">
                <?php echo wp_kses( $instance[ 'description' ], wp_kses_allowed_html( 'post' ) ); ?>
            </div><!-- /.description -->
        <?php endif; ?>

        <div class="panel-group" id="collapse-<?php print $this->id; ?>">
            <?php for ( $i = 1; $i <= $instance['count']; $i++ ) : ?>
                <?php $title_id = 'title_' . $i; ?>
                <?php $content_id = 'content_' . $i; ?>

                <?php $title = !empty( $instance[$title_id] ) ? $instance[$title_id] : ''; ?>
                <?php $content = !empty( $instance[$content_id] ) ? $instance[$content_id] : ''; ?>

                <?php if( $title && $content): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#collapse-<?php print $this->id; ?>" href="#collapse-<?php echo $this->id . '-' . $i; ?>" <?php if ( $i != 1 ) : ?><?php echo 'class="collapsed"'; ?><?php endif; ?>>
                                    <?php echo $title; ?>
                                </a>
                            </h4>
                        </div><!-- /.panel-heading -->

                        <div id="collapse-<?php echo $this->id . '-' . $i; ?>" class="panel-collapse collapse <?php if ( $i == 1 ): ?><?php echo 'in'; ?><?php endif; ?>">
                            <div class="panel-body">
                                <?php echo do_shortcode( $content ); ?>
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel-heading -->
                    </div><!-- /.panel -->
                <?php endif; ?>
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
        <?php $count = ( isset( $instance[ 'count' ] ) ) ? $instance[ 'count' ] : 3; ?>

        <p>
            <?php echo __( 'Title:', 'realocation' ); ?>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"/>
        </p>

        <p>
            <?php echo __( 'Description:', 'realocation' ); ?>
            <textarea class="widefat" rows="3" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"><?php echo esc_attr( $description ); ?></textarea>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>">
                <?php echo __( 'Count of Panels', 'realocation' ); ?>
            </label>

            <select class="panel-count" id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>">
                <?php for ( $i = 1; $i <= 10; $i++ ) : ?>
                    <option value="<?php echo $i; ?>" <?php echo ( $count == $i ) ? 'selected="selected"' : ''; ?>><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </p>

        <?php for ( $i = 1; $i <= 10; $i++ ) : ?>
            <?php $title_id = 'title_' . $i; ?>
            <?php $content_id = 'content_' . $i; ?>

            <?php $title = !empty( $instance[$title_id] ) ? $instance[$title_id] : ''; ?>
            <?php $content = !empty( $instance[$content_id] ) ? $instance[$content_id] : ''; ?>

            <p>
                <div class="widget accordion-panel" <?php echo ( $i > $count ) ? 'style="display: none;"' : 'style="display: block;"'; ?>>
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
                    </div>
                </div>
            </p>

        <?php endfor; ?>

        <?php
    }
}