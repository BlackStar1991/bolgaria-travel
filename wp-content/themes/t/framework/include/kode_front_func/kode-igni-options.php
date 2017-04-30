<?php
	/*	
	*	Kodeforest Event Option file
	*	---------------------------------------------------------------------
	*	This file creates all post options to the post page
	*	---------------------------------------------------------------------
	*/

	// add work in page builder area
	add_filter('kode_page_builder_option', 'kode_register_igni_item');
	if( !function_exists('kode_register_igni_item') ){
		function kode_register_igni_item( $page_builder = array() ){
			global $kode_spaces;
			$page_builder['content-item']['options']['ignitiondeck'] = array(
				'title'=> __('Crowd Funding', 'kodeforest'), 
				'type'=>'item',
				'options'=> array(					
					'category'=> array(
						'title'=> __('Category' ,'kode_forest'),
						'type'=> 'multi-combobox',
						'options'=> kode_get_term_list('project_category'),
						'description'=> __('You can use Ctrl/Command button to select multiple categories or remove the selected category. <br><br> Leave this field blank to select all categories.', 'kode_forest')
					),	
					'tag'=> array(
						'title'=> __('Project Types' ,'kode_forest'),
						'type'=> 'multi-combobox',
						'options'=> kode_get_term_list('project_type'),
						'description'=> __('You can use Ctrl/Command button to select multiple project types or remove the selected type. <br><br> Leave this field blank to select all categories.', 'kode_forest')
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
					// 'project-style'=> array(
						// 'title'=> __('Project Style' ,'kode_forest'),
						// 'type'=> 'combobox',
						// 'options'=> array(
							// 'project-grid' => __('Project Grid', 'kode_forest'),
							// 'project-full' => __('Project Full', 'kode_forest'),
						// ),
						// 'default'=>'project-full'
					// ),		
					'order'=> array(
						'title'=> __('Order' ,'kode_forest'),
						'type'=> 'combobox',
						'options'=> array(
							'desc'=>__('Descending Order', 'kode_forest'), 
							'asc'=> __('Ascending Order', 'kode_forest'), 
						)
					),									
					'pagination'=> array(
						'title'=> __('Enable Pagination' ,'kode_forest'),
						'type'=> 'checkbox'
					),								
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
	
	//Crowd Funding Listing
	if( !function_exists('kode_get_crowdfunding_item') ){
		function kode_get_crowdfunding_item( $settings ){
						
			$item_id = empty($settings['page-item-id'])? '': ' id="' .esc_attr( $settings['page-item-id'] ). '" ';
		
			global $kode_spaces;
			$margin = (!empty($settings['margin-bottom']) && 
				$settings['margin-bottom'] != $kode_spaces['bottom-blog-item'])? 'margin-bottom: ' .esc_attr( $settings['margin-bottom'] ). ';': '';
			$margin_style = (!empty($margin))? ' style="' .esc_attr( $margin ). '" ': '';

			$ret  = '';	
			$ret .= '<div class="kf-crowdfund row" ' . $item_id . $margin_style . '>'; 
			
			// query section
			// query post and sticky post
			$args = array('post_type' => 'ignition_product', 'suppress_filters' => false);
			if( !empty($settings['category']) || !empty($settings['tag']) ){
				$args['tax_query'] = array('relation' => 'OR');
				
				if( !empty($settings['category']) ){
					array_push($args['tax_query'], array('terms'=>explode(',', $settings['category']), 'taxonomy'=>'project_category', 'field'=>'slug'));
				}
				if( !empty($settings['tag']) ){
					array_push($args['tax_query'], array('terms'=>explode(',', $settings['tag']), 'taxonomy'=>'project_type', 'field'=>'slug'));
				}				
			}
			$args['posts_per_page'] = (empty($settings['num-fetch']))? '5': $settings['num-fetch'];
			$args['orderby'] = (empty($settings['orderby']))? 'post_date': $settings['orderby'];
			$args['order'] = (empty($settings['order']))? 'desc': $settings['order'];
			$args['paged'] = (get_query_var('paged'))? get_query_var('paged') : get_query_var('page');
			$args['paged'] = empty($args['paged'])? 1: $args['paged'];
			$args['offset'] = (empty($settings['offset']))? 0: $settings['offset'];			
			$query = new WP_Query( $args );
			$size = 3;
			$current_size = '';
			while($query->have_posts()){ $query->the_post();
				global $post;
				if( $current_size % $size == 0 ){
					$ret .= '<div class="clear"></div>';
				}
				
				$kode_ign_fund_end = get_post_meta($post->ID, 'ign_fund_end', true);
				$kode_ignition_datee = date('d-m-Y h:i:s',strtotime($kode_ign_fund_end));
				$kode_ign_project_id = get_post_meta($post->ID, 'ign_project_id', true);
				$kode_ign_fund_goal = get_post_meta($post->ID, 'ign_fund_goal', true);
				$kode_ign_product_image1 = get_post_meta($post->ID, 'ign_product_image1', true);
				$kode_thumbnail_id = get_post_thumbnail_id( $post->ID, 'ign_project_id', true );
				$kode_getPledge_cp = getPledge_cp($kode_ign_project_id);
				$kode_current_date = date('d-m-Y h:i:s');
				$kode_project_date = new DateTime($kode_ignition_datee);
				$kode_current = new DateTime($kode_current_date);
				$kode_days = round(($kode_project_date->format('U') - $kode_current->format('U')) / (60*60*24));
				$thumbnail = wp_get_attachment_image_src( $kode_thumbnail_id , 'small-grid-size' );
					$ret .= '<div class="kdcroud ' . esc_attr(kode_get_column_class('1/' . $size)) . ' compact">
						<div class="kode-ux">
							<figure>
								<a href="'.esc_url(get_permalink()).'"><img src="'.$thumbnail[0].'" alt="'.esc_attr(get_the_title()).'"></a>					
								<a href="'.esc_url(get_permalink()).'" class="kd-readmore"><i class="fa fa-heart"></i>'.esc_attr__(' Donate Now','kodeforest').'</a>
							</figure>
							<div class="croudinfo">
								<h3><a href="'.esc_url(get_permalink()).'">'.esc_attr(get_the_title($post->ID)).'</a></h3>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: '.esc_attr(getPercentRaised_cp($kode_ign_project_id)).'%;">
										<span class="sr-only">'.esc_attr(getPercentRaised_cp($kode_ign_project_id)).'% '.esc_attr__('Complete','kodeforest').'</span>
									</div>
								</div>
								<ul class="croudoption">
									<li><span class="kdprice">$'.esc_attr(getTotalProductFund_cp($kode_ign_project_id)).'</span> <span>'.esc_attr__('Raised','kodeforest').'</span> </li>
									<li><span class="kdprice">'.esc_attr($kode_getPledge_cp[0]->p_number).'</span> <span>'.esc_attr__('Donors','kodeforest').'</span> </li>
									<li><span class="kdprice">$'.esc_attr($kode_ign_fund_goal).'</span> <span>'.esc_attr__('Goal','kodeforest').'</span> </li>
								</ul>
							</div>
						</div>
					</div>';
				$current_size++;				
			}	
			
			if( $settings['pagination'] == 'enable' ){
				$ret .= '<div class="kode_pagi col-md-12">';
				$ret .= kode_get_pagination($query->max_num_pages, $args['paged']);
				$ret .=  '</div>';
			}
			$ret .= '</div>';
			
			return $ret;
		}
	}
	
	
	if( !function_exists('getTotalProductFund_cp') ){
		function getTotalProductFund_cp($productid) {
			global $wpdb;		
			
			$sql = "Select SUM(prod_price) AS prod_price from ".$wpdb->prefix . "ign_pay_info where product_id='".$productid."'";
			
			$result = $wpdb->get_row($sql);
			if ($result->prod_price != NULL || $result->prod_price != 0)
				return $result->prod_price;
			else
				return 0;
		}
	}
	
	if( !function_exists('getProjectGoal_cp') ){
		function getProjectGoal_cp($project_id) {
			global $wpdb;
			$goal_return = array('');
			$goal_query = $wpdb->prepare('SELECT goal FROM '.$wpdb->prefix.'ign_products WHERE id=%d', $project_id);
			$goal_return = $wpdb->get_row($goal_query);
			if($goal_return <> ''){
				return $goal_return->goal;
			}
		}
	}
	
	if( !function_exists('getPledge_cp') ){
		function getPledge_cp($project_id) {
			global $wpdb;

			$p_query = "SELECT count(*) as p_number FROM ".$wpdb->prefix . "ign_pay_info where product_id='".$project_id."'";
			//$goal_query = $wpdb->prepare('SELECT goal FROM '.$wpdb->prefix.'ign_products WHERE id=%d', $project_id);
			$p_counts = $wpdb->get_results($p_query);
			return $p_counts;
		}
	}

	if( !function_exists('getPercentRaised_cp') ){
		function getPercentRaised_cp($project_id) {
			global $wpdb;
			$total = getTotalProductFund_cp($project_id);
			$goal = getProjectGoal_cp($project_id);
			$percent = 0;
			if ($total > 0) {
				$percent = number_format($total/$goal*100, 2, '.', '');
			}
			return $percent;
		}
	}
	
?>