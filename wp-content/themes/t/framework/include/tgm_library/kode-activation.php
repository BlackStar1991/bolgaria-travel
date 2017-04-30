<?php
require_once(KODE_LOCAL_PATH . '/framework/include/tgm_library/tgm-activation.php');

add_action( 'tgmpa_register', 'kode_register_required_plugins' );
if( !function_exists('kode_register_required_plugins') ){
	function kode_register_required_plugins(){
		$plugins = array(
			
		
			array(
				'name'     				=> 'Revolution Slider',
				'slug'     				=> 'revslider', 
				//'source'   				=> KODE_LOCAL_PATH . '/framework/include/tgm_library/plugins/revslider.zip',
				'source'   				=> 'http://kodeforest.com/dev/revslider.zip',
				'version'               => '1.0',
				'required' 				=> false,
				'force_activation' 		=> false,
				'force_deactivation' 	=> true, 
			),
			
			array(
				'name'     				=> 'Master Slider',
				'slug'     				=> 'masterslider', 
				//'source'   				=> KODE_LOCAL_PATH . '/framework/include/tgm_library/plugins/revslider.zip',
				'source'   				=> 'http://kodeforest.com/dev/masterslider.zip',
				'version'               => '1.0',
				'required' 				=> false,
				'force_activation' 		=> false,
				'force_deactivation' 	=> true, 
			),
			
						
			array(
				'name'     				=> 'KF Importer',
				'slug'     				=> 'kode_import', 
				'source'   				=> KODE_LOCAL_PATH . '/framework/include/tgm_library/plugins/kode_import.zip',
				'required' 				=> true,
				'force_activation' 		=> false,
				'force_deactivation' 	=> false, 
			),
			
			array(
				'name'     				=> 'KF Testimonial',
				'slug'     				=> 'kode_testimonials', 
				'source'   				=> KODE_LOCAL_PATH . '/framework/include/tgm_library/plugins/kode_testimonials.zip',
				'required' 				=> true,
				'force_activation' 		=> false,
				'force_deactivation' 	=> false, 
			),
			
			array(
				'name'     				=> 'KF Package',
				'slug'     				=> 'kode_package', 
				'source'   				=> KODE_LOCAL_PATH . '/framework/include/tgm_library/plugins/kode_package.zip',
				'required' 				=> true,
				'force_activation' 		=> false,
				'force_deactivation' 	=> false, 
			),
			
			array(
				'name'     				=> 'KF Team',
				'slug'     				=> 'kode_team', 
				'source'   				=> KODE_LOCAL_PATH . '/framework/include/tgm_library/plugins/kode_team.zip',
				'required' 				=> true,
				'force_activation' 		=> false,
				'force_deactivation' 	=> false, 
			),
			
			array(
				'name'     				=> 'KF Shortcode',
				'slug'     				=> 'kode_shortcode', 
				'source'   				=> KODE_LOCAL_PATH . '/framework/include/tgm_library/plugins/kode_shortcode.zip',
				'required' 				=> true,
				'force_activation' 		=> false,
				'force_deactivation' 	=> false, 
			),
			
			
			// array(
				// 'name'      => 'Event Manager',
				// 'slug'      => 'events-manager',
				// 'required'  => false,
			// ),
			// array(
				// 'name'      => 'Woo Commerce',
				// 'slug'      => 'woocommerce',
				// 'required'  => false,
			// ),
			array('name' => 'Contact Form 7', 'slug' => 'contact-form-7', 'required' => true)

		);

		$config = array(
			'domain'       		=> 'KodeForest',         
			'default_path' 		=> '',                         
			'parent_menu_slug' 	=> 'themes.php', 			
			'parent_url_slug' 	=> 'themes.php', 			
			'menu'         		=> 'install-required-plugins', 
			'has_notices'      	=> true,                       
			'is_automatic'    	=> false,					   
			'message' 			=> '',						
			'strings'      		=> array(
				'page_title'                       			=> __('Install Required Plugins', 'KodeForest' ),
				'menu_title'                       			=> __('Install Plugins', 'KodeForest' ),
				'installing'                       			=> __('Installing Plugin: %s', 'KodeForest' ), 
				'oops'                             			=> __('Something went wrong with the plugin API.', 'KodeForest' ),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
				'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), 
				'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
				'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), 
				'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), 
				'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
				'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
				'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
				'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
				'return'                           			=> __( 'Return to Required Plugins Installer', 'KodeForest' ),
				'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'KodeForest' ),
				'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'KodeForest' ), 
				'nag_type'									=> 'updated'
			)
		);

		tgmpa( $plugins, $config );
	}
}