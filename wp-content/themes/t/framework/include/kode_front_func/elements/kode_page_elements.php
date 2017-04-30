<?php
	/*	
	*	Kodeforest Theme File
	*	---------------------------------------------------------------------
	*	This file contains the function use to print the elements of the theme
	*	---------------------------------------------------------------------
	*/
	
	// print title
	if( !function_exists('kode_get_item_title') ){
		function kode_get_item_title( $atts ){
			$ret = '';
			
			$atts['title-type'] = (empty($atts['title-type']))? $atts['type']: $atts['title-type'];
		
			if( !empty($atts['title-type']) && $atts['title-type'] != 'none' ){
				$item_class  = 'pos-' . str_replace('-divider', '', $atts['title-type']);
				$item_class .= (!empty($atts['carousel']))? ' kode-nav-container': '';
				
				$ret .= '<div class="kode-item-title-wrapper kode-item ' . esc_attr($item_class) . ' ">';
				
				$ret .= '<div class="kode-item-title-head">';
				$ret .= !empty($atts['carousel'])? '<i class="icon-angle-left kode-flex-prev"></i>': '';
				if(!empty($atts['title'])){
					$ret .= '<h3 class="kode-item-title kode-skin-title kode-skin-border">' . esc_attr($atts['title']) . '</h3>';
				}
				$ret .= !empty($atts['carousel'])? '<i class="icon-angle-right kode-flex-next"></i>': '';
				$ret .= '<div class="clear"></div>';
				$ret .= '</div>';
				
				$ret .= (strpos($atts['title-type'], 'divider') > 0)? '<div class="kode-item-title-divider"></div>': '';
				
				if(!empty($atts['caption'])){
					$ret .= '<div class="kode-item-title-caption kode-skin-info">' . esc_attr($atts['caption']) . '</div>';
				}
				
				if(!empty($atts['right-text']) && !empty($atts['right-text-link'])){
					$ret .= '<a class="kode-item-title-link" href="' . esc_url($atts['right-text-link']) . '" >' . esc_attr($atts['right-text']) . '</a>';
				}
				
				$ret .= '</div>'; // kode-item-title-wrapper
			}
			return $ret;
		}
	}		

	// title item
	if( !function_exists('kode_get_title_item') ){
		function kode_get_title_item( $settings ){	
			$item_id = empty($settings['element-item-id'])? '': ' id="' .esc_attr( $settings['element-item-id'] ). '" ';
	
			global $kode_spaces;
			$margin = (!empty($settings['margin-bottom']) && 
				$settings['margin-bottom'] != $kode_spaces['bottom-item'])? 'margin-bottom: ' .esc_attr( $settings['margin-bottom'] ). ';': '';
			$margin_style = (!empty($margin))? ' style="' .esc_attr( $margin ). '" ': '';		
			
			$ret  = '<div class="kode-title-item" ' . $item_id . $margin_style . ' >';
			//$ret .= kode_get_item_title($settings);			
			$ret .= '</div>';
			return $ret;
		}
	}
	
	// accordion item
	if( !function_exists('kode_get_sidebar_item') ){
		function kode_get_sidebar_item( $settings ){
			$ret = '';
			return dynamic_sidebar($settings['widget']);
		}
	}	
	
	// accordion item
	if( !function_exists('kode_get_accordion_item') ){
		function kode_get_accordion_item( $settings ){
			$item_id = empty($settings['element-item-id'])? '': ' id="' .esc_attr( $settings['element-item-id'] ). '" ';
	
			global $kode_spaces;
			$margin = (!empty($settings['margin-bottom']) && 
				$settings['margin-bottom'] != $kode_spaces['bottom-item'])? 'margin-bottom: ' .esc_attr( $settings['margin-bottom'] ). ';': '';
			$margin_style = (!empty($margin))? ' style="' .esc_attr( $margin ). '" ': '';
			
			$accordion = is_array($settings['accordion'])? esc_attr($settings['accordion']): json_decode($settings['accordion'], true);

			//$ret  = kode_get_item_title($settings);	
			$ret = '';
			$ret .= '<div class="kode-item kd-accordion kode-accordion-item" ' . $item_id . $margin_style . ' >';
			$ret .= '
			<script type="text/javascript">
			jQuery(document).ready(function($){
				/* ---------------------------------------------------------------------- */
				/*	Accordion Script
				/* ---------------------------------------------------------------------- */
				if($(".accordion").length){
					//custom animation for open/close
					$.fn.slideFadeToggle = function(speed, easing, callback) {
					  return this.animate({opacity: "toggle", height: "toggle"}, speed, easing, callback);
					};

					$(".accordion").accordion({
					  defaultOpen: "section1",
					  cookieName: "nav",
					  speed: "slow",
					  animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
						elem.next().stop(true, true).slideFadeToggle(opts.speed);
					  },
					  animateClose: function (elem, opts) { //replace the standard slideDown with custom function
						elem.next().stop(true, true).slideFadeToggle(opts.speed);
					  }
					});
				}
			});
			</script>
			';
			$current_tab = 0;
			foreach( $accordion as $tab ){  $current_tab++;
				// $ret .= '<div class="accordion-tab';
				$ret .= '<div id="';
				$ret .= ($current_tab == intval($settings['initial-state']))? 'section1"': 'section_'.$current_tab.'"';
				$ret .= 'class="accordion" ';
				//$ret .= empty($tab['kdf-tab-title-id'])? '': 'id="' . esc_attr($tab['kdf-tab-title-id']) . '" ';
				$ret .= '><span class="fa ';
				$ret .= ($current_tab == intval($settings['initial-state']))? 'fa-minus': 'fa-plus';
				$ret .= '" ></i></span>' . kode_text_filter($tab['kdf-tab-title']) . '</div>';
				$ret .= '<div class="accordion-content">' . kode_content_filter($tab['kdf-tab-content']) . '</div>';			
			}
			$ret .= '</div>';
			
			return $ret;
		}
	}	

	
	// Simple Column item
	if( !function_exists('kode_get_simple_column_item') ){
		function kode_get_simple_column_item( $settings ){
			$item_id = empty($settings['element-item-id'])? '': ' id="' .esc_attr( $settings['element-item-id'] ). '" ';

			global $kode_spaces;
			$margin = (!empty($settings['margin-bottom']) && 
				$settings['margin-bottom'] != $kode_spaces['bottom-item'])? 'margin-bottom: ' .esc_attr( $settings['margin-bottom'] ). ';': '';
			$margin_style = (!empty($margin))? ' style="' .esc_attr( $margin ). '" ': '';
			
			$ret  = '<div '.$item_id.' class="simple-column" '.$margin_style.'>'.kode_content_filter($settings['content']).'</div>';
			return $ret;
		}
	}	
	
	// Simple Column item
	if( !function_exists('kode_get_small_box_item') ){
		function kode_get_small_box_item( $settings ){
			$item_id = empty($settings['element-item-id'])? '': ' id="' .esc_attr( $settings['element-item-id'] ). '" ';
			
			global $kode_spaces;
			$margin = (!empty($settings['margin-bottom']) && 
			$settings['margin-bottom'] != $kode_spaces['bottom-item'])? 'margin-bottom: ' .esc_attr( $settings['margin-bottom'] ). ';': '';
			$margin_style = (!empty($margin))? ' style="' .esc_attr( $margin ). '" ': '';			
			$settings['box-video-link'] = empty($settings['box-video-link'])? ' ': $settings['box-video-link'];
			$ret  = '
			<div '.$item_id.' class="small-box" '.$margin_style.'>
				<a target="_blank" href="'.$settings['box-video-link'].'" ><i style="color:'.esc_attr($settings['box-icon-color']).'" class="'.esc_attr($settings['box-icon']).'"></i></a>
				<h3 style="color:'.esc_attr($settings['box-heading-color']).'">'.esc_attr($settings['box-heading']).'</h3>
				<p style="color:'.esc_attr($settings['box-desc-color']).'"> '.esc_attr($settings['box-desc']).'</p>
			</div>';
			return $ret;
		}
	}	
	
	
	
	// column service item
	if( !function_exists('kode_get_column_service_item') ){
		function kode_get_column_service_item( $settings ){
			$item_id = empty($settings['page-item-id'])? '': ' id="' . esc_attr($settings['page-item-id']) . '" ';

			global $kode_spaces;
			$margin = (!empty($settings['margin-bottom']) && 
				$settings['margin-bottom'] != $kode_spaces['bottom-item'])? 'margin-bottom: ' .esc_attr( $settings['margin-bottom'] ). ';': '';
			$margin_style = (!empty($margin))? ' style="' .esc_attr( $margin ). '" ': '';
			$settings['style'] = empty($settings['style'])? 'type-1': $settings['style'];
			if($settings['style'] == 'type-1'){
			$ret = '<div class="kode-services-grid kode-services '.$settings['style'].'">';
					$service_img = '';
					if(isset($settings['service_img'])){
						if($settings['service_img'] <> ''){
							if( is_numeric($settings['service_img']) ){
								$service_img = wp_get_attachment_image_src($settings['service_img'], array(150,150));
								$service_img = esc_url($service_img[0]);
							}else{
								$service_img = esc_url($settings['service_img']);
							}
							$ret .= '<figure><a href="'.esc_url($settings['link']).'"><img src="'.$service_img.'" alt="" /></a></figure>';
						}
					}	
					$ret .= '<div class="kode-service-info">
						<h2>' . kode_text_filter($settings['title']) . '</h2>
						'.kode_content_filter($settings['content']);
						if($settings['link-text'] <> ''){
							$ret  .= '<a class="kd-readmore thbg-colorhover" href="'.esc_url($settings['link']).'">'.esc_attr($settings['link-text']).'</a>';
						}
					$ret  .= '</div>
				</div>';
			}else if($settings['style'] == 'type-2'){
					$ret = '<div class="kode-services '.$settings['style'].'">';
					if($settings['service_img'] <> ''){
						if( is_numeric($settings['service_img']) ){
							$service_img = wp_get_attachment_image_src($settings['service_img'], array(350,350));
							$service_img = esc_url($service_img[0]);
						}else{
							$service_img = esc_url($settings['service_img']);
						}
						$ret .= '<figure><a href="'.esc_url($settings['link']).'"><img src="'.$service_img.'" alt="" /></a></figure>';
					}
					$ret .= '<div class="kode-service-info">
						<h2>' . kode_text_filter($settings['title']) . '</h2>
						'.kode_content_filter($settings['content']);
						if($settings['link-text'] <> ''){
							$ret  .= '<a class="kd-readmore thbg-colorhover" href="'.esc_url($settings['link']).'">'.esc_attr($settings['link-text']).'</a>';
						}
					$ret  .= '
				</div></div>';
			}else if($settings['style'] == 'type-3'){ 
			$ret = '<div class="kode-services '.$settings['style'].'">';
				if($settings['icon'] <> ''){
					$ret .= '<i class="' . esc_attr($settings['icon']) . '"></i>';
				}
				$ret .= '<div class="services-info"><h3>' . kode_text_filter($settings['title']) . '</h3>
				'.kode_content_filter($settings['content']).'</div>
			</div>';
			}else{
			
			}
			
			return $ret;
		}
	}
	
	
	// content item
	if( !function_exists('kode_get_content_item') ){
		function kode_get_content_item( $settings ){
			$item_id = empty($settings['element-item-id'])? '': ' id="' .esc_attr( $settings['element-item-id'] ). '" ';

			global $kode_spaces;
			$margin = (!empty($settings['margin-bottom']) && 
				$settings['margin-bottom'] != $kode_spaces['bottom-item'])? 'margin-bottom: ' .esc_attr( $settings['margin-bottom'] ). ';': '';
			$margin_style = (!empty($margin))? ' style="' .esc_attr( $margin ). '" ': '';
			$ret = '<div '.$item_id.' class="k-content-container" '.$margin_style.'>';
			while ( have_posts() ){ the_post();
				$content = kode_content_filter(get_the_content(), true); 
				
				//$ret .= '<div class="container">';
					//Show Title
					if( empty($settings['show-title']) || $settings['show-title'] != 'disable' ){
						$ret .= '<div class="kode-item k-title"><h2>';
							$ret .= get_the_title();
						$ret .= '</h2></div>';
					}
					//Show Content
					if( empty($settings['show-content']) || $settings['show-content'] != 'disable' ){
						if(!empty($content)){
							$ret .= '<div class="kode-item k-content">';
								$ret .= $content;
							$ret .= '</div>';
						}
					}
					// if ( comments_open() || get_comments_number() ) :
						// comments_template();
					// endif;
				//$ret .= '</div>'; // Grid Container
			} // WHile Loop End
			$ret .= '</div>'; // End Element Container
			return $ret;
		}
	}	
	
	// content item
	if( !function_exists('kode_get_default_content_item') ){
		function kode_get_default_content_item( $settings ){
			$item_id = empty($settings['page-item-id'])? '': ' id="' .esc_attr( $settings['page-item-id'] ). '" ';
			?>
			<div <?php echo esc_attr($item_id);?> class="k-content-container">
			<?php
			while ( have_posts() ){ the_post();
				$content = kode_content_filter(get_the_content(), true); 
					//Show Title
					if( empty($settings['show-title']) || $settings['show-title'] != 'disable' ){ ?>
						<div class="kode-item k-title"><h2>
							<?php echo esc_attr(get_the_title());?>
						</h2></div>
					<?php }
					//Show Content
					if( empty($settings['show-content']) || $settings['show-content'] != 'disable' ){
						if(!empty($content)){ ?>
							<div class="kode-item k-content">
								<?php echo $content; ?>
							</div>
							<?php
						}
					} ?>
					<div class="kd-admin thememargin">
						<figure><a href="#"><?php echo get_avatar(get_the_author_meta('ID'), 90); ?></a></figure>
						<div class="admin-info">
							<h2><?php the_author_posts_link(); ?></h2>
							<p><?php echo esc_attr(get_the_author_meta('description')); ?></p>
						</div>
					</div>
					<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				// Grid Container
			} // WHile Loop End
			?>
			</div>
		<?php
		}
	}

	// tab item
	if( !function_exists('kode_get_tab_item') ){
		function kode_get_tab_item( $settings ){
			$item_id = empty($settings['element-item-id'])? '': ' id="' .esc_attr( $settings['element-item-id'] ). '" ';

			global $kode_spaces;
			$margin = (!empty($settings['margin-bottom']) && 
				$settings['margin-bottom'] != $kode_spaces['bottom-item'])? 'margin-bottom: ' . esc_attr( $settings['margin-bottom'] ) . ';': '';
			$margin_style = (!empty($margin))? ' style="' .esc_attr( $margin ). '" ': '';
			
			$tabs = is_array($settings['tab'])? $settings['tab']: json_decode($settings['tab'], true);			
			$current_tab = 0;
			$ret = '';
			//$ret  = kode_get_item_title($settings);	
			$ret .= '<div class="kode-item kode-tab-item '  . esc_attr($settings['style']) . '" ' . $item_id . $margin_style . '>';
			$ret .= '<div class="tab-title-wrapper" >';
			foreach( $tabs as $tab ){  $current_tab++;
				$ret .= '<h4 class="tab-title';
				$ret .= ($current_tab == intval($settings['initial-state']))? ' active" ': '" ';
				$ret .= empty($tab['kdf-tab-title-id'])? '>': 'id="' . esc_attr($tab['kdf-tab-title-id']) . '" >';
				$ret .= empty($tab['kdf-tab-icon-title'])? '': '<i class="' . esc_attr($tab['kdf-tab-icon-title']) . '" ></i>';				
				$ret .= '<span>' . kode_text_filter($tab['kdf-tab-title']) . '</span></h4>';				
			}
			$ret .= '</div>';
			
			$current_tab = 0;
			$ret .= '<div class="tab-content-wrapper" >';
			foreach( $tabs as $tab ){  $current_tab++;
				$ret .= '<div class="tab-content';
				$ret .= ($current_tab == intval($settings['initial-state']))? ' active" >': '" >';
				$ret .= kode_content_filter($tab['kdf-tab-content']) . '</div>';
							
			}	
			$ret .= '</div>';	
			$ret .= '<div class="clear"></div>';
			$ret .= '</div>'; // kode-tab-item 
			
			return $ret;
		}
	}		

	if( !function_exists('kode_get_divider_item') ){
		function kode_get_divider_item( $settings ){
			$item_id = empty($settings['element-item-id'])? '': ' id="' .esc_attr( $settings['element-item-id'] ). '" ';
			
			global $kode_spaces;
			
			$margin = (!empty($settings['margin-bottom']))? 'margin-bottom: ' .esc_attr( $settings['margin-bottom'] ). ';': '';
			$margin_style = (!empty($margin))? ' style="' .esc_attr( $margin ). '" ': '';
			
			//$style = empty($settings['size'])? '': ' style="width: ' . $settings['size'] . ';" ';
			$ret  = '<div class="clear"></div>';
			$ret .= '<div class="kode-item kode-divider-item" ' . $item_id . $margin_style . ' >';
			$ret .= '<div class="kode-divider"></div>';
			$ret .= '</div>';					
			
			return $ret;
		}
	}
	

?>