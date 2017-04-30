<?php

// main FWD Ultimate 3D Carousel plugin class
class FWDU3DCar
{
	// constants
	const MIN_WP_VER =  "3.5.0";
	const CAPABILITY = "edit_fwdu3dcar";
	
	// variables
	private $_data;
	private $_dir_url;
    
    private static $_car_id = 0;
    
    // constructor
    public function FWDU3DCar()
    {
		$this->_dir_url = plugin_dir_url(dirname(__FILE__));
	
    	// set hooks
    	add_action("admin_menu", array($this, "add_plugin_menu"));
		add_action("wp_enqueue_scripts", array($this, "add_header_files"));
		add_shortcode("fwdu3dcar", array($this, "set_carousel"));
		
		// set data
		$this->_data = new FWDU3DCarData();
    }

    // functions
    public function add_plugin_menu()
    {
    	// add menus
        add_menu_page("Carousel Title", "FWD Ultimate 3D Carousel", FWDU3DCar::CAPABILITY, "FWDU3DCarMenu-General-Settings", array($this, "set_general_settings"), $this->_dir_url . "load/icons/menu-icon.png");
       	add_submenu_page("FWDU3DCarMenu-General-Settings", "General settings", "General settings", FWDU3DCar::CAPABILITY, "FWDU3DCarMenu-General-Settings");
       	add_submenu_page("FWDU3DCarMenu-General-Settings", "Playlists manager", "Playlists manager", FWDU3DCar::CAPABILITY, "FWDU3DCarMenu-Playlists-Manager", array($this, "set_playlists_manager"));
       	add_submenu_page("FWDU3DCarMenu-General-Settings", "CSS Editor", "CSS Editor", FWDU3DCar::CAPABILITY, "FWDU3DCarMenu-CSS-Editor", array($this, "set_css_editor"));
       	
       	// add meta boxes
       	$post_type_screens = array("post", "page");

    	foreach ($post_type_screens as $screen)
    	{
       		add_meta_box("fwdu3dcar-shortcode-generator", "FWDU3DCar Shortcode Generator",  array($this, "set_custom_meta_box"), $screen, "side", "default");
    	}
    }
    
	private function check_wp_ver()
	{
	    global $wp_version;
	    
		$exit_msg = "The FWD Ultimate 3D Carousel plugin requires WordPress " . FWDU3DCar::MIN_WP_VER . " or newer. <a href='http://codex.wordpress.org/Updating_WordPress'>Please update!</a>";
		
		if (version_compare($wp_version, FWDU3DCar::MIN_WP_VER) <= 0)
		{
			echo $exit_msg;
			
			return false;
		}
		
		return true;
	}

    public function set_general_settings()
    {
    	if (!$this->check_wp_ver())
    	{
    		return;
    	}
    	
    	$msg = "";
    	
    	$set_id = 0;
		$set_order_id = 0;
		$tab_init_id = 0;
    	
	    if (!empty($_POST) && check_admin_referer("fwdu3dcar_general_settings_update", "fwdu3dcar_general_settings_nonce"))
		{
			$data_obj = json_decode(str_replace("\\", "", $_POST["settings_data"]), true);
			
			$action = $data_obj["action"];
			$settingsAr = $data_obj["settings_ar"];
			
			$this->_data->settings_ar = $settingsAr;
			$this->_data->set_data();
			
			switch ($action)
			{
			    case "add":
			        $msg = "<div class='fwd-updated'><p style='padding:8px;'>Your new preset has been added!</p></div>";
			        $set_id = $data_obj["set_id"];
					$set_order_id = $data_obj["set_order_id"];
					$tab_init_id = $data_obj["tab_init_id"];
			        break;
			    case "save":
			        $msg = "<div class='fwd-updated'><p style='padding:8px;'>Your preset settings have been updated!</p></div>";
			        $set_id = $data_obj["set_id"];
					$set_order_id = $data_obj["set_order_id"];
					$tab_init_id = $data_obj["tab_init_id"];
			        break;
			    case "del":
			       	$msg = "<div class='fwd-updated'><p style='padding:8px;'>Your preset has been deleted!</p></div>";
			        break;
			}
		}
		
		// jquery ui
		wp_enqueue_style("fwdu3dcar_fwd_ui_css", $this->_dir_url . "css/fwd_ui.css");
		wp_enqueue_script("jquery-ui-tabs");
		wp_enqueue_script("jquery-ui-sortable");
		wp_enqueue_script("jquery-ui-accordion");
		wp_enqueue_script("jquery-ui-tooltip");
		
		// spectrum colorpicker
    	wp_enqueue_style("fwdu3dcar_spectrum_css", $this->_dir_url . "css/spectrum.css");
    	wp_enqueue_script("fwdu3dcar_spectrum_script", $this->_dir_url . "js/spectrum.js");
    	
    	// general settings script
		wp_enqueue_media();
        wp_enqueue_script("fwdu3dcar_general_settings_script", $this->_dir_url . "js/general_settings.js");
		
    	include_once "general_settings.php";
    }
    
 	public function set_playlists_manager()
    {
    	if (!$this->check_wp_ver())
    	{
    		return;
    	}
    	
    	$msg = "";
    	
	    if (!empty($_POST) && check_admin_referer("fwdu3dcar_playlist_manager_update", "fwdu3dcar_playlist_manager_nonce"))
		{
			$playlistsAr = json_decode(str_replace("\\", "", $_POST["playlist_data"]), true);
			
			$this->_data->playlists_ar = $playlistsAr;
			$this->_data->set_data();
			
			$msg = "<div class='fwd-updated'><p style='padding:8px;'>Your playlists have been updated!</p></div>";
		}
		
		// jquery ui
		wp_enqueue_style("fwdu3dcar_fwd_ui_css", $this->_dir_url . "css/fwd_ui.css");
		wp_enqueue_script("jquery-ui-tabs");
		wp_enqueue_script("jquery-ui-sortable");
		wp_enqueue_script("jquery-ui-accordion");
		wp_enqueue_script("jquery-ui-dialog");
		wp_enqueue_script("jquery-ui-tooltip");
		
		// playlist manager script
		wp_enqueue_media();
        wp_enqueue_script("fwdu3dcar_playlist_manager_script", $this->_dir_url . "js/playlist_manager.js");
        
    	include_once "playlist_manager.php";
    }
    
    public function set_css_editor()
    {
    	if (!$this->check_wp_ver())
    	{
    		return;
    	}
    	
    	$msg = "";
    	$scroll_pos = 0;
    	
    	$css_file = plugin_dir_path(dirname(__FILE__)) . "css/fwdu3dcar.css";
    	
	    if (!empty($_POST) && check_admin_referer("fwdu3dcar_css_editor_update", "fwdu3dcar_css_editor_nonce"))
		{
			$handle = fopen($css_file, "w") or die("Cannot open file: " . $css_file);
			
			$data = $_POST["css_data"];
			$scroll_pos = $_POST["scroll_pos"];
			
			fwrite($handle, $data);
			
			$msg = "<div class='fwd-updated'><p style='padding:8px;'>The CSS file has been updated!</p></div>";
		}
		
		wp_enqueue_style("fwdu3dcar_fwd_ui_css", $this->_dir_url . "css/fwd_ui.css");
	  			
		$handle = fopen($css_file, "r") or die("Cannot open file: " . $css_file);
        
    	include_once "css_editor.php";
    	
    	fclose($handle);
    }
    
	public static function set_action_links($links)
	{
		$settings_link = "<a href='" . get_admin_url(null, "admin.php?page=FWDU3DCarMenu-General-Settings") . "'>Settings</a>";
   		array_unshift($links, $settings_link);
   		
   		return $links;
	}
	
 	public function add_header_files()
    {
    	wp_enqueue_style("fwdu3dcar_cov_css", $this->_dir_url . "css/fwdu3dcar.css");
    	wp_enqueue_script("fwdu3dcar_cov_script", $this->_dir_url . "js/FWDUltimate3DCarousel.js");
    }
    
    public function get_constructor($sid, $pid)
    {
    	$preset = NULL;
    	
    	foreach ($this->_data->settings_ar as $set)
    	{
    		if ($set["id"] == $sid)
    		{
    			$preset = $set;
    		}
    	}
    	
    	if (is_null($preset))
    	{
    		return "Preset with id ". $sid . " does not exist!";
    	}
    	
    	$playlist = NULL;
    	
    	foreach ($this->_data->playlists_ar as $pl)
    	{
    		if ($pl["id"] == $pid)
    		{
    			$playlist = $pl;
    		}
    	}
    	 	
    	if (is_null($playlist))
    	{
    		return "Playlist with id ". $pid . " does not exist!";
    	}
    	
    	$showHtmlContent = "yes";
    	
    	if ($playlist["type"] == "image")
    	{
    		$showHtmlContent = "no";
    	}
    	
    	return "<script type='text/javascript'>
			FWDU3DCarUtils.checkIfHasTransforms();
			
			window.fwdu3dcar" . FWDU3DCar::$_car_id. " = new FWDUltimate3DCarousel(
			{" . 
				//required settings
			   "carouselHolderDivId:'fwdu3dcarDiv" . FWDU3DCar::$_car_id. "',
				carouselDataListDivId:'fwdu3dcarPlaylist" . $pid . "'," . 

				//main settings
			   "displayType:'" . $preset['display_type'] . "',
				autoScale:'" . $preset['autoscale'] . "',
				carouselWidth:" . $preset['cov_width'] . ",
				carouselHeight:" . $preset['cov_height'] . ",
				skinPath:'" . $preset['skin_path'] . "',
				backgroundColor:'" . $preset['cov_bg_color'] . "',
				backgroundImagePath:'" . $preset['cov_bg_image_url'] . "',
				thumbnailsBackgroundImagePath:'" . $preset['thumbs_bg_image_url'] . "',
				scrollbarBackgroundImagePath:'" . $preset['scrollbar_bg_image_url'] . "',
				backgroundRepeat:'" . $preset['bg_repeat'] . "',
				carouselTopology:'" . $preset['car_topology'] . "',
				carouselXRadius:" . $preset['car_x_radius'] . ",
				carouselYRadius:" . $preset['car_y_radius'] . ",
				carouselXRotation:" . $preset['car_x_rot'] . ",
				carouselYOffset:" . $preset['car_y_offset'] . ",
				showCenterImage:'" . $preset['show_center_image'] . "',
				centerImagePath:'" . $preset['center_image_url'] . "',
				centerImageYOffset:" . $preset['center_image_y_offset'] . ",
				showDisplay2DAlways:'" . $preset['show_2d_display'] . "',
				carouselStartPosition:'" . $preset['cov_start_pos'] . "',
				autoplay:'" . $preset['cov_autoplay'] . "',
				slideshowDelay:" . $preset['cov_slideshow_delay'] . ",
				rightClickContextMenu:'" . $preset['right_click_context_menu'] . "',
				addKeyboardSupport:'" . $preset['cov_keyboard_support'] . "', 
				fluidWidthZIndex:" . $preset['fluid_width_z_index'] . "," . 
											
				//thumbs settings
			   "thumbnailWidth:" . $preset['thumb_width'] . ",
				thumbnailHeight:" . $preset['thumb_height'] . ",
				thumbnailBorderSize:" . $preset['thumb_border_size'] . ",
				thumbnailMinimumAlpha:" . $preset['thumb_min_alpha'] . ",		
				thumbnailBackgroundColor:'" . $preset['thumb_bg_color'] . "',
				thumbnailBorderColor1:'" . $preset['thumb_border_color1'] . "',
				thumbnailBorderColor2:'" . $preset['thumb_border_color2'] . "',
				transparentImages:'" . $preset['transparent_images'] . "',
				maxNumberOfThumbnailsOnMobile:" . $preset['max_thumbs_mobile'] . ",
				showThumbnailsGradient:'" . $preset['show_thumbs_gradient'] . "',
				showThumbnailsHtmlContent:'" . $showHtmlContent . "',
				showText:'" . $preset['show_thumbs_text'] . "',
				textBackgroundColor:'" . $preset['text_bg_color'] . "',
				textBackgroundOpacity:" . $preset['text_bg_opacity'] . ",
				showTextBackgroundImage:'" . $preset['show_text_bg_image'] . "',
				showFullTextWithoutHover:'" . $preset['show_full_text_without_hover'] . "',
				showThumbnailBoxShadow:'" . $preset['show_thumb_box_shadow'] . "',
				thumbnailBoxShadowCss:'" . $preset['box_shadow_css'] . "',
				showReflection:'" . $preset['show_reflection'] . "',
				reflectionHeight:" . $preset['reflection_height'] . ",
				reflectionDistance:" . $preset['reflection_distance'] . ",
				reflectionOpacity:" . $preset['reflection_opacity'] . "," . 
											
				//controls settings
			   "controlsMaxWidth:" . $preset['controls_max_width'] . ",
				controlsHeight:" . $preset['controls_height'] . ",
				controlsPosition:'" . $preset['controls_position'] . "',
				showPrevButton:'" . $preset['show_prev_btn'] . "',
				showNextButton:'" . $preset['show_next_btn'] . "',
				disableNextAndPrevButtonsOnMobile:'" . $preset['disable_btns_mobile'] . "',
				showSlideshowButton:'" . $preset['show_slideshow_btn'] . "',
				slideshowTimerColor:'" . $preset['timer_color'] . "',
				showScrollbar:'" . $preset['show_scrollbar'] . "',
				scrollbarHandlerWidth:" . $preset['scrollbar_handler_width'] . ",
				scrollbarTextColorNormal:'" . $preset['scrollbar_text_normal_color'] . "',
				scrollbarTextColorSelected:'" . $preset['scrollbar_text_selected_color'] . "',
				disableScrollbarOnMobile:'" . $preset['disable_scrollbar_mobile'] . "',
				enableMouseWheelScroll:'" . $preset['enable_mouse_wheel'] . "'," . 
											
				//combobox settings
			   "showComboBox:'" . $preset['show_combobox'] . "',
				startAtCategory:" . $preset['start_category'] . ",
				selectLabel:'" . $preset['select_label'] . "',
				allCategoriesLabel:'" . $preset['all_cats_label'] . "',
				showAllCategories:'" . $preset['show_all_cats'] . "',
				comboBoxPosition:'" . $preset['combobox_pos'] . "',
				selectorBackgroundNormalColor1:'" . $preset['selector_bg_normal_color1'] . "',
				selectorBackgroundNormalColor2:'" . $preset['selector_bg_normal_color2'] . "',
				selectorBackgroundSelectedColor1:'" . $preset['selector_bg_selected_color1'] . "',
				selectorBackgroundSelectedColor2:'" . $preset['selector_bg_selected_color2'] . "',
				selectorTextNormalColor:'" . $preset['selector_text_normal_color'] . "',
				selectorTextSelectedColor:'" . $preset['selector_text_selected_color'] . "',
				buttonBackgroundNormalColor1:'" . $preset['button_bg_normal_color1'] . "',
				buttonBackgroundNormalColor2:'" . $preset['button_bg_normal_color2'] . "',
				buttonBackgroundSelectedColor1:'" . $preset['button_bg_selected_color1'] . "',
				buttonBackgroundSelectedColor2:'" . $preset['button_bg_selected_color2'] . "',
				buttonTextNormalColor:'" . $preset['button_text_normal_color'] . "',
				buttonTextSelectedColor:'" . $preset['button_text_selected_color'] . "',
				comboBoxShadowColor:'" . $preset['combobox_shadow_color'] . "',
				comboBoxHorizontalMargins:" . $preset['combobox_horizontal_margins'] . ",
				comboBoxVerticalMargins:" . $preset['combobox_vertical_margins'] . ",
				comboBoxCornerRadius:" . $preset['combobox_corner_radius'] . "," . 
											
				//lightbox settings
			   "addLightBoxKeyboardSupport:'" . $preset['lightbox_keyboard_support'] . "',
				showLightBoxNextAndPrevButtons:'" . $preset['show_lightbox_next_prev_btns'] . "',
				showLightBoxZoomButton:'" . $preset['show_lightbox_zoom_btn'] . "',
				showLightBoxInfoButton:'" . $preset['show_lightbox_info_btn'] . "',
				showLightBoxSlideShowButton:'" . $preset['show_lightbox_slideshow_btn'] . "',
				showLightBoxInfoWindowByDefault:'" . $preset['show_lightbox_info_default'] . "',
				slideShowAutoPlay:'" . $preset['lightbox_slideshow_autoplay'] . "',
				lightBoxVideoAutoPlay:'" . $preset['lightbox_video_autoplay'] . "',
				lightBoxVideoWidth:" . $preset['lightbox_video_width'] . ",
				lightBoxVideoHeight:" . $preset['lightbox_video_height'] . ",
				lightBoxIframeWidth:" . $preset['lightbox_iframe_width'] . ",
				lightBoxIframeHeight:" . $preset['lightbox_iframe_height'] . ",
				lightBoxBackgroundColor:'" . $preset['lightbox_bg_color'] . "',
				lightBoxInfoWindowBackgroundColor:'" . $preset['lightbox_info_bg_color'] . "',
				lightBoxItemBorderColor1:'" . $preset['lightbox_item_border_color1'] . "',
				lightBoxItemBorderColor2:'" . $preset['lightbox_item_border_color2'] . "',
				lightBoxItemBackgroundColor:'" . $preset['lightbox_item_bg_color'] . "',
				lightBoxMainBackgroundOpacity:" . $preset['lightbox_bg_opacity'] . ",
				lightBoxInfoWindowBackgroundOpacity:" . $preset['lightbox_info_bg_opacity'] . ",
				lightBoxBorderSize:" . $preset['lightbox_border_size'] . ",
				lightBoxBorderRadius:" . $preset['lightbox_border_radius'] . ",
				lightBoxSlideShowDelay:" . $preset['lightbox_slideshow_delay'] . "
			});
		</script>";
    }
    
    public function get_playlist($pid)
    {
    	$playlist = NULL;
    	
    	foreach ($this->_data->playlists_ar as $pl)
    	{
    		if ($pl["id"] == $pid)
    		{
    			$playlist = $pl;
    		}
    	}
    	
    	if (is_null($playlist))
    	{
    		return "Playlist with id ". $pid . " does not exist!";
    	}
    	
    	$playlist_str = "<ul id='fwdu3dcarPlaylist$pid' style='display: none;'>";
    	
    	foreach ($playlist["categories"] as $category)
    	{
    		$playlist_str .= "<ul data-cat='" . $category["name"] . "'>";
    		
    		foreach ($category["thumbs"] as $thumb)
    		{
    			if ($playlist["type"] == "image")
    			{
    				$playlist_str .= "<ul>
						<li data-type='" . $thumb["type"] . "' data-url='" . $thumb["url"] . "' data-target='" . $thumb["target"] . "'></li>
						<li data-thumbnail-path='" . $thumb["path"] . "'></li>
						<li data-thumbnail-text='' data-thumbnail-text-title-offset='" . $thumb["title_offset"] . "' data-thumbnail-text-offset-top='" . $thumb["top_offset"]
    						 . "' data-thumbnail-text-offset-bottom='" . $thumb["bottom_offset"] . "'>"
							 . $thumb["text"] . "
						</li>
						<li data-info=''>"
							 . $thumb["info"] . "
						</li>
					</ul>";
    			}
    			else
    			{
    				$playlist_str .= "<ul>
						<li data-type='" . $thumb["type"] . "' data-url='" . $thumb["url"] . "' data-target='" . $thumb["target"] . "'></li>
						<li data-html-content=''>
							" . $thumb["html"] . "
						</li>
						<li data-thumbnail-text='' data-thumbnail-text-title-offset='" . $thumb["title_offset"] . "' data-thumbnail-text-offset-top='" . $thumb["top_offset"]
    						 . "' data-thumbnail-text-offset-bottom='" . $thumb["bottom_offset"] . "'>"
							 . $thumb["text"] . "
						</li>
						<li data-info=''>"
							 . $thumb["info"] . "
						</li>
					</ul>";
    			}
    		}
    		
    		$playlist_str .= "</ul>";
    	}
    	
    	$playlist_str .= "</ul>";
    	
    	return $playlist_str;
    }
    
 	public function set_carousel($atts)
	{
		extract(shortcode_atts(array("preset_id" => 0, "playlist_id" => 0), $atts, "fwdu3dcar"));
		
		$cov_constructor = $this->get_constructor($preset_id, $playlist_id);
		$cov_div = "<div id='fwdu3dcarDiv" . FWDU3DCar::$_car_id. "'></div>";
		$cov_playlist = $this->get_playlist($playlist_id);
		
		FWDU3DCar::$_car_id++;
		
		$cov_output = $cov_div . $cov_constructor . $cov_playlist;
		
		return $cov_output;
	}
	
	public function set_custom_meta_box($post)
	{
		if (!$this->check_wp_ver())
    	{
    		return;
    	}
		
		// presets
		$presetsNames = array();
		
		foreach ($this->_data->settings_ar as $setting)
    	{
    		$el = array(
    						"id" => $setting["id"],
    						"name" => $setting["name"]
    				   );
    				   
    		array_push($presetsNames, $el);
    	}
    	
		// playlists
		$playlistsNames = array();
		
		if (isset($this->_data->playlists_ar))
		{
			foreach ($this->_data->playlists_ar as $playlist)
	    	{
	    		$el = array(
	    						"id" => $playlist["id"],
	    						"name" => $playlist["name"]
	    				   );
	    				   
	    		array_push($playlistsNames, $el);
	    	}
		}
		
    	wp_enqueue_style("fwdu3dcar_fwd_ui_css", $this->_dir_url . "css/fwd_ui.css");
		wp_enqueue_script("fwdu3dcar_shortcode_script", $this->_dir_url . "js/shortcode.js");
		
    	include_once "meta_box.php";
	}
}

?>