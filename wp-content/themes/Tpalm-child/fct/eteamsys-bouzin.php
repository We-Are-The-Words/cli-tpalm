<?php
/*
 *** FLUSH ***

function flush_rules(){
	flush_rewrite_rules();
}
add_action('init','flush_rules');

function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function my_theme_enqueue_styles() {
    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
*/
/*
function thegem_portfolio_post_type_change() {
    $args = get_post_type_object("thegem_pf_item");
    $args->rewrite["slug"] = "nos-realisations";
    register_post_type($args->name, $args);
}
add_action('init', 'thegem_portfolio_post_type_change', 10); 
*/

/*
function thegem_eteamsys_slugs_change() {
	$args = get_post_type_object("property-type");
    $args->rewrite["slug"] = _x('biens-a-vendre', 'slug-url', 'hm');
    register_post_type($args->name, $args);

    $args = get_post_type_object("properties");
    $args->rewrite["slug"] = _x('bien-a-vendre', 'slug-url', 'hm');
    register_post_type($args->name, $args);

    $args = get_post_type_object("location");
    $args->rewrite["slug"] = _x('a-vendre', 'slug-url', 'hm');
    register_post_type($args->name, $args);
   
}
add_action('init', 'thegem_eteamsys_slugs_change', 10); 
*/

