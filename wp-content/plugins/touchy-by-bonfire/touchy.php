<?php
/*
Plugin Name: Touchy, by Bonfire 
Plugin URI: http://bonfirethemes.com/
Description: Mobile Menu and Header for WordPress. Customize under Appearance → Customize → Touchy Plugin
Version: 2.4
Author: Bonfire Themes
Author URI: http://bonfirethemes.com/
License: GPL2
*/

    //
	// WORDPRESS LIVE CUSTOMIZER
	//
	function touchy_theme_customizer( $wp_customize ) {
	
        //
        // ADD "TOUCHY" PANEL TO LIVE CUSTOMIZER 
        //
        $wp_customize->add_panel('touchy_panel', array('title' => __('Touchy Plugin', 'touchy'),'priority' => 10,));

        //
        // ADD "LOGO & LOGO AREA" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_logo_section',array('title' => __( 'Logo & Logo Area', 'touchy' ),'panel' => 'touchy_panel','priority' => 9));
        
        /* hide logo area */
        $wp_customize->add_setting('bonfire_touchy_hide_logo_area',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_logo_area',));
        function sanitize_bonfire_touchy_hide_logo_area( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_logo_area',array('type' => 'checkbox','label' => 'Hide logo area','description' => 'If selected, the entire logo area will be hidden on all pages.','section' => 'touchy_logo_section',));
        
        /* hide logo area background */
        $wp_customize->add_setting('bonfire_touchy_hide_logo_background',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_logo_background',));
        function sanitize_bonfire_touchy_hide_logo_background( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_logo_background',array('type' => 'checkbox','label' => 'Hide logo area background','description' => 'If selected, the logo area background will be transparent.','section' => 'touchy_logo_section',));
        
        /* hide logo area background shadow */
        $wp_customize->add_setting('bonfire_touchy_hide_logo_background_shadow',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_logo_background_shadow',));
        function sanitize_bonfire_touchy_hide_logo_background_shadow( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_logo_background_shadow',array('type' => 'checkbox','label' => 'Hide logo area background shadow','description' => 'If selected, the logo area background shadow will be hidden.','section' => 'touchy_logo_section',));
        
        /* logo area background color */
        $wp_customize->add_setting( 'bonfire_touchy_logo_area_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_logo_area_background_color',array(
            'label' => 'Background', 'settings' => 'bonfire_touchy_logo_area_background_color', 'section' => 'touchy_logo_section' )
        ));
        
        /* logo color */
        $wp_customize->add_setting( 'bonfire_touchy_logo_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_logo_color',array(
            'label' => 'Logo', 'settings' => 'bonfire_touchy_logo_color', 'section' => 'touchy_logo_section' )
        ));
        
        /* logo hover color */
        $wp_customize->add_setting( 'bonfire_touchy_logo_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_logo_hover_color',array(
            'label' => 'Logo hover', 'settings' => 'bonfire_touchy_logo_hover_color', 'section' => 'touchy_logo_section' )
        ));
        
        /* logo alignment */
        $wp_customize->add_setting('bonfire_touchy_logo_align',array(
            'default' => 'center',
        ));
        $wp_customize->add_control('bonfire_touchy_logo_align',array(
            'type' => 'select',
            'label' => 'Logo alignment',
            'section' => 'touchy_logo_section',
            'choices' => array(
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
        ),
        ));
        
        /* logo image */
        $wp_customize->add_setting('bonfire_touchy_logo_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'bonfire_touchy_logo_image',
            array(
                'label' => 'Upload logo image',
                'description' => '<strong>How-to add retina logo:</strong> If you would like to add a retina logo, upload both the regular and retina logo files and make sure they are named correctly. If retina logo is uploaded, it will be shown on retina screens with no further setup necessary. <br><br> Example:<br> my-logo.png and my-logo@2x.png (note that the retina logo must have "@2x" at the end).<br><br>',
                'settings' => 'bonfire_touchy_logo_image',
                'section' => 'touchy_logo_section',
        )
        ));

        //
        // ADD "BACK BUTTON" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_back_button_section',array('title' => __( 'Back Button', 'touchy' ),'panel' => 'touchy_panel','priority' => 10));
        
        /* hide Back button */
        $wp_customize->add_setting('bonfire_touchy_hide_back_button',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_back_button',));
        function sanitize_bonfire_touchy_hide_back_button( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_back_button',array('type' => 'checkbox','label' => 'Hide Back button','description' => 'If selected, the Back button will be hidden on all pages.','section' => 'touchy_back_button_section',));
        
        /* back button color */
        $wp_customize->add_setting( 'bonfire_touchy_back_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_back_button_color',array(
            'label' => 'Button background', 'settings' => 'bonfire_touchy_back_button_color', 'section' => 'touchy_back_button_section' )
        ));
        
        /* back button hover color */
        $wp_customize->add_setting( 'bonfire_touchy_back_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_back_button_hover_color',array(
            'label' => 'Button background hover', 'settings' => 'bonfire_touchy_back_button_hover_color', 'section' => 'touchy_back_button_section' )
        ));
        
        /* back button icon color */
        $wp_customize->add_setting( 'bonfire_touchy_back_button_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_back_button_icon_color',array(
            'label' => 'Button icon', 'settings' => 'bonfire_touchy_back_button_icon_color', 'section' => 'touchy_back_button_section' )
        ));
        
        /* back button icon hover color */
        $wp_customize->add_setting( 'bonfire_touchy_back_button_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_back_button_icon_hover_color',array(
            'label' => 'Button icon hover', 'settings' => 'bonfire_touchy_back_button_icon_hover_color', 'section' => 'touchy_back_button_section' )
        ));
        
        /* back button label */
        $wp_customize->add_setting('bonfire_touchy_back_icon_label',array('sanitize_callback' => 'sanitize_bonfire_touchy_back_icon_label',));
        function sanitize_bonfire_touchy_back_icon_label($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_back_icon_label',array(
            'type' => 'text',
            'label' => 'Text label',
            'description' => 'A text label to be shown below icon',
            'section' => 'touchy_back_button_section',
        ));
        
        /* back button label color */
        $wp_customize->add_setting( 'bonfire_touchy_back_button_label_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_back_button_label_color',array(
            'label' => 'Text label', 'settings' => 'bonfire_touchy_back_button_label_color', 'section' => 'touchy_back_button_section' )
        ));
        
        /* back button label hover color */
        $wp_customize->add_setting( 'bonfire_touchy_back_button_label_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_back_button_label_hover_color',array(
            'label' => 'Text label hover', 'settings' => 'bonfire_touchy_back_button_label_hover_color', 'section' => 'touchy_back_button_section' )
        ));
        
        /* custom Back icon */
        $wp_customize->add_setting('bonfire_touchy_back_icon',array('sanitize_callback' => 'sanitize_bonfire_touchy_back_icon',));
        function sanitize_bonfire_touchy_back_icon($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_back_icon',array(
            'type' => 'text',
            'label' => 'Custom icon',
            'description' => 'Collection of 500+ icons can be viewed <a href="http://fontawesome.io/cheatsheet/" target="_blank" style="text-decoration:underline;">here</a> (the icon names are <strong>fa-diamond</strong>, <strong>fa-anchor</strong> etc). When empty, default icon is shown.',
            'section' => 'touchy_back_button_section',
        ));
        
        //
        // ADD "CALL BUTTON" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_call_button_section',array('title' => __( 'Call Button', 'touchy' ),'panel' => 'touchy_panel','priority' => 11));
        
        /* hide Call button */
        $wp_customize->add_setting('bonfire_touchy_hide_call_button',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_call_button',));
        function sanitize_bonfire_touchy_hide_call_button( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_call_button',array('type' => 'checkbox','label' => 'Hide Call button','description' => 'If selected, the Call button will be hidden on all pages.','section' => 'touchy_call_button_section',));
        
        /* phone number */
        $wp_customize->add_setting('bonfire_touchy_phone_number',array('sanitize_callback' => 'sanitize_bonfire_touchy_phone_number',));
        function sanitize_bonfire_touchy_phone_number($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_phone_number',array(
            'type' => 'text',
            'label' => 'Phone number',
            'description' => 'Enter your phone number',
            'section' => 'touchy_call_button_section',
        ));
        
        /* call button color */
        $wp_customize->add_setting( 'bonfire_touchy_call_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_call_button_color',array(
            'label' => 'Button background', 'settings' => 'bonfire_touchy_call_button_color', 'section' => 'touchy_call_button_section' )
        ));
        
        /* call button hover color */
        $wp_customize->add_setting( 'bonfire_touchy_call_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_call_button_hover_color',array(
            'label' => 'Button background hover', 'settings' => 'bonfire_touchy_call_button_hover_color', 'section' => 'touchy_call_button_section' )
        ));
        
        /* call button icon color */
        $wp_customize->add_setting( 'bonfire_touchy_call_button_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_call_button_icon_color',array(
            'label' => 'Button icon', 'settings' => 'bonfire_touchy_call_button_icon_color', 'section' => 'touchy_call_button_section' )
        ));
        
        /* call button icon hover color */
        $wp_customize->add_setting( 'bonfire_touchy_call_button_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_call_button_icon_hover_color',array(
            'label' => 'Button icon hover', 'settings' => 'bonfire_touchy_call_button_icon_hover_color', 'section' => 'touchy_call_button_section' )
        ));
        
        /* call button label */
        $wp_customize->add_setting('bonfire_touchy_call_icon_label',array('sanitize_callback' => 'sanitize_bonfire_touchy_call_icon_label',));
        function sanitize_bonfire_touchy_call_icon_label($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_call_icon_label',array(
            'type' => 'text',
            'label' => 'Text label',
            'description' => 'A text label to be shown below icon',
            'section' => 'touchy_call_button_section',
        ));
        
        /* call button label color */
        $wp_customize->add_setting( 'bonfire_touchy_call_button_label_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_call_button_label_color',array(
            'label' => 'Text label', 'settings' => 'bonfire_touchy_call_button_label_color', 'section' => 'touchy_call_button_section' )
        ));
        
        /* call button label hover color */
        $wp_customize->add_setting( 'bonfire_touchy_call_button_label_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_call_button_label_hover_color',array(
            'label' => 'Text label hover', 'settings' => 'bonfire_touchy_call_button_label_hover_color', 'section' => 'touchy_call_button_section' )
        ));
        
        /* custom Call icon */
        $wp_customize->add_setting('bonfire_touchy_call_icon',array('sanitize_callback' => 'sanitize_bonfire_touchy_call_icon',));
        function sanitize_bonfire_touchy_call_icon($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_call_icon',array(
            'type' => 'text',
            'label' => 'Custom icon',
            'description' => 'Collection of 500+ icons can be viewed <a href="http://fontawesome.io/cheatsheet/" target="_blank" style="text-decoration:underline;">here</a> (the icon names are <strong>fa-diamond</strong>, <strong>fa-anchor</strong> etc). When empty, default icon is shown.',
            'section' => 'touchy_call_button_section',
        ));
        
        /* Call link override */
        $wp_customize->add_setting('bonfire_touchy_call_link',array('sanitize_callback' => 'sanitize_bonfire_touchy_call_link',));
        function sanitize_bonfire_touchy_call_link($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_call_link',array(
            'type' => 'text',
            'label' => 'Link override',
            'description' => 'If you would like to override the call button function with a custom link, enter it below. Combined with a custom icon (set above), this allows you to give the call button a completely different function. If left empty, defaults to call function.',
            'section' => 'touchy_call_button_section',
        ));
        
        /* Call link new window */
        $wp_customize->add_setting('bonfire_touchy_call_new_tab',array('sanitize_callback' => 'sanitize_bonfire_touchy_call_new_tab',));
        function sanitize_bonfire_touchy_call_new_tab( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_call_new_tab',array('type' => 'checkbox','label' => 'Open in new tab/window','section' => 'touchy_call_button_section',));
        
        //
        // ADD "EMAIL BUTTON" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_email_button_section',array('title' => __( 'Email Button', 'touchy' ),'panel' => 'touchy_panel','priority' => 12));
        
        /* hide Email button */
        $wp_customize->add_setting('bonfire_touchy_hide_email_button',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_email_button',));
        function sanitize_bonfire_touchy_hide_email_button( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_email_button',array('type' => 'checkbox','label' => 'Hide Email button','description' => 'If selected, the Email button will be hidden on all pages.','section' => 'touchy_email_button_section',));
        
        /* Email address */
        $wp_customize->add_setting('bonfire_touchy_email_address',array('sanitize_callback' => 'sanitize_bonfire_touchy_email_address',));
        function sanitize_bonfire_touchy_email_address($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_email_address',array(
            'type' => 'text',
            'label' => 'Email address',
            'description' => 'Enter your email address',
            'section' => 'touchy_email_button_section',
        ));
        
        /* Email subject */
        $wp_customize->add_setting('bonfire_touchy_email_subject',array('sanitize_callback' => 'sanitize_bonfire_touchy_email_subject',));
        function sanitize_bonfire_touchy_email_subject($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_email_subject',array(
            'type' => 'text',
            'label' => 'Email subject',
            'description' => 'Enter the default email subject. If empty, subject will be left to the user to fill.',
            'section' => 'touchy_email_button_section',
        ));
        
        /* email button color */
        $wp_customize->add_setting( 'bonfire_touchy_email_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_email_button_color',array(
            'label' => 'Button background', 'settings' => 'bonfire_touchy_email_button_color', 'section' => 'touchy_email_button_section' )
        ));
        
        /* email button hover color */
        $wp_customize->add_setting( 'bonfire_touchy_email_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_email_button_hover_color',array(
            'label' => 'Button background hover', 'settings' => 'bonfire_touchy_email_button_hover_color', 'section' => 'touchy_email_button_section' )
        ));
        
        /* email button icon color */
        $wp_customize->add_setting( 'bonfire_touchy_email_button_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_email_button_icon_color',array(
            'label' => 'Button icon', 'settings' => 'bonfire_touchy_email_button_icon_color', 'section' => 'touchy_email_button_section' )
        ));
        
        /* email button icon hover color */
        $wp_customize->add_setting( 'bonfire_touchy_email_button_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_email_button_icon_hover_color',array(
            'label' => 'Button icon hover', 'settings' => 'bonfire_touchy_email_button_icon_hover_color', 'section' => 'touchy_email_button_section' )
        ));
        
        /* email button label */
        $wp_customize->add_setting('bonfire_touchy_email_icon_label',array('sanitize_callback' => 'sanitize_bonfire_touchy_email_icon_label',));
        function sanitize_bonfire_touchy_email_icon_label($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_email_icon_label',array(
            'type' => 'text',
            'label' => 'Text label',
            'description' => 'A text label to be shown below icon',
            'section' => 'touchy_email_button_section',
        ));
        
        /* email button label color */
        $wp_customize->add_setting( 'bonfire_touchy_email_button_label_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_email_button_label_color',array(
            'label' => 'Text label', 'settings' => 'bonfire_touchy_email_button_label_color', 'section' => 'touchy_email_button_section' )
        ));
        
        /* email button label hover color */
        $wp_customize->add_setting( 'bonfire_touchy_email_button_label_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_email_button_label_hover_color',array(
            'label' => 'Text label hover', 'settings' => 'bonfire_touchy_email_button_label_hover_color', 'section' => 'touchy_email_button_section' )
        ));
        
        /* custom Email icon */
        $wp_customize->add_setting('bonfire_touchy_email_icon',array('sanitize_callback' => 'sanitize_bonfire_touchy_email_icon',));
        function sanitize_bonfire_touchy_email_icon($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_email_icon',array(
            'type' => 'text',
            'label' => 'Custom icon',
            'description' => 'Collection of 500+ icons can be viewed <a href="http://fontawesome.io/cheatsheet/" target="_blank" style="text-decoration:underline;">here</a> (the icon names are <strong>fa-diamond</strong>, <strong>fa-anchor</strong> etc). When empty, default icon is shown.',
            'section' => 'touchy_email_button_section',
        ));
        
        /* Email address override */
        $wp_customize->add_setting('bonfire_touchy_email_link',array('sanitize_callback' => 'sanitize_bonfire_touchy_email_link',));
        function sanitize_bonfire_touchy_email_link($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_email_link',array(
            'type' => 'text',
            'label' => 'Email address override',
            'description' => 'If you would like to override the email button function with a custom link, enter it below. Combined with a custom icon (set above), this allows you to give the email button a completely different function. If left empty, defaults to email function.',
            'section' => 'touchy_email_button_section',
        ));
        
        /* Email link new window */
        $wp_customize->add_setting('bonfire_touchy_email_new_tab',array('sanitize_callback' => 'sanitize_bonfire_touchy_email_new_tab',));
        function sanitize_bonfire_touchy_email_new_tab( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_email_new_tab',array('type' => 'checkbox','label' => 'Open in new tab/window','section' => 'touchy_email_button_section',));
        
        //
        // ADD "SEARCH BUTTON" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_search_button_section',array('title' => __( 'Search Button', 'touchy' ),'panel' => 'touchy_panel','priority' => 13));
        
        /* hide search button */
        $wp_customize->add_setting('bonfire_touchy_hide_search_button',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_search_button',));
        function sanitize_bonfire_touchy_hide_search_button( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_search_button',array('type' => 'checkbox','label' => 'Hide Search button','description' => 'If selected, the Search button will be hidden on all pages.','section' => 'touchy_search_button_section',));
        
        /* search button color */
        $wp_customize->add_setting( 'bonfire_touchy_search_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_button_color',array(
            'label' => 'Button background', 'settings' => 'bonfire_touchy_search_button_color', 'section' => 'touchy_search_button_section' )
        ));
        
        /* search button hover color */
        $wp_customize->add_setting( 'bonfire_touchy_search_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_button_hover_color',array(
            'label' => 'Button background hover', 'settings' => 'bonfire_touchy_search_button_hover_color', 'section' => 'touchy_search_button_section' )
        ));
        
        /* search button icon color */
        $wp_customize->add_setting( 'bonfire_touchy_search_button_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_button_icon_color',array(
            'label' => 'Button icon', 'settings' => 'bonfire_touchy_search_button_icon_color', 'section' => 'touchy_search_button_section' )
        ));
        
        /* search button icon hover color */
        $wp_customize->add_setting( 'bonfire_touchy_search_button_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_button_icon_hover_color',array(
            'label' => 'Button icon hover', 'settings' => 'bonfire_touchy_search_button_icon_hover_color', 'section' => 'touchy_search_button_section' )
        ));
        
        /* search button label */
        $wp_customize->add_setting('bonfire_touchy_search_icon_label',array('sanitize_callback' => 'sanitize_bonfire_touchy_search_icon_label',));
        function sanitize_bonfire_touchy_search_icon_label($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_search_icon_label',array(
            'type' => 'text',
            'label' => 'Text label',
            'description' => 'A text label to be shown below icon',
            'section' => 'touchy_search_button_section',
        ));
        
        /* search button label color */
        $wp_customize->add_setting( 'bonfire_touchy_search_button_label_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_button_label_color',array(
            'label' => 'Text label', 'settings' => 'bonfire_touchy_search_button_label_color', 'section' => 'touchy_search_button_section' )
        ));
        
        /* search button label hover color */
        $wp_customize->add_setting( 'bonfire_touchy_search_button_label_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_button_label_hover_color',array(
            'label' => 'Text label hover', 'settings' => 'bonfire_touchy_search_button_label_hover_color', 'section' => 'touchy_search_button_section' )
        ));
        
        /* custom Search icon */
        $wp_customize->add_setting('bonfire_touchy_search_icon',array('sanitize_callback' => 'sanitize_bonfire_touchy_search_icon',));
        function sanitize_bonfire_touchy_search_icon($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_search_icon',array(
            'type' => 'text',
            'label' => 'Custom icon',
            'description' => 'Collection of 500+ icons can be viewed <a href="http://fontawesome.io/cheatsheet/" target="_blank" style="text-decoration:underline;">here</a> (the icon names are <strong>fa-diamond</strong>, <strong>fa-anchor</strong> etc). When empty, default icon is shown.',
            'section' => 'touchy_search_button_section',
        ));
        
        /* search link override */
        $wp_customize->add_setting('bonfire_touchy_search_link',array('sanitize_callback' => 'sanitize_bonfire_touchy_search_link',));
        function sanitize_bonfire_touchy_search_link($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_search_link',array(
            'type' => 'text',
            'label' => 'Search link override',
            'description' => 'If you would like to override the search button function with a custom link, enter it below. Combined with a custom icon (set above), this allows you to give the search button a completely different function. If left empty, defaults to search function.',
            'section' => 'touchy_search_button_section',
        ));
        
        /* search link new window */
        $wp_customize->add_setting('bonfire_touchy_search_new_tab',array('sanitize_callback' => 'sanitize_bonfire_touchy_search_new_tab',));
        function sanitize_bonfire_touchy_search_new_tab( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_search_new_tab',array('type' => 'checkbox','label' => 'Open in new tab/window','section' => 'touchy_search_button_section',));

        //
        // ADD "MENU BUTTON" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_menu_button_section',array('title' => __( 'Menu Button', 'touchy' ),'panel' => 'touchy_panel','priority' => 14));
        
        /* hide Menu button */
        $wp_customize->add_setting('bonfire_touchy_hide_menu_button',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_menu_button',));
        function sanitize_bonfire_touchy_hide_menu_button( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_menu_button',array('type' => 'checkbox','label' => 'Hide Menu button','description' => 'Useful if you would like to show only the email and call buttons for example', 'section' => 'touchy_menu_button_section',));
        
        /* menu button color */
        $wp_customize->add_setting( 'bonfire_touchy_menu_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_button_color',array(
            'label' => 'Button background', 'settings' => 'bonfire_touchy_menu_button_color', 'section' => 'touchy_menu_button_section' )
        ));
        
        /* menu button hover color */
        $wp_customize->add_setting( 'bonfire_touchy_menu_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_button_hover_color',array(
            'label' => 'Button background hover', 'settings' => 'bonfire_touchy_menu_button_hover_color', 'section' => 'touchy_menu_button_section' )
        ));
        
        /* menu button icon color */
        $wp_customize->add_setting( 'bonfire_touchy_menu_button_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_button_icon_color',array(
            'label' => 'Button icon', 'settings' => 'bonfire_touchy_menu_button_icon_color', 'section' => 'touchy_menu_button_section' )
        ));
        
        /* email button icon hover color */
        $wp_customize->add_setting( 'bonfire_touchy_menu_button_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_button_icon_hover_color',array(
            'label' => 'Button icon hover', 'settings' => 'bonfire_touchy_menu_button_icon_hover_color', 'section' => 'touchy_menu_button_section' )
        ));
        
        /* menu button label */
        $wp_customize->add_setting('bonfire_touchy_menu_icon_label',array('sanitize_callback' => 'sanitize_bonfire_touchy_menu_icon_label',));
        function sanitize_bonfire_touchy_menu_icon_label($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_menu_icon_label',array(
            'type' => 'text',
            'label' => 'Text label',
            'description' => 'A text label to be shown below icon',
            'section' => 'touchy_menu_button_section',
        ));
        
        /* menu button label color */
        $wp_customize->add_setting( 'bonfire_touchy_menu_button_label_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_button_label_color',array(
            'label' => 'Text label', 'settings' => 'bonfire_touchy_menu_button_label_color', 'section' => 'touchy_menu_button_section' )
        ));
        
        /* menu button label hover color */
        $wp_customize->add_setting( 'bonfire_touchy_menu_button_label_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_button_label_hover_color',array(
            'label' => 'Text label hover', 'settings' => 'bonfire_touchy_menu_button_label_hover_color', 'section' => 'touchy_menu_button_section' )
        ));
        
        /* custom Menu icon */
        $wp_customize->add_setting('bonfire_touchy_menu_icon',array('sanitize_callback' => 'sanitize_bonfire_touchy_menu_icon',));
        function sanitize_bonfire_touchy_menu_icon($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_menu_icon',array(
            'type' => 'text',
            'label' => 'Custom icon',
            'description' => 'Collection of 500+ icons can be viewed <a href="http://fontawesome.io/cheatsheet/" target="_blank" style="text-decoration:underline;">here</a> (the icon names are <strong>fa-diamond</strong>, <strong>fa-anchor</strong> etc). When empty, default icon is shown.',
            'section' => 'touchy_menu_button_section',
        ));
        
        //
        // ADD "SEARCH FIELD" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_search_field_section',array('title' => __( 'Search Field', 'touchy' ),'panel' => 'touchy_panel','priority' => 15));
        
        /* custom search field placeholder text */
        $wp_customize->add_setting('bonfire_touchy_search_placeholder',array('sanitize_callback' => 'sanitize_bonfire_touchy_search_placeholder',));
        function sanitize_bonfire_touchy_search_placeholder($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_search_placeholder',array(
            'type' => 'text',
            'label' => 'Placeholder text',
            'description' => 'Enter custom search field placeholder text. If empty, will default to "Enter search term..."',
            'section' => 'touchy_search_field_section',
        ));
        
        /* custom search button text */
        $wp_customize->add_setting('bonfire_touchy_search_button_text',array('sanitize_callback' => 'sanitize_bonfire_touchy_search_button_text',));
        function sanitize_bonfire_touchy_search_button_text($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_search_button_text',array(
            'type' => 'text',
            'label' => 'Button text',
            'description' => 'Enter custom search button text. If empty, will default to "Search"',
            'section' => 'touchy_search_field_section',
        ));
        
        /* hide clear field function */
        $wp_customize->add_setting('bonfire_touchy_hide_clear_function',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_clear_function',));
        function sanitize_bonfire_touchy_hide_clear_function( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_clear_function',array('type' => 'checkbox','label' => 'Hide clear field option','description' => 'If selected, the clear field option on the search field will be hidden.','section' => 'touchy_search_field_section',));
        
        /* hide search field button */
        $wp_customize->add_setting('bonfire_touchy_hide_search_field_button',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_search_field_button',));
        function sanitize_bonfire_touchy_hide_search_field_button( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_search_field_button',array('type' => 'checkbox','label' => 'Hide "Search" button','description' => 'If selected, the "Search" button will be hidden.','section' => 'touchy_search_field_section',));
        
        /* search field placeholder text color */
        $wp_customize->add_setting( 'bonfire_touchy_search_field_placeholder_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_field_placeholder_color',array(
            'label' => 'Search field placeholder text', 'settings' => 'bonfire_touchy_search_field_placeholder_color', 'section' => 'touchy_search_field_section' )
        ));
        
        /* search field text color */
        $wp_customize->add_setting( 'bonfire_touchy_search_field_text_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_field_text_color',array(
            'label' => 'Search field text', 'settings' => 'bonfire_touchy_search_field_text_color', 'section' => 'touchy_search_field_section' )
        ));
        
        /* search field 'clear field' button color */
        $wp_customize->add_setting( 'bonfire_touchy_search_field_clear_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_field_clear_color',array(
            'label' => '"Clear field" button', 'settings' => 'bonfire_touchy_search_field_clear_color', 'section' => 'touchy_search_field_section' )
        ));
        
        /* search field background color */
        $wp_customize->add_setting( 'bonfire_touchy_search_field_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_field_background_color',array(
            'label' => 'Search field background', 'settings' => 'bonfire_touchy_search_field_background_color', 'section' => 'touchy_search_field_section' )
        ));
        
        /* search button text color */
        $wp_customize->add_setting( 'bonfire_touchy_search_field_search_button_text_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_field_search_button_text_color',array(
            'label' => 'Search button text', 'settings' => 'bonfire_touchy_search_field_search_button_text_color', 'section' => 'touchy_search_field_section' )
        ));
        
        /* search button background color */
        $wp_customize->add_setting( 'bonfire_touchy_search_field_search_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_field_search_button_color',array(
            'label' => 'Search button background', 'settings' => 'bonfire_touchy_search_field_search_button_color', 'section' => 'touchy_search_field_section' )
        ));
        
        //
        // ADD "DROP-DOWN MENU" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_menu_dropdown_section',array('title' => __( 'Drop-Down Menu', 'touchy' ),'panel' => 'touchy_panel','priority' => 16));
        
        /* menu font size */
        $wp_customize->add_setting('touchy_menu_font_size',array('default' => '','sanitize_callback' => 'sanitize_touchy_menu_font_size',));
        function sanitize_touchy_menu_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('touchy_menu_font_size',array('type' => 'text','label' => 'Menu item font size (in pixels)','description' => 'If empty, defaults to 13','section' => 'touchy_menu_dropdown_section',));

        /* menu line height */
        $wp_customize->add_setting('touchy_menu_line_height',array('default' => '','sanitize_callback' => 'sanitize_touchy_menu_line_height',));
        function sanitize_touchy_menu_line_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('touchy_menu_line_height',array('type' => 'text','label' => 'Menu item line height (in pixels)','description' => 'If empty, defaults to 16','section' => 'touchy_menu_dropdown_section',));
        
        /* menu description font size */
        $wp_customize->add_setting('touchy_menu_description_top_margin',array('default' => '','sanitize_callback' => 'sanitize_touchy_menu_description_top_margin',));
        function sanitize_touchy_menu_description_top_margin($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('touchy_menu_description_top_margin',array('type' => 'text','label' => 'Menu description top margin (in pixels)','description' => 'The space between a menu item and its description (if one is entered). If empty, defaults to 4','section' => 'touchy_menu_dropdown_section',));
        
        /* menu description font size */
        $wp_customize->add_setting('touchy_menu_description_font_size',array('default' => '','sanitize_callback' => 'sanitize_touchy_menu_description_font_size',));
        function sanitize_touchy_menu_description_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('touchy_menu_description_font_size',array('type' => 'text','label' => 'Menu description font size (in pixels)','description' => 'If empty, defaults to 13','section' => 'touchy_menu_dropdown_section',));

        /* menu description line height */
        $wp_customize->add_setting('touchy_menu_description_line_height',array('default' => '','sanitize_callback' => 'sanitize_touchy_menu_description_line_height',));
        function sanitize_touchy_menu_description_line_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('touchy_menu_description_line_height',array('type' => 'text','label' => 'Menu description line height (in pixels)','description' => 'If empty, defaults to 16','section' => 'touchy_menu_dropdown_section',));
        
        /* menu theme font */
        $wp_customize->add_setting('touchy_menu_theme_font',array('default' => '','sanitize_callback' => 'sanitize_touchy_menu_theme_font',));
        function sanitize_touchy_menu_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('touchy_menu_theme_font',array('type' => 'text','label' => 'Advanced feature: Use theme fonts','description' => 'If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','section' => 'touchy_menu_dropdown_section',));
        
        /* menu icon size */
        $wp_customize->add_setting('touchy_menu_icon_size',array('default' => '','sanitize_callback' => 'sanitize_touchy_menu_icon_size',));
        function sanitize_touchy_menu_icon_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('touchy_menu_icon_size',array('type' => 'text','label' => 'Menu item icon size (in pixels)','description' => 'If empty, defaults to 12','section' => 'touchy_menu_dropdown_section',));
        
        /* menu background */
        $wp_customize->add_setting( 'bonfire_touchy_dropdown_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_dropdown_background_color',array(
            'label' => 'Menu background', 'settings' => 'bonfire_touchy_dropdown_background_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* tooltip color */
        $wp_customize->add_setting( 'bonfire_touchy_tooltip_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_tooltip_color',array(
            'label' => 'Tooltip', 'settings' => 'bonfire_touchy_tooltip_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* submenu background */
        $wp_customize->add_setting( 'bonfire_touchy_dropdown_sub_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_dropdown_sub_background_color',array(
            'label' => 'Sub-menu background', 'settings' => 'bonfire_touchy_dropdown_sub_background_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* menu end marker */
        $wp_customize->add_setting( 'bonfire_touchy_dropdown_end_marker_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_dropdown_end_marker_color',array(
            'label' => 'Menu end marker', 'settings' => 'bonfire_touchy_dropdown_end_marker_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* horizontal menu item divider */
        $wp_customize->add_setting( 'bonfire_touchy_dropdown_horizontal_divider_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_dropdown_horizontal_divider_color',array(
            'label' => 'Horizontal menu item divider', 'settings' => 'bonfire_touchy_dropdown_horizontal_divider_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* horizontal menu item divider (sub-menu) */
        $wp_customize->add_setting( 'bonfire_touchy_dropdown_submenu_horizontal_divider_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_dropdown_submenu_horizontal_divider_color',array(
            'label' => 'Horizontal menu item divider (sub-menu)', 'settings' => 'bonfire_touchy_dropdown_submenu_horizontal_divider_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* sub-menu arrow separator */
        $wp_customize->add_setting( 'bonfire_touchy_dropdown_menu_item_separator_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_dropdown_menu_item_separator_color',array(
            'label' => 'Sub-menu arrow separator', 'settings' => 'bonfire_touchy_dropdown_menu_item_separator_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* sub-menu arrow separator (sub-menu) */
        $wp_customize->add_setting( 'bonfire_touchy_dropdown_submenu_item_separator_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_dropdown_submenu_item_separator_color',array(
            'label' => 'Sub-menu arrow separator (sub-menu)', 'settings' => 'bonfire_touchy_dropdown_submenu_item_separator_color', 'section' => 'touchy_menu_dropdown_section' )
        ));

        /* expand icon */
        $wp_customize->add_setting( 'bonfire_touchy_expand_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_expand_icon_color',array(
            'label' => 'Expand icon', 'settings' => 'bonfire_touchy_expand_icon_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* expand icon hover */
        $wp_customize->add_setting( 'bonfire_touchy_expand_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_expand_icon_hover_color',array(
            'label' => 'Expand icon hover', 'settings' => 'bonfire_touchy_expand_icon_hover_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* expand icon (sub-menu) */
        $wp_customize->add_setting( 'bonfire_touchy_submenu_expand_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_submenu_expand_icon_color',array(
            'label' => 'Expand icon (sub-menu)', 'settings' => 'bonfire_touchy_submenu_expand_icon_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* expand icon hover (sub-menu) */
        $wp_customize->add_setting( 'bonfire_touchy_submenu_expand_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_submenu_expand_icon_hover_color',array(
            'label' => 'Expand icon hover (sub-menu)', 'settings' => 'bonfire_touchy_submenu_expand_icon_hover_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* menu item */
        $wp_customize->add_setting( 'bonfire_touchy_menu_item_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_item_color',array(
            'label' => 'Menu item', 'settings' => 'bonfire_touchy_menu_item_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* menu item hover */
        $wp_customize->add_setting( 'bonfire_touchy_menu_item_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_item_hover_color',array(
            'label' => 'Menu item hover', 'settings' => 'bonfire_touchy_menu_item_hover_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* menu item icon */
        $wp_customize->add_setting( 'bonfire_touchy_menu_item_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_item_icon_color',array(
            'label' => 'Menu item icon', 'settings' => 'bonfire_touchy_menu_item_icon_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* sub-menu item */
        $wp_customize->add_setting( 'bonfire_touchy_submenu_item_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_submenu_item_color',array(
            'label' => 'Sub-menu item', 'settings' => 'bonfire_touchy_submenu_item_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* sub-menu item hover */
        $wp_customize->add_setting( 'bonfire_touchy_submenu_item_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_submenu_item_hover_color',array(
            'label' => 'Sub-menu item hover', 'settings' => 'bonfire_touchy_submenu_item_hover_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* menu item icon (sub-menu) */
        $wp_customize->add_setting( 'bonfire_touchy_submenu_item_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_submenu_item_icon_color',array(
            'label' => 'Menu item icon (sub-menu)', 'settings' => 'bonfire_touchy_submenu_item_icon_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* current menu item */
        $wp_customize->add_setting( 'bonfire_touchy_current_menu_item_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_current_menu_item_color',array(
            'label' => 'Current menu item', 'settings' => 'bonfire_touchy_current_menu_item_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* menu item description */
        $wp_customize->add_setting( 'bonfire_touchy_menu_item_description_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_item_description_color',array(
            'label' => 'Menu item description', 'settings' => 'bonfire_touchy_menu_item_description_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        //
        // ADD "MISC" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_misc_section',array('title' => __( 'Misc', 'touchy' ),'panel'  => 'touchy_panel','priority' => 17));
        
        /* overlay transparency */
        $wp_customize->add_setting('bonfire_touchy_text_label_font_size',array('sanitize_callback' => 'sanitize_bonfire_touchy_text_label_font_size',));
        function sanitize_bonfire_touchy_text_label_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_text_label_font_size',array(
            'type' => 'text',
            'label' => 'Text label font size (in pixels)',
            'description' => 'If empty, defaults to 10',
            'section' => 'touchy_misc_section',
        ));
        
        /* hide menu bar separators */
        $wp_customize->add_setting('bonfire_touchy_hide_menubar_separators',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_menubar_separators',));
        function sanitize_bonfire_touchy_hide_menubar_separators( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_menubar_separators',array('type' => 'checkbox','label' => 'Hide menu bar separators','description' => 'If you want an even cleaner look, this option hides the vertical dividers between the headerbar menu buttons.', 'section' => 'touchy_misc_section',));
        
        /* bottom position */
        $wp_customize->add_setting('bonfire_touchy_bottom_position',array('sanitize_callback' => 'sanitize_bonfire_touchy_bottom_position',));
        function sanitize_bonfire_touchy_bottom_position( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_bottom_position',array('type' => 'checkbox','label' => 'Bottom positioning','description' => 'If selected, menu buttons will be placed at the bottom of the screen.', 'section' => 'touchy_misc_section',));
        
        /* absolute position */
        $wp_customize->add_setting('bonfire_touchy_absolute_position',array('sanitize_callback' => 'sanitize_bonfire_touchy_absolute_position',));
        function sanitize_bonfire_touchy_absolute_position( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_absolute_position',array('type' => 'checkbox','label' => 'Absolute positioning','description' => 'Note: Only applies when bottom positioning not selected.', 'section' => 'touchy_misc_section',));
        
        /* increase menubar shadow size on scroll */
        $wp_customize->add_setting('bonfire_touchy_scroll_shadow',array('sanitize_callback' => 'sanitize_bonfire_touchy_scroll_shadow',));
        function sanitize_bonfire_touchy_scroll_shadow( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_scroll_shadow',array('type' => 'checkbox','label' => 'Increase menubar shadow on scroll','description' => 'When page is scrolled down, menubar shadow size is subtly increased for effect. Note: Only applies when bottom positioning not selected.', 'section' => 'touchy_misc_section',));
        
        /* hide menubar shadow */
        $wp_customize->add_setting('bonfire_touchy_hide_shadow',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_shadow',));
        function sanitize_bonfire_touchy_hide_shadow( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_shadow',array('type' => 'checkbox','label' => 'Hide menubar shadow','description' => 'Note: Shadow size increase on scroll option can still be applied.', 'section' => 'touchy_misc_section',));
        
        /* don't load FontAwesome */
        $wp_customize->add_setting('bonfire_touchy_disable_fontawesome',array('sanitize_callback' => 'sanitize_bonfire_touchy_disable_fontawesome',));
        function sanitize_bonfire_touchy_disable_fontawesome( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_disable_fontawesome',array('type' => 'checkbox','label' => 'Do not load FontAwesome icon set','description' => 'Useful if you only use the default menubar icons or if your theme or another plugin already loads it, to prevent it from being loaded twice unnecessarily.', 'section' => 'touchy_misc_section',));
        
        /* don't load retina.js */
        $wp_customize->add_setting('touchy_no_retina',array('sanitize_callback' => 'sanitize_touchy_no_retina',));
        function sanitize_touchy_no_retina( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('touchy_no_retina',array('type' => 'checkbox','label' => 'Disable retina image support','description' => 'If you are not using the logo image location or just do not want retina image support, enable this option to prevent the retina.js file from being loaded unnecessarily.','section' => 'touchy_misc_section',));
        
        /* menu button separators */
        $wp_customize->add_setting( 'bonfire_touchy_button_separator_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_button_separator_color',array(
            'label' => 'Menu button separators', 'settings' => 'bonfire_touchy_button_separator_color', 'section' => 'touchy_misc_section' )
        ));
        
        /* menu transparency */
        $wp_customize->add_setting('bonfire_touchy_menu_transparency',array('sanitize_callback' => 'sanitize_bonfire_touchy_menu_transparency',));
        function sanitize_bonfire_touchy_menu_transparency($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_menu_transparency',array(
            'type' => 'text',
            'label' => 'Menu transparency (from 0-1)',
            'description' => 'Example: 0.9 or 0.95. If emtpy, defaults to 1. You probably want to keep this at 0.95 and above, to have that very subtle see-through effect. Depending on how you color customize your menu though, you could go lower.',
            'section' => 'touchy_misc_section',
        ));
        
        /* overlay color */
        $wp_customize->add_setting( 'bonfire_touchy_overlay_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_overlay_color',array(
            'label' => 'Overlay', 'settings' => 'bonfire_touchy_overlay_color', 'section' => 'touchy_misc_section' )
        ));
        
        /* overlay transparency */
        $wp_customize->add_setting('bonfire_touchy_overlay_transparency',array('sanitize_callback' => 'sanitize_bonfire_touchy_overlay_transparency',));
        function sanitize_bonfire_touchy_overlay_transparency($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_overlay_transparency',array(
            'type' => 'text',
            'label' => 'Overlay transparency (from 0-1)',
            'description' => 'Example: 0.5 or 0.75. If emtpy, defaults to 0.2.',
            'section' => 'touchy_misc_section',
        ));
        
        /* widget are background */
        $wp_customize->add_setting( 'bonfire_touchy_widget_area_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_widget_area_color',array(
            'label' => 'Widget area background', 'desciption' => 'Add widgets under Appearance > Widgets', 'settings' => 'bonfire_touchy_widget_area_color', 'section' => 'touchy_misc_section' )
        ));
        
        /* smaller than */
        $wp_customize->add_setting('bonfire_touchy_smaller_than',array('sanitize_callback' => 'sanitize_bonfire_touchy_smaller_than',));
        function sanitize_bonfire_touchy_smaller_than($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_smaller_than',array(
            'type' => 'text',
            'label' => 'Hide at certain width/resolution',
            'description' => '<strong>Example #1:</strong> If you want to show Touchy on desktop only, enter the values as 0 and 500. <br><br> <strong>Example #2:</strong> If you want to show Touchy on mobile only, enter the values as 500 and 5000. <br><br> Feel free to experiment with your own values to get the result that is right for you. If fields are empty, Touchy will be visible at all browser widths and resolutions. <br><br> Hide Touchy menu if browser width or screen resolution (in pixels) is between...',
            'section' => 'touchy_misc_section',
        ));
        
        /* larger than */
        $wp_customize->add_setting('bonfire_touchy_larger_than',array('sanitize_callback' => 'sanitize_bonfire_touchy_larger_than',));
        function sanitize_bonfire_touchy_larger_than($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_larger_than',array(
            'type' => 'text',
            'description' => '..and:',
            'section' => 'touchy_misc_section',
        ));
        
        /* hide theme menu */
        $wp_customize->add_setting('bonfire_touchy_hide_theme_menu',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_theme_menu',));
        function sanitize_bonfire_touchy_hide_theme_menu($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_hide_theme_menu',array(
            'type' => 'text',
            'label' => 'Advanced: Hide theme menu',
            'description' => 'If you have set Touchy to show only at a certain resolution, know the class/ID of your theme menu and would like to hide it when Touchy is visible, enter the class/ID into this field (example: "#my-theme-menu"). Multiple classes/IDs can be entered (separate with comma as you would in a stylesheet).',
            'section' => 'touchy_misc_section',
        ));

	}
	add_action('customize_register', 'touchy_theme_customizer');

	//
	// Add menu to theme
	//
	
	function bonfire_touchy_footer() {
	?>

    <!-- BEGIN LOGO AREA -->
    <?php if( get_theme_mod('bonfire_touchy_hide_logo_area') == '') { ?>
        <div class="touchy-logo-wrapper">
            <!-- BEGIN LOGO -->
            <?php if ( get_theme_mod( 'bonfire_touchy_logo_image' ) ) : ?>
                <!-- BEGIN LOGO IMAGE -->
                <div class="touchy-logo-image row">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'bonfire_touchy_logo_image' ); ?>" data-rjs="2" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
                </div>
                <div class="lg_switch_mobile">
                    <?php do_action('icl_language_selector'); ?>

                </div>
                <!-- END LOGO IMAGE -->
                <?php else : ?>
                    <!-- BEGIN LOGO -->
                    <div class="touchy-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php bloginfo('name'); ?>
                        </a>
                    </div>
                    <!-- END LOGO -->
                    <?php endif; ?>
                        <!-- END LOGO -->
        </div>
        <?php } ?>
            <!-- END LOGO AREA -->

            <!-- BEGIN MENU BAR -->
            <div class="touchy-wrapper">

                <!-- BEGIN BACK BUTTON -->
                <?php if( get_theme_mod('bonfire_touchy_hide_back_button') == '') { ?>
                    <?php if(is_front_page() ) { ?>
                        <?php } else { ?>
                            <div class="touchy-back-button" onClick="history.back()">
                                <span class="touchy-back-text-label-offset">
                            <?php if( get_theme_mod('bonfire_touchy_back_icon') == '') { ?>
                                <div class="touchy-default-back"></div>
                            <?php } else { ?>
                                <i class="fa <?php echo get_theme_mod('bonfire_touchy_back_icon'); ?>"></i>
                            <?php } ?>
                        </span>
                            </div>
                            <?php } ?>
                                <?php } ?>
                                    <!-- BEGIN CALL BUTTON -->
                                    <?php if( get_theme_mod('bonfire_touchy_hide_call_button') == '') { ?>
                                        <a <?php if( get_theme_mod( 'bonfire_touchy_call_new_tab') !='' ) { ?>target="_blank" <?php } ?>href="<?php if( get_theme_mod('bonfire_touchy_call_link') != '') { ?><?php echo get_theme_mod('bonfire_touchy_call_link'); ?><?php } else { ?>tel:<?php _e('numero de tel', 'Mobile nav'); ?><?php echo get_theme_mod('bonfire_touchy_phone_number','cool_theme'); ?><?php } ?>" class="touchy-call-button">
                    <span class="touchy-call-text-label-offset">
                        <?php if( get_theme_mod('bonfire_touchy_call_icon') == '') { ?>
                            <div class="touchy-default-call-one"></div><div class="touchy-default-call-two"></div><div class="touchy-default-call-three"></div>
                        <?php } else { ?>
                            <i class="fa <?php echo get_theme_mod('bonfire_touchy_call_icon'); ?>"></i>
                        <?php } ?>
                    </span>
				</a>
                                        <?php } ?>
                                            <!-- END CALL BUTTON -->






                                            <!-- BEGIN EMAIL BUTTON -->
                                            <?php if( get_theme_mod('bonfire_touchy_hide_email_button') == '') { ?>
                                                <a href="<?php _e('Link tpalm immo', 'Mobile nav'); ?>" class="touchy-email-button">
                                                    <span class="touchy-email-text-label-offset">
                        <?php if( get_theme_mod('bonfire_touchy_email_icon') == '') { ?>
                            <div class="touchy-default-email-outer">
                                <div class="touchy-default-email-inner"></div>
                            </div>
                        <?php } else { ?>
                            <i class="fa <?php echo get_theme_mod('bonfire_touchy_email_icon'); ?>"></i>
                        <?php } ?>
                    </span>
                                                </a>
                                                <?php } ?>
                                                    <!-- END EMAIL BUTTON -->


                                                    <!-- BEGIN SEARCH BUTTON -->
                                                    <?php if( get_theme_mod('bonfire_touchy_hide_search_button') == '') { ?>
                                                        <a href="<?php _e('Link catalogue tpalm', 'Mobile nav'); ?>" class="touchy-search-button">
                                                            <span class="touchy-search-text-label-offset">
                        <?php if( get_theme_mod('bonfire_touchy_search_icon') == '') { ?>
                            <div class="touchy-default-search-outer">labels
                                <div class="touchy-default-search-inner"></div>
                            </div>
                        <?php } else { ?>
                            <i class="fa <?php echo get_theme_mod('bonfire_touchy_search_icon'); ?>"></i>
                        <?php } ?>
                    </span>
                                                        </a>
                                                        <?php } ?>
                                                            <!-- END SEARCH BUTTON -->

                                                            <!-- BEGIN MENU BUTTON -->
                                                            <?php if( get_theme_mod('bonfire_touchy_hide_menu_button') == '') { ?>
                                                                <div class="touchy-menu-button">
                                                                    <div class="touchy-menu-tooltip"></div>
                                                                    <span class="touchy-menu-text-label-offset">
                    <?php if( get_theme_mod('bonfire_touchy_menu_icon') == '') { ?>
                        <div class="touchy-default-menu"></div>
                    <?php } else { ?>
                        <i class="fa <?php echo get_theme_mod('bonfire_touchy_menu_icon'); ?>"></i>
                    <?php } ?>
                </span>
                                                                </div>
                                                                <?php } ?>
                                                                    <!-- END MENU BUTTON -->

            </div>
            <!-- END MENU BAR -->

            <!-- BEGIN ACCORDION MENU -->
            <div class="touchy-by-bonfire-wrapper">
                <div class="touchy-overlay">
                    <div class="touchy-overlay-inner"></div>
                </div>
                <div class="touchy-by-bonfire smooth-scroll">
                    <!-- BEGIN WIDGETS -->
                    <?php if ( is_active_sidebar( 'touchy-widgets-top' ) ) { ?>
                        <div class="touchy-widgets-wrapper">
                            <?php dynamic_sidebar( 'touchy-widgets-top' ); ?>
                        </div>
                        <?php } ?>
                            <!-- END WIDGETS -->
                            <?php $walker = new Touchy_Menu_Description; ?>
                                <?php wp_nav_menu( array( 'theme_location' => 'touchy-by-bonfire', 'walker' => $walker, 'fallback_cb' => '' ) ); ?>
                                    <!-- BEGIN WIDGETS -->
                                    <?php if ( is_active_sidebar( 'touchy-widgets' ) ) { ?>
                                        <div class="touchy-widgets-wrapper">
                                            <?php dynamic_sidebar( 'touchy-widgets' ); ?>
                                        </div>
                                        <?php } ?>
                                            <!-- END WIDGETS -->
                </div>
            </div>
            <!-- END ACCORDION MENU -->

            <!-- BEGIN SEARCH FIELD -->
            <?php if( get_theme_mod('bonfire_touchy_hide_search_button') == '') { ?>
                <div class="touchy-search-wrapper">
                    <form method="get" id="searchform" action="<?php echo esc_url( home_url('') ); ?>/">
                        <input type="text" name="s" class="touchy-search-field" placeholder="<?php if( get_theme_mod('bonfire_touchy_search_placeholder') == '') { ?><?php _e( 'Enter search term...' , 'bonfire' ) ?><?php } else { ?><?php echo get_theme_mod('bonfire_touchy_search_placeholder'); ?><?php } ?>">
                        <div class="touchy-clear-search-wrapper">
                            <?php if( get_theme_mod('bonfire_touchy_hide_clear_function') == '') { ?>
                                <div class="touchy-clear-search"></div>
                                <?php } ?>
                                    <?php if( get_theme_mod('bonfire_touchy_hide_search_field_button') == '') { ?>
                                        <input type="submit" name="submit" class="touchy-search" value="<?php if( get_theme_mod('bonfire_touchy_search_button_text') == '') { ?><?php _e( 'Search' , 'bonfire' ) ?><?php } else { ?><?php echo get_theme_mod('bonfire_touchy_search_button_text'); ?><?php } ?>" />
                                        <?php } ?>
                        </div>
                    </form>
                </div>
                <?php } ?>
                    <!-- END SEARCH FIELD -->

                    <!-- BEGIN MENUBAR STICKY (if logo location not hidden) -->
                    <?php if( get_theme_mod('bonfire_touchy_hide_logo_area') == '' && get_theme_mod('bonfire_touchy_absolute_position') == '' && get_theme_mod('bonfire_touchy_bottom_position') == '') { ?>
                        <script>
                            jQuery(document).on('scroll', function () {
                                'use strict';
                                if (jQuery(this).scrollTop() > 60) {
                                    jQuery('.touchy-wrapper').addClass('touchy-wrapper-top');
                                    jQuery('.touchy-search-wrapper').addClass('touchy-search-wrapper-scrolled');
                                    jQuery('.touchy-by-bonfire-wrapper').addClass('touchy-by-bonfire-wrapper-scrolled');
                                } else {
                                    jQuery('.touchy-wrapper').removeClass('touchy-wrapper-top');
                                    jQuery('.touchy-search-wrapper').removeClass('touchy-search-wrapper-scrolled');
                                    jQuery('.touchy-by-bonfire-wrapper').removeClass('touchy-by-bonfire-wrapper-scrolled');
                                }
                            });
                        </script>
                        <?php } ?>
                            <!-- END MENUBAR STICKY (if logo location not hidden) -->

                            <!-- BEGIN FADE OUT LOGO ON SCROLL -->
                            <script>
                                jQuery(window).scroll(function () {
                                    jQuery(".touchy-logo, .touchy-logo-image").css("opacity", 1 - jQuery(window).scrollTop() / 50);
                                });
                            </script>
                            <!-- END FADE OUT LOGO ON SCROLL -->

                            <!-- BEGIN MENUBAR SHADOW SIZE INCREASE ON SCROLL (unless absolute or bottom positioning selected) -->
                            <?php if( get_theme_mod('bonfire_touchy_absolute_position') == '' && get_theme_mod('bonfire_touchy_bottom_position') == '' && get_theme_mod('bonfire_touchy_scroll_shadow') != '') { ?>
                                <script>
                                    jQuery(window).scroll(function () {
                                        var scroll = jQuery(window).scrollTop();
                                        if (scroll > 60) {
                                            jQuery(".touchy-wrapper").addClass("touchy-wrapper-shadow-active");
                                        } else {
                                            jQuery(".touchy-wrapper").removeClass("touchy-wrapper-shadow-active");
                                        }
                                    });
                                </script>
                                <?php } ?>
                                    <!-- END MENUBAR SHADOW SIZE INCREASE ON SCROLL (unless absolute or bottom positioning selected) -->

                                    <?php
	}
	add_action('wp_footer','bonfire_touchy_footer');

	//
	// ENQUEUE touchy.css
	//
	function bonfire_touchy_css() {
		wp_register_style( 'bonfire-touchy-css', plugins_url( '/touchy.css', __FILE__ ) . '', array(), '1', 'all' );
		wp_enqueue_style( 'bonfire-touchy-css' );
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_touchy_css' );

	//
	// ENQUEUE touchy.js
	//
	function bonfire_touchy_js() {
		wp_register_script( 'bonfire-touchy-js', plugins_url( '/touchy.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
		wp_enqueue_script( 'bonfire-touchy-js' );
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_touchy_js' );
    
    //
	// ENQUEUE retina.min.js
	//
    if(get_theme_mod('touchy_no_retina') == '') {
        function bonfire_touchy_retina_js() {
            wp_register_script( 'bonfire-touchy-retina-js', plugins_url( '/retina.min.js', __FILE__ ) . '', array( 'jquery' ), '1' );  
            wp_enqueue_script( 'bonfire-touchy-retina-js' );
        }
        add_action( 'wp_enqueue_scripts', 'bonfire_touchy_retina_js' );
    }

	//
	// ENQUEUE font-awesome.min.css (unless disabled)
	//
	if( get_theme_mod('bonfire_touchy_disable_fontawesome') == '') {
        function bonfire_touchy_fontawesome() {
            wp_register_style( 'touchy-fontawesome', plugins_url( '/fonts/font-awesome/css/font-awesome.min.css', __FILE__ ) . '', array(), '1', 'all' );  
            wp_enqueue_style( 'touchy-fontawesome' );
        }
        add_action( 'wp_enqueue_scripts', 'bonfire_touchy_fontawesome' );
    }

	//
	// ENQUEUE Google WebFonts
	//
    function touchy_fonts_url() {
		$font_url = '';

		if ( 'off' !== _x( 'on', 'Google font: on or off', 'touchy' ) ) {
			$font_url = add_query_arg( 'family', urlencode( 'Roboto:400' ), "//fonts.googleapis.com/css/test" );
		}
		return $font_url;
	}
	function touchy_scripts() {
		wp_enqueue_style( 'touchy-fonts', touchy_fonts_url(), array(), '1.0.0' );
	}
	add_action( 'wp_enqueue_scripts', 'touchy_scripts' );

	//
	// Register Custom Menu Function
	//
	if (function_exists('register_nav_menus')) {
		register_nav_menus( array(
			'touchy-by-bonfire' => ( 'Touchy, by Bonfire' ),
		) );
	}
    
    //
	// Add the walker class (for menu descriptions)
	//
	
	class Touchy_Menu_Description extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			
			$class_names = $value = '';
	
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';
	
			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
	
			$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
	
			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '<div class="touchy-menu-item-description">' . $item->description . '</div>';
			$item_output .= '</a>';
			$item_output .= $args->after;
	
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
		}
	}

	//
	// Register Widgets
	//
	function bonfire_touchy_widgets_init() {

		register_sidebar( array(
		'name' => __( 'Touchy Widgets (above menu)', 'bonfire' ),
		'id' => 'touchy-widgets-top',
		'description' => __( 'Drag widgets here', 'bonfire' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));
        
        register_sidebar( array(
		'name' => __( 'Touchy Widgets (below menu)', 'bonfire' ),
		'id' => 'touchy-widgets',
		'description' => __( 'Drag widgets here', 'bonfire' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));

	}
	add_action( 'widgets_init', 'bonfire_touchy_widgets_init' );
    
    //
	// Allow Shortcodes in Text Widget
	//
	add_filter('widget_text', 'do_shortcode');

	//
	// Insert customization options into the header
	//
	function bonfire_touchy_customize() {
	?>
                                        <style>
                                            /* logo location */
                                            
                                            .touchy-logo-wrapper {
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_logo_area_background_color');
                                                ?>;
                                            }
                                            
                                            .touchy-logo-wrapper {
                                                background-color:<?php if( get_theme_mod('bonfire_touchy_hide_logo_background') !='') {
                                                    ?>transparent<?php
                                                }
                                                ?>;
                                            }
                                            
                                            .touchy-logo a {
                                                color: <?php echo get_theme_mod('bonfire_touchy_logo_color');
                                                ?>;
                                            }
                                            
                                            .touchy-logo a:hover {
                                                color: <?php echo get_theme_mod('bonfire_touchy_logo_hover_color');
                                                ?>;
                                            }
                                            
                                            .touchy-logo-wrapper {
                                                <?php $touchy_logo_align=get_theme_mod( 'bonfire_touchy_logo_align');
                                                if( $touchy_logo_align=='') {
                                                    echo '
 text-align: center;
                                                    ';

                                                }
                                                else if( $touchy_logo_align !='') {
                                                    switch ( $touchy_logo_align) {
                                                        case 'left': echo '
 text-align: left;
                                                        ';
 break;
                                                        case 'center': echo '
 text-align: center;
                                                        ';
 break;
                                                        case 'right': echo '
 text-align: right;
                                                        ';
 break;
                                                    }
                                                }
                                                ?>
                                            }
                                            /* if logo location hidden*/
                                            
                                            <?php if( get_theme_mod('bonfire_touchy_hide_logo_area') !='') {
                                                ?> .touchy-wrapper {
                                                    position: fixed;
                                                    top: 0;
                                                }
                                                .touchy-search-wrapper {
                                                    position: fixed;
                                                    top: 0;
                                                }
                                                .touchy-by-bonfire-wrapper {
                                                    position: fixed;
                                                    top: 65px;
                                                }
                                                <?php
                                            }
                                            
                                            ?>
                                            /* text labels */
                                            
                                            .touchy-wrapper .touchy-back-button::before {
                                                content: '<?php echo get_theme_mod('bonfire_touchy_back_icon_label'); ?>';
                                                color: <?php echo get_theme_mod('bonfire_touchy_back_button_label_color');
                                                ?>;
                                            }
                                            
                                            .touchy-wrapper .touchy-call-button::before {
                                                content: '<?php _e('Telephonez-nous', 'Mobile nav'); ?>';
                                                color: <?php echo get_theme_mod('bonfire_touchy_call_button_label_color');
                                                ?>;
                                                margin-left: -2px;
                                            }
                                            
                                            .touchy-wrapper .touchy-email-button::before {
                                                content: '<?php echo get_theme_mod('bonfire_touchy_email_icon_label'); ?>';
                                                color: <?php echo get_theme_mod('bonfire_touchy_email_button_label_color');
                                                ?>;
                                            }
                                            
                                            .touchy-wrapper .touchy-search-button::before {
                                                content: '<?php _e('Catalogue Tpalm', 'Mobile nav'); ?>';
                                                color: <?php echo get_theme_mod('bonfire_touchy_search_button_label_color');
                                                ?>;
                                            }
                                            
                                            .touchy-wrapper .touchy-menu-button::before {
                                                content: '<?php echo get_theme_mod('bonfire_touchy_menu_icon_label'); ?>';
                                                color: <?php echo get_theme_mod('bonfire_touchy_menu_button_label_color');
                                                ?>;
                                            }
                                            /* text label hovers (on touch devices only) */
                                            
                                            <?php if ( wp_is_mobile()) {}
                                            
                                            else {
                                                ?> .touchy-wrapper .touchy-back-button:hover::before,
                                                .touchy-wrapper .touchy-call-button:hover::before,
                                                .touchy-wrapper .touchy-email-button:hover::before,
                                                .touchy-wrapper .touchy-search-button:hover::before,
                                                .touchy-wrapper .touchy-menu-button:hover::before {
                                                    color: #fff;
                                                }
                                                .touchy-wrapper .touchy-back-button:hover::before {
                                                    color: <?php echo get_theme_mod('bonfire_touchy_back_button_label_hover_color');
                                                    ?>;
                                                }
                                                .touchy-wrapper .touchy-call-button:hover::before {
                                                    color: <?php echo get_theme_mod('bonfire_touchy_call_button_label_hover_color');
                                                    ?>;
                                                }
                                                .touchy-wrapper .touchy-email-button:hover::before {
                                                    color: <?php echo get_theme_mod('bonfire_touchy_email_button_label_hover_color');
                                                    ?>;
                                                }
                                                .touchy-wrapper .touchy-search-button:hover::before {
                                                    color: <?php echo get_theme_mod('bonfire_touchy_search_button_label_hover_color');
                                                    ?>;
                                                }
                                                .touchy-wrapper .touchy-menu-button:hover::before {
                                                    color: <?php echo get_theme_mod('bonfire_touchy_menu_button_label_hover_color');
                                                    ?>;
                                                }
                                                <?php
                                            }
                                            
                                            ?>
                                            /* text label colors for search and menu button active states */
                                            
                                            .touchy-wrapper .touchy-search-button-active::before {
                                                color: <?php echo get_theme_mod('bonfire_touchy_search_button_label_hover_color');
                                                ?>;
                                            }
                                            
                                            .touchy-wrapper .touchy-menu-button-active::before {
                                                color: <?php echo get_theme_mod('bonfire_touchy_menu_button_label_hover_color');
                                                ?>;
                                            }
                                            /* icon positioning if text label entered */
                                            
                                            <?php if( get_theme_mod('bonfire_touchy_back_icon_label') !='') {
                                                ?> .touchy-back-text-label-offset > div {
                                                    margin-top: -7px;
                                                }
                                                .touchy-back-text-label-offset i {
                                                    position: relative;
                                                    top: -5px;
                                                }
                                                <?php
                                            }
                                            
                                            ?> <?php if( get_theme_mod('bonfire_touchy_call_icon_label') !='') {
                                                ?> .touchy-call-text-label-offset > div {
                                                    position: relative;
                                                    top: -9px;
                                                }
                                                .touchy-call-text-label-offset i {
                                                    position: relative;
                                                    top: -5px;
                                                }
                                                <?php
                                            }
                                            
                                            ?> <?php if( get_theme_mod('bonfire_touchy_email_icon_label') !='') {
                                                ?> .touchy-email-text-label-offset > div {
                                                    margin-top: -9px;
                                                }
                                                .touchy-email-text-label-offset i {
                                                    position: relative;
                                                    top: -5px;
                                                }
                                                <?php
                                            }
                                            
                                            ?> <?php if( get_theme_mod('bonfire_touchy_search_icon_label') !='') {
                                                ?> .touchy-search-text-label-offset > div {
                                                    margin-top: -11px;
                                                }
                                                .touchy-search-text-label-offset i {
                                                    position: relative;
                                                    top: -5px;
                                                }
                                                <?php
                                            }
                                            
                                            ?> <?php if( get_theme_mod('bonfire_touchy_menu_icon_label') !='') {
                                                ?> .touchy-menu-text-label-offset > div {
                                                    margin-top: -8px;
                                                }
                                                .touchy-menu-text-label-offset i {
                                                    position: relative;
                                                    top: -8px;
                                                }
                                                <?php
                                            }
                                            
                                            else {
                                                ?> .touchy-menu-text-label-offset i {
                                                    position: relative;
                                                    top: -3px;
                                                }
                                                <?php
                                            }
                                            
                                            ?>
                                            /* custom text label font size */
                                            
                                            .touchy-wrapper .touchy-back-button::before,
                                            .touchy-wrapper .touchy-call-button::before,
                                            .touchy-wrapper .touchy-email-button::before,
                                            .touchy-wrapper .touchy-search-button::before,
                                            .touchy-wrapper .touchy-menu-button::before {
                                                font-size: <?php echo get_theme_mod('bonfire_touchy_text_label_font_size');
                                                ?>px;
                                            }
                                            /* BACK button */
                                            
                                            .touchy-wrapper .touchy-back-button {
                                                color: <?php echo get_theme_mod('bonfire_touchy_back_button_icon_color');
                                                ?>;
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_back_button_color');
                                                ?>;
                                            }
                                            /* CALL button */
                                            
                                            .touchy-wrapper .touchy-call-button {
                                                color: <?php echo get_theme_mod('bonfire_touchy_call_button_icon_color');
                                                ?>;
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_call_button_color');
                                                ?>;
                                            }
                                            /* EMAIL button */
                                            
                                            .touchy-wrapper .touchy-email-button {
                                                color: <?php echo get_theme_mod('bonfire_touchy_email_button_icon_color');
                                                ?>;
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_email_button_color');
                                                ?>;
                                            }
                                            /* SEARCH button */
                                            
                                            .touchy-wrapper .touchy-search-button {
                                                color: <?php echo get_theme_mod('bonfire_touchy_search_button_icon_color');
                                                ?>;
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_search_button_color');
                                                ?>;
                                            }
                                            /* when search button active */
                                            
                                            .touchy-search-button-active {
                                                color: <?php echo get_theme_mod('bonfire_touchy_search_button_icon_hover_color');
                                                ?> !important;
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_search_button_hover_color');
                                                ?> !important;
                                            }
                                            
                                            .touchy-search-button-active .touchy-default-search-outer {
                                                -webkit-box-shadow:0px 0px 0px 2px <?php if( get_theme_mod('bonfire_touchy_search_button_icon_hover_color')=='') {
                                                    ?>#fff<?php
                                                }
                                                else {
                                                    ?><?php echo get_theme_mod('bonfire_touchy_search_button_icon_hover_color');
                                                    ?><?php
                                                }
                                                ?> !important;
                                                -moz-box-shadow:0px 0px 0px 2px <?php if( get_theme_mod('bonfire_touchy_search_button_icon_hover_color')=='') {
                                                    ?>#fff<?php
                                                }
                                                else {
                                                    ?><?php echo get_theme_mod('bonfire_touchy_search_button_icon_hover_color');
                                                    ?><?php
                                                }
                                                ?> !important;
                                                box-shadow:0px 0px 0px 2px <?php if( get_theme_mod('bonfire_touchy_search_button_icon_hover_color')=='') {
                                                    ?>#fff<?php
                                                }
                                                else {
                                                    ?><?php echo get_theme_mod('bonfire_touchy_search_button_icon_hover_color');
                                                    ?><?php
                                                }
                                                ?> !important;
                                            }
                                            
                                            .touchy-search-button-active .touchy-default-search-outer:after,
                                            .touchy-search-button-active .touchy-default-search-inner,
                                            .touchy-search-button-active .touchy-default-search-inner:before,
                                            .touchy-search-button-active .touchy-default-search-inner:after {
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_search_button_icon_hover_color');
                                                ?> !important;
                                            }
                                            /* MENU button */
                                            
                                            .touchy-menu-button {
                                                color: <?php echo get_theme_mod('bonfire_touchy_menu_button_icon_color');
                                                ?>;
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_menu_button_color');
                                                ?>;
                                            }
                                            
                                            .touchy-default-menu,
                                            .touchy-default-menu:before,
                                            .touchy-default-menu:after {
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_menu_button_icon_color');
                                                ?>;
                                            }
                                            /* when menu button active */
                                            
                                            .touchy-menu-button-active {
                                                color: <?php echo get_theme_mod('bonfire_touchy_menu_button_icon_hover_color');
                                                ?>;
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_menu_button_hover_color');
                                                ?>;
                                            }
                                            
                                            .touchy-menu-button-active .touchy-default-menu,
                                            .touchy-menu-button-active .touchy-default-menu:before,
                                            .touchy-menu-button-active .touchy-default-menu:after {
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_menu_button_icon_hover_color');
                                                ?>;
                                            }
                                            /* show top button hovers on non-touch devices only */
                                            
                                            <?php if ( wp_is_mobile()) {}
                                            
                                            else {
                                                ?> .touchy-back-button:hover,
                                                .touchy-call-button:hover,
                                                .touchy-email-button:hover,
                                                .touchy-search-button:hover,
                                                .touchy-menu-button:hover {
                                                    color: #fff;
                                                    background-color: #07B1FF;
                                                }
                                                .touchy-back-button:hover {
                                                    color: <?php echo get_theme_mod('bonfire_touchy_back_button_icon_hover_color');
                                                    ?>;
                                                    background-color: <?php echo get_theme_mod('bonfire_touchy_back_button_hover_color');
                                                    ?>;
                                                }
                                                .touchy-call-button:hover {
                                                    color: <?php echo get_theme_mod('bonfire_touchy_call_button_icon_hover_color');
                                                    ?>;
                                                    background-color: <?php echo get_theme_mod('bonfire_touchy_call_button_hover_color');
                                                    ?>;
                                                }
                                                .touchy-email-button:hover {
                                                    color: <?php echo get_theme_mod('bonfire_touchy_email_button_icon_hover_color');
                                                    ?>;
                                                    background-color: <?php echo get_theme_mod('bonfire_touchy_email_button_hover_color');
                                                    ?>;
                                                }
                                                .touchy-search-button:hover {
                                                    color: <?php echo get_theme_mod('bonfire_touchy_search_button_icon_hover_color');
                                                    ?>;
                                                    background-color: <?php echo get_theme_mod('bonfire_touchy_search_button_hover_color');
                                                    ?>;
                                                }
                                                .touchy-menu-button:hover {
                                                    color: <?php echo get_theme_mod('bonfire_touchy_menu_button_icon_hover_color');
                                                    ?>;
                                                    background-color: <?php echo get_theme_mod('bonfire_touchy_menu_button_hover_color');
                                                    ?>;
                                                }
                                                /* default back button */
                                                .touchy-back-button:hover .touchy-default-back,
                                                .touchy-back-button:hover .touchy-default-back:before,
                                                .touchy-back-button:hover .touchy-default-back:after {
                                                    background-color:<?php if( get_theme_mod('bonfire_touchy_back_button_icon_hover_color')=='') {
                                                        ?>#fff<?php
                                                    }
                                                    else {
                                                        ?><?php echo get_theme_mod('bonfire_touchy_back_button_icon_hover_color');
                                                        ?><?php
                                                    }
                                                    ?>;
                                                    ;
                                                }
                                                /* default call icon hovers */
                                                .touchy-call-button:hover .touchy-default-call-one,
                                                .touchy-call-button:hover .touchy-default-call-two,
                                                .touchy-call-button:hover .touchy-default-call-three,
                                                .touchy-call-button:hover .touchy-default-call-one:before,
                                                .touchy-call-button:hover .touchy-default-call-two:before,
                                                .touchy-call-button:hover .touchy-default-call-three:before,
                                                .touchy-call-button:hover .touchy-default-call-one:after,
                                                .touchy-call-button:hover .touchy-default-call-two:after,
                                                .touchy-call-button:hover .touchy-default-call-three:after {
                                                    background-color:<?php if( get_theme_mod('bonfire_touchy_call_button_icon_hover_color')=='') {
                                                        ?>#fff<?php
                                                    }
                                                    else {
                                                        ?><?php echo get_theme_mod('bonfire_touchy_call_button_icon_hover_color');
                                                        ?><?php
                                                    }
                                                    ?>;
                                                }
                                                /* default email icon hovers */
                                                .touchy-email-button:hover .touchy-default-email-outer {
                                                    -webkit-box-shadow:0px 0px 0px 2px <?php if( get_theme_mod('bonfire_touchy_email_button_icon_hover_color')=='') {
                                                        ?>#fff<?php
                                                    }
                                                    else {
                                                        ?><?php echo get_theme_mod('bonfire_touchy_email_button_icon_hover_color');
                                                        ?><?php
                                                    }
                                                    ?>;
                                                    -moz-box-shadow:0px 0px 0px 2px <?php if( get_theme_mod('bonfire_touchy_email_button_icon_hover_color')=='') {
                                                        ?>#fff<?php
                                                    }
                                                    else {
                                                        ?><?php echo get_theme_mod('bonfire_touchy_email_button_icon_hover_color');
                                                        ?><?php
                                                    }
                                                    ?>;
                                                    box-shadow:0px 0px 0px 2px <?php if( get_theme_mod('bonfire_touchy_email_button_icon_hover_color')=='') {
                                                        ?>#fff<?php
                                                    }
                                                    else {
                                                        ?><?php echo get_theme_mod('bonfire_touchy_email_button_icon_hover_color');
                                                        ?><?php
                                                    }
                                                    ?>;
                                                }
                                                .touchy-email-button:hover .touchy-default-email-outer:before,
                                                .touchy-email-button:hover .touchy-default-email-outer:after,
                                                .touchy-email-button:hover .touchy-default-email-outer .touchy-default-email-inner:before,
                                                .touchy-email-button:hover .touchy-default-email-outer .touchy-default-email-inner:after {
                                                    background-color:<?php if( get_theme_mod('bonfire_touchy_email_button_icon_hover_color')=='') {
                                                        ?>#fff<?php
                                                    }
                                                    else {
                                                        ?><?php echo get_theme_mod('bonfire_touchy_email_button_icon_hover_color');
                                                        ?><?php
                                                    }
                                                    ?>;
                                                }
                                                /* default search icon hovers */
                                                .touchy-search-button:hover .touchy-default-search-outer {
                                                    -webkit-box-shadow:0px 0px 0px 2px <?php if( get_theme_mod('bonfire_touchy_search_button_icon_hover_color')=='') {
                                                        ?>#fff<?php
                                                    }
                                                    else {
                                                        ?><?php echo get_theme_mod('bonfire_touchy_search_button_icon_hover_color');
                                                        ?><?php
                                                    }
                                                    ?>;
                                                    -moz-box-shadow:0px 0px 0px 2px <?php if( get_theme_mod('bonfire_touchy_search_button_icon_hover_color')=='') {
                                                        ?>#fff<?php
                                                    }
                                                    else {
                                                        ?><?php echo get_theme_mod('bonfire_touchy_search_button_icon_hover_color');
                                                        ?><?php
                                                    }
                                                    ?>;
                                                    box-shadow:0px 0px 0px 2px <?php if( get_theme_mod('bonfire_touchy_search_button_icon_hover_color')=='') {
                                                        ?>#fff<?php
                                                    }
                                                    else {
                                                        ?><?php echo get_theme_mod('bonfire_touchy_search_button_icon_hover_color');
                                                        ?><?php
                                                    }
                                                    ?>;
                                                }
                                                .touchy-search-button:hover .touchy-default-search-outer:after,
                                                .touchy-search-button:hover .touchy-default-search-outer .touchy-default-search-inner,
                                                .touchy-search-button:hover .touchy-default-search-outer .touchy-default-search-inner:before,
                                                .touchy-search-button:hover .touchy-default-search-outer .touchy-default-search-inner:after {
                                                    background-color:<?php if( get_theme_mod('bonfire_touchy_search_button_icon_hover_color')=='') {
                                                        ?>#fff<?php
                                                    }
                                                    else {
                                                        ?><?php echo get_theme_mod('bonfire_touchy_search_button_icon_hover_color');
                                                        ?><?php
                                                    }
                                                    ?>;
                                                }
                                                /* default menu icon hover */
                                                .touchy-menu-button:hover .touchy-default-menu,
                                                .touchy-menu-button:hover .touchy-default-menu:before,
                                                .touchy-menu-button:hover .touchy-default-menu:after {
                                                    background-color:<?php if( get_theme_mod('bonfire_touchy_menu_button_icon_hover_color')=='') {
                                                        ?>#fff<?php
                                                    }
                                                    else {
                                                        ?><?php echo get_theme_mod('bonfire_touchy_menu_button_icon_hover_color');
                                                        ?><?php
                                                    }
                                                    ?>;
                                                }
                                                <?php
                                            }
                                            
                                            ?>
                                            /* default back button */
                                            
                                            .touchy-default-back,
                                            .touchy-default-back:before,
                                            .touchy-default-back:after {
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_back_button_icon_color');
                                                ?>;
                                            }
                                            /* default call button */
                                            
                                            .touchy-default-call-one,
                                            .touchy-default-call-two,
                                            .touchy-default-call-three,
                                            .touchy-default-call-one:before,
                                            .touchy-default-call-two:before,
                                            .touchy-default-call-three:before,
                                            .touchy-default-call-one:after,
                                            .touchy-default-call-two:after,
                                            .touchy-default-call-three:after {
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_call_button_icon_color');
                                                ?>;
                                            }
                                            /* default email button */
                                            
                                            .touchy-email-button .touchy-default-email-outer {
                                                -webkit-box-shadow: 0px 0px 0px 2px <?php echo get_theme_mod('bonfire_touchy_email_button_icon_color');
                                                ?>;
                                                -moz-box-shadow: 0px 0px 0px 2px <?php echo get_theme_mod('bonfire_touchy_email_button_icon_color');
                                                ?>;
                                                box-shadow: 0px 0px 0px 2px <?php echo get_theme_mod('bonfire_touchy_email_button_icon_color');
                                                ?>;
                                            }
                                            
                                            .touchy-email-button .touchy-default-email-outer:before,
                                            .touchy-email-button .touchy-default-email-outer:after,
                                            .touchy-email-button .touchy-default-email-outer .touchy-default-email-inner:before,
                                            .touchy-email-button .touchy-default-email-outer .touchy-default-email-inner:after {
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_email_button_icon_color');
                                                ?>;
                                            }
                                            /* default search button */
                                            
                                            .touchy-search-button .touchy-default-search-outer {
                                                -webkit-box-shadow: 0px 0px 0px 2px <?php echo get_theme_mod('bonfire_touchy_search_button_icon_color');
                                                ?>;
                                                -moz-box-shadow: 0px 0px 0px 2px <?php echo get_theme_mod('bonfire_touchy_search_button_icon_color');
                                                ?>;
                                                box-shadow: 0px 0px 0px 2px <?php echo get_theme_mod('bonfire_touchy_search_button_icon_color');
                                                ?>;
                                            }
                                            
                                            .touchy-search-button .touchy-default-search-outer:after,
                                            .touchy-search-button .touchy-default-search-outer .touchy-default-search-inner,
                                            .touchy-search-button .touchy-default-search-outer .touchy-default-search-inner:before,
                                            .touchy-search-button .touchy-default-search-outer .touchy-default-search-inner:after {
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_search_button_icon_color');
                                                ?>;
                                            }
                                            /* menu bar separator */
                                            
                                            .touchy-back-button:after,
                                            .touchy-call-button:after,
                                            .touchy-email-button:after,
                                            .touchy-search-button:after {
                                                background-color:<?php if( get_theme_mod('bonfire_touchy_hide_menubar_separators') !='') {
                                                    ?>transparent<?
                                                }
                                                else {
                                                    ?><?php if( get_theme_mod('bonfire_touchy_button_separator_color') !='') {
                                                        ?><?php echo get_theme_mod('bonfire_touchy_button_separator_color');
                                                        ?><?
                                                    }
                                                    else {
                                                        ?>#EBEBEB<?php
                                                    }
                                                    ?><?php
                                                }
                                                ?>;
                                            }
                                            /* hide button separators on button hover (on non-touch devices only) */
                                            
                                            <?php if ( wp_is_mobile()) {}
                                            
                                            else {
                                                ?> .touchy-back-button:hover:after,
                                                .touchy-call-button:hover:after,
                                                .touchy-email-button:hover:after,
                                                .touchy-search-button:hover:after {
                                                    opacity: 0;
                                                }
                                                <?php
                                            }
                                            
                                            ?>
                                            /* search field placeholder color */
                                            
                                            input.touchy-search-field::-webkit-input-placeholder {
                                                color: <?php echo get_theme_mod('bonfire_touchy_search_field_placeholder_color');
                                                ?> !important;
                                            }
                                            
                                            input.touchy-search-field:-moz-placeholder {
                                                color: <?php echo get_theme_mod('bonfire_touchy_search_field_placeholder_color');
                                                ?> !important;
                                            }
                                            
                                            input.touchy-search-field::-moz-placeholder {
                                                color: <?php echo get_theme_mod('bonfire_touchy_search_field_placeholder_color');
                                                ?> !important;
                                            }
                                            /* search field text color */
                                            
                                            .touchy-search-wrapper input.touchy-search-field {
                                                color: <?php echo get_theme_mod('bonfire_touchy_search_field_text_color');
                                                ?>;
                                            }
                                            /* search field 'clear field' button color */
                                            
                                            .touchy-clear-search::before,
                                            .touchy-clear-search::after {
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_search_field_clear_color');
                                                ?>
                                            }
                                            /* search field background color */
                                            
                                            .touchy-search-wrapper input.touchy-search-field {
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_search_field_background_color');
                                                ?>;
                                            }
                                            /* search button text + background color */
                                            
                                            .touchy-search-wrapper input.touchy-search {
                                                color: <?php echo get_theme_mod('bonfire_touchy_search_field_search_button_text_color');
                                                ?>;
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_search_field_search_button_color');
                                                ?>;
                                            }
                                            /* accordion + tooltip background, menu end marker */
                                            
                                            .touchy-menu-tooltip:before {
                                                border-bottom-color: <?php echo get_theme_mod('bonfire_touchy_dropdown_background_color');
                                                ?>;
                                            }
                                            
                                            .touchy-by-bonfire {
                                                background: <?php echo get_theme_mod('bonfire_touchy_dropdown_background_color');
                                                ?>;
                                                border-color: <?php echo get_theme_mod('bonfire_touchy_dropdown_end_marker_color');
                                                ?>;
                                            }
                                            /* if tooltip color overridden */
                                            
                                            .touchy-menu-tooltip:before {
                                                border-bottom-color: <?php echo get_theme_mod('bonfire_touchy_tooltip_color');
                                                ?>;
                                            }
                                            /* sub-menu background */
                                            
                                            .touchy-by-bonfire ul.sub-menu {
                                                background: <?php echo get_theme_mod('bonfire_touchy_dropdown_sub_background_color');
                                                ?>;
                                            }
                                            /* horizontal menu item divider */
                                            
                                            .touchy-by-bonfire .menu > li,
                                            .touchy-by-bonfire ul.sub-menu > li:first-child {
                                                border-color: <?php echo get_theme_mod('bonfire_touchy_dropdown_horizontal_divider_color');
                                                ?>;
                                            }
                                            /* horizontal menu item divider (sub-menu) */
                                            
                                            .touchy-by-bonfire ul li ul li:after {
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_dropdown_submenu_horizontal_divider_color');
                                                ?>;
                                            }
                                            /* accordion menu separator */
                                            
                                            .touchy-by-bonfire .menu li span {
                                                border-left-color: <?php echo get_theme_mod('bonfire_touchy_dropdown_menu_item_separator_color');
                                                ?>;
                                            }
                                            /* accordion menu separator (sub-menu) */
                                            
                                            .touchy-by-bonfire .sub-menu li span {
                                                border-left-color: <?php echo get_theme_mod('bonfire_touchy_dropdown_submenu_item_separator_color');
                                                ?>;
                                            }
                                            /* accordion menu item */
                                            
                                            .touchy-by-bonfire .menu a {
                                                font-size: <?php echo get_theme_mod('touchy_menu_font_size');
                                                ?>px;
                                                line-height: <?php echo get_theme_mod('touchy_menu_line_height');
                                                ?>px;
                                                font-family: <?php echo get_theme_mod('touchy_menu_theme_font');
                                                ?>;
                                                color: <?php echo get_theme_mod('bonfire_touchy_menu_item_color');
                                                ?>;
                                            }
                                            
                                            .touchy-by-bonfire ul li.current-menu-item a {
                                                color: <?php echo get_theme_mod('bonfire_touchy_current_menu_item_color');
                                                ?>;
                                            }
                                            
                                            .touchy-by-bonfire .menu a:hover,
                                            .touchy-by-bonfire ul li.current-menu-item a:hover,
                                            .touchy-by-bonfire .menu a:active {
                                                color: <?php echo get_theme_mod('bonfire_touchy_menu_item_hover_color');
                                                ?>;
                                            }
                                            /* menu icons */
                                            
                                            .touchy-by-bonfire .menu a i {
                                                font-size: <?php echo get_theme_mod('touchy_menu_icon_size');
                                                ?>px;
                                                color: <?php echo get_theme_mod('bonfire_touchy_menu_item_icon_color');
                                                ?>;
                                            }
                                            
                                            .touchy-by-bonfire .sub-menu a i {
                                                font-size: <?php echo get_theme_mod('touchy_menu_icon_size');
                                                ?>px;
                                                color: <?php echo get_theme_mod('bonfire_touchy_submenu_item_icon_color');
                                                ?>;
                                            }
                                            /* menu description */
                                            
                                            .touchy-menu-item-description {
                                                font-size: <?php echo get_theme_mod('touchy_menu_description_font_size');
                                                ?>px;
                                                line-height: <?php echo get_theme_mod('touchy_menu_description_line_height');
                                                ?>px;
                                                margin-top: <?php echo get_theme_mod('touchy_menu_description_top_margin');
                                                ?>px;
                                                font-family: <?php echo get_theme_mod('touchy_menu_theme_font');
                                                ?>;
                                                color: <?php echo get_theme_mod('bonfire_touchy_menu_item_description_color');
                                                ?>;
                                            }
                                            /* accordion sub-menu item */
                                            
                                            .touchy-by-bonfire .sub-menu a {
                                                color: <?php echo get_theme_mod('bonfire_touchy_submenu_item_color');
                                                ?>;
                                            }
                                            
                                            .touchy-by-bonfire .sub-menu a:hover,
                                            .touchy-by-bonfire .sub-menu a:active {
                                                color: <?php echo get_theme_mod('bonfire_touchy_submenu_item_hover_color');
                                                ?>;
                                            }
                                            /* content overlay color + transparency */
                                            
                                            .touchy-overlay {
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_overlay_color');
                                                ?>;
                                            }
                                            
                                            .touchy-overlay-active {
                                                opacity: <?php echo get_theme_mod('bonfire_touchy_overlay_transparency');
                                                ?>;
                                            }
                                            /* menu transparency */
                                            
                                            .touchy-wrapper {
                                                opacity: <?php echo get_theme_mod('bonfire_touchy_menu_transparency');
                                                ?>;
                                            }
                                            /* hide menubar shadow */
                                            
                                            <?php if( get_theme_mod('bonfire_touchy_hide_shadow') !='') {
                                                ?> .touchy-wrapper {
                                                    -webkit-box-shadow: none;
                                                    -moz-box-shadow: none;
                                                    box-shadow: none;
                                                }
                                                <?php
                                            }
                                            
                                            ?>
                                            /* widget area background */
                                            
                                            .touchy-widgets-wrapper {
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_widget_area_color');
                                                ?>;
                                            }
                                            /* absolute positioning */
                                            
                                            <?php if( get_theme_mod('bonfire_touchy_absolute_position') !='') {
                                                ?> .touchy-wrapper,
                                                .touchy-by-bonfire-wrapper,
                                                .touchy-search-wrapper {
                                                    position: absolute !important;
                                                }
                                                .touchy-by-bonfire {
                                                    overflow: visible;
                                                    max-height: none;
                                                }
                                                <?php
                                            }
                                            
                                            ?>
                                            /* bottom positioning */
                                            
                                            <?php if( get_theme_mod('bonfire_touchy_bottom_position') !='') {
                                                ?> .touchy-logo-wrapper {
                                                    z-index: 99992 !important;
                                                    <?php if( get_theme_mod('bonfire_touchy_hide_logo_background')=='') {
                                                        ?> -moz-box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.14);
                                                        -webkit-box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.14);
                                                        box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.14);
                                                        <?php
                                                    }
                                                    ?>
                                                }
                                                .touchy-wrapper {
                                                    position: fixed !important;
                                                    top: auto;
                                                    bottom: 0;
                                                }
                                                .touchy-by-bonfire-wrapper {
                                                    position: fixed !important;
                                                    top: 20px;
                                                    bottom: 65px;
                                                }
                                                .touchy-search-wrapper {
                                                    position: fixed !important;
                                                    top: auto;
                                                    bottom: 0;
                                                }
                                                .touchy-search-wrapper-active {
                                                    -webkit-transform: translateY(-51px);
                                                    -moz-transform: translateY(-51px);
                                                    transform: translateY(-51px);
                                                }
                                                .touchy-by-bonfire {
                                                    position: absolute;
                                                    top: auto;
                                                    bottom: 0;
                                                    border-width: 3px 0 0 0;
                                                }
                                                .touchy-menu-tooltip:before {
                                                    top: -15px;
                                                    border-bottom: 0;
                                                    border-top: 6px solid #fff;
                                                    border-top-color: <?php echo get_theme_mod('bonfire_touchy_dropdown_background_color');
                                                    ?>;
                                                }
                                                .touchy-by-bonfire {
                                                    -webkit-transform: translateY(10px);
                                                    -moz-transform: translateY(10px);
                                                    transform: translateY(10px);
                                                }
                                                <?php
                                            }
                                            
                                            ?>
                                            /* hide logo area background shadow */
                                            
                                            <?php if( get_theme_mod('bonfire_touchy_hide_logo_background_shadow') !='') {
                                                ?> .touchy-logo-wrapper {
                                                    -webkit-box-shadow: none;
                                                    -moz-box-shadow: none;
                                                    box-shadow: none;
                                                }
                                                <?php
                                            }
                                            
                                            ?>
                                            /* accordion expand icon */
                                            
                                            .touchy-by-bonfire .touchy-sub-arrow-inner:before,
                                            .touchy-by-bonfire .touchy-sub-arrow-inner:after {
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_expand_icon_color');
                                                ?>;
                                            }
                                            /* accordion expand icon (sub-menu) */
                                            
                                            .touchy-by-bonfire .sub-menu li .touchy-sub-arrow-inner:before,
                                            .touchy-by-bonfire .sub-menu li .touchy-sub-arrow-inner:after {
                                                background-color: <?php echo get_theme_mod('bonfire_touchy_submenu_expand_icon_color');
                                                ?>;
                                            }
                                            /* show sub-menu arrow hover colors on non-touch devices only */
                                            
                                            <?php if ( wp_is_mobile()) {}
                                            
                                            else {
                                                ?> .touchy-by-bonfire .touchy-sub-arrow:hover .touchy-sub-arrow-inner:before,
                                                .touchy-by-bonfire .touchy-sub-arrow:hover .touchy-sub-arrow-inner:after {
                                                    background-color: #777;
                                                }
                                                /* accordion expand icon hover */
                                                .touchy-by-bonfire .touchy-sub-arrow:hover .touchy-sub-arrow-inner:before,
                                                .touchy-by-bonfire .touchy-sub-arrow:hover .touchy-sub-arrow-inner:after {
                                                    background-color: <?php echo get_theme_mod('bonfire_touchy_expand_icon_hover_color');
                                                    ?>;
                                                }
                                                /* accordion expand icon hover (sub-menu) */
                                                .touchy-by-bonfire .sub-menu li .touchy-sub-arrow:hover .touchy-sub-arrow-inner:before,
                                                .touchy-by-bonfire .sub-menu li .touchy-sub-arrow:hover .touchy-sub-arrow-inner:after {
                                                    background-color: <?php echo get_theme_mod('bonfire_touchy_submenu_expand_icon_hover_color');
                                                    ?>;
                                                }
                                                <?php
                                            }
                                            
                                            ?>
                                            /* push down Touchy if WordPress toolbar is active */
                                            
                                            <?php if ( is_admin_bar_showing()) {
                                                ?> .touchy-logo-wrapper,
                                                .touchy-wrapper,
                                                .touchy-by-bonfire-wrapper,
                                                .touchy-search-wrapper {
                                                    margin-top: 32px;
                                                }
                                                @media screen and (max-width:782px) {
                                                    .touchy-logo-wrapper,
                                                    .touchy-wrapper,
                                                    .touchy-by-bonfire-wrapper,
                                                    .touchy-search-wrapper {
                                                        margin-top: 46px;
                                                    }
                                                }
                                                <?php
                                            }
                                            
                                            ?>
                                            /* hide touchy between resolutions */
                                            
                                            @media ( min-width:<?php echo get_theme_mod('bonfire_touchy_smaller_than');
                                            ?>px) and (max-width:<?php echo get_theme_mod('bonfire_touchy_larger_than');
                                            ?>px) {
                                                .touchy-logo-wrapper,
                                                .touchy-search-wrapper,
                                                .touchy-wrapper,
                                                .touchy-overlay,
                                                .touchy-by-bonfire {
                                                    display: none !important;
                                                }
                                            }
                                            /* hide theme menu */
                                            
                                            <?php if( get_theme_mod('bonfire_touchy_hide_theme_menu') !='') {
                                                ?> @media screen and (max-width: <?php echo get_theme_mod('bonfire_touchy_smaller_than');
                                                ?>px) {
                                                    <?php echo get_theme_mod('bonfire_touchy_hide_theme_menu');
                                                    ?> {
                                                        display: none !important;
                                                    }
                                                }
                                                @media screen and (min-width:<?php echo get_theme_mod('bonfire_touchy_larger_than');
                                                ?>px) {
                                                    <?php echo get_theme_mod('bonfire_touchy_hide_theme_menu');
                                                    ?> {
                                                        display: none !important;
                                                    }
                                                }
                                                <?php
                                            }
                                            
                                            ?>
                                        </style>
                                        <!-- END CUSTOM COLORS (WP THEME CUSTOMIZER) -->

                                        <?php
	}
	add_action('wp_head','bonfire_touchy_customize');

    //
	// Insert customization options into the footer
	//
	function bonfire_touchy_customize_footer() {
	?>

                                            <?php if( get_theme_mod('bonfire_touchy_bottom_position') != '') { ?>
                                                <style>
                                                    /* add padding to ensure that whatever content may be at the top of the site doesn't get hidden behind the menu */
                                                    
                                                    <?php if( get_theme_mod('bonfire_touchy_hide_logo_area')=='') {
                                                        ?> html {
                                                            <?php if ( is_admin_bar_showing()) {
                                                                ?> margin-top: 92px !important;
                                                                <?php
                                                            }
                                                            else {
                                                                ?> margin-top: 60px !important;
                                                                <?php
                                                            }
                                                            ?>
                                                        }
                                                        <?php if ( is_admin_bar_showing()) {
                                                            ?> @media screen and (max-width: 782px) {
                                                                html {
                                                                    margin-top: 106px !important;
                                                                }
                                                            }
                                                            <?php
                                                        }
                                                        ?> <?php
                                                    }
                                                    
                                                    ?> html {
                                                        padding-bottom: 50px;
                                                    }
                                                </style>
                                                <?php } else { ?>
                                                    <style>
                                                        /* add margin to ensure that whatever content may be at the top of the site doesn't get hidden behind the menu */
                                                        
                                                        <?php if( get_theme_mod('bonfire_touchy_hide_logo_area')=='') {
                                                            ?> html {
                                                                <?php if ( is_admin_bar_showing()) {
                                                                    ?> margin-top: 143px !important;
                                                                    <?php
                                                                }
                                                                else {
                                                                    ?> margin-top: 111px;
                                                                    <?php
                                                                }
                                                                ?>
                                                            }
                                                            <?php if ( is_admin_bar_showing()) {
                                                                ?> @media screen and (max-width: 782px) {
                                                                    html {
                                                                        margin-top: 157px !important;
                                                                    }
                                                                }
                                                                <?php
                                                            }
                                                            ?> <?php
                                                        }
                                                        
                                                        else {
                                                            ?> html {
                                                                <?php if ( is_admin_bar_showing()) {
                                                                    ?> margin-top: 83px !important;
                                                                    <?php
                                                                }
                                                                else {
                                                                    ?> margin-top: 51px;
                                                                    <?php
                                                                }
                                                                ?>
                                                            }
                                                            <?php if ( is_admin_bar_showing()) {
                                                                ?> @media screen and (max-width: 782px) {
                                                                    html {
                                                                        margin-top: 97px !important;
                                                                    }
                                                                }
                                                                <?php
                                                            }
                                                            ?> <?php
                                                        }
                                                        
                                                        ?>
                                                    </style>
                                                    <?php } ?>


                                                        <style>
                                                            /* hide touchy between resolutions */
                                                            
                                                            @media ( min-width:<?php echo get_theme_mod('bonfire_touchy_smaller_than');
                                                            ?>px) and (max-width:<?php echo get_theme_mod('bonfire_touchy_larger_than');
                                                            ?>px) {
                                                                html {
                                                                    <?php if ( is_admin_bar_showing()) {
                                                                        ?> margin-top: 32px !important;
                                                                        <?php
                                                                    }
                                                                    else {
                                                                        ?> margin-top: 0 !important;
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                }
                                                                <?php if ( is_admin_bar_showing()) {
                                                                    ?> @media screen and (max-width: 782px) {
                                                                        html {
                                                                            margin-top: 46px !important;
                                                                        }
                                                                    }
                                                                    <?php
                                                                }
                                                                ?> <?php if( get_theme_mod('bonfire_touchy_bottom_position') !='') {
                                                                    ?>
                                                                    /* add padding to ensure that whatever content may be at the top of the site doesn't get hidden behind the menu */
                                                                    html {
                                                                        padding-bottom: 0px !important;
                                                                    }
                                                                    <?php
                                                                }
                                                                ?>
                                                            }
                                                        </style>

                                                        <?php
	}
	add_action('wp_footer','bonfire_touchy_customize_footer');

?>