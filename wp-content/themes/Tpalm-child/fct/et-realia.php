<?php

// Function GeoLocalisation
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
  $details = json_decode(file_get_contents("https://ipinfo.io/$ip/json"));
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

// Function WP
add_action( 'wp_enqueue_scripts', 'add_ajax_biens_a_vendre_script');
add_action( 'wp_ajax_biens_a_vendre_action', 'biens_a_vendre_action' );
add_action( 'wp_ajax_nopriv_biens_a_vendre_action', 'biens_a_vendre_action' );

function add_ajax_biens_a_vendre_script() {
  wp_enqueue_script( 'script_ajax_bav', get_stylesheet_directory_uri().'/js/script_ajax_bav.js', array('jquery'), '1.0', true );
  // pass Ajax Url to script.js
  wp_localize_script('script_ajax_bav', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
  wp_localize_script('script_ajax_bav', 'locale', get_locale() );
}



/*function thegem_eteamsys_slugs_change() {

	$args = get_object_taxonomies("property_types");
    $args->rewrite["slug"] = _x('biens-a-vendre', 'slug-url', 'hm');
    //$args->rewrite["cptp_permalink_structure"] = "%property_types%";
    register_post_type($args->name, $args);   

    $args = get_post_type_object("property");
    $args->rewrite["slug"] = _x('bien-a-vendre', 'slug-url', 'hm');
    register_post_type($args->name, $args);

    $args = get_post_type_object("location");
    $args->rewrite["slug"] = _x('a-vendre', 'slug-url', 'hm');
    register_post_type($args->name, $args);


	register_post_type( 'property-type',
    array(
        "public" => true,
        'has_archive' => true,
        "rewrite" => [
            "with_front" => true,
            "slug" => _x('biens-a-vendre', 'slug-url', 'hm')
        ]
	    )
	);
     
}*/
//add_action('init', 'thegem_eteamsys_slugs_change', 10); 



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
                      include_once('../plugins/realia/includes/class-realia-template-loader.php');
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