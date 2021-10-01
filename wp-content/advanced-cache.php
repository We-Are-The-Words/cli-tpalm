<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

define( 'WP_ROCKET_ADVANCED_CACHE', true );
$rocket_cache_path = '/Users/Waw3/Desktop/DEV/tpalm/wp-content/cache/wp-rocket/';
$rocket_config_path = '/Users/Waw3/Desktop/DEV/tpalm/wp-content/wp-rocket-config/';

if ( file_exists( '/Users/Waw3/Desktop/DEV/tpalm/wp-content/plugins/wp-rocket/inc/front/process.php' ) ) {
	include '/Users/Waw3/Desktop/DEV/tpalm/wp-content/plugins/wp-rocket/inc/front/process.php';
} else {
	define( 'WP_ROCKET_ADVANCED_CACHE_PROBLEM', true );
}