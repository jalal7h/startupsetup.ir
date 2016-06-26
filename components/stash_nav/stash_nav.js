
$(document).ready(function(){
	
	$('#stash_nav_3l').on('click', function(){
		stash_nav_width = $('.stash_nav').css('width');
		if( stash_nav_width=='0px' ){
			// console.log('opening');
			$('.stash_nav').css({ 'width':'220px' });
			$('main.etc,main.index').css({ 'left':'110px' });
		} else {
			// console.log('closing');
			$('.stash_nav').css({ 'width':'0px' });
			$('main.etc,main.index').css({ 'left':'0px' });
		}
	});

	if( $('#stash_nav_3l').attr('rel')=='1' ){
		setTimeout( function(){
			// alert("Hello"); 
			$('#stash_nav_3l').trigger('click');
		}, 400);
	}
})

