<?

function fbcm_form( $table_name , $table_id , $comment_id=0, $page_id=0 ){

	# 
	# no login / no form
	if(! user_logged() ){
		if( $comment_id==0 ){
			$c.= "<div class='fbcm_form_login_request'>ثبت نظر فقط برای کاربران سایت مجاز است.<br>برای ادامه <a href='./register' class='register_popup'>ثبت نام</a> کنید.</div>";
		}

	} else {
		$c.= '
		<form class="form" method="post" autocomplete="off" rel="fbcm_'.$table_name.'_'.$table_id.'_'.$comment_id.'_'.$page_id.'" onsubmit="return fbcm_saveComment( this )">
			'.useravatar( $_SESSION['uid'] ).'
			<input type="text" name="comment" rel="'.$table_name.':'.$table_id.":".$comment_id.":".$page_id.'" autocomplete="off" placeholder="نظر شما ..." onclick="fbcm_inputCommentCl(this)" onblur="fbcm_inputCommentBl(this)">
			<input type="submit" value="ارسال" />
		</form>';
	}

	return $c;

}

