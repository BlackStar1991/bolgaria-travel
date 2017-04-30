<?php wp_head(); ?>
<?php 
	while ( have_posts() ){ the_post();
		$content = kode_content_filter(get_the_content(), true); 
		if(!empty($content)){
			?>
			<div class="container">
				<div class="kode-item k-content">
					<?php echo $content; ?>
				</div>
			</div>
			<?php
		}
	} 
?>