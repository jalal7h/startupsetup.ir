<?

function users_changepassword_form(){
	
	switch($_REQUEST['do2']){
		case 'save':
			return users_changepassword_save();
	}

	echo "<form id=users_changepassword_form method=post action='./?page=".$_REQUEST['page']."&do=".$_REQUEST['do']."&do2=save' onsubmit='return checkform_uchform();' name=uchform >
		<input type='hidden' name='email' value='$email'>
		<input type='hidden' name='h' value='".$_REQUEST['h']."'>
			<div class=container >
				<div class=d01>تغییر رمز عبور!</div>
				
				<div>
					<span>کلمه عبور فعلی :‌ </span>
					<input placeholder='Old password' type='password' name='old_password' />
				</div>
				
				<div>
					<span>کلمه عبور جدید :‌ </span>
					<input placeholder='New password' type='password' id='password1' />
				</div>
				
				<div>
					<span>تکرار کلمه عبور : </span>
					<input placeholder='Repeat password' type='password' id='password2' name='password' />
				</div>
				
				<div>
					<span></span>
					<input type='submit' class='submit_button' value='تغییر رمز' />
				</div>
				
			</div>
		</form>";
		?>
		<script>
		function checkform_uchform(){
			if(uchform.old_password.value==''){
				alert("لطفا رمز قبلی را وارد کنید");
			} else if(document.getElementById("password1").value==''){
				alert("لطفا رمز جدید را وارد کنید.");
			} else if(document.getElementById("password1").value!=document.getElementById("password2").value){
				alert("کلمه عبور مطابقت ندارد!");
			} else {
				return true;
			}
			return false;
		}
		</script>
		<?
}

