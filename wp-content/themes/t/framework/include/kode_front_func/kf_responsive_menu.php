<?php
	/*	
	*	Kodeforest Menu Management File
	*	---------------------------------------------------------------------
	*	This file use to include a necessary script / function for the 
	* 	navigation area
	*	---------------------------------------------------------------------
	*/
	
	// add action to enqueue superfish menu
	add_filter('kode_enqueue_scripts', 'kode_register_dlmenu');
	if( !function_exists('kode_register_dlmenu') ){
		function kode_register_dlmenu($array){	
			$array['style']['dlmenu'] = KODE_PATH . '/framework/assets/dl-menu/component.css';
			
			$array['script']['modernizr'] = KODE_PATH . '/framework/assets/dl-menu/modernizr.custom.js';
			$array['script']['dlmenu'] = KODE_PATH . '/framework/assets/dl-menu/jquery.dlmenu.js';

			return $array;
		}
	}
	
	// creating the class for outputing the custom navigation menu
	if( !class_exists('kode_dlmenu_walker') ){
		
		// from wp-includes/nav-menu-template.php file
		class kode_dlmenu_walker extends Walker_Nav_Menu{		

			function start_lvl( &$output, $depth = 0, $args = array() ) {
				$indent = str_repeat("\t", $depth);
				$output .= "\n$indent<ul class=\"dl-submenu\">\n";
			}

		}
		
	}

?>