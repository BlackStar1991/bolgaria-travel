<?php get_header(); ?>
<?php wp_head(); ?>
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
					if( have_posts() ){
						// set the excerpt length
						if( !empty($theme_option['archive-num-excerpt']) ){
							global $kode_excerpt_length; $kode_excerpt_length = $theme_option['archive-num-excerpt'];
							add_filter('excerpt_length', 'kode_set_excerpt_length');
						} 

						global $wp_query, $kode_post_settings;
						$kode_lightbox_id++;
						$kode_post_settings['excerpt'] = intval($theme_option['archive-num-excerpt']);
						$kode_post_settings['thumbnail-size'] = 'blog-post';			
						$kode_post_settings['blog-style'] = $theme_option['archive-blog-style'];							
					
						echo '<div class="blog-item-holder row">';
						if($theme_option['archive-blog-style'] == 'blog-full'){
							echo kode_get_blog_full($wp_query);
						}else if($theme_option['archive-blog-style'] == 'blog-medium'){
							$ret .= kode_get_blog_medium($wp_query);			
						}else{
							$blog_size = str_replace('blog-1-', '', $theme_option['archive-blog-style']);
							echo kode_get_blog_grid($wp_query, $blog_size, 'fitRows');
						}
						echo '</div>';
						remove_filter('excerpt_length', 'kode_set_excerpt_length');
						
						$paged = (get_query_var('paged'))? get_query_var('paged') : 1;
						echo kode_get_pagination($wp_query->max_num_pages, $paged);
					}else{ ?>
					<!--// Main Content //-->
					<div class="main-content">
						<div class="row">
							<div class="col-md-12">
								<div class="kd-404 widget widget_search kode-widget">
									<h2><?php esc_attr_e('Не найдено', 'kode_forest'); ?></h2>
									<span><?php esc_attr_e('Страница не найдена', 'kode_forest'); ?></span>
									<p><?php esc_attr_e('Ничего не найдено по заданным критериям.', 'kode_forest'); ?></p>
									<div class="kdf-search-form">
										<form method="get" id="searchform" action="<?php  echo esc_url(home_url()); ?>/">
											<?php
												$search_val = get_search_query();
												if( empty($search_val) ){
													$search_val = __("Поиск" , "kode_forest");
												}
											?>
											<div class="search-text" id="search-text">
												<input type="text" name="s" id="s" autocomplete="off" data-default="<?php echo kode_esc_html($search_val); ?>" />
											</div>
											<label><input type="submit" id="searchsubmit" value="" class="thbg-color"></label>
											<div class="clear"></div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--// Main Content //-->
				<?php } ?>
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