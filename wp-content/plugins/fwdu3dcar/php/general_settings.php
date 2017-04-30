<style>
   	body { font-size: 10px; }
    p { font-size: 12px; }
    input.text { width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    table { border-spacing:0;float:left;margin-right:30px; }
    tr { height:50px;}
    td { padding:0; width:230px;}
    .fwd-error { color:#FF0000; }
</style>

<script>
	var settingsAr = <?php echo json_encode($this->_data->settings_ar); ?>;
	
	var sid = <?php echo $set_id; ?>;
	var cur_order_id = <?php echo $set_order_id; ?>;
	var tab_init_id = <?php echo $tab_init_id; ?>;
</script>

<fieldset class="ui-widget">
	<label for="skins">W'P'L'O'C'K'E'R'.'C'O'M - Select your preset:</label>
	
    <select id="skins" class="ui-widget ui-corner-all" style="max-width:200px;"></select>
    <label id="preset_id" for="skins"></label>
    
    <p id="tips" style="width:600px;">All form fields are required.</p>
</fieldset>

<form action="" method="post" style="margin-top:20px;margin-right:20px;">
	<div id="tabs" style="height:600px;overflow:auto;">
	  	<ul>
			<?php $iconsPath = plugin_dir_url(dirname(__FILE__)) . "load/icons/" ?>
		    <li><a href="#tab1"><img src=<?php echo $iconsPath . "tab1-icon.png" ?> style="vertical-align:middle;"><span style="vertical-align:middle;margin-left:4px;">Main settings</span></a></li>
		    <li><a href="#tab2"><img src=<?php echo $iconsPath . "tab2-icon.png" ?> style="vertical-align:middle;"><span style="vertical-align:middle;margin-left:4px;">Thumbnails settings</span></a></li>
		    <li><a href="#tab3"><img src=<?php echo $iconsPath . "tab3-icon.png" ?> style="vertical-align:middle;"><span style="vertical-align:middle;margin-left:4px;">Controls settings</span></a></li>
		    <li><a href="#tab4"><img src=<?php echo $iconsPath . "tab4-icon.png" ?> style="vertical-align:middle;"><span style="vertical-align:middle;margin-left:4px;">Combobox settings</span></a></li>
		    <li><a href="#tab5"><img src=<?php echo $iconsPath . "tab5-icon.png" ?> style="vertical-align:middle;"><span style="vertical-align:middle;margin-left:4px;">Lightbox settings</span></a></li>
	  	</ul>
	 
	  	<div id="tab1">
			<table>
    			<tr>
		    		<td>
		    			<label for="name">Preset name:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="name" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="display_type">Display type:</label>
		    		</td>
		    		<td>
		    			<select id="display_type" class="ui-corner-all">
							<option value="fluidwidth">fluid-width</option>
							<option value="responsive">responsive</option>
							<option value="fixed">fixed</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
						title="If 'fluid-width' the carousel will always fill the browser width and its height will be the below value.
							If 'responsive' the carousel will fill its container width and its height will be the below value.
							If 'fixed' the carousel width and height will be the below values.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="autoscale">Autoscale:</label>
		    		</td>
		    		<td>
		    			<select id="autoscale" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="If 'yes' and the layout width is less than the specified carousel width, then it will keep a correct scale ratio.
								If 'no' the carousel size and scale ratio will not be modified.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="cov_width">Carousel width:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="cov_width" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="cov_height">Carousel height:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="cov_height" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="skin_path">Skin path:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="skin_path" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="cov_bg_color">Background color:</label>
		    		</td>
		    		<td>
		    			<input id="cov_bg_color" />
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="cov_bg_image_url">Background image path:</label>
		    		</td>
		    		<td>
		    			<div id="cov_bg_image_div">
				    		<table>
				    			<tr>
						    		<td>
						    			<input id="cov_bg_image_url" type="text" style="width:200px;" class="text ui-widget-content ui-corner-all">
						    		 	<button id="cov_bg_image_btn" style="cursor:pointer;">Add Image</button>
						    		</td>
						    		<td>
						    			<img src="" id="cov_bg_upload_img" style="width:50px;height:50px;margin-left:20px;">
						    		</td>
						    	</tr>
						    </table>
						</div>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="thumbs_bg_image_url">Thumbnails background image path:</label>
		    		</td>
		    		<td>
		    			<div id="thumbs_bg_image_div">
				    		<table>
				    			<tr>
						    		<td>
						    			<input id="thumbs_bg_image_url" type="text" style="width:200px;" class="text ui-widget-content ui-corner-all">
						    		 	<button id="thumbs_bg_image_btn" style="cursor:pointer;">Add Image</button>
						    		</td>
						    		<td>
						    			<img src="" id="thumbs_bg_upload_img" style="width:50px;height:50px;margin-left:20px;">
						    		</td>
						    	</tr>
						    </table>
						</div>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="scrollbar_bg_image_url">Scrollbar background image path:</label>
		    		</td>
		    		<td>
		    			<div id="scrollbar_bg_image_div">
				    		<table>
				    			<tr>
						    		<td>
						    			<input id="scrollbar_bg_image_url" type="text" style="width:200px;" class="text ui-widget-content ui-corner-all">
						    		 	<button id="scrollbar_bg_image_btn" style="cursor:pointer;">Add Image</button>
						    		</td>
						    		<td>
						    			<img src="" id="scrollbar_bg_upload_img" style="width:50px;height:50px;margin-left:20px;">
						    		</td>
						    	</tr>
						    </table>
						</div>
		    		</td>
		    	</tr>
		    </table>
		    
		    <table>
    			<tr>
		    		<td>
		    			<label for="bg_repeat">Background repeat:</label>
		    		</td>
		    		<td>
		    			<select id="bg_repeat" class="ui-corner-all">
							<option value="repeat">repeat</option>
							<option value="repeat-x">repeat-x</option>
							<option value="repeat-y">repeat-y</option>
							<option value="no-repeat">no-repeat</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the CSS background-repeat property for all the 3 background images. It has the standard CSS values.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="car_topology">Carousel topology:</label>
		    		</td>
		    		<td>
		    			<select id="car_topology" class="ui-corner-all">
							<option value="normal">normal</option>
							<option value="ring">ring</option>
							<option value="star">star</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the geometry topology of the carousel. It has 3 options and it changes the rotation of each thumbnail.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="car_x_radius">Carousel X radius:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="car_x_radius" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the value of the radius for the X axis of the carousel.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="car_y_radius">Carousel Y radius:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="car_y_radius" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the value of the radius for the Y axis of the carousel.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="car_x_rot">Carousel X rotation:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="car_x_rot" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the value of the rotation of the whole carousel on the X axis.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="car_y_offset">Carousel Y offset:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="car_y_offset" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is an offset used for the Y axis of the whole carousel, you can move it up and down.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_center_image">Show center image:</label>
		    		</td>
		    		<td>
		    			<select id="show_center_image" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is used to show or hide the center image of the carousel.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="center_image_url">Center image path:</label>
		    		</td>
		    		<td>
		    			<div id="center_image_div">
				    		<table>
				    			<tr>
						    		<td>
						    			<input id="center_image_url" type="text" style="width:200px;" class="text ui-widget-content ui-corner-all">
						    		 	<button id="center_image_btn" style="cursor:pointer;">Add Image</button>
						    		</td>
						    		<td>
						    			<img src="" id="center_upload_img" style="width:50px;height:50px;margin-left:20px;">
						    		</td>
						    	</tr>
						    </table>
						</div>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="center_image_y_offset">Center image Y offset:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="center_image_y_offset" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is an offset used for the Y axis of the center image, you can move it up and down.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_2d_display">Always show 2D display:</label>
		    		</td>
		    		<td>
		    			<select id="show_2d_display" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This sets the carousel to be always displayed in the 2D layout even on browsers that support 3D, not just for fallback.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="cov_start_pos">Carousel start position:</label>
		    		</td>
		    		<td>
		    			<select id="cov_start_pos" class="ui-corner-all">
		    				<option value="left">left</option>
							<option value="center">center</option>
							<option value="right">right</option>
							<option value="random">random</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the start position of the thumbnails of the carousel, the one that will be selected in front.">
		    		</td>
		    	</tr>
		    </table>
		    
		    <table>
		    	<tr>
		    		<td>
		    			<label for="cov_autoplay">Carousel autoplay:</label>
		    		</td>
		    		<td>
		    			<select id="cov_autoplay" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="cov_slideshow_delay">Carousel slideshow delay (milliseconds):</label>
		    		</td>
		    		<td>
		    			<input type="text" id="cov_slideshow_delay" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="right_click_context_menu">Right-click context menu:</label>
		    		</td>
		    		<td>
		    			<select id="right_click_context_menu" class="ui-corner-all">
							<option value="developer">developer</option>
							<option value="disabled">disabled</option>
							<option value="default">default</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="If 'developer' the context menu will be the developer link 'made by FWD'.
							If 'disabled' the context menu will be disabled completely.
							If 'default' the context menu will be the browser default.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="cov_keyboard_support">Add keyboard navigation support:</label>
		    		</td>
		    		<td>
		    			<select id="cov_keyboard_support" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="fluid_width_z_index">Fluid-width z-index:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="fluid_width_z_index" style="width:200px;" class="text ui-widget-content ui-corner-all">
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"
							title="This is a z-index used for the 'fluid-width' version of the carousel so that you can remove conflicts with overlapping menus etc.">
		    		</td>
		    	</tr>
		    </table>
		</div>
	  
		<div id="tab2">
		  	<table>
    			<tr>
		    		<td>
		    			<label for="thumb_width">Thumbnail width:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="thumb_width" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="thumb_height">Thumbnail height:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="thumb_height" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="thumb_border_size">Thumbnail border size:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="thumb_border_size" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="thumb_min_alpha">Thumbnail minimum alpha:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="thumb_min_alpha" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"
							title="This is the opacity of the back thumbnails of the carousel (the ones that are the furthest). It must be a float value between 0 and 1.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="thumb_bg_color">Thumbnail background color:</label>
		    		</td>
		    		<td>
		    			<input id="thumb_bg_color" />
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="thumb_border_color1">Thumbnail border color 1:</label>
		    		</td>
		    		<td>
		    			<input id="thumb_border_color1" />
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the upper color of the thumbnails border. If these two border color values are different then they create a gradient effect,
								if they are the same then there is a single color.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="thumb_border_color2">Thumbnail border color 2:</label>
		    		</td>
		    		<td>
		    			<input id="thumb_border_color2" />
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the lower color of the thumbnails border. If these two border color values are different then they create a gradient effect,
								if they are the same then there is a single color.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="transparent_images">Use transparent images:</label>
		    		</td>
		    		<td>
		    			<select id="transparent_images" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="If 'yes' then the background and border of the thumbnails won't be displayed and you can use png images with transparent backgrounds.
								If 'no' then the background and border will be displayed.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="max_thumbs_mobile">Maximum number of thumbnails <br> on mobile:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="max_thumbs_mobile" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"
							title="This is the maximum number of thumbnails to be displayed only on the mobile devices for performance reasons.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_thumbs_gradient">Show thumbnail gradient:</label>
		    		</td>
		    		<td>
		    			<select id="show_thumbs_gradient" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is used to show or hide the side thumbnails gradient (used for the shadow effect).">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_thumbs_text">Show thumbnail text:</label>
		    		</td>
		    		<td>
		    			<select id="show_thumbs_text" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is used to show or hide the thumbnails hover text.">
		    		</td>
		    	</tr>
			</table>
		    <table>
		    	<tr>
		    		<td>
		    			<label for="text_bg_color">Text background color:</label>
		    		</td>
		    		<td>
		    			<input id="text_bg_color" />
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="text_bg_opacity">Text background opacity:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="text_bg_opacity" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"
							title="This is the opacity of the thumbnails text background. It must be a float value between 0 and 1.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_text_bg_image">Show text background image:</label>
		    		</td>
		    		<td>
		    			<select id="show_text_bg_image" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is used to show or hide the thumbnails text background image. If it is 'no' then the previous text background color setting will be used.">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="show_full_text_without_hover">Show full text without hover:</label>
		    		</td>
		    		<td>
		    			<select id="show_full_text_without_hover" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is used to enable the thumbnails text to be shown all the time without the otherwise necessary hover.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_thumb_box_shadow">Show thumbnail box shadow:</label>
		    		</td>
		    		<td>
		    			<select id="show_thumb_box_shadow" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is used to show a box shadow on the thumbnail if desired.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="box_shadow_css">Thumbnail box shadow CSS:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="box_shadow_css" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"
							title="This is the CSS box-shadow property for the thumbnail. It will be displayed only if the previous 'Show thumbnail box shadow' setting is set to 'yes'.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_reflection">Show image reflection:</label>
		    		</td>
		    		<td>
		    			<select id="show_reflection" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="reflection_height">Thumbnail reflection height:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="reflection_height" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="reflection_distance">Thumbnail reflection distance:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="reflection_distance" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="reflection_opacity">Thumbnail reflection opacity:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="reflection_opacity" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"
							title="This is the opacity of the thumbnails reflection. It must be a float value between 0 and 1.">
		    		</td>
		    	</tr>
		    </table>
		</div>
		  
		<div id="tab3">
	    	<table>
	    		<tr>
		    		<td>
		    			<label for="controls_max_width">Controls maximum width:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="controls_max_width" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"
							title="This is the maximum width of the controls bar and is used to scale the scrollbar at resize.">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="controls_height">Controls height:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="controls_height" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"
							title="This is the height of the controls bar.">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="controls_position">Controls position:</label>
		    		</td>
		    		<td>
		    			<select id="controls_position" class="ui-corner-all">
							<option value="top">top</option>
							<option value="bottom">bottom</option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_prev_btn">Show previous button:</label>
		    		</td>
		    		<td>
		    			<select id="show_prev_btn" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_next_btn">Show next button:</label>
		    		</td>
		    		<td>
		    			<select id="show_next_btn" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="disable_btns_mobile">Disable next and previous buttons <br> on mobile:</label>
		    		</td>
		    		<td>
		    			<select id="disable_btns_mobile" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_slideshow_btn">Show slideshow button:</label>
		    		</td>
		    		<td>
		    			<select id="show_slideshow_btn" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="timer_color">Slideshow timer color:</label>
		    		</td>
		    		<td>
		    			<input id="timer_color" />
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the color of the slideshow timer button display numbers.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_scrollbar">Show scrollbar:</label>
		    		</td>
		    		<td>
		    			<select id="show_scrollbar" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="scrollbar_handler_width">Scrollbar handler width:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="scrollbar_handler_width" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="scrollbar_text_normal_color">Scrollbar text normal color:</label>
		    		</td>
		    		<td>
		    			<input id="scrollbar_text_normal_color" />
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the normal color of the text from the scrollbar handler.">
		    		</td>
		    	</tr>
			</table>
		    <table>
		    	<tr>
		    		<td>
		    			<label for="scrollbar_text_selected_color">Scrollbar text selected color:</label>
		    		</td>
		    		<td>
		    			<input id="scrollbar_text_selected_color" />
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the selected color of the text from the scrollbar handler.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="disable_scrollbar_mobile">Disable scrollbar on mobile:</label>
		    		</td>
		    		<td>
		    			<select id="disable_scrollbar_mobile" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="enable_mouse_wheel">Enable mouse wheel scroll:</label>
		    		</td>
		    		<td>
		    			<select id="enable_mouse_wheel" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>
		    </table>
		</div>
	
		<div id="tab4">
			<table>
		    	<tr>
		    		<td>
		    			<label for="show_combobox">Show combobox:</label>
		    		</td>
		    		<td>
		    			<select id="show_combobox" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is used to show or hide the carousel combobox. This combobox is used as a select menu for the carousel categories.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="start_category">Combobox start category:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="start_category" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"
							title="This is used to specify the selected start category of the combobox if there is more than one category. Please note that the counting starts from 1.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="select_label">Combobox select label:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="select_label" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"
							title="This is the fixed combobox title label for the selector of the categories. If it has the value 'default' then the label will change and it will be the current category name.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="all_cats_label">Combobox all categories label:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="all_cats_label" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"
							title="This is the combobox label of the option that shows all the categories.
								If the 'Show all categories' setting below is enabled then it is considered the first category.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_all_cats">Show all categories:</label>
		    		</td>
		    		<td>
		    			<select id="show_all_cats" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is used to show or hide an extra combobox option button which will load all categories in a single category.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="combobox_pos">Combobox position:</label>
		    		</td>
		    		<td>
		    			<select id="combobox_pos" class="ui-corner-all">
							<option value="topleft">top-left</option>
							<option value="topright">top-right</option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="selector_bg_normal_color1">Combobox selector background <br> normal color 1:</label>
		    		</td>
		    		<td>
		    			<input id="selector_bg_normal_color1" />
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the combobox selector button background upper normal color. If these two color values are different then they create a gradient effect,
								if they are the same then there is a single color.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="selector_bg_normal_color2">Combobox selector background <br> normal color 2:</label>
		    		</td>
		    		<td>
		    			<input id="selector_bg_normal_color2" />
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the combobox selector button background lower normal color. If these two color values are different then they create a gradient effect,
								if they are the same then there is a single color.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="selector_bg_selected_color1">Combobox selector background <br> selected color 1:</label>
		    		</td>
		    		<td>
		    			<input id="selector_bg_selected_color1" />
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the combobox selector button background upper selected color. If these two color values are different then they create a gradient effect,
								if they are the same then there is a single color.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="selector_bg_selected_color2">Combobox selector background <br> selected color 2:</label>
		    		</td>
		    		<td>
		    			<input id="selector_bg_selected_color2" />
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the combobox selector button background lower selected color. If these two color values are different then they create a gradient effect,
								if they are the same then there is a single color.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="selector_text_normal_color">Combobox selector text <br> normal color:</label>
		    		</td>
		    		<td>
		    			<input id="selector_text_normal_color" />
		    		</td>
		    	</tr>
		    </table>
		    <table>
		    	<tr>
		    		<td>
		    			<label for="selector_text_selected_color">Combobox selector text <br> selected color:</label>
		    		</td>
		    		<td>
		    			<input id="selector_text_selected_color" />
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="button_bg_normal_color1">Combobox button background <br> normal color 1:</label>
		    		</td>
		    		<td>
		    			<input id="button_bg_normal_color1" />
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the combobox category button background upper normal color. If these two color values are different then they create a gradient effect,
								if they are the same then there is a single color.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="button_bg_normal_color2">Combobox button background <br> normal color 2:</label>
		    		</td>
		    		<td>
		    			<input id="button_bg_normal_color2" />
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the combobox category button background lower normal color. If these two color values are different then they create a gradient effect,
								if they are the same then there is a single color.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="button_bg_selected_color1">Combobox button background <br> selected color 1:</label>
		    		</td>
		    		<td>
		    			<input id="button_bg_selected_color1" />
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the combobox category button background upper selected color. If these two color values are different then they create a gradient effect,
								if they are the same then there is a single color.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="button_bg_selected_color2">Combobox button background <br> selected color 2:</label>
		    		</td>
		    		<td>
		    			<input id="button_bg_selected_color2" />
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the combobox category button background lower selected color. If these two color values are different then they create a gradient effect,
								if they are the same then there is a single color.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="button_text_normal_color">Combobox button text normal color:</label>
		    		</td>
		    		<td>
		    			<input id="button_text_normal_color" />
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="button_text_selected_color">Combobox button text selected color:</label>
		    		</td>
		    		<td>
		    			<input id="button_text_selected_color" />
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="combobox_shadow_color">Combobox box shadow color:</label>
		    		</td>
		    		<td>
		    			<input id="combobox_shadow_color" />
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the color of the box shadow surrounding the combobox.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="combobox_horizontal_margins">Combobox horizontal margin:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="combobox_horizontal_margins" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"
							title="This is the horizontal margin offset of the combobox relative to the carousel container.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="combobox_vertical_margins">Combobox vertical margin:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="combobox_vertical_margins" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"
							title="This is the vertical margin offset of the combobox relative to the carousel container.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="combobox_corner_radius">Combobox corner radius:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="combobox_corner_radius" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    </table>
		</div>
			
		<div id="tab5">
			<table>
		    	<tr>
		    		<td>
		    			<label for="lightbox_keyboard_support">Add lightbox keyboard navigation support:</label>
		    		</td>
		    		<td>
		    			<select id="lightbox_keyboard_support" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_lightbox_next_prev_btns">Show lightbox next and previous buttons:</label>
		    		</td>
		    		<td>
		    			<select id="show_lightbox_next_prev_btns" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_lightbox_zoom_btn">Show lightbox zoom button:</label>
		    		</td>
		    		<td>
		    			<select id="show_lightbox_zoom_btn" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_lightbox_info_btn">Show lightbox info button:</label>
		    		</td>
		    		<td>
		    			<select id="show_lightbox_info_btn" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_lightbox_slideshow_btn">Show lightbox slideshow button:</label>
		    		</td>
		    		<td>
		    			<select id="show_lightbox_slideshow_btn" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_lightbox_info_default">Show lightbox info window by default:</label>
		    		</td>
		    		<td>
		    			<select id="show_lightbox_info_default" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="If 'yes' the lightbox will open the info window automatically when the first item is opened.
								If 'no' then the info window will not be opened.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="lightbox_slideshow_autoplay">Lightbox slideshow autoplay:</label>
		    		</td>
		    		<td>
		    			<select id="lightbox_slideshow_autoplay" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is used to enable the lightbox slideshow to start to play when the first item is opened.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="lightbox_video_autoplay">Lightbox video autoplay:</label>
		    		</td>
		    		<td>
		    			<select id="lightbox_video_autoplay" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is used to enable the lightbox Youtube and Vimeo videos autoplay feature.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="lightbox_video_width">Lightbox video width:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="lightbox_video_width" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="lightbox_video_height">Lightbox video height:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="lightbox_video_height" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="lightbox_iframe_width">Lightbox iframe width:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="lightbox_iframe_width" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    </table>
		    <table>
		    	<tr>
		    		<td>
		    			<label for="lightbox_iframe_height">Lightbox iframe height:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="lightbox_iframe_height" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="lightbox_bg_color">Lightbox background color:</label>
		    		</td>
		    		<td>
		    			<input id="lightbox_bg_color" />
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="lightbox_info_bg_color">Lightbox info window background color:</label>
		    		</td>
		    		<td>
		    			<input id="lightbox_info_bg_color" />
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="lightbox_item_border_color1">Lightbox item border color 1:</label>
		    		</td>
		    		<td>
		    			<input id="lightbox_item_border_color1" />
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the upper color of the lightbox item border. If these two color values are different then they create a gradient effect,
								if they are the same then there is a single color.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="lightbox_item_border_color2">Lightbox item border color 2:</label>
		    		</td>
		    		<td>
		    			<input id="lightbox_item_border_color2" />
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This is the lower color of the lightbox item border. If these two color values are different then they create a gradient effect,
								if they are the same then there is a single color.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="lightbox_item_bg_color">Lightbox item background color:</label>
		    		</td>
		    		<td>
		    			<input id="lightbox_item_bg_color" />
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="lightbox_bg_opacity">Lightbox background opacity:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="lightbox_bg_opacity" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"
							title="This is the opacity of the lightbox background. It must be a float value between 0 and 1.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="lightbox_info_bg_opacity">Lightbox info window background opacity:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="lightbox_info_bg_opacity" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"
							title="This is the opacity of the lightbox info window background. It must be a float value between 0 and 1.">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="lightbox_border_size">Lightbox border size:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="lightbox_border_size" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="lightbox_border_radius">Lightbox border radius:</label>
		    		</td>
		    		<td>
		    			<input type="text" id="lightbox_border_radius" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="lightbox_slideshow_delay">Lightbox slideshow delay <br> (milliseconds):</label>
		    		</td>
		    		<td>
		    			<input type="text" id="lightbox_slideshow_delay" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    </table>
		</div>
	</div>
	
	<input type="hidden" id="settings_data" name="settings_data" value="">
	
	<input id="add_btn" type="submit" name="submit" style="cursor:pointer;margin-top:20px;" value="Add new preset" />
	<input id="update_btn" type="submit" name="submit" style="cursor:pointer;margin-top:20px;" value="Update preset settings" />
	<input id="del_btn" type="submit" name="submit" style="cursor:pointer;margin-top:20px;" value="Delete preset" />
	
	<?php wp_nonce_field("fwdu3dcar_general_settings_update", "fwdu3dcar_general_settings_nonce"); ?>
</form>

<?php echo $msg; ?>

