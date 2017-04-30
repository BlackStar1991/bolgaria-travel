<?php
/**
 * The default template for displaying standard post format
 */
	global $kode_post_settings,$post; 
?>
<?php wp_head(); ?>
<article id="blog-medium-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="bloginner">
		<?php get_template_part('single/thumbnail', get_post_format()); ?>
		<div class="kd-bloginfo kode-ux">
			<h2><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo kode_esc_html_excerpt(substr(get_the_title(),0,$kode_post_settings['title-num-fetch'])); ?></a></h2>
			<ul class="kd-postoption">
				<?php echo kode_get_blog_info(array('category'), false, '','li');?>
				<li><span class="datetime">| <?php echo esc_attr(get_the_date('M d Y'));?></span></li>
			</ul>
			<?php 
			if( is_single() || $kode_post_settings['excerpt'] < 0 || $kode_post_settings['excerpt'] == 'full'){
				echo '<div class="kode-blog-content">';
					echo kode_content_filter($kode_post_settings['content'], true);
					wp_link_pages( array( 
						'before' => '<div class="page-links"><span class="page-links-title">' . esc_attr__( 'Pages:', 'kode_forest' ) . '</span>', 
						'after' => '</div>', 
						'link_before' => '<span>', 
						'link_after' => '</span>' 
					));
				echo '</div>';
			}else if( $kode_post_settings['excerpt'] != 0 ){
				echo '<div class="kode-blog-content"><p>' . esc_attr(get_the_excerpt()) . '</p></div>';
			}
			$kode_popular_post = get_post_meta($post->ID,'kode_popular_post_views_count',true);
			?>
			<div class="kd-usernetwork">
				<ul class="kd-blogcomment">
					<?php echo kode_get_blog_info(array('comment'), false, '','li');?>
					<?php if($kode_popular_post <> ''){ ?><li><a class="thcolorhover" href="<?php echo esc_url(get_permalink()); ?>"><i class="fa fa-heart-o"></i> <?php echo esc_attr($kode_popular_post);?></a></li><?php }?>
				</ul>
				<div class="kd-social-network">
					<?php kode_get_social_shares();?>
				</div>
			</div>
		</div>
	</div>
</article>