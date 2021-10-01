<?php
/*
 * WORDPRESS DEBUG
 */

// SHOW TEMPLATE
add_action('wp_head', 'show_template');
function show_template() {
  if(isset($_GET['dev']) && $_GET['dev'] == 'template' ){
    global $template;
    echo 'template : ' . $template;
  }
}
 
// Afficher les scripts // style WordPress + Hander
add_action('wp_enqueue_scripts', 'show_script_style', 10);
function show_script_style(){
  
  if(isset($_GET['dev']) && $_GET['dev'] == 'source' ){
    echo '<pre>';
    global $wp_scripts, $wp_styles;
    var_dump($wp_scripts);
    echo '<br><br> ** STYLES NOW ** <br><br>';
    var_dump($wp_styles);
    echo '</pre>';
    die;
  }

  
  if(isset($_GET['dev']) && $_GET['dev'] == 'script' ){
    echo '<pre>';
    global $wp_scripts, $wp_styles;
    var_dump($wp_scripts);
    echo '<br><br> ** STYLES NOW ** <br><br>';
    var_dump($wp_styles);
    echo '</pre>';
    die;
  }
  
  if(isset($_GET['dev']) && $_GET['dev'] == 'style' ){
    echo '<pre>';
    global $wp_styles;
    var_dump($wp_styles);
    echo '</pre>';
    die;
  }
}


// Annuler le versionning
// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );


