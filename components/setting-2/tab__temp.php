<?

function tab__temp($key='', $insert=false, $val=NULL){
	if(!$key){
		return false;
	}
	if($insert==true){
		if(!$res=dbq(" update `_temp` set `_val`='$val' where `_key`='$key' limit 1 ")){
			;// do nothing
		}
	}
	if(!$res=dbq(" select `_val` from `_temp` where `_key`='$key' limit 1 ")){
		;// do nothing
	} else if(dbn($res)!=1) {	
		;// do nothing
	} else {
		return dbr($res,0,0);
	}
	return false;
}