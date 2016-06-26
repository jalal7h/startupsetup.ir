<?
$GLOBALS['cmp']['setting_management'] = 'تنظيمات سايت';

// -spi-

function setting_management(){

	// var_dump($_REQUEST);

	if($_REQUEST['do']=='save_websiteconfiguration'){
		tab__temp('main_title', true, $_REQUEST['main_title']);
		tab__temp('keywords', true, $_REQUEST['keywords']);
		tab__temp('websitedescription', true, $_REQUEST['websitedescription']);
		tab__temp('template', true, $_REQUEST['template']);
		tab__temp('sms_state', true, $_REQUEST['sms_state']);
		tab__temp('webstatus_signup', true, $_REQUEST['webstatus_signup']);
		tab__temp('webstatus_main', true, $_REQUEST['webstatus_main']);
		tab__temp('money_unit', true, $_REQUEST['money_unit']);
		tab__temp('html_footer_copyright', true, $_REQUEST['html_footer_copyright']);
		tab__temp('html_footer_about', true, $_REQUEST['html_footer_about']);

		tab__temp('the_list_of_dynamic_colors', true, $_REQUEST['the_list_of_dynamic_colors']);
		tab__temp('stash_nav_cat_open', true, $_REQUEST['stash_nav_cat_open']);
		tab__temp('stash_nav_item_open', true, $_REQUEST['stash_nav_item_open']);
		tab__temp('the_website_motto', true, $_REQUEST['the_website_motto']);

		tab__temp('tags_on_header', true, $_REQUEST['tags_on_header']);
		tab__temp('tags_on_search', true, $_REQUEST['tags_on_search']);

		tab__temp('html_extra_tags', true, $_REQUEST['html_extra_tags']);

		tab__temp('plus_footer_title', true, $_REQUEST['plus_footer_title']);
		tab__temp('plus_footer_text', true, $_REQUEST['plus_footer_text']);

		

		#
		# logo main
		$f = fileupload_upload(["input"=>"logo"]);
		if( $f[0] ){
			tab__temp('logo', true, $f[0]);
		}
		#
		# logo footer
		$f = fileupload_upload(["input"=>"logo_footer"]);
		if( $f[0]  ){
			tab__temp('logo_footer', true, $f[0]);
		}
		#
		# logo sidebar
		$f = fileupload_upload(["input"=>"logo_sidebar"]);
		if( $f[0] ){
			tab__temp('logo_sidebar', true, $f[0]);
		}
		#
		# logo sidebar
		$f = fileupload_upload(["input"=>"favicon", "ext"=>["ico"] ]);
		if( $f[0] ){
			tab__temp('favicon', true, $f[0]);
		}

		#
		# social
		foreach ( ['facebook','twitter','linkedin','google','pinterest','instagram'] as $i => $social ) {
			tab__temp('social_'.$social.'_flag', true, $_REQUEST['social_'.$social.'_flag']);
			tab__temp('social_'.$social.'_link', true, $_REQUEST['social_'.$social.'_link']);
		}

		#
		# congragulate
		echo "<script>alert('تغييرات ثبت شد')</script>";
		die();
		// echo "<div class=convbox >تغییرات ثبت شد.</div>";
	}
	?>
	<iframe name="iframe8" style="display:none;"></iframe>
	<form method="post" action="" target="iframe8" name="form8" enctype="multipart/form-data" >
	<input type="hidden" name="page" value="<?=$_REQUEST['page']?>" >
	<input type="hidden" name="do" value="save_websiteconfiguration" >
	<fieldset class="setting_management">
		
		<legend>تنظيمات سايت</legend>

		<div>
			<span>اسم شرکت :</span>
			<input type="text" name="main_title" value="<?=tab__temp('main_title')?>">
		</div>

		<div>
			<span>فعاليت شرکت : </span>
			<input type="text" name="websitedescription" value="<?=tab__temp('websitedescription')?>">
		</div>
		
		<div>
			<span>کلمات کلیدی : </span>
			<input type="text" name="keywords" value="<?=tab__temp('keywords')?>">
		</div>
		
		<? if( is_component("billing")){ ?>
		<div>
			<span>واحد پولی : </span>
			<input type="text" name="money_unit" value="<?=tab__temp('money_unit')?>">
		</div>
		<? } ?>

		<div>
			<span>قالب سايت : </span>
			<select name="template">
				<?
				if(!@$dp=opendir('templates')){
					echo "<option value='Default' >Default</option>";
				} else {
					while($dn=readdir($dp)){
						if($dn=='.' or $dn=='..' or is_file("templates/".$dn)){
							continue;
						} else {
							echo "<option value='$dn' >$dn</option>";
						}
					}
				}
				?>
			</select>
			<script>form8.template.value="<?=tab__temp('template')?>";</script>
		</div>
		
		<div class="copyright_div">
			<span>کپی رایت :</span>
			<textarea name="html_footer_copyright" ><?=tab__temp('html_footer_copyright')?></textarea>
		</div>
		
		<div>
			<span>درباره ما مختصر :</span>
			<textarea name="html_footer_about" ><?=tab__temp('html_footer_about')?></textarea>
		</div>
		


		<?= 
			ff('br').
			ff('hr').
			ff('br');
		?>


		<?
		echo ff(['لوگوی اصلی','n:logo'=>tab__temp('logo'),'accept'=>'images/*','inDiv', 'title_in_span'=>true,'preview'=>'simple']);
		echo "<span class='pixel_help'>سایز آزاد</span>";

		echo ff(['لوگوی فوتر','n:logo_footer'=>tab__temp('logo_footer'),'accept'=>'images/*','inDiv', 'title_in_span'=>true,'preview'=>'simple']);
		echo "<span class='pixel_help'>حداقل ارتفاع ۷۲ پیکسل، عرض آزاد</span>";

		echo ff(['لوگوی سایدبار','n:logo_sidebar'=>tab__temp('logo_sidebar'),'accept'=>'images/*','inDiv', 'title_in_span'=>true,'preview'=>'simple']);
		echo "<span class='pixel_help'>سایز آزاد</span>";

		echo ff(['آیکن سایت','n:favicon'=>tab__temp('favicon'),'accept'=>'.ico','inDiv', 'title_in_span'=>true,'preview'=>'simple']);
		echo "<span class='pixel_help'>۳۲ در ۳۲ یا ۶۴ در ۶۴</span>";

		?>

		<div></div>

		<?=
			ff('br');
		
		?>		
		
		<div class="social-container">
			<span class="lmft_tis">فیس‌بوک</span>
			<input type="jtoggle" name="social_facebook_flag" value="<?=intval(tab__temp('social_facebook_flag'))?>" />
		
			<input type="url" name="social_facebook_link" value="<?=tab__temp('social_facebook_link')?>" />
		<br>
			<span class="lmft_tis">توئیتر</span>
			<input type="jtoggle" name="social_twitter_flag" value="<?=intval(tab__temp('social_twitter_flag'))?>" />
		
			<input type="url" name="social_twitter_link" value="<?=tab__temp('social_twitter_link')?>" />
		<br>
			<span class="lmft_tis">لینکد‌این</span>
			<input type="jtoggle" name="social_linkedin_flag" value="<?=intval(tab__temp('social_linkedin_flag'))?>" />
		
			<input type="url" name="social_linkedin_link" value="<?=tab__temp('social_linkedin_link')?>" />
		<br>
			<span class="lmft_tis">گوگل پلاس</span>
			<input type="jtoggle" name="social_google_flag" value="<?=intval(tab__temp('social_google_flag'))?>" />
		
			<input type="url" name="social_google_link" value="<?=tab__temp('social_google_link')?>" />
		
		<br>
			<span class="lmft_tis">پینترست</span>
			<input type="jtoggle" name="social_pinterest_flag" value="<?=intval(tab__temp('social_pinterest_flag'))?>" />
		
			<input type="url" name="social_pinterest_link" value="<?=tab__temp('social_pinterest_link')?>" />

		<br>
			<span class="lmft_tis">اینستاگرام</span>
			<input type="jtoggle" name="social_instagram_flag" value="<?=intval(tab__temp('social_instagram_flag'))?>" />
		
			<input type="url" name="social_instagram_link" value="<?=tab__temp('social_instagram_link')?>" />
		</div>
		
		<?=
			ff('br');
		?>


		<div style="width: 100%">
			<span>تگ های اضافی :</span>
			<textarea name="html_extra_tags" ><?=tab__temp('html_extra_tags')?></textarea>
		</div>
	
		<div class="toogle-container">
			<input type="jtoggle" name="stash_nav_cat_open" value="<?=intval(tab__temp('stash_nav_cat_open'))?>" />
			<font>منوی باز در صفحه لیست آیتم ها</font>
		</div>
		<div class="toogle-container">
			<input type="jtoggle" name="stash_nav_item_open" value="<?=intval(tab__temp('stash_nav_item_open'))?>" />
			<font>منوی باز در صفحه نمایش آیتم</font>
		</div>

		<div>
			<span>شعار سایت :</span>
			<textarea name="the_website_motto" ><?=tab__temp('the_website_motto')?></textarea>
		</div>

		<div>
			<span>لیست رنگ های پویا :</span>
			<textarea placeholder="8A9BB1
FED156
7758C3
72616E" name="the_list_of_dynamic_colors" ><?=tab__temp('the_list_of_dynamic_colors')?></textarea>
		</div>
		
		<?= ff('hr').
			ff('br');
		?>
	

		<div>
			<span>عنوان معرفی ابزار :</span>
			<?= ff([ "text:plus_footer_title", "value"=>tab__temp('plus_footer_title') ]); ?>
		</div>
		<div></div>

		<div>
			<span>متن معرفی ابزار :</span>
			<?= ff([ "textarea:plus_footer_text", "value"=>tab__temp('plus_footer_text') ]); ?>
		</div>
		<div>
			<span><!-- تگ های اصلی: --></span>
			<!-- <?= ff([ "textarea:tags_on_header", "value"=>tab__temp('tags_on_header') ]); ?> -->
		</div>


		<?= ff('hr').
			ff('br');
		?>
		
		<div>
			<span>وضعیت سایت</span>
			<select name="webstatus_main">
				<option value="1">فعال</option>
				<option value="0">غيرفعال</option>
			</select>
			<script>form8.webstatus_main.value="<?=(int)tab__temp('webstatus_main')?>";</script>
		</div>
	
		<? if ( is_component("sms") ) { ?>
		<div>
			<span>ارسال پیامک</span>
			<select name="sms_state">
				<option value="1">فعال</option>
				<option value="0">غيرفعال</option>
			</select>
			<script>form8.sms_state.value="<?=(int)tab__temp('sms_state')?>";</script>
		</div>
		<? } ?>
		
		<div class="submit_div">
			<input type="submit" class="submit_button" value="ثبت تغييرات" >
		</div>

	</fieldset>
	</form>
	<?
}








