<?

# jalal7h@gmail.com
# 2015/09/21
# Version 1.0

$GLOBALS['block_layers']['userpanel_desk'] = 'میز کاربری';

function userpanel_desk(){
	
	if( ! user_logged() ){
		?>
		<script type="text/javascript">
			location.href = './login';
		</script>
		<?
		die();
	}

	#
	# fix if there is no "do" selected.
	if(!$_REQUEST['do']){
		foreach($GLOBALS['userpanel_item'] as $_REQUEST['do'] => $name){
			break;
		}
	}

	$res = false;
	echo "<div class='userpanel_desk'>";

	#
	# check to run the selected "do".
	if(!$_SESSION['uid']){
		die();	
	} else if(!$do = $_REQUEST['do']){
		return false;
	} else foreach($GLOBALS['userpanel_item'] as $func => $name){
		if($func==$do){
			$res = call_user_func($func);
			break;
		}
	}
	
	?>
	<style type="text/css">
		.userpanel_menu {
			/*display: inline-block;*/
			opacity: 1.0;
		}
	</style>
	<?
	
	echo "</div>";
	return $res;
}




