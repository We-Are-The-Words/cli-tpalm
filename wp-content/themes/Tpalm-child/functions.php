<?php
//include_once('../Tpalm/functions.php');

/*
 * eTEAMSYS BOUZIN
 */

  include_once('fct/eteamsys-bouzin.php');
  include_once('fct/et-themes.php');
  include_once('fct/et-comments.php');
  include_once('fct/et-realia.php');
  include_once('fct/et-widget.php');

/*
 * Hellomoon Bazar
 */

  include_once('fct/hm-fonts.php');
  include_once('fct/hm-ressources.php');
  include_once('fct/hm-wordpress.php');

/*
 * WordPress Tools
 */
 
  include_once('fct/wp-wpml.php');
  include_once('fct/wp-debug.php');

/*add_filter('avf_load_google_map_api', 'disable_google_map_api', 10, 1);
function disable_google_map_api($load_google_map_api) {
$load_google_map_api = false;
return $load_google_map_api;
}
function jeherve_contact_info_google_key() {
        return 'AIzaSyAV9b-2dNeq_JFYWjkX8bJcrjLnqob8HGI'; // Your API Key.
}
add_filter( 'jetpack_google_maps_api_key', 'jeherve_contact_info_google_key' );*/