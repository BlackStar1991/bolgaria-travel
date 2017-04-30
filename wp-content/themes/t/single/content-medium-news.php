<?php
/**
 * The default template for displaying standard post format
 */
	global $kode_post_settings; 
?>

<article id="news-med-<?php the_ID(); ?>" <?php post_class('kode-ux kdnews-vtwo'); ?>>
	<div class="kf-medium-1">
		<figure><?php get_template_part('single/thumbnail', get_post_format()); ?></figure>
		<div class="newsinfo">
		  <h4><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_attr(get_the_title()); ?></a></h4>
		  <ul class="kdpost-option">
			<li><i class="fa fa-clock-o"></i> <div class="datetime"><?php esc_html_e('Posted on','kode_forest');?> <?php echo esc_attr(get_the_date());?></div></li>
		  </ul>
		  <ul class="kdpost-option">
			<li><?php echo kode_get_blog_info(array( 'category')); ?></li>
		  </ul>
		  <?php 
			if( $kode_post_settings['excerpt'] < 0 ){
			global $more; $more = 0;

				echo '<div class="kode-news-content">';
					echo kode_esc_html(kode_content_filter($kode_post_settings['content'], true));
					wp_link_pages( array(
						'before' => '<div class="page-links"><span class="page-links-title">' . esc_attr__( 'Pages:', 'kode_forest' ) . '</span>', 
						'after' => '</div>', 
						'link_before' => '<span>', 
						'link_after' => '</span>' )
					);
				echo '</div>';
			}else if( $kode_post_settings['excerpt'] != 0 ){
				echo '<div class="kode-news-content">
					<p>' . esc_attr(get_the_excerpt()) . '</p>
					<a href="' . esc_url(get_permalink()) . '" class="kd-readmore th-bordercolor thbg-colorhover">' . esc_attr__( 'Read More', 'kode_forest' ) . '</a>
				</div>';
			}
			?>
		</div>
	</div>	
</article>