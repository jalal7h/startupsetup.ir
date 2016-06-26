<?php






define( 'Twitter_API_KEY', 'AzWCbO2ivwGMQze70ntcWC4IU' );
define( 'Twitter_API_SEC', 'ZXwvALhWXjFMCo9E6UhhE3ZmJUbecz1gxPTHpF7a2Rtw67WJxc' );
// define( 'Twitter_API_KEY', 'SCYT3Z58pVk1lAwlDyB6g6ZSZ' );
// define( 'Twitter_API_SEC', 'PBeukCXYzAIQtR0YyyuRlemOxGrYmFRAX7MZu3Bo2qAMeYrOXH' );























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
				"keys"    => array ( "id" => '', "secret" => '' ), 
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => Twitter_API_KEY, "secret" => Twitter_API_SEC ) 
			),
		),
		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,
		"debug_file" => "",
	);
