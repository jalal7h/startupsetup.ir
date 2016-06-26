<?

function stash_items_list_this( $rw ) {
	
	$table_name = "item";
	$table_id = $rw['id'];
	$upvote = upvote_form( $table_name , $table_id );
	$number_of_comments = fbcm_count( $table_name , $table_id );

	$logo = $rw['stash_icon'];
	$name = trim( strip_tags( $rw['name'] ) );
	$brief = trim( strip_tags( $rw['brief'] ) );
	$kw = stash_item_kw( $rw );
	$link = stash_item_link( $rw );
	$share = seo_share_link( $link );
	
	// var_dump($rw);
	// echo "<hr>";
	?>
	<div class="r<?=( $rw['pin_flag']==true ?' pin' :'' )?>">
		<?=$upvote?>
		<a href="<?=$link?>"><img class="logo" src="<?=_URL."/".$logo?>" alt="<?=$name?>" /></a>
		<div class="info">
			<a class="head" href="<?=$link?>"><?=$name?></a>
			<a class="number_of_comments" <?=( $number_of_comments>0 ?'href="'.$link.'#comments"' :'style="color: #aaa; cursor: default;"' ) ?> ><?=$number_of_comments?></a>
			<div class="desc"><?=$brief?></div>
			<?=$kw?>
		</div>
		<?=$share?>
	</div>
	<?
}



