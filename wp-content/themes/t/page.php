<?php get_header(); ?>
<?php  wp_head(); ?>
	<div class="content">
		<!-- Sidebar With Content Section-->
		<?php 
		
			global $theme_option,$post,$post_id,$page_id;
			if(isset($theme_option['package-search-page'])){
				if($theme_option['package-search-page'] == $post->ID){
					echo '<div class="kode_search_wrapper">';
						echo kode_search_form_banner('Search Form');
					echo '</div>';
					echo '<div class="container">';
						$paged = (get_query_var('paged'))? get_query_var('paged') : 1;
						?>
						<div class="package-search">
							<?php
							/* List of Properties on Homepage */
							// $number_of_properties = intval(get_option('theme_properties_on_search'));
							// if(!$number_of_properties){
								// $number_of_properties = 4;
							// }
							$package = '';
							$search_args = array(
								'post_type' => 'package',
								'posts_per_page' => 5,
								'paged' => $paged
							);

							// Apply Search Filter
							$search_args = apply_filters('kode_search_parameters',$search_args);

							$search_args = kode_sort_packages($search_args);
							
							$search_query = new WP_Query( $search_args );
							if ( $search_query->have_posts() ) :
								$post_count = 0;
								$current_size = 0;
								$size = 3;
								$thumbnail_size = 'small-grid-size';
								echo '<div class="row kode-package-list kode-package">';
								while ( $search_query->have_posts() ) :
									$search_query->the_post();
									global $post;
									$package_option = json_decode(kode_decode_stopbackslashes(get_post_meta($post->ID, 'post-option', true)), true);
									$price = (empty($package_option['price']))? '': $package_option['price'];
									$duration = (empty($package_option['days']))? '': $package_option['days'];
									$duration_pre = (empty($package_option['days-prefix']))? '': $package_option['days-prefix'];
									$package_option['location'] = (empty($package_option['location']))? '': $package_option['location'];
									$package_option['availability'] = (empty($package_option['availability']))? '': $package_option['availability'];
									$package_option['book_text'] = (empty($package_option['book_text']))? '': $package_option['book_text'];
									
									if( $current_size % $size == 0 ){
										//echo  '<div class="clear"></div>';
									}	
									echo  '
									<article class="' . esc_attr(kode_get_column_class('1/' . $size)) . '">
										<div class="package-mainsection kode-ux">
										<figure>
											<a href="'.esc_url(get_permalink()).'">'.get_the_post_thumbnail($post->ID, $thumbnail_size).'</a>
											<figcaption>
												<span class="package-price thbg-color">'.esc_attr($theme_option['currency']).esc_attr($price).'</span>
												<div class="kd-bottomelement">
													<h5><a href="'.esc_url(get_permalink()).'">'.esc_attr(substr(get_the_title(),0,16)).'</a></h5>
													<div style="background-color: #00c4d6;" class="days-counter"><span>'.esc_attr($duration).'</span><span>'.esc_attr($duration_pre).'</span></div>
												</div>
											</figcaption>
										</figure>
										</div>
									</article>';
								
								endwhile;
								wp_reset_postdata();
								echo '</div>';
								echo kode_get_pagination($search_query->max_num_pages, $paged);
							else:
								?><div class="alert-wrapper"><h4><?php _e('No Package Found!', 'kodeforest') ?></h4></div><?php
							endif;
							wp_reset_query();
							?>
						</div>
						<?php
					echo '</div>';
					echo '</div>';
				}
			}
			if( !empty($kode_content_raw) ){ 
				echo '<div class="pagebuilder-wrapper">';
				kode_show_page_builder($kode_content_raw);
				echo '</div>';
			}else{
				echo '<div class="container">';
					$default['show-title'] = 'enable';
					$default['show-content'] = 'enable'; 
					echo kode_get_default_content_item($default);
				echo '</div>';
			}
		?>
	</div><!-- content -->
<?php get_footer(); ?>