<?php

function f_admin__a_html__header(){
	?>
	<html>
	<head>
		<title>.:: <?=tab__temp('main_title')?> - Administrator ::.</title>
		<link rel="shortcut icon" href="image_list/favicon.ico" >
		<META http-equiv=Content-Type content="text/html; charset=utf-8">
		
		<script type="text/javascript" src="modules/jquery/jquery-1.12.3.min.js"></script>

		<link rel="stylesheet" href="modules/font-awesome-4.6.1/css/font-awesome.min.css">
		
		<link href="templates/<?=_THEME?>/font/font.css" rel="stylesheet" type="text/css" />
		<link href="templates/<?=_THEME?>/css/template-admin.css" rel="stylesheet" type="text/css" />
		<link href="./styles-admin.css" rel="stylesheet" type="text/css" />
		<script src="./scripts-admin.js"></script>
	
		<script type="text/javascript">
			var _URL = '<?=_URL?>';	
		</script>

	</head>
	<body leftmargin="0" topmargin="0" rightmargin="0" downmargin="0" marginheight="0" marginwidth="0">
	<?
}

function f_admin__a_html__top(){
	?>
	<table height="100%" width="100%" cellpadding="0" cellspacing="0" >
	<tr><td>
		<div class="logo-container"></div>
	</td></tr>
	<tr height="100%"><td valign="top" >
	<?
}

function f_admin__a_html__down(){
	?>
	</td></tr>
	<tr><td>
		<center>
		<table cellpadding="0" cellspacing="0" width="80%">
			<tr height="1" bgcolor="#bdbdbd"><td></td></tr>
			<tr height="20"><td align="left" class="tx1">&copy; <a target="_blank" href="http://parsunix.com">Parsunix</a> <?=date("Y")?></td></tr>
			<tr height="10"><td></td></tr>
		</table>
		</center>
	</td></tr>
	</table>
	<?
}

function f_admin__a_html__footer(){
	?>
	</body>
	</html>
	<?
}

function f_admin__a_html__copyright(){
	;//
}






