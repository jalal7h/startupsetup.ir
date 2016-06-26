<?php






define( 'Facebook_API_ID', '1016404841757956' );
define( 'Facebook_API_SEC', '35313b67438681d908812972f40c2bd7' );




















/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

#######################################################################
#
# set defines
$URLFOTDEFINE = "http://".str_replace("/","",$_SERVER['HTTP_HOST']);
$SUBFOLDER = substr( dirname($_SERVER['SCRIPT_NAME']),1,strlen(dirname($_SERVER['SCRIPT_NAME'])) );
if(strlen($SUBFOLDER)!=0) $URLFOTDEFINE .= "/".$SUBFOLDER;
define('_URL',$URLFOTDEFINE);
#
#######################################################################

$config =array(
		"base_url" => _URL."/hybridauth/index.php", 
		"providers" => array ( 

			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => '', "secret" => '' ), 
			),

			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => Facebook_API_ID , "secret" => Facebook_API_SEC ), 
          		"scope"   => "email, user_about_me, user_birthday, user_hometown",
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => '', "secret" => '' ) 
			),
		),
		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,
		"debug_file" => "",
	);
