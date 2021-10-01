<?php
	
function eteamsys_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'eteamsys_disable_comments_post_types_support');


function eteamsys_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'eteamsys_disable_comments_status', 20, 2);
add_filter('pings_open', 'eteamsys_disable_comments_status', 20, 2);


function eteamsys_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'eteamsys_disable_comments_hide_existing_comments', 10, 2);


function eteamsys_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'eteamsys_disable_comments_admin_menu');


function eteamsys_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(get_site()); exit;
	}
}
add_action('admin_init', 'eteamsys_disable_comments_admin_menu_redirect');
