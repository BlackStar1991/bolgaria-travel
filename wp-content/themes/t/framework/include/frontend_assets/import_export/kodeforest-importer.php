<?php
	/*	
	*	Kodeforest Import Variable Setting
	*/

	if( is_admin() ){
		//add_filter('kode_nav_meta', 'kode_add_import_nav_meta');
		add_action('kode_import_end', 'kode_add_import_action');
	}
	
	// if( !function_exists('kode_add_import_nav_meta') ){
		// function kode_add_import_nav_meta( $array ){
			// return array('_kode_menu_icon', '_kode_mega_menu_item', '_kode_mega_menu_section');
		// }
	// }
	
	if( !function_exists('kode_add_import_action') ){
		function kode_add_import_action(){
			
			$show_on_front = 'page';
			$page_on_front = 427;
			$theme_mods_ecowaste = array ( 0 => false, 'nav_menu_locations' => array ( 'main_menu' => 22, ), );		
			update_option('show_on_front',$show_on_front);
			update_option('page_on_front',$page_on_front);
			update_option('theme_mods_ecowaste', $theme_mods_ecowaste);	
			
			
			// import the widget
			$widget_file = KODE_LOCAL_PATH . '/framework/assets/import_export/kodeforest-importer-widget.txt';
			$widget_data = unserialize(file_get_contents($widget_file));
			
			// retrieve widget data
			foreach($widget_data as $key => $value){
				update_option( $key, $value );
			}
			
		}
	}
	
	function get_widget_area(){
		$development = get_option('sidebars_widgets');
		unset($development['array_version']);
			foreach($development as $key=>$value){
				$newval = str_replace('wp_inactive_widgets','',$key);
				$widgets[] = str_replace('orphaned_widgets_1','',$newval);
			}
			return array_filter($widgets);
			
	}
	
	function str_before($subject, $needle)
	{
		$p = strpos($subject, $needle);
		return substr($subject, 0, $p);
	}
	
	
	function get_widget_name_value(){
		$development_myval = get_option('sidebars_widgets');
		foreach(get_widget_area() as $val){
			foreach($development_myval[$val] as $keys=>$values){
				$string_val = str_before($values, "-");
				$wid_val[$string_val] = 'widget_'.$string_val;
			}
			
		}
		return $wid_val;
			
	}
	
	// $widget_array = get_widget_name_value();
	// foreach($widget_array as $widget){
		// echo $widget.',';
	// }

	// $widget_data = array();
	// $widget_list = array('sidebars_widgets', 'widget_kode_contact_widget', 'widget_kode_popular_post_widget', 
	// 'widget_calendar', 'widget_kode_flickr_widget', 
	// 'widget_search', 'widget_text');
	// foreach($widget_list as $widget){
		// $widget_data[$widget] = get_option($widget);
	// }
	// $widget_file = KODE_LOCAL_PATH . '/framework/assets/import_export/kodeforest-importer-widget.txt';
	// $file_stream = @fopen($widget_file, 'w');
	// fwrite($file_stream, serialize($widget_data));
	// fclose($file_stream);	
	
	// echo '$show_on_front = ';
	// echo get_option('show_on_front').';';
	
	// echo '$page_on_front = ';
	// echo get_option('page_on_front').';';
	
	// $theme_name = 'theme_mods_'.get_option('template');
	// echo '$'.$theme_name.' = ';
	// var_export(get_option($theme_name)).';';
	
	
?>