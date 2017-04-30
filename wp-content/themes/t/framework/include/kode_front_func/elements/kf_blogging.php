<?php 
	/*	
	*	Kodeforest Blog Item Management File
	*	---------------------------------------------------------------------
	*	This file contains functions that help you get blog item
	*	---------------------------------------------------------------------
	*/
	error_reporting(0);
	if( !function_exists('kode_get_news_item') ){
		function kode_get_news_item( $settings = array() ){
			$item_id = empty($settings['page-item-id'])? '': ' id="' . $settings['page-item-id'] . '" ';

			global $kode_spaces;
			$margin = (!empty($settings['margin-bottom']) && 
				$settings['margin-bottom'] != $kode_spaces['bottom-blog-item'])? 'margin-bottom: ' . $settings['margin-bottom'] . ';': '';
			$margin_style = (!empty($margin))? ' style="' . $margin . '" ': '';
			$ret = '';
			//$ret  = kode_get_item_title($settings);
			$ret .= '<div class="col-md-12 news-item-wrapper"  ' . $item_id . $margin_style . '>';
			
			// query post and sticky post
			$args = array('post_type' => 'post', 'suppress_filters' => false);
			if( !empty($settings['category']) || !empty($settings['tag']) ){
				$args['tax_query'] = array('relation' => 'OR');
				
				if( !empty($settings['category']) ){
					array_push($args['tax_query'], array('terms'=>explode(',', $settings['category']), 'taxonomy'=>'category', 'field'=>'slug'));
				}
				if( !empty($settings['tag']) ){
					array_push($args['tax_query'], array('terms'=>explode(',', $settings['tag']), 'taxonomy'=>'post_tag', 'field'=>'slug'));
				}				
			}
			if(isset($settings['enable-sticky'])){
				if( $settings['enable-sticky'] == 'enable' ){
					if( get_query_var('paged') <= 1 ){
						$sticky_args = $args;
						$sticky_args['post__in'] = get_option('sticky_posts');
						if( !empty($sticky_args['post__in']) ){
							$sticky_query = new WP_Query($sticky_args);	
						}
					}
					$args['post__not_in'] = get_option('sticky_posts', '');
				}else{
					$args['ignore_sticky_posts'] = 1;
				}
			}
			
			$args['posts_per_page'] = (empty($settings['num-fetch']))? '5': $settings['num-fetch'];
			$args['orderby'] = (empty($settings['orderby']))? 'post_date': $settings['orderby'];
			$args['order'] = (empty($settings['order']))? 'desc': $settings['order'];
			$args['paged'] = (get_query_var('paged'))? get_query_var('paged') : get_query_var('page');
			$args['paged'] = empty($args['paged'])? 1: $args['paged'];
			$args['offset'] = (empty($settings['offset']))? 0: $settings['offset'];			
			$query = new WP_Query( $args );

			// merge query
			if( !empty($sticky_query) ){
				$query->posts = array_merge($sticky_query->posts, $query->posts);
				$query->post_count = $sticky_query->post_count + $query->post_count;
			}

			// set the excerpt length
			if( !empty($settings['num-excerpt']) ){
				global $kode_excerpt_length; $kode_excerpt_length = $settings['num-excerpt'];
				add_filter('excerpt_length', 'kode_set_excerpt_length');
			} 
			
			// get blog by the blog style
			global $kode_post_settings, $kode_lightbox_id;
			$kode_lightbox_id++;
			$kode_post_settings['excerpt'] = intval($settings['num-excerpt']);
			// $kode_post_settings['thumbnail-size'] = $settings['thumbnail-size'];			
			$kode_post_settings['news-style'] = $settings['news-style'];			
			
			$ret .= '<div class="news-item-holder row">';
			if($settings['news-style'] == 'news-timeline'){
				$blog_size = 1;
				$kode_post_settings['thumbnail-size'] = 'post-thumbnail-size';
				$ret .= kode_get_news_full($query, $blog_size);	
			}else if($settings['news-style'] == 'news-medium'){
				$blog_size = 2;
				$kode_post_settings['thumbnail-size'] = array(150,150);
				$ret .= kode_get_news_medium($query, $blog_size);			
			}else if(strpos($settings['news-style'], 'news-grid') !== false){
				$blog_size = 3;
				$kode_post_settings['thumbnail-size'] = 'post-thumbnail-size';
				$ret .= kode_get_news_grid($query, $blog_size);			
			}else{
				$blog_size = 2;
				$blog_size = str_replace('news-1-', '', $settings['news-style']);
				$ret .= kode_get_news_grid($query, $blog_size);
			}
			$ret .= '</div>';
			
			if( $settings['pagination'] == 'enable' ){
				$ret .= kode_get_pagination($query->max_num_pages, $args['paged']);
			}
			$ret .= '</div>'; // blog-item-wrapper
			
			remove_filter('excerpt_length', 'kode_set_excerpt_length');
			return $ret;
		}
	}
	
	if( !function_exists('kode_get_blog_item') ){
		function kode_get_blog_item( $settings = array() ){
			$item_id = empty($settings['page-item-id'])? '': ' id="' . $settings['page-item-id'] . '" ';

			global $kode_spaces;
			$margin = (!empty($settings['margin-bottom']) && 
				$settings['margin-bottom'] != $kode_spaces['bottom-blog-item'])? 'margin-bottom: ' . $settings['margin-bottom'] . ';': '';
			$margin_style = (!empty($margin))? ' style="' . $margin . '" ': '';
			
			//$ret  = kode_get_item_title($settings);
			$ret = '';
			$ret .= '<div class="col-md-12 blog-item-wrapper"  ' . $item_id . $margin_style . '>';

			if( strpos($settings['blog-style'], 'blog-1-') !== false && $settings['blog-layout'] == 'carousel' ){
				$ret .= kode_carousel_grid_nav();
			}
			
			// query post and sticky post
			$args = array('post_type' => 'post', 'suppress_filters' => false);
			if( !empty($settings['category']) || !empty($settings['tag']) ){
				$args['tax_query'] = array('relation' => 'OR');
				
				if( !empty($settings['category']) ){
					array_push($args['tax_query'], array('terms'=>explode(',', $settings['category']), 'taxonomy'=>'category', 'field'=>'slug'));
				}
				if( !empty($settings['tag']) ){
					array_push($args['tax_query'], array('terms'=>explode(',', $settings['tag']), 'taxonomy'=>'post_tag', 'field'=>'slug'));
				}				
			}

			// if( $settings['enable-sticky'] == 'enable' ){
				// if( get_query_var('paged') <= 1 ){
					// $sticky_args = $args;
					// $sticky_args['post__in'] = get_option('sticky_posts');
					// if( !empty($sticky_args['post__in']) ){
						// $sticky_query = new WP_Query($sticky_args);	
					// }
				// }
				// $args['post__not_in'] = get_option('sticky_posts', '');
			// }else{
				$args['ignore_sticky_posts'] = 1;
			// }
			$args['posts_per_page'] = (empty($settings['num-fetch']))? '5': $settings['num-fetch'];
			$args['orderby'] = (empty($settings['orderby']))? 'post_date': $settings['orderby'];
			$args['order'] = (empty($settings['order']))? 'desc': $settings['order'];
			$args['paged'] = (get_query_var('paged'))? get_query_var('paged') : get_query_var('page');
			$args['paged'] = empty($args['paged'])? 1: $args['paged'];
			$args['offset'] = (empty($settings['offset']))? 0: $settings['offset'];			
			$query = new WP_Query( $args );

			// merge query
			if( !empty($sticky_query) ){
				$query->posts = array_merge($sticky_query->posts, $query->posts);
				$query->post_count = $sticky_query->post_count + $query->post_count;
			}

			// set the excerpt length
			if( !empty($settings['num-excerpt']) ){
				global $kode_excerpt_length; $kode_excerpt_length = $settings['num-excerpt'];
				add_filter('excerpt_length', 'kode_set_excerpt_length');
			} 
			
			// get blog by the blog style
			global $kode_post_settings, $kode_lightbox_id;
			$kode_lightbox_id++;
			$kode_post_settings['excerpt'] = intval($settings['num-excerpt']);
			//$kode_post_settings['thumbnail-size'] = $settings['thumbnail-size'];			
			$kode_post_settings['blog-style'] = $settings['blog-style'];			
			$kode_post_settings['title-num-fetch'] = $settings['num-title'];			
			
			
			
			
			$ret .= '<div class="blog-item-holder row">';
			if($settings['blog-style'] == 'blog-full'){
				$kode_post_settings['thumbnail-size'] = 'blog-post';
				$ret .= kode_get_blog_full($query);
			}else if($settings['blog-style'] == 'blog-medium'){
				$kode_post_settings['thumbnail-size'] = 'small-grid-size';
				$ret .= kode_get_blog_medium($query);			
			}else if(strpos($settings['blog-style'], 'blog-grid') !== false){
				$kode_post_settings['thumbnail-size'] = 'small-grid-size';
				$blog_size = 4;
				$ret .= kode_get_blog_grid($query, $blog_size, '');			
			}else if(strpos($settings['blog-style'], 'blog-widget') !== false){
				$blog_size = str_replace('blog-widget-1-', '', $settings['blog-style']);
				$ret .= kode_get_blog_widget($query, $blog_size, $settings['blog-layout']);			
			}else{
				$blog_size = str_replace('blog-1-', '', $settings['blog-style']);
				$ret .= kode_get_blog_grid($query, $blog_size, '');
			}
			$ret .= '</div>';
			
			if( $settings['pagination'] == 'enable' ){
				$ret .= kode_get_pagination($query->max_num_pages, $args['paged']);
			}
			$ret .= '</div>'; // blog-item-wrapper
			
			remove_filter('excerpt_length', 'kode_set_excerpt_length');
			return $ret;
		}
	}

	if( !function_exists('kode_get_blog_info') ){
		function kode_get_blog_info( $array = array(), $wrapper = true, $sep = '',$custom_wrap='div' ){
			global $theme_option; $ret = '';
			if( empty($array) ) return $ret;
			$exclude_meta = empty($theme_option['post-meta-data'])? array(): $theme_option['post-meta-data'];
			
			foreach($array as $post_info){
				if( in_array($post_info, $exclude_meta) ) continue;
				if( !empty($sep) ) $ret .= $sep;
				
				switch( $post_info ){
					case 'date':
						$ret .= '<'.$custom_wrap.' class="blog-info blog-date"><i class="fa fa-clock-o"></i>';
						$ret .= '<a href="' . esc_url(get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d'))) . '">';
						$ret .= esc_attr(get_the_time());
						$ret .= '</a>';
						$ret .= '</'.$custom_wrap.'>';	
						break;
					case 'tag':
						$tag = get_the_term_list(get_the_ID(), 'post_tag', '', '<span class="sep">,</span> ' , '' );
						if(empty($tag)) break;					
						$ret .= '<'.$custom_wrap.' class="blog-info blog-tag"><i class="fa fa-tag"></i>';
						$ret .= $tag;						
						$ret .= '</'.$custom_wrap.'>';						
						break;
					case 'category':
						$category = get_the_term_list(get_the_ID(), 'category', '', '<span class="sep">,</span> ' , '' );
						if(empty($category)) break;
						
						$ret .= '<'.$custom_wrap.' class="blog-info blog-category"><i class="fa fa-list"></i>';
						$ret .= $category;					
						$ret .= '</'.$custom_wrap.'>';					
						break;
					case 'comment':
						$ret .= '<'.$custom_wrap.' class="blog-info blog-comment"><i class="fa fa-comment-o"></i>';
						$ret .= '<a href="' . esc_url(get_permalink()) . '#respond" >' . esc_attr(get_comments_number()) . '</a>';						
						$ret .= '</'.$custom_wrap.'>';							
						break;
					case 'author':
						ob_start();
						the_author_posts_link();
						$author = ob_get_contents();
						ob_end_clean();
						
						$ret .= '<'.$custom_wrap.' class="blog-info blog-author"><i class="fa fa-user"></i>';
						$ret .= $author;
						$ret .= '</'.$custom_wrap.'>';						
						break;						
				}
			}
			
			
			if($wrapper && !empty($ret)){
				return '<div class="kode-blog-info kode-info">' . $ret . '<div class="clear"></div></div>';
			}else if( !empty($ret) ){
				return $ret;
			}
			return '';
		}
	}

	if( !function_exists('kode_get_blog_widget') ){
		function kode_get_blog_widget($query, $size){
			$ret = ''; $current_size = 1;
			
			while($query->have_posts()){ $query->the_post();
				if( $current_size % $size == 1 ){
					$ret .= '<div class="clear"></div>';
				}

				$ret .= '<div class="' . esc_attr(kode_get_column_class('1/' . $size)) . '">';
				$ret .= '<div class="kode-item kode-blog-widget">';
				$ret .= '<div class="kode-ux kode-blog-widget-ux">';
				ob_start();
				
				get_template_part('single/content');
				$ret .= ob_get_contents();
				
				ob_end_clean();			
				$ret .= '</div>'; // kode-ux			
				$ret .= '</div>'; // kode-item			
				$ret .= '</div>'; // column_class
				$current_size ++;
			}
			wp_reset_postdata();
			
			return $ret;
		}
	}
	

	if( !function_exists('kode_get_news_medium') ){
		function kode_get_news_medium($query, $size){
			
			$ret = ''; $current_size = 1;
			
			while($query->have_posts()){ $query->the_post();
				if( $current_size % $size == 1 ){
					$ret .= '<div class="clear"></div>';
				}

				$ret .= '<div class="' . esc_attr(kode_get_column_class('1/' . $size)) . '">';
				$ret .= '<div class="news-listing kd-mediumview">';
				$ret .= '<div class="kode-item kode-news-grid">';
				ob_start();
				
				get_template_part('single/content_news');
				$ret .= ob_get_contents();
				
				ob_end_clean();			
				$ret .= '</div>'; // kode-ux			
				$ret .= '</div>'; // kode-item			
				$ret .= '</div>'; // column_class
				$current_size ++;
			}
			$ret .= '<div class="clear"></div>';
			//$ret .= '</div>'; // close the kode-isotope
			wp_reset_postdata();
			
			return $ret;
		}
	}		
	
	if( !function_exists('kode_get_news_full') ){
		function kode_get_news_full($query, $size){
			
			$ret = ''; $current_size = 1;
			$size = 3;
			//$ret .= '<div class="kode-isotope" data-type="blog" data-layout="' . $blog_layout  . '" >';
			while($query->have_posts()){ $query->the_post();
				if( $current_size % $size == 1 ){
					$ret .= '<div class="clear"></div>';
				}

				$ret .= '<div class="' . esc_attr(kode_get_column_class('1/' . $size)) . '">';
				$ret .= '<div class="kode-ux kode-news-grid-ux">';
				ob_start();
				
				get_template_part('single/content_news');
				$ret .= ob_get_contents();
				
				ob_end_clean();			
				$ret .= '</div>'; // kode-ux		
				$ret .= '</div>'; // column_class
				$current_size ++;
			}
			$ret .= '<div class="clear"></div>';
			//$ret .= '</div>'; // close the kode-isotope
			wp_reset_postdata();
			
			return $ret;
		}
	}	
	
	if( !function_exists('kode_get_news_grid') ){
		function kode_get_news_grid($query, $size){
			
			$ret = ''; $current_size = 1;
			
			//$ret .= '<div class="kode-isotope" data-type="blog" data-layout="' . $blog_layout  . '" >';
			while($query->have_posts()){ $query->the_post();
				if( $current_size % $size == 1 ){
					$ret .= '<div class="clear"></div>';
				}

				$ret .= '<div class="' . esc_attr(kode_get_column_class('1/' . $size)) . '">';
				$ret .= '<div class="news-listing">';
				$ret .= '<div class="kode-ux kode-item">';
				ob_start();
				
				get_template_part('single/content_news');
				$ret .= ob_get_contents();
				
				ob_end_clean();			
				$ret .= '</div>'; // kode-ux			
				$ret .= '</div>'; // news-listing		
				$ret .= '</div>'; // column_class
				$current_size ++;
			}
			$ret .= '<div class="clear"></div>';
			//$ret .= '</div>'; // close the kode-isotope
			wp_reset_postdata();
			
			return $ret;
		}
	}	
	
	if( !function_exists('kode_get_blog_grid') ){
		function kode_get_blog_grid($query, $size, $blog_layout = 'fitRows'){
			if($blog_layout == 'carousel'){ return kode_get_blog_grid_carousel($query, $size); }
		
			$ret = ''; $current_size = 1;
			
			//$ret .= '<div class="kode-isotope" data-type="blog" data-layout="' . $blog_layout  . '" >';
			while($query->have_posts()){ $query->the_post();
				if( $current_size % $size == 0){
					$ret .= '<div class="parazit-pol-dnia-iskal"></div>';
				}

				$ret .= '<div class="' . esc_attr(kode_get_column_class('1/' . $size)) . '">';
				$ret .= '<div class="kode-blog-grid-ux kode-item">';
				$ret .= '<div class="kode-ux">';
				ob_start();
				
				get_template_part('single/content');
				$ret .= ob_get_contents();
				
				ob_end_clean();			
				$ret .= '</div>'; // kode-ux				
				$ret .= '</div>'; // kode-item	
				$ret .= '</div>'; // column_class
				$current_size ++;
			}
			$ret .= '<div class="clear"></div>';
			//$ret .= '</div>'; // close the kode-isotope
			wp_reset_postdata();
			
			return $ret;
		}
	}		
	
	if( !function_exists('kode_get_blog_grid_carousel') ){
		function kode_get_blog_grid_carousel($query, $size){
			$ret = ''; 
			
			$ret .= '<div class="kode-blog-carousel-item kode-item" >';
			$ret .= '<div class="flexslider" data-type="carousel" data-nav-container="blog-item-holder" data-columns="' . esc_attr($size) . '" >';	
			$ret .= '<ul class="slides" >';			
			while($query->have_posts()){ $query->the_post();
				$ret .= '<li class="kode-item kode-blog-grid">';
				ob_start();
				
				get_template_part('single/content');
				$ret .= ob_get_contents();
				
				ob_end_clean();					
				$ret .= '</li>'; // kode-item
			}
			$ret .= '</ul>';
			$ret .= '<div class="clear"></div>';
			$ret .= '</div>'; // close the flexslider
			$ret .= '</div>'; // close the kode-item
			wp_reset_postdata();
			
			return $ret;
		}
	}		
	
	if( !function_exists('kode_get_blog_medium') ){
		function kode_get_blog_medium($query){
			$ret = '';$current_size = 1;
			$size = 1;
			while($query->have_posts()){ $query->the_post();
				if( $current_size % $size == 1 ){
					$ret .= '<div class="clear"></div>';
				}

				$ret .= '<div class="' . esc_attr(kode_get_column_class('1/' . $size)) . '">';
				$ret .= '<div class="kode-item kode-blog-medium">';
				ob_start();
				
				get_template_part('single/content');
				$ret .= ob_get_contents();
				
				ob_end_clean();			
				$ret .= '</div>'; // kode-ux			
				$ret .= '</div>'; // kode-item
				$current_size ++;
			}
			wp_reset_postdata();
			
			return $ret;
		}
	}		
	
	if( !function_exists('kode_get_blog_full') ){
		function kode_get_blog_full($query){
			$ret = '';$current_size = 1;
		
			$size = 1;
			while($query->have_posts()){ $query->the_post();
				if( $current_size % $size == 1 ){
					$ret .= '<div class="clear"></div>';
				}
				$ret .= '<div class="' . esc_attr(kode_get_column_class('1/' . $size)) . '">';
				$ret .= '<div class="kode-item kode-blog-full">';
				ob_start();
				
				get_template_part('single/content');
				$ret .= ob_get_contents();
				
				ob_end_clean();			
				$ret .= '</div>'; // kode-ux
				$ret .= '</div>'; // kode-item
				$current_size++;
			}
			wp_reset_postdata();
			
			return $ret;
		}
	}	

?>
