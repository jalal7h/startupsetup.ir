<?
$GLOBALS['block_layers']['stash_nav'] = 'نوار دسته بندی';

function stash_nav(){
	?>
	<div class="stash_nav_wrapper">
		<div class="stash_nav">
			<div class="container">
				<?

				$id = intval( $_REQUEST['id'] );
				$page_id = intval( $_REQUEST['page'] );
				
				if(! in_array($page_id, array("101","102")) ){
					die();
				
				} else switch( $_REQUEST['page'] ){
					
					case '101' :
						$its_a = "cat";
						break;
					
					case '102' :
						$its_a = "item";
						break;
				}

				?>
				<div class="stash_nav_<?=$its_a?>">
					
					<? stash_nav_logo() ?>
					<? stash_nav_cat_list() ?>
					
					<div class="social_head">ما در شبکه های اجتماعی</div>
					<div class="seo_share_link">
					<?
					foreach ( ['facebook','twitter','linkedin','google','pinterest','instagram'] as $i => $social ) {
						if( tab__temp('social_'.$social.'_flag') ){
							echo '<a href="'.tab__temp('social_'.$social.'_link').'" target="_blank" class="'.$social.'"><icon></icon></a>';
						}
					}
					?>

				</div>
				<?

				?>
			</div>
		</div>
		<img class="bgSameAsBG" src="image_list/threelines.png" id="stash_nav_3l" rel="<?=tab__temp('stash_nav_'.$its_a.'_open')?>" >
	</div>
	<?
}



















