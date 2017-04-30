<?php
/**
 * The template for displaying posts in the Aside post format
 */
 
	if( !is_single() ){ 
		global $kode_post_settings;
	}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="kode-blog-content">
		<?php 
			if( is_single() || $kode_post_settings['excerpt'] < 0 ){
				echo kode_content_filter(get_the_content(esc_attr__( 'Read More', 'kode_forest' )), true); 
			}else{
				echo kode_content_filter(get_the_content(esc_attr__( 'Read More', 'kode_forest' ))); 
			}
		?>
	</div>
</article>
