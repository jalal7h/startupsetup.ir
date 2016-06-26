<?

function is_component( $component ){
	if(!$dp = opendir("components")){
		e(__FUNCTION__.__LINE__);
	} else while( $d = readdir($dp) ){
		$d_arr = explode("-", $d);
		if($d_arr[0] == $component){
			closedir($dp);
			return true;
		}
	}
	closedir($dp);

	return false;
}

