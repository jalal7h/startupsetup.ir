
// -spi-

$(document).ready(function($) {
	
	wlp = window.location.pathname;
	this_page = wlp.substr( wlp.length -9 , 9 );

	if( this_page!='/register' ){
	
		// register
		$('a[href="'+_URL+'/register"]').on('mousedown', function(e){
			hitbox('<iframe scrolling=no src="./?do_action=users_register_form&covered=1&popup=1"></iframe>', 600, 465 );
			$('#offer_new_item_hitbox a').css( {'background-color':'#'+the_list_of_dynamic_colors[0]} );
			e.preventDefault();
		}).on('click', function(e){
			e.preventDefault();
		});
	
	}

});

