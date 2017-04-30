<?php

// main FWD Ultimate 3D Carousel Data class
class FWDU3DCarData
{
	// constants
	const DEFAULT_SKINS_NR = 3;

	// variables
	public $settings_ar;
    public $playlists_ar;
	
	private $_dir_url;
	
    // constructor
    public function FWDU3DCarData()
    {
		$this->_dir_url = plugin_dir_url(dirname(__FILE__));
	
		$cur_data = get_option("fwdu3dcar_data");
	       
	    if (!$cur_data)
	    {
	    	$this->init_settings();
	    	$this->set_data();
	    }
		
		$this->set_updates();
    	
    	$this->get_data();
    }
	
	private function reset_presets()
	{
		$this->get_data();
		$this->init_settings();
	    $this->set_data();
	}
	
	private function set_updates()
	{
		$this->get_data();
		
   		foreach ($this->settings_ar as &$preset)
    	{
			// update new or existing fields
			if (!array_key_exists("right_click_context_menu", $preset))
			{
				unset($preset["show_context_menu"]);
				$preset["right_click_context_menu"] = "developer";
			}
			
			if (!array_key_exists("fluid_width_z_index", $preset))
	    	{
	    		$preset["fluid_width_z_index"] = 1000;
			}
			
			if (!array_key_exists("show_full_text_without_hover", $preset))
	    	{
	    		$preset["show_full_text_without_hover"] = "no";
			}
			
			if (!array_key_exists("controls_height", $preset))
	    	{
	    		$preset["controls_height"] = 31;
			}
			
			if (!array_key_exists("controls_position", $preset))
	    	{
	    		$preset["controls_position"] = "bottom";
			}
			
			// update plugin dir url
			$pattern = "/\/[^\/]*\/load\/skin/";
			$parts = explode("/", trim($this->_dir_url, "/"));
			$preset["skin_path"] = preg_replace($pattern, "/" . $parts[count($parts)-1] . "/load/skin", $preset["skin_path"]);
    	}
		
		$this->set_data();
	}
    
    // functions
    private function init_settings()
    {
    	$this->settings_ar = array(
									array(
											// main settings
											"id" => 0,
											"name" => "skin_modern_silver",
											"display_type" => "fluidwidth",
											"autoscale" => "yes",
											"cov_width" => 940,
											"cov_height" => 538,
											"skin_path" => $this->_dir_url . "load/skin_modern_silver",
											"cov_bg_color" => "#DDDDDD",
											"cov_bg_image_url" => "",
											"thumbs_bg_image_url" => $this->_dir_url . "load/skin_modern_silver/thumbnailsBackground.jpg",
											"scrollbar_bg_image_url" => $this->_dir_url . "load/skin_modern_silver/scrollbarBackground.jpg",
											"bg_repeat" => "repeat-x",
											"car_topology" => "ring",
											"car_x_radius" => 600,
											"car_y_radius" => 0,
											"car_x_rot" => 10,
											"car_y_offset" => 0,
											"show_center_image" => "no",
											"center_image_url" => "",
											"center_image_y_offset" => 0,
											"show_2d_display" => "no",
											"cov_start_pos" => "center",
											"cov_autoplay" => "no",
											"cov_slideshow_delay" => 5000,
											"right_click_context_menu" => "developer",
											"cov_keyboard_support" => "yes",
											"fluid_width_z_index" => 1000,
											
											// thumbs settings
											"thumb_width" => 400,
											"thumb_height" => 266,
											"thumb_border_size" => 10,
											"thumb_min_alpha" => .3,
											"thumb_bg_color" => "#666666",
											"thumb_border_color1" => "#FCFDFD",
											"thumb_border_color2" => "#E4E4E4",
											"transparent_images" => "no",
											"max_thumbs_mobile" => 13,
											"show_thumbs_gradient" => "yes",
											"show_thumbs_text" => "yes",
											"text_bg_color" => "#333333",
											"text_bg_opacity" => .7,
											"show_text_bg_image" => "yes",
											"show_full_text_without_hover" => "no",
											"show_thumb_box_shadow" => "yes",
											"box_shadow_css" => "0px 2px 2px #555555",
											"show_reflection" => "yes",
											"reflection_height" => 60,
											"reflection_distance" => 0,
											"reflection_opacity" => .2,
											
											// controls settings
											"controls_max_width" => 940,
											"controls_height" => 31,
											"controls_position" => "bottom",
											"show_prev_btn" => "yes",
											"show_next_btn" => "yes",
											"disable_btns_mobile" => "no",
											"show_slideshow_btn" => "yes",
											"timer_color" => "#777777",
											"show_scrollbar" => "yes",
											"scrollbar_handler_width" => 300,
											"scrollbar_text_normal_color" => "#777777",
											"scrollbar_text_selected_color" => "#000000",
											"disable_scrollbar_mobile" => "yes",
											"enable_mouse_wheel" => "yes",
											
											// combobox settings
											"show_combobox" => "yes",
											"start_category" => 1,
											"select_label" => "SELECT CATEGORIES",
											"all_cats_label" => "All Categories",
											"show_all_cats" => "no",
											"combobox_pos" => "topright",
											"selector_bg_normal_color1" => "#FCFDFD",
											"selector_bg_normal_color2" => "#E4E4E4",
											"selector_bg_selected_color1" => "#A7A7A7",
											"selector_bg_selected_color2" => "#8E8E8E",
											"selector_text_normal_color" => "#8B8B8B",
											"selector_text_selected_color" => "#FFFFFF",
											"button_bg_normal_color1" => "#E7E7E7",
											"button_bg_normal_color2" => "#E7E7E7",
											"button_bg_selected_color1" => "#A7A7A7",
											"button_bg_selected_color2" => "#8E8E8E",
											"button_text_normal_color" => "#000000",
											"button_text_selected_color" => "#FFFFFF",
											"combobox_shadow_color" => "#000000",
											"combobox_horizontal_margins" => 12,
											"combobox_vertical_margins" => 12,
											"combobox_corner_radius" => 0,
											
											// lightbox settings
											"lightbox_keyboard_support" => "yes",
											"show_lightbox_next_prev_btns" => "yes",
											"show_lightbox_zoom_btn" => "yes",
											"show_lightbox_info_btn" => "yes",
											"show_lightbox_slideshow_btn" => "yes",
											"show_lightbox_info_default" => "no",
											"lightbox_slideshow_autoplay" => "no",
											"lightbox_video_autoplay" => "no",
											"lightbox_video_width" => 640,
											"lightbox_video_height" => 480,
											"lightbox_iframe_width" => 800,
											"lightbox_iframe_height" => 600,
											"lightbox_bg_color" => "#000000",
											"lightbox_info_bg_color" => "#FFFFFF",
											"lightbox_item_border_color1" => "#FCFDFD",
											"lightbox_item_border_color2" => "#E4E4E4",
											"lightbox_item_bg_color" => "#333333",
											"lightbox_bg_opacity" => .8,
											"lightbox_info_bg_opacity" => .9,
											"lightbox_border_size" => 5,
											"lightbox_border_radius" => 0,
											"lightbox_slideshow_delay" => 4000
										 ),
									array(
											// main settings
											"id" => 1,
											"name" => "skin_modern_warm",	
											"display_type" => "fluidwidth",
											"autoscale" => "yes",
											"cov_width" => 940,
											"cov_height" => 538,
											"skin_path" => $this->_dir_url . "load/skin_modern_warm",
											"cov_bg_color" => "#DDDDDD",
											"cov_bg_image_url" => "",
											"thumbs_bg_image_url" => $this->_dir_url . "load/skin_modern_warm/thumbnailsBackground.jpg",
											"scrollbar_bg_image_url" => $this->_dir_url . "load/skin_modern_warm/scrollbarBackground.jpg",
											"bg_repeat" => "repeat-x",
											"car_topology" => "ring",
											"car_x_radius" => 600,
											"car_y_radius" => 0,
											"car_x_rot" => 10,
											"car_y_offset" => 0,
											"show_center_image" => "no",
											"center_image_url" => "",
											"center_image_y_offset" => 0,
											"show_2d_display" => "no",
											"cov_start_pos" => "center",
											"cov_autoplay" => "no",
											"cov_slideshow_delay" => 5000,
											"right_click_context_menu" => "developer",
											"cov_keyboard_support" => "yes",
											"fluid_width_z_index" => 1000,
											
											// thumbs settings
											"thumb_width" => 400,
											"thumb_height" => 266,
											"thumb_border_size" => 0,
											"thumb_min_alpha" => .3,
											"thumb_bg_color" => "#999999",
											"thumb_border_color1" => "#FCFDFD",
											"thumb_border_color2" => "#E4E4E4",
											"transparent_images" => "no",
											"max_thumbs_mobile" => 13,
											"show_thumbs_gradient" => "yes",
											"show_thumbs_text" => "yes",
											"text_bg_color" => "#333333",
											"text_bg_opacity" => .7,
											"show_text_bg_image" => "yes",
											"show_full_text_without_hover" => "no",
											"show_thumb_box_shadow" => "yes",
											"box_shadow_css" => "0px 2px 2px #666666",
											"show_reflection" => "yes",
											"reflection_height" => 60,
											"reflection_distance" => 0,
											"reflection_opacity" => .2,
											
											// controls settings
											"controls_max_width" => 940,
											"controls_height" => 29,
											"controls_position" => "bottom",
											"show_prev_btn" => "yes",
											"show_next_btn" => "yes",
											"disable_btns_mobile" => "no",
											"show_slideshow_btn" => "yes",
											"timer_color" => "#777777",
											"show_scrollbar" => "yes",
											"scrollbar_handler_width" => 300,
											"scrollbar_text_normal_color" => "#777777",
											"scrollbar_text_selected_color" => "#000000",
											"disable_scrollbar_mobile" => "yes",
											"enable_mouse_wheel" => "yes",
											
											// combobox settings
											"show_combobox" => "yes",
											"start_category" => 1,
											"select_label" => "SELECT CATEGORIES",
											"all_cats_label" => "All Categories",
											"show_all_cats" => "no",
											"combobox_pos" => "topright",
											"selector_bg_normal_color1" => "#FFFFFF",
											"selector_bg_normal_color2" => "#FFFFFF",
											"selector_bg_selected_color1" => "#BAB8B4",
											"selector_bg_selected_color2" => "#A09E9A",
											"selector_text_normal_color" => "#8B8B8B",
											"selector_text_selected_color" => "#FFFFFF",
											"button_bg_normal_color1" => "#FFFFFF",
											"button_bg_normal_color2" => "#FFFFFF",
											"button_bg_selected_color1" => "#BAB8B4",
											"button_bg_selected_color2" => "#BAB8B4",
											"button_text_normal_color" => "#8B8B8B",
											"button_text_selected_color" => "#FFFFFF",
											"combobox_shadow_color" => "#999999",
											"combobox_horizontal_margins" => 12,
											"combobox_vertical_margins" => 12,
											"combobox_corner_radius" => 0,
											
											// lightbox settings
											"lightbox_keyboard_support" => "yes",
											"show_lightbox_next_prev_btns" => "yes",
											"show_lightbox_zoom_btn" => "yes",
											"show_lightbox_info_btn" => "yes",
											"show_lightbox_slideshow_btn" => "yes",
											"show_lightbox_info_default" => "no",
											"lightbox_slideshow_autoplay" => "no",
											"lightbox_video_autoplay" => "no",
											"lightbox_video_width" => 640,
											"lightbox_video_height" => 480,
											"lightbox_iframe_width" => 800,
											"lightbox_iframe_height" => 600,
											"lightbox_bg_color" => "#000000",
											"lightbox_info_bg_color" => "#FFFFFF",
											"lightbox_item_border_color1" => "#FCFDFD",
											"lightbox_item_border_color2" => "#E4E4E4",
											"lightbox_item_bg_color" => "#444444",
											"lightbox_bg_opacity" => .8,
											"lightbox_info_bg_opacity" => .9,
											"lightbox_border_size" => 0,
											"lightbox_border_radius" => 0,
											"lightbox_slideshow_delay" => 4000
										 ),
									array(
											// main settings
											"id" => 2,
											"name" => "skin_minimal_classic",	
											"display_type" => "fluidwidth",
											"autoscale" => "yes",
											"cov_width" => 940,
											"cov_height" => 538,
											"skin_path" => $this->_dir_url . "load/skin_minimal_classic",
											"cov_bg_color" => "#333333",
											"cov_bg_image_url" => "",
											"thumbs_bg_image_url" => "",
											"scrollbar_bg_image_url" => $this->_dir_url . "load/skin_minimal_classic/scrollbarBackground.jpg",
											"bg_repeat" => "repeat-x",
											"car_topology" => "ring",
											"car_x_radius" => 600,
											"car_y_radius" => 0,
											"car_x_rot" => 10,
											"car_y_offset" => 0,
											"show_center_image" => "no",
											"center_image_url" => "",
											"center_image_y_offset" => 0,
											"show_2d_display" => "no",
											"cov_start_pos" => "center",
											"cov_autoplay" => "no",
											"cov_slideshow_delay" => 5000,
											"right_click_context_menu" => "developer",
											"cov_keyboard_support" => "yes",
											"fluid_width_z_index" => 1000,
											
											// thumbs settings
											"thumb_width" => 400,
											"thumb_height" => 266,
											"thumb_border_size" => 0,
											"thumb_min_alpha" => .3,
											"thumb_bg_color" => "#FFFFFF",
											"thumb_border_color1" => "#FFFFFF",
											"thumb_border_color2" => "#FFFFFF",
											"transparent_images" => "no",
											"max_thumbs_mobile" => 13,
											"show_thumbs_gradient" => "yes",
											"show_thumbs_text" => "yes",
											"text_bg_color" => "#FFFFFF",
											"text_bg_opacity" => .7,
											"show_text_bg_image" => "no",
											"show_full_text_without_hover" => "no",
											"show_thumb_box_shadow" => "yes",
											"box_shadow_css" => "0px 2px 2px #111111",
											"show_reflection" => "yes",
											"reflection_height" => 60,
											"reflection_distance" => 0,
											"reflection_opacity" => .2,
											
											// controls settings
											"controls_max_width" => 940,
											"controls_height" => 29,
											"controls_position" => "bottom",
											"show_prev_btn" => "yes",
											"show_next_btn" => "yes",
											"disable_btns_mobile" => "no",
											"show_slideshow_btn" => "yes",
											"timer_color" => "#777777",
											"show_scrollbar" => "yes",
											"scrollbar_handler_width" => 300,
											"scrollbar_text_normal_color" => "#000000",
											"scrollbar_text_selected_color" => "#FFFFFF",
											"disable_scrollbar_mobile" => "yes",
											"enable_mouse_wheel" => "yes",
											
											// combobox settings
											"show_combobox" => "yes",
											"start_category" => 1,
											"select_label" => "SELECT CATEGORIES",
											"all_cats_label" => "All Categories",
											"show_all_cats" => "no",
											"combobox_pos" => "topright",
											"selector_bg_normal_color1" => "#FFFFFF",
											"selector_bg_normal_color2" => "#FFFFFF",
											"selector_bg_selected_color1" => "#000000",
											"selector_bg_selected_color2" => "#000000",
											"selector_text_normal_color" => "#000000",
											"selector_text_selected_color" => "#FFFFFF",
											"button_bg_normal_color1" => "#FFFFFF",
											"button_bg_normal_color2" => "#FFFFFF",
											"button_bg_selected_color1" => "#000000",
											"button_bg_selected_color2" => "#000000",
											"button_text_normal_color" => "#000000",
											"button_text_selected_color" => "#FFFFFF",
											"combobox_shadow_color" => "#222222",
											"combobox_horizontal_margins" => 12,
											"combobox_vertical_margins" => 12,
											"combobox_corner_radius" => 0,
											
											// lightbox settings
											"lightbox_keyboard_support" => "yes",
											"show_lightbox_next_prev_btns" => "yes",
											"show_lightbox_zoom_btn" => "yes",
											"show_lightbox_info_btn" => "yes",
											"show_lightbox_slideshow_btn" => "yes",
											"show_lightbox_info_default" => "no",
											"lightbox_slideshow_autoplay" => "no",
											"lightbox_video_autoplay" => "no",
											"lightbox_video_width" => 640,
											"lightbox_video_height" => 480,
											"lightbox_iframe_width" => 800,
											"lightbox_iframe_height" => 600,
											"lightbox_bg_color" => "#000000",
											"lightbox_info_bg_color" => "#FFFFFF",
											"lightbox_item_border_color1" => "#FFFFFF",
											"lightbox_item_border_color2" => "#FFFFFF",
											"lightbox_item_bg_color" => "#333333",
											"lightbox_bg_opacity" => .8,
											"lightbox_info_bg_opacity" => .9,
											"lightbox_border_size" => 0,
											"lightbox_border_radius" => 0,
											"lightbox_slideshow_delay" => 4000
										 )
							      );
    }

    public function get_data()
    {
	    $cur_data = get_option("fwdu3dcar_data");
	       
	    $this->settings_ar = $cur_data->settings_ar;
	    $this->playlists_ar = $cur_data->playlists_ar;
    }
    
    public function set_data()
    {
    	update_option("fwdu3dcar_data", $this);
    }
}

?>