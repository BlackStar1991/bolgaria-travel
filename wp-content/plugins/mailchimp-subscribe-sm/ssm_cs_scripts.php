<?php

function smf_admin_scripts_add() {
	wp_enqueue_script('jquery');
	$screen = get_current_screen();
	if($screen->post_type === 'subscribe_me_forms') {
	wp_enqueue_script('jquery');
	wp_enqueue_style( 'wp-color-picker');
    wp_enqueue_script( 'ssm_wp-color-picker-alpha', plugins_url('/js/alpha-picker.js', __FILE__ ), array( 'wp-color-picker' ), '1.2', false );

	    if ($screen->id === 'subscribe_me_forms_page_ssm_subscribers_list_menu') {
	    	wp_enqueue_style( "w3-css", plugins_url('/style/w3.css',__FILE__) );
	    }
    
	}
}

add_action('admin_enqueue_scripts', 'smf_admin_scripts_add');


function msf_ajax_script(){
  
  	wp_register_script('msf_ajax_script-1',plugins_url('/js/sm-ajax.js',__FILE__),array( 'jquery' ));
  	wp_register_script('msf_cookie_script',plugins_url('/js/jquery.cookie.js',__FILE__),array( 'jquery' ));

}

add_filter('init','msf_ajax_script');

?>