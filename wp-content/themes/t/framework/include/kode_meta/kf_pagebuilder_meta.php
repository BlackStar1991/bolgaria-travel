<?php
	/*	
	*	Kodeforest Admin Panel
	*	---------------------------------------------------------------------
	*	This file create the class that help you create the html elements of  
	*	the page builder area
	*	---------------------------------------------------------------------
	*/	

	if( !class_exists('kode_page_builder_html') ){
		
		class kode_page_builder_html{
		
			public $kode_size = array(
				'1/5' => 'one-fifth column',
				'2/5' => 'two-fifth column',
				'3/5' => 'three-fifth column',
				'4/5' => 'four-fifth column',
				
				'1/4' => 'three columns',
				'1/3' => 'four columns',
				'1/2' => 'six columns',
				'2/3' => 'eight columns',
				'3/4' => 'nine columns',
			    '1/1' => 'tweleve columns'
			);		
			
			public $items = array();
			
			// constucture function to init all items structure
			function __construct($all_items = array()){
				$this->items = $all_items;
			}
		
			// print the draggable wrapper type
			function print_draggable_wrapper($item_atts = array()){
				echo '<div class="kode-draggable kode-draggable-wrapper ';
				echo (!empty($item_atts['size']))? $this->kode_size[$item_atts['size']] : $this->kode_size['1/1'];
				echo '" data-type="' . esc_attr($item_atts['slug']) . '">';
				echo '<div class="kode-item">';
				
				echo '<div class="kode-draggable-head">';
				if(!empty($item_atts['size'])){ 
					echo '<div class="kode-size-wrapper">';
					echo '<div class="kode-size-control">';
					echo '<div class="kode-increase-size"></div>';
					echo '<div class="kode-decrease-size"></div>';
					echo '</div>';
					
					echo '<div class="kode-size-text">' . esc_attr($item_atts['size']) . '</div>';
					echo '</div>'; // kode-size-wrapper 
				}
				
				$item_title = empty($item_atts['item-builder-title'])? $item_atts['title']: $item_atts['item-builder-title'];
				echo '<div class="kode-draggable-text">';
				echo '<input type="text" class="kode-draggable-text-input" value="' . kode_esc_html($item_title) . '" />';
				echo '</div>';
				
				echo (!empty($item_atts['options']))? '<div class="kode-edit-item"></div>': ''; 

				echo '<div class="kode-delete-item"></div>';
				echo '<div class="clear"></div>';
				echo '</div>';
				
				echo '<div class="kode-inner-sortable kode-sortable clear-fix ' . kode_esc_html($item_atts['slug']) . '-sortable">';
				if( !empty($item_atts['inner-item']) ){
					$this->print_page_builder($item_atts['inner-item']);
				}
				echo '</div>';
				
				echo '</div>'; // kode-item
				
				if(!empty($item_atts['options'])){
					$this->print_item_option($item_atts['options']);
				}
				echo '</div>'; // kode-draggable-wrapper			
			}
			
			// print the draggable item type
			function print_draggable_item($item_atts = array()){
				echo '<div class="kode-draggable kode-draggable-item ' . esc_attr($this->kode_size['1/1']) . '" ';
				echo 'data-type="' . esc_attr($item_atts['slug']) . '" ';
				echo '>';
				echo '<div class="kode-item">';
				
				$item_title = empty($item_atts['item-builder-title'])? $item_atts['title']: $item_atts['item-builder-title'];
				echo '<div class="kode-draggable-text">';
				echo '<input type="text" class="kode-draggable-text-input" value="' . esc_attr($item_title) . '" />';
				echo '</div>';
	
				if(!empty($item_atts['options'])){ 
					echo '<div class="kode-edit-item"></div>'; 
				}
				echo '<div class="kode-delete-item"></div>';
				echo '</div>';			
				
				if(!empty($item_atts['options'])){
					$this->print_item_option($item_atts['options']);
				}
				echo '</div>'; //kode-draggable-item			
			}
			
			// print default option
			function print_item_option($options){
				echo '<div class="kode-item-option">';
				echo '<div data-name="page-item-id" data-value="';
				echo empty($options['page-item-id']['value'])? '': esc_attr($options['page-item-id']['value']);
				echo '" >';
				echo'</div>';
				foreach($options as $option_slug => $option){
					echo '<div data-name="' . $option_slug . '" ';
					foreach( $option as $att_slug => $att ){
						if( !is_array( $att ) ){
							echo 'data-' . esc_attr($att_slug) . '="' . esc_attr($att) . '" ';
						}
					}					
					echo '>';
					if( !empty($option['options']) ){						
						echo json_encode($option['options']);
					}
					if( $option['type'] == 'upload' ){
						if( !empty($option['value']) && is_numeric($option['value']) ){ 
							$thumbnail = wp_get_attachment_image_src($option['value'], 'full');
							echo esc_url($thumbnail[0]);
						}else if( !empty($option['value']) ){
							echo esc_url($option['value']);
						}
					}
					echo '</div>';
				}
				echo '</div>';
			
			}
			
			// print page builder from the save data
			function print_page_builder( $items = array() ){
				if( !is_array($items) ) return;
				
				foreach( $items as $item ){
					if( $item['item-type'] == 'wrapper' ){
						$current_item = $this->items[ $item['type'] ];
						$current_item['slug'] = $item['type'];
						$current_item['item-builder-title'] = empty($item['item-builder-title'])? '': $item['item-builder-title'];
						$current_item['inner-item'] = $item['items'];
						if( !empty($item['size']) ){
							$current_item['size'] = $item['size'];
						}
						
						foreach( $item['option'] as $name => $option ){
							if( !empty($current_item['options'][$name]) || $name == 'page-item-id' ){
								$current_item['options'][$name]['value'] = $option;
							}						
						}
						
						$this->print_draggable_wrapper( $current_item );	
					}else if( $item['item-type'] == 'item' ){
						$this->print_page_builder_item( $item ); 
					}
				}
			}
			
			// print page builder item from save data
			function print_page_builder_item( $item ){
				$current_item = $this->items[ $item['type'] ];
				$current_item['slug'] = $item['type'];
				$current_item['item-builder-title'] = empty($item['item-builder-title'])? '': $item['item-builder-title'];
				
				foreach( $item['option'] as $name => $option ){
					if( !empty($current_item['options'][$name]) || $name == 'page-item-id' ){
						$current_item['options'][$name]['value'] = $option;
					}
				}
				
				$this->print_draggable_item($current_item);			
			}
			
		}

	}
		
?>