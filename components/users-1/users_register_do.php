<?

function users_register_do(){
	
	if(!$username = strtolower(trim($_REQUEST['username']))){
		echo "<script>alert('لطفا آدرس ایمیل خود را وارد کنید.'); history.go(-1);</script>";
		die();
	
	} else if(!$password = trim($_REQUEST['password'])){
		echo "<script>alert('لطفا آدرس ایمیل خود را وارد کنید.'); history.go(-1);</script>";
		die();
	
	} else if(!$name = trim($_REQUEST['name'])){
		echo "<script>alert('لطفا آدرس ایمیل خود را وارد کنید.'); history.go(-1);</script>";
		die();
	}

	$cell = trim($_REQUEST['cell']);

	if($_SESSION['uid']){
		?>
		<script>location.href = '<?=_URL?>/userpanel';</script>
		<?
		die();
	
	} else if(!$rs = dbq(" SELECT COUNT(*) FROM `users` WHERE `username`='$username' LIMIT 1 ")){
		echo "<script>alert('اختلال در پایگاه داده'); history.go(-1);</script>";
	
	} else if(dbr($rs,0,0)=='1'){
		echo "<script>alert('نام کاربری / آدرس ایمیل مورد نظر قبلا ثبت شده است'); history.go(-1);</script>";
	
	} else if(!dbq(" INSERT INTO `users` (`username`,`password`,`name`,`cell`) VALUES ('$username','$password','$name','$cell') ")){
		echo "<script>alert('اختلال در ثبت نام'); history.go(-1);</script>";
	
	} else {

		#
		# sending email to client after registration
		if( is_component("texty") ){
			texty_msg( $username , "users_register_do_msg" , array(
				"main_title"=>tab__temp("main_title"),
				"user_name"=>$name,
				"username"=>$username,
				"password"=>$password,
				"_URL"=>_URL,
			) );
		}
		
		#
		# congragulating cient
		echo template_engine("users_register_do");

		# 
		# loging in client
		$_SESSION['uid'] = table("users", $username, "id", "username");

		return true;
	}

	die();
}

