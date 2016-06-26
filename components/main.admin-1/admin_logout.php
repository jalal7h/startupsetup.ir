<?
$GLOBALS['do_action'][] = 'admin_logout';

function admin_logout(){
	$rand=$_SESSION['hcfalf'];
	$su='ssus'.$rand;
	$sp='sspw'.$rand;
	$_SESSION['admin'.$su]=NULL;
	$_SESSION['admin'.$sp]=NULL;
	
	echo "<script> location.href='./?page=admin'; </script>";
	die();
}







