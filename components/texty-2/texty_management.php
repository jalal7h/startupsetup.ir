<?

# jalal7h@gmail.com
# 2016/05/21
# Version 2.0

$GLOBALS['cmp']['texty_management'] = 'پیام های پیشفرض';

function texty_management(){
	
	#
	# action
	switch ($_REQUEST['do']) {
		
		case 'save':
			texty_management_save();
			break;

	}

	#
	# forms
	?>
	<form method="post" class="texty_management" action="./?page=admin&cp=<?=$_REQUEST['cp']?>&do=save">
	<?
	if(!$rs = dbq(" SELECT * FROM `texty` WHERE 1 ")){
		e(__FUNCTION__.__LINE__);
	} else if(!dbn($rs)){
		;//
	} else while($rw = dbf($rs)){
		?>
		<div class="r">
			<div class="name"><?=$rw['name_fa']?> ..</div>
			<input type="text" placeholder="عنوان ..." name="title[<?=$rw['id']?>]" value="<?=$rw['title']?>" />
			<textarea placeholder="متن ..." name="content[<?=$rw['id']?>]"><?=$rw['content']?></textarea>
		</div>
		<?
	}
	?>
	
	<br><br>
	<hr>

	<div class='submit-div'>
		<input class="submit_button" type="submit" value="ثبت تغییرات"/>
	</div>

	</form>
	<?
}


function texty_management_save(){
	foreach ($_REQUEST['content'] as $id => $content) {
		$title = $_REQUEST['title'][$id];
		dbq(" UPDATE `texty` SET `title`='$title', `content`='$content' WHERE `id`='$id' LIMIT 1 ");
	}
}




