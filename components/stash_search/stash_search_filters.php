<?


function stash_search_filters(){

	?>
	<div class="filters">
		
		<select id="stash_search_filters_money" name="filter_money"><option value="0">.. نوع ..</option><?=cat_display('filter_money', false ); ?></select>
		<script type="text/javascript">
			$('form.stash_search select[name="filter_money"]').val('<?=intval($_REQUEST['filter_money'])?>');
		</script>

		<select id="stash_search_filters_platform" name="filter_platform"><option value="0">.. پلت فورم ..</option><?=cat_display('filter_platform', false ); ?></select>
		<script type="text/javascript">
			$('form.stash_search select[name="filter_platform"]').val('<?=intval($_REQUEST['filter_platform'])?>');
		</script>

		<select id="stash_search_filters_lang" name="filter_lang"><option value="0">.. زبان ..</option><?=cat_display('filter_lang', false ); ?></select>
		<script type="text/javascript">
			$('form.stash_search select[name="filter_lang"]').val('<?=intval($_REQUEST['filter_lang'])?>');
		</script>

	</div>
	<?

}


