<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
add_action( 'admin_enqueue_scripts', 'sfbap_enqueue_styles');
add_action( 'admin_enqueue_scripts', 'sfbap_media_files' );

function sfbap_enqueue_styles() {
	global $post;
	$post_type = $post->post_type;
	if( 'sfbap_subscribe_form' == $post_type ){
		wp_enqueue_script('jquery');
		wp_enqueue_style( 'wp-color-picker' ); 
		wp_enqueue_script( 'sfbap-cp', plugins_url( 'js/sfbap-color-picker.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), '', true  );
		wp_register_script( 'sfbap_script', plugins_url( 'js/sfbap-script.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), '', true  );
    	wp_localize_script( 'sfbap_script', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_register_style( 'sfbap_style', plugin_dir_url( __FILE__ )  . 'css/sfbap-style.css', false, '1.0.0' );
		wp_enqueue_style( 'sfbap_style');
   		wp_enqueue_script( 'sfbap_script');
	}
}

function sfbap_media_files() {
	global $post;
	$post_type = $post->post_type;
	if( 'sfbap_subscribe_form' == $post_type )
		wp_enqueue_media();
}

function sfbap_ajax_load_scripts() {
	wp_enqueue_script('jquery');
	wp_register_script( 'sfbap-form-ajax', plugin_dir_url( __FILE__ ) . 'js/sfbap-form-ajax.js', array( 'jquery' ) );
	wp_localize_script( 'sfbap-form-ajax', 'the_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );	
   	wp_enqueue_script( 'sfbap-form-ajax');

}
add_action('wp_print_scripts', 'sfbap_ajax_load_scripts');
/*add_action( 'admin_head-post.php', 'sfbap_fixed_meta_boxes' );

function sfbap_fixed_meta_boxes() 
{
    ?>
    <style>#postbox-container-1 {
      position: absolute;
      top: 60px;
      border: none;
      margin-left: -100px;
      width: 200px;
      right: 20px;
      height: 1.25em;
      text-align: center;
    }
    #post-body.columns-2 #postbox-container-1{
    	margin-right: 0;
    	float: none;
    }
    </style>

    <script type="text/javascript">
        jQuery(window).load( function() {   
            jQuery('<div id="box"><a href="#top">Scroll to top</a></div>').appendTo("#wpbody-content");         
            jQuery('<a name="top" id="top"></a>').appendTo("#visibility");

            function getScrollTop() {
            if (typeof window.pageYOffset !== 'undefined' ) {
              return window.pageYOffset;
            }

            var d = document.documentElement;
            if (d.clientHeight) {
              return d.scrollTop;
            }

            return document.body.scrollTop;
          }

          window.onscroll = function() {
            var box = document.getElementById('postbox-container-1'),
                scroll = getScrollTop();

            if (scroll <= 28) {
              box.style.top = "60px";
            }
            else {
              box.style.top = (scroll + 2) + "px";
            }
          };
        });

    </script>
    <?php
}*/