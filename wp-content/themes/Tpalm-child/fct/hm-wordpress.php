<?php
	
# ANNULER LE VERSIONNING

/*add_filter( 'script_loader_src', 'baw_delete_script_version', 15, 1 );
add_filter( 'style_loader_src', 'baw_delete_script_version', 15, 1 );*/
function baw_delete_script_version( $src ){
   $parts = explode( '?', $src );
   $ver = '?ver=' . md5( wp_salt( 'nonce' ) . $parts[1] );
   return $parts[0] . $ver;
}

