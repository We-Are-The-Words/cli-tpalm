<?php
/*
	Suppression des scripts inutiles pour les pages générales
	Activation des scripts sur certains templates
*/
	
function hm_removescript($name){
  wp_deregister_script($name);
  wp_dequeue_script($name);
}
function hm_removestyle($name) {
	wp_deregister_style($name);
	wp_dequeue_style($name);
}

function hm_ressources_organisation() {
/*
  hm_removescript('prettyPhoto');//32
  hm_removescript('owl.carousel');//33
  hm_removescript('underscore');//35
  hm_removescript('vc_grid');//36
  hm_removescript('vc_jquery_skrollr_js');//37
  hm_removescript('imagesloaded');//38
  hm_removescript('thegem-juraSlider');//39
  hm_removescript('thegem-scroll-monitor');//40
  hm_removescript('thegem-portfolio');//41
  //hm_removescript('isotope-js');//42
  hm_removescript('thegem-isotope-metro');//43
  hm_removescript('thegem-isotope-masonry-custom');//44
  hm_removescript('thegem-items-animations');//45
*/

/*
  hm_removestyle('touchy-fonts-css');
  hm_removestyle('custom-google-fonts-css');
  hm_removestyle('thegem-google-fonts-css');
  hm_removestyle('vc_google_fonts_abril_fatfaceregular-css');
*/
  hm_removestyle('touchy-fonts');
  hm_removestyle('open-sans');
  
  //Ajout antoine
  hm_removestyle('custom-google-fonts-css');

  // REALIA
/*
  hm_removescript('realia');
  hm_removestyle('realia');
*/

hm_removescript('google-maps');
hm_removescript('googlemaps');
hm_removescript('googleapis');
//hm_removescript('infobox');

}
add_action('wp_enqueue_scripts', 'hm_ressources_organisation', 10);




/*
// SUPPRESSION GOOGLE MAPS
function remove_google_map() {
  global $template;
  //if ( basename($template) != 'page-immo.php' ) {
	  hm_removescript('google-maps');
		hm_removescript( 'wpgmp-google-api' );
		hm_removescript( 'wpgmp-google-map-main' );
		hm_removestyle ( 'wpgmp-frontend' );
	//}
}
add_action('wp_enqueue_scripts', 'remove_google_map', 1);

function disable_google_maps_ob_start(){
  global $template;
 
  //if ( basename($template) != 'page-immo.php' ) {
		ob_start('disable_google_maps_ob_end');
	//}
}
function disable_google_maps_ob_end($html){
	$html = preg_replace('/<script[^<>]*\/\/maps.(googleapis|google|gstatic).com\/[^<>]*><\/script>/i', '', $html);
	return $html;
}
add_action("wp_head", 'disable_google_maps_ob_start');*/






