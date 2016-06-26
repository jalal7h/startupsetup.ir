
jQuery(document).ready(function($) {
	
	// fill the form by selecting page id
	$('#ipopup_mg_form_dest_2').on('change', function(){
		if( $(this).val()=='' ){
			$('#ipopup_mg_form_url_3').val('');
		} else {
			$('#ipopup_mg_form_url_3').val( _URL + '/?page=' + $(this).val() );
		}
	});

	// form validation
	$('form.ipopup_mg_form').on('submit', function(){
		if( $('#ipopup_mg_form_page_id').val() == $('#ipopup_mg_form_dest_2').val() ){
			cl('same');
			return false;
		} else {
			cl('ok');
			return true;
		}
	});

});


