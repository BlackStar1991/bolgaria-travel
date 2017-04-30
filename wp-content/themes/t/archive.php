<?php get_header(); ?>
<?php  wp_head(); ?>
<style>
	.content{margin-top:30px;}
</style>
<div class="content">
	<div class="container">
		<div class="row">
<?php 
			global $kode_sidebar, $theme_option;
			if( empty($kode_post_option['sidebar']) || $kode_post_option['sidebar'] == 'default-sidebar' ){
				$kode_sidebar = array(
					'type'=>$theme_option['archive-sidebar-template'],
					'left-sidebar'=>$theme_option['archive-sidebar-left'], 
					'right-sidebar'=>$theme_option['archive-sidebar-right']
				); 
			}else{
				$kode_sidebar = array(
					'type'=>$kode_post_option['sidebar'],
					'left-sidebar'=>$kode_post_option['left-sidebar'], 
					'right-sidebar'=>$kode_post_option['right-sidebar']
				); 				
			}
			
			$kode_sidebar = kode_get_sidebar_class($kode_sidebar);
			if($kode_sidebar['type'] == 'both-sidebar' || $kode_sidebar['type'] == 'left-sidebar'){ ?>
			<div class="<?php echo esc_attr($kode_sidebar['left'])?>">
					<?php get_sidebar('left'); ?>
				</div>	
			<?php } ?>
		<div class="<?php echo esc_attr($kode_sidebar['center'])?>">
					<?php
						if( !is_tax('work_category') && !is_tax('work_tag') ){		
							// set the excerpt length
							if( !empty($theme_option['archive-num-excerpt']) ){
								global $kode_excerpt_length; $kode_excerpt_length = $theme_option['archive-num-excerpt'];
								add_filter('excerpt_length', 'kode_set_excerpt_length');
							} 

							global $wp_query, $kode_post_settings;
							$kode_lightbox_id++;
							$kode_post_settings['excerpt'] = esc_attr(intval($theme_option['archive-num-excerpt']));
							$kode_post_settings['thumbnail-size'] = 'blog-post';			
							$kode_post_settings['blog-style'] = esc_attr($theme_option['archive-blog-style']);							
						
							echo '<div class="row">';
							if($theme_option['archive-blog-style'] == 'blog-full'){
								echo kode_get_blog_full($wp_query);
							}else if($theme_option['archive-blog-style'] == 'blog-medium'){
								$ret .= kode_get_blog_medium($wp_query);			
							}else{
								$blog_size = 3;
								echo kode_get_blog_grid($wp_query, $blog_size, 'fitRows');
							}
							echo '<div class="clear"></div>';
							echo '</div>';
							remove_filter('excerpt_length', 'kode_set_excerpt_length');
							
							$paged = (get_query_var('paged'))? get_query_var('paged') : 1;
							echo kode_get_pagination($wp_query->max_num_pages, $paged);													
						
						}else{
							// set the excerpt length
							if( !empty($theme_option['archive-num-excerpt']) ){
								global $kode_excerpt_length; $kode_excerpt_length = $theme_option['archive-num-excerpt'];
								add_filter('excerpt_length', 'kode_set_excerpt_length');
							} 

							global $wp_query, $kode_post_settings;
							$kode_lightbox_id++;
							$settings['num-fetch'] = -1;
							$settings['margin-bottom'] = 30;
							//$kode_post_settings['blog-style'] = $theme_option['archive-blog-style'];	

							echo '<div style="margin:30px 0px 0px 0px" class="kode-work-column">';
							$settings['work-style'] = 'work-4column';
							$settings['pagination'] = 'enable';
							echo kode_get_work_item($settings);
							echo '<div class="clear"></div>';
							echo '</div>';
															
						
						
						}
				?>
			</div>
			<?php
			if($kode_sidebar['type'] == 'both-sidebar' || $kode_sidebar['type'] == 'right-sidebar' && $kode_sidebar['right'] != ''){ ?>
			<div class="<?php echo esc_attr($kode_sidebar['right'])?>">
					<?php get_sidebar('right'); ?>
				</div>
			<?php } ?>
	</div><!-- Row -->	
	</div><!-- Container -->		
</div><!-- content -->
<?php get_footer(); ?>