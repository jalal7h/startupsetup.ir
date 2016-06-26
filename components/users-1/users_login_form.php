<?
$GLOBALS['block_layers']['users_login_form'] = 'فرم ورود به محیط کاربری';
$GLOBALS['do_action'][] = 'users_login_form';

// -spi- 

function users_login_form(){
	
	switch ($_REQUEST['do']) {
		case 'login_do':
			$prompt = users_login_do();
			break;
	}

	if( $_SESSION['uid'] ){
		?>
		<script type="text/javascript">
			location.href = '<?=_URL?>/userpanel';
		</script>
		<?
		die();
	}

	?>
	<form autocomplete="off" method="post" action="./login" id="<?=__FUNCTION__?>" <?=($_REQUEST['popup']? 'class="popup" target="_top"': '')?> >
	<input type="hidden" name="do" value="login_do"/>
	<input type="hidden" name="refer" value="<?=$_SERVER['HTTP_REFERER']?>" />

		<div class="container"> 
			<div class="d01">ورود</div>
			<div class="d02">اگر هنور عضو نیستید، الان <a target="_top" href="./register">ثبت نام</a> کنید.</div>
			<input autocomplete="off" type="text" name="username" placeholder="email address" dir="ltr" />
			<input autocomplete="off" type="password" name="password" placeholder="password" dir="ltr" />
			<div class="d03">شما با کلیک کردن روی دکمه ورود موافقت می کنید که تمامی <a href="./terms">قوانین سایت</a> را پذیرفته اید.</div>
			<?=( $prompt ?'<div class="prompt">'.$prompt.'</div>' :'' )?>
			<input type="submit" class="stash_button bgSameAsBG" value="ورود" />
			<a class="d04" target="_top" href="./forgot">کلمه عبورام را فراموش کرده ام</a>
		</div>

		<img src="image_list/arrow.png" class="the_key" />
		
		<?=users_weblogin_form();?>

	</form>
	<?
}

