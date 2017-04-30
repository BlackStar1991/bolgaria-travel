<?php
/**
 * The default template for displaying standard post format
 */
	<?php wp_head(); ?>

	if( !is_single() ){ 
		global $kode_post_settings; 
		if($kode_post_settings['excerpt'] < 0) global $more; $more = 0;
	}else{
		global $kode_post_settings, $theme_option;
	}
?>

<article id="news-ful-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="kdnews">
		<figure>
			<?php get_template_part('single/thumbnail', get_post_format()); ?>
			<a class="bloghover" href="<?php echo esc_url(get_permalink()); ?>"><i class="fa fa-plus"></i></a>
			<figcaption><i class="fa fa-photo"></i>  <div class="datetime"><span><?php echo esc_attr(get_the_date('d'));?></span><?php echo esc_attr(get_the_date('M'));?></div></figcaption>
		</figure>
		<div class="newsinfo">
			<h2><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h2>
			<ul class="kdpost-option">
				<li><?php echo kode_get_blog_info(array('author')); ?></li>
				<li><?php echo kode_get_blog_info(array('category')); ?></li>
			</ul>
			<?php 
				if( is_single() || $kode_post_settings['excerpt'] < 0 || $kode_post_settings['excerpt'] == 'full'){
					echo '<div class="kode-blog-content">';
					echo kode_esc_html(kode_content_filter($kode_post_settings['content'], true));
					wp_link_pages( array( 
						'before' => '<div class="page-links"><span class="page-links-title">' . esc_attr__( 'Pages:', 'kode_forest' ) . '</span>', 
						'after' => '</div>', 
						'link_before' => '<span>', 
						'link_after' => '</span>' )
					);
					echo '</div>';
				}else if( $kode_post_settings['excerpt'] != 0 ){
					echo '<div class="kode-blog-content"><p>' . esc_attr(get_the_excerpt()) . '</p>
					<a href="' . esc_url(get_permalink()) . '" class="kd-readmore th-bordercolor thbg-colorhover">' . esc_attr__( 'Read More', 'kode_forest' ) . '</a>
				</div>';
				}
			?>
		</div>
	</div>
</article>