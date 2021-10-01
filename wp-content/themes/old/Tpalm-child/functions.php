<?php

/*          FLUSH

add_action('init','flush_rules');
function flush_rules(){
flush_rewrite_rules();
}

*/


/*
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

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


function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function getLocationOfIp($ip){
    $details = json_decode(file_get_contents("http://ipinfo.io/$ip/json"));
    if($details->city !== '' && $details->postal !== ''){
        return $details->city . ' ' . $details->postal;
    }else{
        return $details->city . ' ' . $details->postal . ' ' . $details->country;
    }
}
function getdistanceGoogleAPI ($origin, $destination, $latitude = '',$longitude = '') {
    $origin = rawurlencode($origin);
    if($destination !==''){
        $destination = rawurlencode($destination);
        $google_API = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=$origin&destinations=$destination&key=AIzaSyAcEe-HruWl1WZmXYk0JRbiDQJwfn6uUzI"));
    }else{
        $destination = rawurlencode($latitude . ',' . $longitude);
        $google_API = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=$origin&destinations=$destination&key=AIzaSyAcEe-HruWl1WZmXYk0JRbiDQJwfn6uUzI"));
    }
    if ($google_API->rows[0]->elements[0]->status !== 'OK'){
        return false;
    }
    else {
       return $google_API->rows[0]->elements[0]->distance->value;        
    }
}


/*
function thegem_portfolio_post_type_change() {
    $args = get_post_type_object("thegem_pf_item");
    $args->rewrite["slug"] = "nos-realisations";
    register_post_type($args->name, $args);
}
add_action('init', 'thegem_portfolio_post_type_change', 10); 
function thegem_eteamsys_slugs_change() {
    $args = get_post_type_object("property-type");
    $args->rewrite["slug"] = "biens-a-vendre";
    register_post_type($args->name, $args);

    $args = get_post_type_object("properties");
    $args->rewrite["slug"] = "bien-a-vendre";
    register_post_type($args->name, $args);

    $args = get_post_type_object("location");
    $args->rewrite["slug"] = "a-vendre";
    register_post_type($args->name, $args);
}
add_action('init', 'thegem_eteamsys_slugs_change', 10); 
*/

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

function test_b(){
    if(isset($_GET['dev'])){
        echo '<pre>';
        global $wp_scripts, $wp_styles;

        var_dump($wp_scripts);


        die;
    }
}
//add_action('wp_enqueue_scripts', 'test_b', 10);


add_action('init', 'myoverride', 100);
function myoverride() {
    remove_action('wp_head', array(visual_composer(), 'addMetaData'));
}
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

function analytics_add_id() {
	return uniqid ();
}
function remove_revslider_meta_tag() {
 
    return '';
    
}
 
add_filter( 'revslider_meta_generator', 'remove_revslider_meta_tag' );
function widget($atts) {
    
    global $wp_widget_factory;
    
    extract(shortcode_atts(array(
        'widget_name' => FALSE
    ), $atts));
    
    $widget_name = wp_specialchars($widget_name);
    
    if (!is_a($wp_widget_factory->widgets[$widget_name], 'WP_Widget')):
        $wp_class = 'WP_Widget_'.ucwords(strtolower($class));
        
        if (!is_a($wp_widget_factory->widgets[$wp_class], 'WP_Widget')):
            return '<p>'.sprintf(__("%s: Widget class not found. Make sure this widget exists and the class name is correct"),'<strong>'.$class.'</strong>').'</p>';
        else:
            $class = $wp_class;
        endif;
    endif;
    
    ob_start();
    the_widget($widget_name, $instance, array('widget_id'=>'arbitrary-instance-'.$id,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ));
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
    
}
add_shortcode('widget','widget'); 



function add_ajax_biens_a_vendre_script() {
    wp_enqueue_script( 'script_ajax_bav', get_stylesheet_directory_uri().'/js/script_ajax_bav.js', array('jquery'), '1.0', true );

    // pass Ajax Url to script.js
    wp_localize_script('script_ajax_bav', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
    wp_localize_script('script_ajax_bav', 'locale', get_locale() );
}
add_action('wp_enqueue_scripts', 'add_ajax_biens_a_vendre_script');
add_action( 'wp_ajax_biens_a_vendre_action', 'biens_a_vendre_action' );
add_action( 'wp_ajax_nopriv_biens_a_vendre_action', 'biens_a_vendre_action' );

function biens_a_vendre_action() {

    $postids = json_decode($_POST['postids']);


    $locationDistancesArr = array();
    $userIpLocation = getLocationOfIp(getRealIpAddr());
        //FIRST WE BUILD THE ASSOC ARRAY OF DISTANCES
    foreach ($postids as $postId) {
        $distance = getdistanceGoogleAPI($userIpLocation, get_post_meta( $postId, 'property_address', true ), get_post_meta( $postId, 'property_map_location_latitude', true ), get_post_meta( $postId, 'property_map_location_longitude', true ));
        $distance = ($distance === false)?999999:$distance;
        if(!isset($locationDistancesArr[$distance])) $locationDistancesArr[$distance] = array();
        array_push($locationDistancesArr[$distance], $postId);
    }
    ksort($locationDistancesArr);

    $postIdsOrder = array();//new way
    foreach($locationDistancesArr as $dist => $locationsArr):
        foreach($locationsArr as $postIdLocation):
            array_push($postIdsOrder, $postIdLocation);
        endforeach;
    endforeach;
    echo json_encode($postIdsOrder);
    die;//end new way



    ob_start();
    $index = 0;
    //old way with ob start (not working)
    foreach($locationDistancesArr as $dist => $locationsArr):
        foreach($locationsArr as $postIdLocation):
            foreach ($postids as $postId):
                if($postIdLocation !== $postId) continue;//bypass
            ?>
                <div class="property-container" data-postid="<?=$postIdLocation?>">
                    <?php //var_dump('dist : ' . $dist,'post id : '.$postIdLocation);
                        $property = get_post( $postIdLocation );
                        include_once('../../plugins/realia/includes/class-realia-template-loader.php');
                        echo Realia_Template_Loader::load( 'properties/' . 'row', array( 'property' => $property ) );
                    ?>
                </div>
            <?php endforeach; ?>
            <?php  // ci dessous peut lancer une erreur car $instance pas défini
            if ( 0 == ( ( $index + 1 ) % $instance['per_row'] ) && 1 != $instance['per_row'] && Realia_Query::loop_has_next() ) : ?>
                </div><div class="properties-row">
            <?php endif;
            $index++;
        endforeach;
    endforeach;

    $retour = ob_get_contents();
    ob_end_clean();

    echo $retour;
    //fr_BE
    //nl_BE

    die();
}