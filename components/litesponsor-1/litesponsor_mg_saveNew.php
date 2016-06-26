<?

function litesponsor_mg_saveNew(){
	
	#
	# insert
	$name = trim($_REQUEST['name']);
	$link = trim($_REQUEST['link']);
	if(! dbq(" INSERT INTO `litesponsor` (`name`,`link`) VALUES ('$name','$link') ") ){
		echo dbe();
	}
	#

	#
	# upload photo
	$id = dbi();
	listmaker_fileupload( 'litesponsor', $id );
	#

}


