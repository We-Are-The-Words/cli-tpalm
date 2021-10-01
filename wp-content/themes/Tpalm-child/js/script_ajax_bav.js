;(function($){

	var $propertiesAjxBav = $('#properties-ajax-bav');
	if($propertiesAjxBav.length){
		var postsIds = [],
			$properties = $propertiesAjxBav.find('.property-container');

		$properties.each(function(i,e){
			postsIds.push($(e).data('postid'));
		}).promise().done(function(){
			$.post(
			    ajaxurl,
			    {
			        'action': 'biens_a_vendre_action',
			        'postids': JSON.stringify(postsIds)
			    },
			    function(response){
		            var postIdsOrder = JSON.parse(response),
		            	newHtml = '';
		            console.info(postIdsOrder)
		            for(var i in postIdsOrder){
		            	var $el = $properties.filter('[data-postid="'+postIdsOrder[i]+'"]'),
		            		$clone = $el.clone();
		            	$clone.wrap('<div>');
		            	newHtml += $clone.parent().html();
		            }
		            $propertiesAjxBav.html(newHtml);
		        }
			);
		});
	}
	
	var $path = window.location.pathname;
	var $urlReal = "/nl/realisaties/";
	var $urlBav = "/nl/eigendom-te-koop/";
	
	if ( $path.includes($urlReal) ) {
		
		console.log('Casse couille - Breacrumb modifié dans script ajax bav');
		jQuery('.breadcrumbs .thegem_pf_item-root').html('<span property="name">Onze realisaties</span>');
		jQuery('.breadcrumbs .thegem_pf_item-root').attr('title', 'Go to onze realisaties');
	}
	if ( $path.includes($urlBav) ) {
		
		console.log('Casse couille - Breacrumb modifié dans script ajax bav');
		jQuery('.breadcrumbs .property-root').html('<span property="name">Te koop</span>');
		jQuery('.breadcrumbs .property-root').attr('title', 'Go to te koop');
	}
	
	
})(jQuery);

var disableSubmit = false;
jQuery('input#contactEnvoyer[type="submit"]').click(function() {
    jQuery(':input[type="submit"]').attr('value',"Validation en cours... - Validatie aan de gang...")
    jQuery(':input[type="submit"]').attr('disabled','disabled');
    if (disableSubmit == true) {
        jQuery(':input[type="submit"]').attr('disabled','disabled');
        return false;
    }
    disableSubmit = true;
    return true;
})

var wpcf7Elm = document.querySelector( '.wpcf7' );
wpcf7Elm.addEventListener( 'wpcf7submit', function( event ) {
    jQuery(':input[type="submit"]').attr('value',"send")
    jQuery(':input[type="submit"]').removeAttr('disabled');
    disableSubmit = false;
}, false );