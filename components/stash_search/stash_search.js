
$(document).ready(function($) {
	
	// dokme zarebin form e search
	$('form.stash_search icon.submit').on('click', function(e){
		// console.log('ss');
		// e.preventDefault();
		$('form.stash_search').submit();
	});

	//
	// q_new_status
	var q_new_status = "out";
	$('form.stash_search input[name="q_new"]').on('focus',function(){
		q_new_status = "in";
		console.log('in');
	}).on('blur',function(){
		q_new_status = "out";
		console.log('out');
	});

	$('form.stash_search').on('submit', function(e){
		
		// get variables
		var q_old = $(this).find('input[name="q"]').val();
		var q_new = $(this).find('input[name="q_new"]').val();
		
		// clear the search box
		$(this).find('input[name="q_new"]').val('');

		// no new word
		if( q_new_status=='in' ){
			if( q_new=='' ){
				console.log('its empty');
				e.preventDefault();
			
			// // add new word and submit
			} else {
				console.log('its not empty');
				$(this).find('input[name="q"]').val( q_old + ' ' + q_new );
			}
		}

		// e.preventDefault();
	});



	// taglist a click
	$('form.stash_search .taglist > a').on('click', function(e){
		
		// q_but
		q_but = $(this).attr('rel');
		console.log( q_but );

		if( q_but=='90909' ){
			cat_id = $(this).attr('cat_id');
			$('#stash_search_cat_'+cat_id).prop('checked', false);
		
		} else if( q_but=='90908' ){
			filter = $(this).attr('filter');
			$('#stash_search_filters_'+filter).val( '0' );

		} else {
			$('form.stash_search input[name="q"]').val( q_but );
		}

		$('form.stash_search').submit();
		e.preventDefault();
	});



	// cats click
	$('form.stash_search .cats input[type="checkbox"]').on('click', function(){
		$('form.stash_search').submit();
	});


	// filter change
	$('form.stash_search .filters select').on('change', function(){
		$('form.stash_search').submit();
	});

	// trending
	$('form.stash_search .trending a').on('click', function(e){
		var trending = $(this).attr('rel');
		$('form.stash_search input[name="trending"]').val( trending );
		$('form.stash_search').submit();
		e.preventDefault();
	})

	$('form.stash_search .listmaker_list_paging > a').on('click', function(e){
		p = $(this).html();
		$('form.stash_search input[name="p"]').val( p-1 );
		console.log(p);
		$('form.stash_search').submit();

		e.preventDefault();
	});

});


