<?php
	/*	
	*	Testimonial Listing
	*	---------------------------------------------------------------------
	*	This file contains functions that help you create testimonial item
	*	---------------------------------------------------------------------
	*/
	
	//Testimonial Listing
	if( !function_exists('kode_get_testimonial_item') ){
		function kode_get_testimonial_item( $settings ){
			// query posts section
			$args = array('post_type' => 'testimonial', 'suppress_filters' => false);
			$args['posts_per_page'] = (empty($settings['num-fetch']))? '5': esc_attr($settings['num-fetch']);
			$args['orderby'] = (empty($settings['orderby']))? 'post_date': esc_attr($settings['orderby']);
			$args['order'] = (empty($settings['order']))? 'desc': esc_attr($settings['order']);
			//$args['paged'] = (get_query_var('paged'))? get_query_var('paged') : 1;

			if( !empty($settings['category']) ){
				$args['tax_query'] = array('relation' => 'OR');
				
				if( !empty($settings['category']) ){
					array_push($args['tax_query'], array('terms'=>explode(',', $settings['category']), 'taxonomy'=>'testimonial_category', 'field'=>'slug'));
				}
				// if( !empty($settings['tag'])){
					// array_push($args['tax_query'], array('terms'=>explode(',', $settings['tag']), 'taxonomy'=>'testimonial_tag', 'field'=>'slug'));
				// }				
			}			
			$query = new WP_Query( $args );

			// create the testimonial filter
			$settings['num-excerpt'] = empty($settings['num-excerpt'])? 0: $settings['num-excerpt'];
			$size = 4;
			if($settings['testimonial-style'] == 'normal-view'){
				$testimonial  = '<div class="kd-testimonial" > <ul class="bxslider">';
			}else if($settings['testimonial-style'] == 'modern-view'){
				$testimonial  = '<div class="kd-testimonial kdtwitter" > <ul class="bxslider">';
			}else if($settings['testimonial-style'] == 'grid-view'){
			$testimonial  = '<div class="col-md-12 kd-testimonial">
                <ul class="row">';
			}
			
			$size = 3;
			$current_size = 0 ;
			while($query->have_posts()){ $query->the_post();
			global $post;
			$testimonial_option = json_decode(kode_decode_stopbackslashes(get_post_meta($post->ID, 'post-option', true)), true);
				// if( $current_size % $size == 0 ){
					// $testimonial .= '<div class="clear"></div>';
				// }	designation
				if($settings['testimonial-style'] == 'normal-view'){
					$testimonial .= "
					 <li>
                      <i>''</i>
                     <p>".esc_attr(strip_tags(substr(get_the_content(),0,$settings['num-excerpt'])))."</p>
                      <span>".esc_attr($testimonial_option['designation'])."</span>
                    </li>
					";
				}else if($settings['testimonial-style'] == 'modern-view'){
				$testimonial .= '
				<li>
					<h2>'.esc_attr(get_the_title()).'</h2>
					<p>'.esc_attr(strip_tags(substr(get_the_content(),0,$settings['num-excerpt']))).'</p>
					<a href="'.esc_url(get_permalink()).'">'.esc_attr($testimonial_option['designation']).'</a>
				</li>';
				}else if($settings['testimonial-style'] == 'grid-view'){
				$testimonial .= '<li class="' . esc_attr(kode_get_column_class('1/' . $size)) . '">
					<div class="kd-testmnl-info">
						<i class="fa fa-quote-left fa-3x"></i>
						<p>'.esc_attr(strip_tags(substr(get_the_content(),0,$settings['num-excerpt']))).'</p></div>
						<figure><a href="'.esc_url(get_permalink()).'" class="kd-thumb">'.get_the_post_thumbnail($post->ID, array(80,80)).'</a>
						<figcaption>
							<h2><a class="thcolorhover" href="'.esc_url(get_permalink()).'">'.esc_attr(get_the_title()).'</a></h2>
							<span>'.esc_attr($testimonial_option['designation']).'</span>
						</figcaption>
					</figure></li>';
				}
				$current_size++;
			}
			$testimonial .= '</ul></div>';
			
			return $testimonial;
		}
	}	
	
?>