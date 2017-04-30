<?php
/*
Template Name: My Custom Page Template
*/
/**
 * The default template for displaying standard post format
 */

	if( !is_single() ){ 
		global $kode_post_settings; 
		if($kode_post_settings['excerpt'] < 0) global $more; $more = 0;
	}else{
		global $kode_post_settings, $theme_option;
	}
	
	
	global $post;
?>
<?php wp_head(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="bloginner">
		<?php get_template_part('single/thumbnail', get_post_format()); ?>	
		<div class="kd-bloginfo kode-ux">
			<h2><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h2>	
			<ul class="kd-postoption">
				<?php echo kode_get_blog_info(array('date', 'author'), false, '','li');?>
			</ul>
			<?php 
			if( is_single() || $kode_post_settings['excerpt'] < 0 || $kode_post_settings['excerpt'] == 'full'){
				echo '<div class="kode-blog-content">';
					echo kode_content_filter($kode_post_settings['content'], true);
					wp_link_pages( array( 
						'before' => '<div class="page-links"><span class="page-links-title">' . esc_attr__( 'Pages:', 'kode_forest' ) . '</span>', 
						'after' => '</div>', 
						'link_before' => '<span>', 
						'link_after' => '</span>' )
					);
				echo '</div>';
			}else if( $kode_post_settings['excerpt'] != 0 ){
				echo '<div class="kode-blog-content"><p>' . esc_attr(get_the_excerpt()) . '</p><a href="' . esc_url(get_permalink()) . '" class="kd-readmore th-bordercolor thbg-colorhover">' . esc_attr__( 'Read More', 'kode_forest' ) . '</a>
			</div>';
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