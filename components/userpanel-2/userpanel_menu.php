<?
$GLOBALS['block_layers']['userpanel_menu'] = 'منوی کاربری';

function userpanel_menu(){
	
	if(! $user_id = $_SESSION['uid'] ){
		return true;
	} else if(! $rw = table("users",$user_id) ){
		return false;
	} else if( $_REQUEST['page']!=14 ){
		return true;
	}

	?>
	<style>
	<?
	foreach( $GLOBALS['userpanel_icon'] as $n => $before_content ){
		?>
		.userpanel_menu > div > a:nth-child(<?=( (++$a_ctr)+1 ) ?>):before {
			content: "<?=$before_content?>";
		}
		<?
	}
	?>
	</style>
	<?

	echo '<div class="userpanel_menu">';

	if( $rw['profile_pic']!='' ){
		echo '<a class="profile_avatar" href="./?page='.$_REQUEST['page'].'&do=userprofile_form"><img src="resize/320x500/'.$rw['profile_pic'].'" /></a>';
	} else {
		echo '<div class="profile_avatar"><img src="'._URL.'/image_list/avatar-not-found.png"/></div>';
	}

	echo '<div class="links">';
	if(!$_REQUEST['do']){
		foreach($GLOBALS['userpanel_item'] as $_REQUEST['do'] => $name){
			break;
		}
	}

	echo '<a href="'._URL.'"><span>صفحه اصلی</span></a>';
	foreach($GLOBALS['userpanel_item'] as $func => $name){
		echo '<a href="'._URL.'/?page='.$_REQUEST['page'].'&do='.$func.'"'.($_REQUEST['do']==$func?" class=current ":"").'><span>'.$name.'</span></a>';
	}

	?>
	</div>
	</div>
	<?
}





