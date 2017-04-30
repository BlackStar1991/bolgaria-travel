<div class="kdf-search-form">
	<form method="get" id="searchform" action="<?php  echo esc_url(home_url()); ?>/">
		<?php
			$search_val = get_search_query();
			if( empty($search_val) ){
				$search_val = __("Поиск" , "kode_forest");
			}
		?>
		<input type="text" name="s" id="s" autocomplete="off" data-default="<?php echo esc_attr($search_val); ?>" />
		<input type="submit" id="searchsubmit" value="" class="thbg-color">
		<i class="fa fa-search"></i>
		<div class="clear"></div>
	</form>
</div>