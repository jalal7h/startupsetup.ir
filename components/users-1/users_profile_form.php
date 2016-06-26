<?

// -spi-

function users_profile_form(){
	
	switch($_REQUEST['do2']){
		case 'save':
			return users_profile_save();
	}

	if(!$uid = $_SESSION['uid']){
		e( __FUNCTION__ . __LINE__ );
	} else if(!$rw = table("users", $uid)){
		e( __FUNCTION__ . __LINE__ );
	} else {

		echo
		fm( array( 
			'name'=>'users_profile_form' , 
			'class'=>'users_profile_form' , 
			'action'=>'./?page='.$_REQUEST['page'].'&do='.$_REQUEST['do'].'&do2=save',
			'title_in_span'=>true,
			)).

		'<div class="d01">پروفایل کاربر</div>'.

		ff(array( lmtc("users:name"), 'n:name*'=>$rw, 'inDiv' )).
		ff(array( lmtc("users:username"), 'n:username*'=>$rw, 'inDiv' )).
		ff(array( lmtc("users:cell"), 'n:cell'=>$rw, 'inDiv' )).

		ff(array( lmtc("users:address"), 'n:address'=>$rw, 'inDiv' )).

		ff(array( lmtc("users:profile_pic") , 'n:profile_pic[]'=>$rw, 'inDiv', 'accept'=>'image/*' )).

		ff(array( lmtc("users:gender"), 'n:gender'=>$rw, 'option'=>array('1'=>'مذکر','2'=>'مونث'), 'inDiv' )).
		
		ff(array( lmtc("users:im_a"), 'n:im_a'=>$rw, 'inDiv' )).
		ff(array( lmtc("users:work_at"), 'n:work_at'=>$rw, 'inDiv' )).
		
		ff("hr").
		ff(array('t:submit','n:submit'=>'ثبت','class'=>'stash_input bgSameAsBG','inDiv'));

	}
}

