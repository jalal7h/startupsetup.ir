<?

function litesponsor_mg_saveEdit(){

	if(! $id = $_REQUEST['id'] ){
		echo "err - ".__LINE__;
	
	} else if(! $rw_litesponsor = table("litesponsor",$id) ){
		echo "err - ".__LINE__;
	
	} else {

		#
		# upload photo
		listmaker_fileupload( 'litesponsor', $id );

		#
		# update db
		return dbs( "litesponsor", ['name','link'], ['id'] );
	}

	return false;
}


