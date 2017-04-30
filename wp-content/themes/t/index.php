<?php get_header(); ?>
<?php if($theme_option['kode-header-style'] == 'header-style-2' || $theme_option['kode-header-style'] == 'header-style-3'){
	global $kode_post_option;
	$header_background = '';
	if( !empty($kode_post_option['header-background']) ){
		if( is_numeric($kode_post_option['header-background']) ){
			$image_src = wp_get_attachment_image_src($kode_post_option['header-background'], 'full');	
			$header_background = $image_src[0];
		}else{
			$header_background = $kode_post_option['header-background'];
		}
	}
		echo '
		<div style="background:url('.KODE_PATH.'/images/breadceumb-bg.jpg)" class="subheader kode-subheader-home '.esc_attr($theme_option['kode-header-style']).'">
			<span class="transparent-bgdark"></span>
			
		</div>';
	
	}?>
3333333333
<div class="content kode-main-index-content">
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
			<div class="kode-main-content <?php echo esc_attr($kode_sidebar['center'])?>">
			
				<?php		
					// set the excerpt length
					if( !empty($theme_option['archive-num-excerpt']) ){
						global $kode_excerpt_length; $kode_excerpt_length = 55;
						add_filter('excerpt_length', 'kode_set_excerpt_length');
					} 

					global $wp_query, $kode_post_settings;
					$kode_lightbox_id++;
					$kode_post_settings['excerpt'] = 'full';
					$kode_post_settings['thumbnail-size'] = 'full';			
					$kode_post_settings['blog-style'] = 'blog-full';							
				
					echo '<div class="row">';
					if($kode_post_settings['blog-style'] == 'blog-full'){
						$kode_post_settings['blog-info'] = array('author', 'date', 'category', 'comment');
						echo kode_get_blog_full($wp_query);
					}else{
						$kode_post_settings['blog-info'] = array('date', 'comment');
						$kode_post_settings['blog-info-widget'] = true;
						
						$blog_size = str_replace('blog-1-', '', $theme_option['archive-blog-style']);
						echo kode_get_blog_grid($wp_query, $blog_size, 
							$theme_option['archive-thumbnail-size'], 'fitRows');
					}
					echo '<div class="clear"></div>';
					echo '</div>';
					remove_filter('excerpt_length', 'kode_set_excerpt_length');
					
					$paged = (get_query_var('paged'))? get_query_var('paged') : 1;
					echo kode_get_pagination($wp_query->max_num_pages, $paged);													
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