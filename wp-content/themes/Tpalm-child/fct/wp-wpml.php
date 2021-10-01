<?php
	
add_filter( 'WPML_filter_link', 'wpml_fix_menu_link', 10, 2);
function wpml_fix_menu_link( $url, $data ) {
 
    if( is_home() || is_front_page() ) {
        global $sitepress;
 
        if( $data['code'] == $sitepress->get_default_language() ) {
            $url = get_site_url('', '/');
        } else {
            $url = add_query_arg( 'lang', $data['code'], get_site_url('', '/') );
        }
    }
 
    return $url;
}