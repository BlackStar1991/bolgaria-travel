<?php
	/*	
	*	Kodeforest Woo Option file
	*	---------------------------------------------------------------------
	*	This file creates all post options to the post page
	*	---------------------------------------------------------------------
	*/

	// add work in page builder area
	add_filter('kode_page_builder_option', 'kode_register_woo_item');
	if( !function_exists('kode_register_woo_item') ){
		function kode_register_woo_item( $page_builder = array() ){
			global $kode_spaces;
			$page_builder['content-item']['options']['woo'] = array(
				'title'=> __('WooCommerce', 'kodeforest'), 
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
	
?>