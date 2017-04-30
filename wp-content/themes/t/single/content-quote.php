<?php
/**
 * The template for displaying quote post format
 */
 
	if( !is_single() ){ 
		global $kode_post_settings;
	}

	$post_format_data = '';
	$content = trim(get_the_content(__( 'Read More', 'kode_forest' )));	
	if(preg_match('#^\[kode_quote[\s\S]+\[/kode_quote\]#', $content, $match)){ 
		$post_format_data = kode_content_filter($match[0]);
		$content = substr($content, strlen($match[0]));
	}else if(preg_match('#^<blockquote[\s\S]+</blockquote>#', $content, $match)){ 
		$post_format_data = kode_content_filter($match[0]);
		$content = substr($content, strlen($match[0]));
	}		
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="kode-blog-content">
		<div class="kode-top-quote">
			<?php echo $post_format_data; ?>
		</div>
		<div class="kode-quote-author">
		<?php 
			if( is_single() || $kode_post_settings['excerpt'] < 0 ){
				echo kode_content_filter($content, true); 
			}else{
				echo kode_content_filter($content); 
			}
		?>	
		</div>
	</div>
</article><!-- #post -->
