<?php
/**
 * The default template for displaying standard post format
 */
	global $kode_post_settings; 
?>
<?php wp_head(); ?>
<article id="news-<?php the_ID(); ?>" <?php post_class('kode-ux kdnews-vtwo'); ?>>
	<figure>
		<span class="k_posted_by"><?php esc_attr_e('by:','kode_forest');?> <?php echo esc_attr(get_the_author());?></span>
		<?php get_template_part('single/thumbnail', get_post_format()); ?>
	</figure>
	<div class="newsinfo">
		<h2><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h2>
		<ul class="kdpost-option">
			<li><i class="fa fa-clock-o"></i> <div class="datetime"><?php esc_html_e('Posted on','kode_forest');?> <?php echo esc_attr(get_the_date());?></div></li>
			<li><?php echo kode_get_blog_info(array( 'category')); ?></li>
		</ul>
	  <?php 
		if( $kode_post_settings['excerpt'] < 0 ){
		global $more; $more = 0;

			echo '<div class="kode-blog-content">';
				echo kode_content_filter($kode_post_settings['content'], true);
				wp_link_pages( array(
					'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'kode_forest' ) . '</span>', 
					'after' => '</div>', 
					'link_before' => '<span>', 
					'link_after' => '</span>' )
				);
			echo '</div>';
		}else if( $kode_post_settings['excerpt'] != 0 ){
			echo '<div class="kode-blog-content"><p>' . esc_attr(get_the_excerpt()) . '</p>
					<a href="' . esc_url(get_permalink()) . '" class="kd-readmore th-bordercolor thbg-colorhover">' . __( 'Read More', 'kode_forest' ) . '</a>
				</div>';
		}
		?>
	</div>
</article> 