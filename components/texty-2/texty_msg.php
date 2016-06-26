<?

# jalal7h@gmail.com
# 2016/05/21
# Version 2.0

/*
texty_msg( 
	"admin", "nb_adminCoponCountCheck" , 
	array(
		"netbarg_name"=>table("netbarg",$netbarg_id,"name"), 
		"netbarg_id"=>$netbarg_id,
	)
);
*/

# who : admin / user / or an email address
# template_name : a template name / or a text message
# vars : something that we need to put it into the template_name content

function texty_msg( $who , $template_name , $vars ){
	#
	switch ($who) {

		case 'admin':
			$to = setting('contact_email_address_0');
			break;

		case 'user':
			if(! $uid = $_SESSION['uid'] ){
				return false;
			} else if(! $rw_users = table("users", $uid) ){
				return false;
			} else {
				$to = $rw_users['username'];
				// its OK
			}
			break;

		default:
			$to = $who;
			break;
	}

	#
	$subject = texty( $template_name )[0];
	$content = texty( $template_name )[1];

	foreach ($vars as $k => $v) {
		$subject = str_replace('{'.$k.'}', $v, $subject);
		$content = str_replace('{'.$k.'}', $v, $content);
	}

	if( $rw_users ){
		# email
		$subject = str_replace('{user_email}', $rw_users['username'], $subject);
		$content = str_replace('{user_email}', $rw_users['username'], $content);
		# id
		$subject = str_replace('{user_id}', $rw_users['id'], $subject);
		$content = str_replace('{user_id}', $rw_users['id'], $content);
		# name
		$subject = str_replace('{user_name}', $rw_users['name'], $subject);
		$content = str_replace('{user_name}', $rw_users['name'], $content);
	}

	#
	$from = "noreply@".str_replace("www.", "", $_SERVER['SERVER_NAME']);
	
	return xmail( $to , $subject , $content , $from );

}



