<?php
	/*	
	*	Kodeforest Event Option file
	*	---------------------------------------------------------------------
	*	This file creates all post options to the post page
	*	---------------------------------------------------------------------
	*/

	// add work in page builder area
	add_filter('kode_page_builder_option', 'kode_register_event_item');
	if( !function_exists('kode_register_event_item') ){
		function kode_register_event_item( $page_builder = array() ){
			global $kode_spaces;
			$page_builder['content-item']['options']['events'] = array(
				'title'=> __('Events', 'kodeforest'), 
				'type'=>'item',
				'options'=> array(					
					'category'=> array(
						'title'=> __('Category' ,'kode_forest'),
						'type'=> 'multi-combobox',
						'options'=> kode_get_term_list('event-categories'),
						'description'=> __('You can use Ctrl/Command button to select multiple categories or remove the selected category. <br><br> Leave this field blank to select all categories.', 'kode_forest')
					),	
					'tag'=> array(
						'title'=> __('Tag' ,'kode_forest'),
						'type'=> 'multi-combobox',
						'options'=> kode_get_term_list('event-tags'),
						'description'=> __('You can use Ctrl/Command button to select multiple categories or remove the selected category. <br><br> Leave this field blank to select all categories.', 'kode_forest')
					),	
					'num-excerpt'=> array(
						'title'=> __('Num Excerpt (Word)' ,'kode_forest'),
						'type'=> 'text',	
						'default'=> '25',
						'description'=> __('This is a number of word (decided by spaces) that you want to show on the post excerpt. <strong>Use 0 to hide the excerpt, -1 to show full posts and use the wordpress more tag</strong>.', 'kode_forest')
					),	
					'num-fetch'=> array(
						'title'=> __('Num Fetch' ,'kode_forest'),
						'type'=> 'text',	
						'default'=> '8',
						'description'=> __('Specify the number of posts you want to pull out.', 'kode_forest')
					),										
					'event-style'=> array(
						'title'=> __('Event Style' ,'kode_forest'),
						'type'=> 'combobox',
						'options'=> array(
							'event-grid' => __('Event Grid', 'kode_forest'),
							'event-full' => __('Event Full', 'kode_forest'),
						),
						'default'=>'event-full'
					),		
					'scope'=> array(
						'title'=> __('Event Scope' ,'kode_forest'),
						'type'=> 'combobox',
						'options'=> array(
							'past' => __('Past Events', 'kode_forest'), 
							'future' => __('Upcoming Events', 'kode_forest'), 
							'all' => __('All Events', 'kode_forest'), 
						)
					),
					'order'=> array(
						'title'=> __('Order' ,'kode_forest'),
						'type'=> 'combobox',
						'options'=> array(
							'desc'=>__('Descending Order', 'kode_forest'), 
							'asc'=> __('Ascending Order', 'kode_forest'), 
						)
					),									
					// 'pagination'=> array(
						// 'title'=> __('Enable Pagination' ,'kode_forest'),
						// 'type'=> 'checkbox'
					// ),										
					'margin-bottom' => array(
						'title' => __('Margin Bottom', 'kode_forest'),
						'type' => 'text',
						'default' => '',
						'description' => __('Spaces after ending of this item', 'kode_forest')
					),					
				)
			);
			return $page_builder;
		}
	}
	
	if( !function_exists('kode_get_event_info') ){
		function kode_get_event_info( $array = array(), $wrapper = true, $sep = '',$div_wrap = 'div' ){
			global $theme_option; $ret = '';
			if( empty($array) ) return $ret;
			$exclude_meta = empty($theme_option['post-meta-data'])? array(): $theme_option['post-meta-data'];
			
			foreach($array as $post_info){
				if( in_array($post_info, $exclude_meta) ) continue;
				if( !empty($sep) ) $ret .= $sep;
				
				switch( $post_info ){
					case 'date':
						$ret .= '<'.$div_wrap.' class="event-info event-date"><i class="fa fa-clock-o"></i>';
						$ret .= '<a href="' . esc_url(get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d'))) . '">';
						$ret .= esc_attr(get_the_time());
						$ret .= '</a>';
						$ret .= '</'.$div_wrap.'>';
						break;
					case 'tag':
						$tag = get_the_term_list(get_the_ID(), 'event-tags', '', '<span class="sep">,</span> ' , '' );
						if(empty($tag)) break;					
					
						$ret .= '<'.$div_wrap.' class="event-info event-tags"><i class="fa fa-tag"></i>';
						$ret .= $tag;						
						$ret .= '</'.$div_wrap.'>';					
						break;
					case 'category':
						$category = get_the_term_list(get_the_ID(), 'event-categories', '', '<span class="sep">,</span> ' , '' );
						if(empty($category)) break;
						
						$ret .= '<'.$div_wrap.' class="event-info event-category"><i class="fa fa-list"></i>';
						$ret .= $category;					
						$ret .= '</'.$div_wrap.'>';			
						break;
					case 'comment':
						$ret .= '<'.$div_wrap.' class="event-info event-comment"><i class="fa fa-comment-alt"></i>';
						$ret .= '<a href="' . esc_url(get_permalink()) . '#respond" >' . esc_attr(get_comments_number()) . '</a>';						
						$ret .= '</'.$div_wrap.'>';					
						break;
					case 'author':
						ob_start();
						the_author_posts_link();
						$author = ob_get_contents();
						ob_end_clean();
						
						$ret .= '<'.$div_wrap.' class="event-info event-author"><i class="fa fa-user"></i>';
						$ret .= $author;
						$ret .= '</'.$div_wrap.'>';			
						break;						
				}
			}
			
			
			if($wrapper && !empty($ret)){
				return '<div class="kode-event-info kode-info">' . $ret . '<div class="clear"></div></div>';
			}else if( !empty($ret) ){
				return $ret;
			}
			return '';
		}
	}
	
	//Event Listing
	if( !function_exists('kode_get_events_item') ){
		function kode_get_events_item( $settings ){
			
			// $settings['category'];
			// $settings['tag'];
			// $settings['num-excerpt'];
			// $settings['num-fetch'];
			// $settings['event-style'];
			// $settings['scope'];
			// $settings['order'];
			// $settings['margin-bottom'];
			$evn = '';
			$order = 'DESC';
			$limit = 10;//Default limit
			$offset = '';		
			$rowno = 0;
			$event_count = 0;
			$EM_Events = EM_Events::get( array('category'=>$settings['category'], 'group'=>'this','scope'=>$settings['scope'], 'limit' => $settings['num-fetch'], 'order' => $settings['order']) );
			$events_count = count ( $EM_Events );	
			$current_size = 0;
			$size = 1;
			$evn = '<div class="event-listing">';
			if($settings['event-style'] == 'event-grid'){
				$size = 2;
				$evn = '<div class="event-listing event-list-grid row">';
			}else{
				$size = 1;
				$evn = '<div class="event-listing row">';
			}
			
			foreach ( $EM_Events as $event ) {
				$event_year = date('Y',$event->start);
				$event_month = date('m',$event->start);
				$event_day = date('d',$event->start);
				$event_start_time = date("G,i,s", strtotime($event->start_time));
				$location = esc_attr($event->get_location()->name);
				
				if( $current_size % $size == 0 ){
					$evn .= '<div class="clear clearfix"></div>';
				}	
    
				if($settings['event-style'] == 'event-grid'){
					$evn .= '<div class="' . esc_attr(kode_get_column_class('1/' . $size)) . '">
					<article class="kdevent">
                      <div class="event-date-image">
						<figure>
							<div class="event-date">
								<span class="kdmunth">'.esc_attr(date('d',$event->start)).' <small>'.esc_attr(date('M',$event->start)).'</small></span>
								<span class="kdtime"><i class="fa fa-clock-o"></i> <time datetime="'.esc_attr(date(get_option('time_format'),strtotime($event->start_time))).'">'.esc_attr(date(get_option('time_format'),strtotime($event->start_time))).'</time></span>
							</div>
							 <a href="'.esc_url($event->guid).'">
								'.get_the_post_thumbnail($event->post_id, 'small-grid-size').'
							</a>
							<figcaption>
								<div class="countdown" data-year="'.esc_attr($event_year).'" data-month="'.esc_attr($event_month).'" data-day="'.esc_attr($event_day).'" data-time="'.esc_attr($event_start_time).'" id="defaultCountdown-'.esc_attr($event->post_id).'"></div>
							</figcaption>
						</figure>
					  </div>
                      <div class="event-info">
							<h2><a href="'.esc_url($event->guid).'">'.esc_attr($event->post_title).'</a></h2>
							<span><i class="fa fa-map-marker"></i> '.$location.'</span>
							<p>'.kode_esc_html_excerpt(substr($event->post_content,0,169)).'</p>
							<a href="'.esc_url($event->guid).'" class="kd-booknow thbg-color">'.esc_attr__('Book Now','kode_forest').'</a>
                      </div>
                    </article>
					</div>
					';
				
				
				}else{
				$evn .= '<div class="' . esc_attr(kode_get_column_class('1/' . $size)) . '">
					<article class="kdevent">
						<div class="event-date">
							<span class="kdmunth">'.esc_attr(date('d',$event->start)).' <small>'.esc_attr(date('M',$event->start)).'</small></span>
							<span class="kdtime"><i class="fa fa-clock-o"></i> <time datetime="'.esc_attr(date(get_option('time_format'),strtotime($event->start_time))).'">'.esc_attr(date(get_option('time_format'),strtotime($event->start_time))).'</time></span>
						</div>
						
						<figure>
							<a href="'.esc_url($event->guid).'">
								'.get_the_post_thumbnail($event->post_id, 'team-size').'
							</a>
							<figcaption>
								<div class="countdown" data-year="'.esc_attr($event_year).'" data-month="'.esc_attr($event_month).'" data-day="'.esc_attr($event_day).'" data-time="'.esc_attr($event_start_time).'" id="defaultCountdown-'.esc_attr($event->post_id).'"></div>
							</figcaption>
						</figure>
						<div class="event-info">
							<h2><a href="'.esc_url($event->guid).'">'.esc_attr($event->post_title).'</a></h2>
							<span><i class="fa fa-map-marker"></i> '.$location.'</span>
							<p>'.esc_attr(strip_tags(substr($event->post_content,0,169))).'</p>
							<a href="'.esc_url($event->guid).'" class="kd-booknow thbg-color">'.esc_attr__('Book Now','kode_forest').'</a>
						</div>
					</article>
				</div>';
				}
				$current_size++;
			}
			
			$evn .= '</div>';	
			
		return $evn;
		}
	}
	
?>