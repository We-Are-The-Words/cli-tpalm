<?php
  
  // Remove Fonts
function wpse_dequeue_google_fonts() {
  //wp_dequeue_style( 'twentyfifteen-fonts' );
  
  wp_dequeue_style('custom-google-fonts-css');
  wp_dequeue_style('custom-google-fonts-css');
  wp_dequeue_style('thegem-google-fonts-css');
  wp_dequeue_style('vc_google_fonts_abril_fatfaceregular-css');
  
}
add_action( 'wp_enqueue_scripts', 'wpse_dequeue_google_fonts', 20 );

  
  
	// Ajout de la font Montserrat depuis les serveurs de google
function hm_add_google_fonts() {
	wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:400,900', false );
}
add_action( 'wp_enqueue_scripts', 'hm_add_google_fonts', 30 );

