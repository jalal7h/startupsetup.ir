<?

function is_table( $table ){
	if(!$rs = dbq(" SHOW TABLES LIKE '$table' ")){
		e(__FUNCTION__.__LINE__);
	} else if(dbr($rs,0,0)==$table){
		return true;
	} else {
		return false;
	}
}

