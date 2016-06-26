
$(document).ready(function(){

	$('#header_search_form').on('submit', function(){
		q = $(this).find('input').val();
		_URL = $(this).find('input').attr('rel');
		if( q == '' ){
			;//
		} else {
			location.href = _URL + '/tag/' + q;
		}
		return false;
	});

});

	
