<?php
	
function eteamsys_removescript($name){
    wp_deregister_script($name);
    wp_dequeue_script($name);
}

function eteamsys_hardfix_w3totalcache(){
  eteamsys_removescript('prettyPhoto');//32
  eteamsys_removescript('owl.carousel');//33
  eteamsys_removescript('underscore');//35
  eteamsys_removescript('vc_grid');//36
  eteamsys_removescript('vc_jquery_skrollr_js');//37
  eteamsys_removescript('imagesloaded');//38
  eteamsys_removescript('thegem-juraSlider');//39
  eteamsys_removescript('thegem-scroll-monitor');//40
  eteamsys_removescript('thegem-portfolio');//41
  eteamsys_removescript('isotope-js');//42
  eteamsys_removescript('thegem-isotope-metro');//43
  eteamsys_removescript('thegem-isotope-masonry-custom');//44
  eteamsys_removescript('thegem-items-animations');//45
}
//add_action('wp_enqueue_scripts', 'eteamsys_hardfix_w3totalcache', 10);

add_action('init', 'myoverride', 100);
function myoverride() {
  remove_action('wp_head', array(visual_composer(), 'addMetaData'));
}

function analytics_add_id() {
	return uniqid ();
}
function remove_revslider_meta_tag() {
  return '';    
}
add_filter( 'revslider_meta_generator', 'remove_revslider_meta_tag' );
