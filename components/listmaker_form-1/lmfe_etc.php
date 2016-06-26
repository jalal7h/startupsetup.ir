<?

# jalal7h@gmail.com
# 2016/04/21
# Version 1.0


function lmfe_moreButton__nsf( $info , $c ){

	# moreButton ( not for submit[we dont need] and file[defined in separate section] )

	if( $info['moreButton'] and (!in_array($info['type'],['submit','file'])) ){
		
		$c = 
			($info['inDiv']?"":"<span class=\"lmfe_more_c\">\n").
			
			"<span class=\"lmfe_more ".$info['type']."\" id=\"lmfe_more_".$info['formName']."_".$info['name']."\">\n".
			$c.
			"<icon></icon>\n".
			"</span>\n".
			
			($info['inDiv']?"":"</span>\n");
	}

	return $c;
}


function lmfe_tnit( $info, $skip_title=false ){
	
	#
	# title skip flag, if its already done	
	if( $GLOBALS[ 'lmfe_tnit-skip-'.$info['name'] ] ){
		$skip_title = true;
	}
	$GLOBALS[ 'lmfe_tnit-skip-'.$info['name'] ] = true;

	# echo 
	if(! $info['TitleInTag'] ){
		$c.= $info['PreTab']."<span class=\"lmfe_tnit\">".( $skip_title ? '' : $info['placeholder'])."</span>\n";
	}

	return $c;
}


function lmfe_inDiv_cover( $c_main , $info ){
	$c.= lmfe_inDiv_open( $info );
	$c.= $c_main;
	$c.= lmfe_inDiv_close( $info );
	return $c;
}
function lmfe_inDiv_open( $info ){
	
	if( $info['inDiv'] ){
		
		$c = "<div ".
			
			"class=\"lmfe_inDiv".($info['moreButton']?' lmfe_more_c':'')." ".$info['type']."\" ".
			
			( $info['type']=="submit" 
				? ""
				: "id=\"lmfe_inDiv_".$info['formName']."_".$info['name']."\""
			).
			
			">\n";

	}

	return $c;
}

function lmfe_inDiv_close( $info ){
	
	if( $info['inDiv'] ){
		$c = "</div>";
	}

	return $c;
}


