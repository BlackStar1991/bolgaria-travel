<?php
	/*	
	*	Kodeforest Import Variable Setting
	*/

	if( is_admin() ){
		//add_filter('kode_nav_meta', 'kode_add_import_nav_meta');
		add_action('kode_import_end', 'kode_add_import_action');
	}
	
	// $default_file = KODE_LOCAL_PATH . '/framework/external/import_export/theme_options.txt';
	// $default_admin_option = file_get_contents($default_file);
	// parse_str(kode_stripslashes($default_admin_option), $k_option ); 
	// $k_option = kode_stripslashes($k_option);	
	// update_option(KODE_SMALL_TITLE . '_admin_option', $k_option);
	
	// $file_url = get_template_directory() . '/framework/external/import_export/theme_options.txt';
	// $file_stream = @fopen($file_url, 'w');
	// fwrite($file_stream, serialize($theme_option));
	// fclose($file_stream);
	
	// $default_file = KODE_LOCAL_PATH . '/framework/external/import_export/theme_options.txt';
	// $default_admin_option = json_decode(unserialize(file_get_contents($default_file)),true);
	// print_R($default_admin_option);
	// update_option(KODE_SMALL_TITLE . '_admin_option', $default_admin_option);
	// init the theme_option value and customizer value upon activation	
	
	add_action( 'after_switch_theme', 'kode_get_default_themeoption' );
	if( !function_exists('kode_get_default_themeoption') ){
		function kode_get_default_themeoption() {
			$theme_option = get_option(KODE_SMALL_TITLE . '_admin_option', array());
			if(empty($theme_option)){
				// $default_file = KODE_LOCAL_PATH . '/framework/external/import_export/theme_options.txt';
				// $default_admin_option = unserialize(file_get_contents($default_file));
				// update_option(KODE_SMALL_TITLE . '_admin_option', $default_admin_option);
				$default_file = KODE_LOCAL_PATH . '/framework/external/import_export/theme_options.txt';
				$default_admin_option = file_get_contents($default_file);
				parse_str(kode_stripslashes($default_admin_option), $k_option ); 
				$k_option = kode_stripslashes($k_option);	
				update_option(KODE_SMALL_TITLE . '_admin_option', $k_option);
			}
		}
	}
	
	
	// if( !function_exists('kode_add_import_nav_meta') ){
		// function kode_add_import_nav_meta( $array ){
			// return array('_kode_menu_icon', '_kode_mega_menu_item', '_kode_mega_menu_section');
		// }
	// }
	
	if( !function_exists('kode_add_import_action') ){
		function kode_add_import_action(){
			
			$show_on_front = 'page';
			$page_on_front = 292;
			$theme_mods_travel = array ( 0 => false, 'nav_menu_locations' => array ( 'main_menu' => 57, 'footer_menu' => 65, ), );
			update_option('show_on_front',$show_on_front);
			update_option('page_on_front',$page_on_front);
			update_option('theme_mods_umeed', $theme_mods_travel);	
			
			
			// import the widget
			$widget_file = KODE_LOCAL_PATH . '/framework/external/import_export/kodeforest-importer-widget.txt';
			$widget_data = unserialize(file_get_contents($widget_file));
			
			// retrieve widget data
			foreach($widget_data as $key => $value){
				update_option( $key, $value );
			}
			
		}
	}
	
	function kode_get_widget_area(){
		$development = get_option('sidebars_widgets');
		unset($development['array_version']);
			foreach($development as $key=>$value){
				$newval = str_replace('wp_inactive_widgets','',$key);
				$widgets[] = str_replace('orphaned_widgets_1','',$newval);
			}
			return array_filter($widgets);
			
	}
	
	function kode_str_before($subject, $needle)
	{
		$p = strpos($subject, $needle);
		return substr($subject, 0, $p);
	}
	
	
	function kode_get_widget_name_value(){
		$development_myval = get_option('sidebars_widgets');
		foreach(kode_get_widget_area() as $val){
			foreach($development_myval[$val] as $keys=>$values){
				$string_val = kode_str_before($values, "-");
				$wid_val[$string_val] = 'widget_'.$string_val;
			}
			
		}
		return $wid_val;
			
	}
	
	// $widget_array = kode_get_widget_name_value();
	// foreach($widget_array as $widget){
		// echo $widget.',';
	// }		

	// $widget_data = array();
	// $widget_list = array('sidebars_widgets', 'widget_text','widget_kode_contact_widget','widget_calendar','widget_categories','widget_search','widget_kode_tab_widget','widget_kode_flickr_widget','widget_nav_menu');
	// foreach($widget_list as $widget){
		// $widget_data[$widget] = get_option($widget);
	// }
	// $widget_file = KODE_LOCAL_PATH . '/framework/external/import_export/kodeforest-importer-widget.txt';
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