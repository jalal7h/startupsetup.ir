
/*index*/

$(document).ready(function(){

	var bgc = the_list_of_dynamic_colors;

	nci = Math.floor((Math.random() *  bgc.length ) + 1);
	
	setInterval(function(){
		nci++;
		nci%=bgc.length;

		// cl(nci);

		$('body, .bgSameAsBG').css({'background-color': "#"+bgc[ nci ] });
		$('.clSameAsBG').css({'color': "#"+bgc[ nci ] });
		
		// background hover same as bodybg
		$('.bghSameBG').on('hover',function(){
		    $(this).css({backgroundColor: "#"+bgc[ nci ] },100);
		}).on('mouseleave', function(){
		    $(this).css({backgroundColor: "" },100);
		});

		// color hover same as bodybg
		$('a, .clhSameBG').on('hover',function(){
		    $(this).css({color: "#"+bgc[ nci ] },100);
		}).on('mouseleave', function(){
		    $(this).css({color: "" },100);
		});

	}, 30000);
});

