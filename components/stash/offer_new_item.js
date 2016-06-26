
$(document).ready(function(){

	// on click of plus	
	$('#offer_new_item, #hml_plus').on('click', function(e){
		
		console.log( the_list_of_dynamic_colors[0] );

		hitbox('<div class="boxborder" id="offer_new_item_hitbox"><img src="'+_URL+'/image_list/offer_new_item.png"/><span>شما میتوانید با ورود به محیط کاربری نسبت به ثبت آیتم مورد نظر خود اقدام نمایید</span><a href="./userpanel" class="submit_button bgSameAsBG">ورود به محیط کاربری</a></div>', 400, 430 );
		$('#offer_new_item_hitbox a').css( {'background-color':'#'+the_list_of_dynamic_colors[0]} );
		e.preventDefault();
	});

});

	
