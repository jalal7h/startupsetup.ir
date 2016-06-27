
jQuery(document).ready(function($) {
	$('#lmfe_stash_management_form_website').on('blur', function(){
		val = $(this).val();
		if( val=='' ){

		} else if( val.substr(0,7)=='http://' ){

		} else if( val.substr(0,8)=='https://' ){

		} else {
			$(this).val( 'http://' + val );
		}
	});
});	