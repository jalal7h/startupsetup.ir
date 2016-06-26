<?

function stash_search_trending(){
	?>
	<input type="hidden" name="trending" value="<?=$_REQUEST['trending']?>"/>
	<div class="trending">
		<a rel="prio" <?=($_REQUEST['trending']=='prio' ?'class="cur"' :'' )?> >اولویت</a>
		<a rel="date" <?=($_REQUEST['trending']=='date' ?'class="cur"' :'' )?> >جدیدترین ها</a>
		<a rel="upvote" <?=($_REQUEST['trending']=='upvote' ?'class="cur"' :'' )?> >بالاترین ها</a>
		<a rel="comment" <?=($_REQUEST['trending']=='comment' ?'class="cur"' :'' )?> >پرحاشیه ترین ها</a>
	</div>
	<?
}


