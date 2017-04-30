<?php
/**
 * The default template for displaying standard post format
 */
	global $kode_post_settings,$post; 
	
?>
<article id="blog-grid-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="bloginner">
		<?php get_template_part('single/thumbnail', get_post_format()); ?>
		<div class="kd-bloginfo kode-ux">
			<span class="poh11"> <?php single_post_title(); ?>
  <a href="<?php echo esc_url(get_permalink()); ?>">
<?php echo get_the_title( $post ) ?>

</a></span>
			
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
					echo '<div class="kode-blog-content"><p>' . esc_attr(get_the_excerpt()) . '</p>
				</div>';
				}
				$kode_popular_post = get_post_meta($post->ID,'kode_popular_post_views_count',true);
			?>
			<div class="kd-usernetwork">
				
				
			</div>
		</div>
	</div>
</article>