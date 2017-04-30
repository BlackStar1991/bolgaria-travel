<?php
	/*	
	*	Kodeforest Admin Panel
	*	---------------------------------------------------------------------
	*	This file create the class that help you create the controls admin  
	*	option for custom theme
	*	---------------------------------------------------------------------
	*/	
	
	if( !class_exists('kode_generate_admin_html') ){
		
		class kode_generate_admin_html{
			
			// decide to generate each option by type
			function kode_generate_html($settings = array()){
				echo '<div class="kode-option-wrapper ';
				echo (isset($settings['wrapper-class']))? $settings['wrapper-class'] : '';
				echo '">';
				
				$description_class = empty($settings['description'])? '': 'with-description';
				echo '<div class="kode-option ' . kode_esc_html($description_class) . '">';
				
				// option title
				if( !empty($settings['title']) ){
					echo '<div class="kode-option-title">' . kode_esc_html($settings['title']) . '</div>';
				}
				
				// input option
				switch ($settings['type']){
					case 'text': $this->show_text_input($settings); break;
					case 'textarea': $this->show_textarea($settings); break;
					case 'combobox': $this->show_combobox($settings); break;					
					case 'combobox_sidebar': $this->show_combobox_sidebar($settings); break;					
					case 'multi-combobox': $this->show_multi_combobox($settings); break;
					case 'checkbox': $this->show_checkbox($settings); break;
					case 'radioimage': $this->show_radio_image($settings); break;
					case 'colorpicker': $this->show_color_picker($settings); break;					
					case 'sliderbar': $this->show_slider_bar($settings); break;
					case 'slider': $this->show_slider($settings); break;
					case 'sidebar': $this->show_sidebar_data($settings); break;
					case 'font_option': $this->print_font_combobox($settings); break;
					case 'upload': $this->show_upload_box($settings); break;
					case 'custom': $this->show_custom_option($settings); break;
					case 'date-picker': $this->show_date_picker($settings); break;
				}
				
				// input descirption
				if( !empty($settings['description']) ){
					echo '<div class="kode-input-description"><span>' . kode_esc_html($settings['description']) . '<span></div>';
					echo '<div class="clear"></div>';
				}
				
				echo '</div>'; // kode-option
				echo '</div>'; // kode-option-wrapper				
			}
			
			function show_sidebar_data($settings = array()){
				global $theme_option;
				// print_R($theme_option);
				// print_r($settings);
				
				echo '<div class="kode-option-input">';
				echo '<input type="text" class="kode-upload-box-input" data-slug="' . kode_esc_html($settings['slug']) . '" value="' . kode_esc_html($settings['placeholder']) . '" rel="' . kode_esc_html($settings['placeholder']) . '">';
				echo '<div id="' . kode_esc_html($settings['slug']) . '" class="kdf-button">'.__('Add','kodeforest').'</div>';
				
				echo '<div class="clear"></div>';
				echo '</div>';
								
				echo '<div id="selected-sidebar" class="sidebar-default-k">';
					echo '<div class="default-sidebar-item" id="sidebar-item">';
						echo '<div class="panel-delete-sidebar"></div>';
						echo '<div class="slider-item-text"></div>';
						echo '<input type="hidden" id="sidebar">';
					echo '</div>';
					if(isset($settings['value'] )){
						foreach($settings['value'] as $item){
							echo '
							<div id=" " class="sidebar-item" style="">
								<div class="panel-delete-sidebar"></div>
								<div class="slider-item-text">'.esc_attr($item).'</div>
								<input type="hidden" id="sidebar" name="' . kode_esc_html($settings['slug']) . '[]" data-slug="' . kode_esc_html($settings['slug']) . '[]" value="'.esc_attr($item).'">
							</div>';
						}
					}
				echo '</div>';	
			
			}
			
			
			// print custom option
			function show_custom_option($settings = array()){
				echo '<div class="kode-option-input">';
				echo $settings['option'];
				echo '</div>';
			}
			
			
			
			// print the input text
			function show_text_input($settings = array()){
				echo '<div class="kode-option-input">';
				echo '<input type="text" class="kdf-text-input" name="' . kode_esc_html($settings['name']) . '" data-slug="' . kode_esc_html($settings['slug']) . '" ';
				if( isset($settings['value']) ){
					echo 'value="' . esc_attr($settings['value']) . '" ';
				}else if( !empty($settings['default']) ){
					echo 'value="' . esc_attr($settings['default']) . '" ';
				}
				echo '/>';
				echo '</div>';
			}
			
			// print the date picker
			function show_date_picker($settings = array()){
				echo '<div class="kode-option-input">';
				echo '<input type="text" class="kdf-text-input kode-date-picker" name="' . kode_esc_html($settings['name']) . '" data-slug="' . kode_esc_html($settings['slug']) . '" ';
				if( isset($settings['value']) ){
					echo 'value="' . esc_attr($settings['value']) . '" ';
				}else if( !empty($settings['default']) ){
					echo 'value="' . esc_attr($settings['default']) . '" ';
				}
				echo '/>';
				echo '</div>';
			}			
			
			// print the textarea
			function show_textarea($settings = array()){
				echo '<div class="kode-option-input ';
				echo (!empty($settings['class']))? esc_attr($settings['class']): '';
				echo '">';
				
				echo '<textarea name="' . kode_esc_html($settings['slug']) . '" data-slug="' . kode_esc_html($settings['slug']) . '" ';
				echo (!empty($settings['class']))? 'class="' . kode_esc_html($settings['class']) . '"': '';
				echo '>';
				if( isset($settings['value']) ){
					echo kode_esc_html($settings['value']);
				}else if( !empty($settings['default']) ){
					echo kode_esc_html($settings['default']);
				}
				echo '</textarea>';
				echo '</div>';
			}		

			// print the combobox
			function show_combobox($settings = array()){
				echo '<div class="kode-option-input">';
				
				$value = '';
				if( !empty($settings['value']) ){
					$value = $settings['value'];
				}else if( !empty($settings['default']) ){
					$value = $settings['default'];
				}
				
				echo '<div class="kode-combobox-wrapper">';
				echo '<select name="' . esc_attr($settings['name']) . '" data-slug="' . esc_attr($settings['slug']) . '" >';
				foreach($settings['options'] as $slug => $name ){
					echo '<option value="' . kode_esc_html($slug) . '" ';
					echo ($value == $slug)? 'selected ': '';
					echo '>' . kode_esc_html($name) . '</option>';
				
				}
				echo '</select>';
				echo '</div>'; // kode-combobox-wrapper
				
				echo '</div>';
			}
			
			// print the combobox
			function show_combobox_sidebar($settings = array()){
				echo '<div class="kode-option-input">';
				
				$value = '';
				if( !empty($settings['value']) ){
					$value = $settings['value'];
				}else if( !empty($settings['default']) ){
					$value = $settings['default'];
				}
				
				echo '<div class="kode-combobox-wrapper">';
				echo '<select name="' . esc_attr($settings['name']) . '" data-slug="' . esc_attr($settings['slug']) . '" >';
				foreach($settings['options'] as $slug => $name ){
					echo '<option value="' . kode_esc_html($name) . '" ';
					echo ($value == $name)? 'selected ': '';
					echo '>' . kode_esc_html($name) . '</option>';
				
				}
				echo '</select>';
				echo '</div>'; // kode-combobox-wrapper
				
				echo '</div>';
			}
			
			// print the combobox
			function show_multi_combobox($settings = array()){
				echo '<div class="kode-option-input">';

				if( !empty($settings['value']) ){
					$value = $settings['value'];
				}else if( !empty($settings['default']) ){
					$value = $settings['default'];
				}else{
					$value = array();
				}

				echo '<div class="kode-multi-combobox-wrapper">';
				echo '<select name="' . kode_esc_html($settings['name']) . '[]" data-slug="' . kode_esc_html($settings['slug']) . '" multiple >';
				foreach($settings['options'] as $slug => $name ){
					echo '<option value="' . esc_attr($slug) . '" ';
					echo (in_array($slug, $value))? 'selected ': '';
					echo '>' . kode_esc_html($name) . '</option>';
				
				}
				echo '</select>';
				echo '</div>'; // kode-combobox-wrapper
				
				echo '</div>';
			}			

			
			// print the checkbox ( enable / disable )
			function show_checkbox($settings = array()){
				echo '<div class="kode-option-input">';
				
				$value = 'enable';
				if( !empty($settings['value']) ){
					$value = $settings['value'];
				}else if( !empty($settings['default']) ){
					$value = $settings['default'];
				}
				
				echo '<label for="' . kode_esc_html($settings['slug']) . '-id" class="checkbox-wrapper">';
				echo '<div class="checkbox-appearance ' . kode_esc_html($value) . '" > </div>';
				
				echo '<input type="hidden" name="' . kode_esc_html($settings['name']) . '" value="disable" />';
				echo '<input type="checkbox" name="' . kode_esc_html($settings['name']) . '" id="' . kode_esc_html($settings['slug']) . '-id" data-slug="' . kode_esc_html($settings['slug']) . '" ';
				echo ($value == 'enable')? 'checked': '';
				echo ' value="enable" />';	
				
				echo '</label>';		
				
				echo '</div>';
			}		

			// print the radio image
			function show_radio_image($settings = array()){
				echo '<div class="kode-option-input">';
				
				$value = '';
				if( !empty($settings['value']) ){
					$value = $settings['value'];
				}else if( !empty($settings['default']) ){
					$value = $settings['default'];
				}
				
				$i = 0;
				foreach($settings['options'] as $slug => $name ){
					echo '<label for="' . kode_esc_html($settings['slug']) . '-id' . $i . '" class="radio-image-wrapper ';
					echo ($value == $slug)? 'active ': '';
					echo '">';
					echo '<img src="' . esc_url($name) . '" alt="" />';
					echo '<div class="selected-radio"></div>';

					echo '<input type="radio" name="' . kode_esc_html($settings['name']) . '" data-slug="' . kode_esc_html($settings['slug']) . '" ';
					echo 'id="' . kode_esc_html($settings['slug']) . '-id' . $i . '" value="' . kode_esc_html($slug) . '" ';
					echo ($value == $slug)? 'checked ': '';
					echo ' />';
					
					echo '</label>';
					
					$i++;
				}
				
				echo '<div class="clear"></div>';
				echo '</div>';
			}

			// print color picker
			function show_color_picker($settings = array()){
				echo '<div class="kode-option-input">';
				
				echo '<input type="text" class="wp-color-picker" name="' . kode_esc_html($settings['name']) . '" data-slug="' . kode_esc_html($settings['slug']) . '" ';
				if( !empty($settings['value']) ){
					echo 'value="' . kode_esc_html($settings['value']) . '" ';
				}else if( !empty($settings['default']) ){
					echo 'value="' . kode_esc_html($settings['default']) . '" ';
				}
				
				if( !empty($settings['default']) ){
					echo 'data-default-color="' . kode_esc_html($settings['default']) . '" ';
				}
				echo '/>';
				
				echo '</div>';
			}	
			
			
			// print slider bar
			function show_slider_bar($settings = array()){
				echo '<div class="kode-option-input">';
				if( !empty($settings['value']) ){
					$value = $settings['value'];
				}else if( !empty($settings['default']) ){
					$value = $settings['default'];
				}
				
				// create a blank box for javascript
				echo '<div class="kode-sliderbar" data-value="' . kode_esc_html($value) . '" ></div>';
				
				echo '<input type="text" class="kode-sliderbar-text-hidden" name="' . kode_esc_html($settings['name']) . '" ';
				echo 'data-slug="' . kode_esc_html($settings['slug']) . '" value="' . kode_esc_html($value) . '" />';
				
				// this will be the box that shows the value
				echo '<div class="kode-sliderbar-text">' . kode_esc_html($value) . 'px</div>';
				
				echo '<div class="clear"></div>';
				echo '</div>';			
			}

			// print slider
			function show_slider($settings = array()){
				echo '<div class="kode-option-input ';
				echo (!empty($settings['class']))? esc_attr($settings['class']): '';
				echo '">';
				
				echo '<textarea name="' . kode_esc_html($settings['slug']) . '" data-slug="' . kode_esc_html($settings['slug']) . '" ';
				echo 'class="kode-input-hidden kode-slider-selection" data-overlay="true" data-caption="true" >';
				if( isset($settings['value']) ){
					echo kode_esc_html($settings['value']);
				}else if( !empty($settings['default']) ){
					echo kode_esc_html($settings['default']);
				}
				echo '</textarea>';
				echo '</div>';
			}				
			
			// print upload box
			function show_upload_box($settings = array()){
				echo '<div class="kode-option-input">';
				
				$value = ''; $file_url = '';
				$settings['data-type'] = empty($settings['data-type'])? 'image': $settings['data-type'];
				$settings['data-type'] = ($settings['data-type']=='upload')? 'image': $settings['data-type'];
				
				if( !empty($settings['value']) ){
					$value = $settings['value'];
				}else if( !empty($settings['default']) ){
					$value = $settings['default'];
				}
				
				if( is_numeric($value) ){ 
					$file_url = wp_get_attachment_url($value);
				}else{
					$file_url = $value;
				}
				
				// example image url
				echo '<img class="kode-upload-img-sample ';
				echo (empty($file_url) || $settings['data-type'] != 'image')? 'blank': '';
				echo '" ';
				echo (!empty($file_url) && $settings['data-type'] == 'image')? 'src="' . esc_url($file_url) . '" ': ''; 
				echo '/>';
				echo '<div class="clear"></div>';
				
				// input link url
				echo '<input type="text" class="kode-upload-box-input" value="' . esc_url($file_url) . '" />';					
				
				// hidden input
				echo '<input type="hidden" class="kode-upload-box-hidden" ';
				echo 'name="' . kode_esc_html($settings['name']) . '" data-slug="' . kode_esc_html($settings['slug']) . '" ';
				echo 'value="' . kode_esc_html($value) . '" />';
				
				// upload button
				echo '<input type="button" class="kode-upload-box-button kdf-button" ';
				echo 'data-title="' . kode_esc_html($settings['title']) . '" ';
				echo 'data-type="' . kode_esc_html($settings['data-type']) . '" ';				
				echo 'data-button="';
				echo (empty($settings['button']))? esc_attr__('Insert Image', 'KodeForest'):$settings['button'];
				echo '" ';
				echo 'value="' . esc_attr__('Upload', 'KodeForest') . '"/>';
				
				echo '<div class="clear"></div>';
				echo '</div>';
			}			

			// print the font combobox
			function print_font_combobox($settings = array()){
				echo '<div class="kode-option-input">';
				
				$value = '';
				if( !empty($settings['value']) ){
					$value = $settings['value'];
				}else if( !empty($settings['default']) ){
					$value = $settings['default'];
				}
				
				echo '<input class="kode-sample-font" ';
				echo 'value="' . esc_attr( __('Sample Font', 'gdlr_translate') ) . '" ';
				echo (!empty($value))? 'style="font-family: ' . $value . ';" />' : '/>';
				
				echo '<div class="kode-combobox-wrapper">';
				echo '<select name="' . $settings['name'] . '" data-slug="' . $settings['slug'] . '" class="kode-font-combobox" >';
				do_action('kode_print_all_font_list', $value);
				echo '</select>';
				echo '</div>'; // kode-combobox-wrapper
				
				echo '</div>';
			}	
			
			
		}

	}
		
?>