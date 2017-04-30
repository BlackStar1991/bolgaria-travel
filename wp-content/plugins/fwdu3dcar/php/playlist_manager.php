<style>
    body { font-size: 10px; }
    p { font-size: 12px; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    .fwd_editor_class { height: 200px !important; }
   
    .playlist { margin-top: 4px; margin-bottom: 4px; }
    .category { margin-top: 4px; margin-bottom: 4px; }
    #add_playlist_btn { margin-top: 6px; }
    .add_category_btn { margin-right: 4px; margin-top: 6px; }
    .edit_playlist_btn { margin-right: 4px; margin-top: 6px; }
    .delete_playlist_btn { margin-right: 4px; margin-top: 6px; }
    .add_thumbnail_btn { margin-right: 4px; margin-top: 6px; }
    .edit_category_btn { margin-right: 4px; margin-top: 6px; }
    .delete_category_btn { margin-right: 4px; margin-top: 6px; }
    
    .fwd-error { color:#FF0000; }
    .ui-tooltip
    {
		max-width: 400px !important;
	}
    
    .edit_thumbnail_btn { cursor: pointer; position:absolute; left:454px; top:6px; }
    .delete_thumbnail_btn { cursor: pointer; position:absolute; left:494px; top:6px; }
    .thumbnail-header { font-size: 10px; cursor: pointer; padding: 8px; margin: 0px; color: #555555; }
    .fwd-thumbnail
    {
    	position:relative;
    	margin-top: 4px;
    	margin-bottom: 4px;
    	width: 554px;
    	height: 29px;
		border: 1px solid #d3d3d3;
		border-radius: 4px;
		background: #e6e6e6 url(<?php echo $this->_dir_url . "css/images/ui-bg_glass_75_e6e6e6_1x400.png" ?>) 50% 50% repeat-x;
    }
    .th_over
    {
    	border: 1px solid #999999;
    	background: #dadada url(<?php echo $this->_dir_url . "css/images/ui-bg_glass_75_dadada_1x400.png" ?>) 50% 50% repeat-x;
    }
</style>

<script>
	var playlistsAr = <?php echo json_encode($this->_data->playlists_ar); ?>;

	if (!playlistsAr)
	{
		playlistsAr = [];
	}
</script>

<div id="add-playlist-dialog" title="Add new playlist">
	<p id="add_pl_tips">The name field is required.</p>
	
	<fieldset>
    	<label for="pl_name">Name:</label>
    	<input type="text" id="pl_name" class="text ui-widget-content ui-corner-all">
    	
    	<label for="pl_type">Type:</label>
    	<select id="pl_type" class="ui-corner-all">
			<option value="image">image</option>
		  	<option value="html-content">html-content</option>
		</select>
  	</fieldset>
</div>

<div id="edit-playlist-dialog" title="Edit playlist">
	<p id="edit_pl_tips">The name field is required.</p>
	
	<fieldset>
    	<label for="pl_name_edit">Name:</label>
    	<input type="text" id="pl_name_edit" class="text ui-widget-content ui-corner-all">
  	</fieldset>
</div>

<div id="delete-playlist-dialog" title="Delete playlist">
	<fieldset>
    	<label>Are you sure you want to delete this playlist?</label>
  	</fieldset>
</div>

<div id="add-category-dialog" title="Add new category">
	<p id="add_cat_tips">The name field is required.</p>
	
	<fieldset>
    	<label for="cat_name">Name:</label>
    	<input type="text" id="cat_name" class="text ui-widget-content ui-corner-all">
  	</fieldset>
</div>

<div id="edit-category-dialog" title="Edit category">
	<p id="edit_cat_tips">The name field is required.</p>
	
	<fieldset>
    	<label for="cat_name_edit">Name:</label>
    	<input type="text" id="cat_name_edit" class="text ui-widget-content ui-corner-all">
  	</fieldset>
</div>

<div id="delete-category-dialog" title="Delete category">
	<fieldset>
    	<label>Are you sure you want to delete this category?</label>
  	</fieldset>
</div>

<div id="add-thumbnail-dialog" title="Add new thumbnail">
	<p id="add_th_tips">The name and thumbnail path fields are required.</p>
	
	<fieldset>
    	<label for="th_name">Name:</label>
    	<br>
    	<input type="text" id="th_name" style="width:500px" class="text ui-widget-content ui-corner-all">
    	
    	<br>
    	<div id="upload_image_div">
    		<label for="th_image">Thumbnail path (enter a URL or upload an image):</label>

    		<table style="border-spacing:0;">
    			<tr>
		    		<td style="width:500px;padding:0;">
		    			<input id="th_image" type="text" style="width:500px" class="text ui-widget-content ui-corner-all">
		    		 	<button id="upload_image_button" style="cursor:pointer;position:relative;top:-8px;">Add Image</button>
		    		</td>
		    		<td>
		    			<img src="" id="upload_img" style="width:50px;height:50px;margin-left:20px;">
		    		</td>
		    	</tr>
		    </table>
		</div>
		<div id="th_html_div">
    		<label>Thumbnail HTML content:</label>
			<?php
				$settings = array("media_buttons" => false, "wpautop" => false, "editor_class" => "fwd_editor_class", "teeny" => true);
				wp_editor("", "thhtml", $settings);
			?>
		</div>
    	
    	<br>
    	<label for="th_type">Data type:</label>
    	<select id="th_type" class="ui-corner-all">
			<option value="none">none</option>
			<option value="link">link</option>
			<option value="media">media</option>
			<option value="iframe">iframe</option>
		</select>
		<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;margin-left:4px;"
			title="This option sets the thumbnail click action. If 'none' it won't do anything on click. This is especially useful for the thumbnails with html-content,
			this way you can enable links or buttons inside it. If 'link' it will open the URL that can have the _blank or _self target. If 'media' it will open the URL in the lightbox,
			which can be an image path, a Youtube video or a Vimeo video URL. If 'iframe' it will open the URL in the lightbox in an iframe.">
		
		<br><br>
		<div id="th_media">
			<table style="border-spacing:0;">
    			<tr>
		    		<td style="width:500px;padding:0;position:relative;">
		    			<label for="th_url">Data URL:</label>
		    		 	<input type="text" id="th_url" style="width:500px" class="text ui-widget-content ui-corner-all">
		    		 	<button id="url_img_btn" style="cursor:pointer;position:relative;top:-8px;">Add Image</button>
		    		</td>
		    		<td>
		    			<div id="th_link_target" style="width:140px;height:30px;margin-left:4px;">
							<label for="th_target">URL target:</label>
							<select id="th_target" class="ui-corner-all">
								<option value="_blank">_blank</option>
								<option value="_self">_self</option>
							</select>
						</div>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> id="th_media_img" style="vertical-align:middle;margin-left:4px;margin-top:-20px;"
							title="Here the URL must be an image path, a Youtube video or a Vimeo video URL. You can also select the image from your media library.">
		    		</td>
		    	</tr>
		    </table>
		</div>
		
		<br><br><br>
		<div id="th_text_div">
			<label>Thumbnail text:</label>
			<?php
				$settings = array("media_buttons" => false, "wpautop" => false, "editor_class" => "fwd_editor_class", "teeny" => true);
				wp_editor("", "thtext", $settings);
			?>
		</div>
		
		<br><br>
		<div id="offsets_div">
    		<div style="height:30px;">
    			<label for="th_title_offset" style="display:inline-block;width:120px;">Text title offset:</label>
    			<input type="text" id="th_title_offset" style="width:200px;" class="text ui-widget-content ui-corner-all">
    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> id="th_media_img" style="vertical-align:middle;margin-left:4px;margin-bottom:4px;"
					title="This is used to show more or less of the text in case you use a title on double lines for example, or it can even be 0 if you don't want the title to be displayed at all,
						except on mouse hover.">
    		</div>
    		
    		<div style="height:30px;">
    			<label for="th_top_offset" style="display:inline-block;width:120px;">Text top offset:</label>
    			<input type="text" id="th_top_offset" style="width:200px;" class="text ui-widget-content ui-corner-all">
    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> id="th_media_img" style="vertical-align:middle;margin-left:4px;margin-bottom:4px;"
					title="This is used to offset the position of the whole text container at the top.">
    		</div>
    		
    		<div style="height:30px;">
    			<label for="th_bottom_offset" style="display:inline-block;width:120px;">Text bottom offset:</label>
    			<input type="text" id="th_bottom_offset" style="width:200px;" class="text ui-widget-content ui-corner-all">
    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> id="th_media_img" style="vertical-align:middle;margin-left:4px;margin-bottom:4px;"
					title="This is used to offset the position of the whole text container at the bottom.">
    		</div>
	    </div>
		
		<br><br>
		<div id="th_info_div">
			<label>Lightbox info text:</label>
			<?php
				$settings = array("media_buttons" => false, "wpautop" => false, "editor_class" => "fwd_editor_class", "teeny" => true);
				wp_editor("", "thinfo", $settings);
			?>
		</div>
  	</fieldset>
</div>

<div id="edit-thumbnail-dialog" title="Edit thumbnail">
	<p id="edit_th_tips">The name and thumbnail path fields are required.</p>
	
	<fieldset>
    	<label for="th_name_edit">Name:</label>
    	<br>
    	<input type="text" id="th_name_edit" style="width:500px" class="text ui-widget-content ui-corner-all">
    	
    	<br>
    	<div id="upload_image_div_edit">
    		<label for="th_image_edit">Thumbnail path (enter a URL or upload an image):</label>

    		<table style="border-spacing:0;">
    			<tr>
		    		<td style="width:500px;;padding:0;">
		    			<input id="th_image_edit" type="text" style="width:500px" class="text ui-widget-content ui-corner-all">
		    		 	<button id="upload_image_button_edit" style="cursor:pointer;position:relative;top:-8px;">Add Image</button>
		    		</td>
		    		<td>
		    			<img src="" id="upload_img_edit" style="width:50px;height:50px;margin-left:20px;">
		    		</td>
		    	</tr>
		    </table>
		</div>
		<div id="th_html_div_edit">
    		<label>Thumbnail HTML content:</label>
			<?php
				$settings = array("media_buttons" => false, "wpautop" => false, "editor_class" => "fwd_editor_class", "teeny" => true);
				wp_editor("", "thhtmledit", $settings);
			?>
		</div>
    	
    	<br>
    	<label for="th_type_edit">Data type:</label>
    	<select id="th_type_edit" class="ui-corner-all">
			<option value="none">none</option>
			<option value="link">link</option>
			<option value="media">media</option>
			<option value="iframe">iframe</option>
		</select>
		<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> style="vertical-align:middle;margin-left:4px;"
			title="This option sets the thumbnail click action. If 'none' it won't do anything on click. This is especially useful for the thumbnails with html-content,
			this way you can enable links or buttons inside it. If 'link' it will open the URL that can have the _blank or _self target. If 'media' it will open the URL in the lightbox,
			which can be an image path, a Youtube video or a Vimeo video URL. If 'iframe' it will open the URL in the lightbox in an iframe.">
		
		<br><br>
		<div id="th_media_edit">
			<table style="border-spacing:0;">
    			<tr>
		    		<td style="width:500px;padding:0;position:relative;">
		    			<label for="th_url_edit">Data URL:</label>
		    		 	<input type="text" id="th_url_edit" style="width:500px" class="text ui-widget-content ui-corner-all">
		    		 	<button id="url_img_btn_edit" style="cursor:pointer;position:relative;top:-8px;">Add Image</button>
		    		</td>
		    		<td>
		    			<div id="th_link_target_edit" style="width:140px;height:30px;margin-left:4px;">
							<label for="th_target_edit">URL target:</label>
							<select id="th_target_edit" class="ui-corner-all">
								<option value="_blank">_blank</option>
								<option value="_self">_self</option>
							</select>
						</div>
						<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> id="th_media_img_edit" style="vertical-align:middle;margin-left:4px;margin-top:-20px;"
							title="Here the URL must be an image path, a Youtube video or a Vimeo video URL. You can also select the image from your media library.">
		    		</td>
		    	</tr>
		    </table>
		</div>
		
		<br><br><br>
		<div id="th_text_div_edit">
			<label>Thumbnail text:</label>
			<?php
				$settings = array("media_buttons" => false, "wpautop" => false, "editor_class" => "fwd_editor_class", "teeny" => true);
				wp_editor("", "thtextedit", $settings);
			?>
		</div>
		
		<br><br>
		<div id="offsets_div_edit">
    		<div style="height:30px;">
    			<label for="th_title_offset_edit" style="display:inline-block;width:120px;">Text title offset:</label>
    			<input type="text" id="th_title_offset_edit" style="width:200px;" class="text ui-widget-content ui-corner-all">
    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> id="th_media_img" style="vertical-align:middle;margin-left:4px;margin-bottom:4px;"
					title="This is used to show more or less of the text in case you use a title on double lines for example, or it can even be 0 if you don't want the title to be displayed at all,
						except on mouse hover.">
    		</div>
    		
    		<div style="height:30px;">
    			<label for="th_top_offset_edit" style="display:inline-block;width:120px;">Text top offset:</label>
    			<input type="text" id="th_top_offset_edit" style="width:200px;" class="text ui-widget-content ui-corner-all">
    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> id="th_media_img" style="vertical-align:middle;margin-left:4px;margin-bottom:4px;"
					title="This is used to offset the position of the whole text container at the top.">
    		</div>
    		
    		<div style="height:30px;">
    			<label for="th_bottom_offset_edit" style="display:inline-block;width:120px;">Text bottom offset:</label>
    			<input type="text" id="th_bottom_offset_edit" style="width:200px;" class="text ui-widget-content ui-corner-all">
    			<img src=<?php echo $this->_dir_url . "load/icons/help-icon.png" ?> id="th_media_img" style="vertical-align:middle;margin-left:4px;margin-bottom:4px;"
					title="This is used to offset the position of the whole text container at the bottom.">
    		</div>
	    </div>
		
		<br><br>
		<div id="th_info_div_edit">
			<label>Lightbox info text:</label>
			<?php
				$settings = array("media_buttons" => false, "wpautop" => false, "editor_class" => "fwd_editor_class", "teeny" => true);
				wp_editor("", "thinfoedit", $settings);
			?>
		</div>
  	</fieldset>
</div>

<div id="delete-thumbnail-dialog" title="Delete thumbnail">
	<fieldset>
    	<label>Are you sure you want to delete this thumbnail?</label>
  	</fieldset>
</div>

<form action="" method="post" style="margin-top:20px;margin-right:20px;">
	<div style="height:500px;padding:20px;overflow:auto;" class="ui-widget ui-widget-content ui-corner-all">
		<h3>All playlists:</h3>
	  	
		<div id="playlists" style="width:700px">
			<?php 
				$playlists_str = "";
				
				if (isset($this->_data->playlists_ar))
				{
					foreach ($this->_data->playlists_ar as $playlist)
			    	{
			    		$pid = $playlist["id"];
			    		
			    		$playlists_str .= "<div id='pl" . $pid . "' class='playlist'>";
			    		
			    		$playlists_str .= "<h3 class='playlist-header'>" . $playlist["name"] . "<span style='float:right'>ID : " . $pid . "</span></h3>";
			    		
			    		$playlists_str .= "<div>";
			    		
			    		$playlists_str .= "<div id='pl" . $pid . "_cats' class='cats' style='width:654px'>";
			    		
			    		foreach ($playlist["categories"] as $cid => $category)
		    			{
		    				$playlists_str .= "<div id='pl" .$pid . "_cat" . $cid . "' class='category'>";
		    				
		    				$playlists_str .= "<h3 class='category-header'>" . $category["name"] . "</h3>";
		    				
		    				$playlists_str .= "<div>";
		    				
		    				$playlists_str .= "<div id='pl" . $pid . "_cat" . $cid . "_ths' class='ths' style='width:554px'>";
		    				
		    				foreach ($category["thumbs"] as $tid => $thumb)
		    				{
		    					$playlists_str .= "<div id='pl" . $pid . "_cat" . $cid . "_th" . $tid . "' class='fwd-thumbnail'>";
		    					
		    					$playlists_str .= "<h3 class='thumbnail-header'>" . $thumb["name"] . "</h3>";
		    					
		    					$playlists_str .= "<button class='delete_thumbnail_btn' id='pl" . $pid . "_cat" . $cid . "_th" . $tid . "_del_btn'>Delete</button>";
		    					
		    					$playlists_str .= "<button class='edit_thumbnail_btn' id='pl" . $pid . "_cat" . $cid . "_th" . $tid . "_edit_btn'>Edit</button>";
		    					
		    					$playlists_str .= "</div>";
		    				}
		    				
		    				$playlists_str .= "</div>";
		    				
		    				$playlists_str .= "<button class='add_thumbnail_btn' id='pl" . $pid . "_cat" . $cid . "_add_btn' style='cursor:pointer;'>Add new thumbnail</button>";
		    				
		    				$playlists_str .= "<button class='edit_category_btn' id='pl" . $pid . "_cat" . $cid . "_edit_btn' style='cursor:pointer;'>Edit</button>";
			    		
			    			$playlists_str .= "<button class='delete_category_btn' id='pl" . $pid . "_cat" . $cid . "_del_btn' style='cursor:pointer;'>Delete</button>";
		    				
		    				$playlists_str .= "</div>";
		    				
		    				$playlists_str .= "</div>";
		    			}
			    		
			    		$playlists_str .= "</div>";
			    		
			    		$playlists_str .= "<button class='add_category_btn' id='pl" .$pid . "_add_btn' style='cursor:pointer;'>Add new category</button>";
			    		
			    		$playlists_str .= "<button class='edit_playlist_btn' id='pl" . $pid . "_edit_btn' style='cursor:pointer;'>Edit</button>";
			    		
			    		$playlists_str .= "<button class='delete_playlist_btn' id='pl" . $pid . "_del_btn' style='cursor:pointer;'>Delete</button>";
			    		
			    		$playlists_str .= "</div>";
			    		
			    		$playlists_str .= "</div>";
			    	}
			    	
			    	echo $playlists_str;
				}
			?>
		</div>
		
		<em id="pl_em" style="display:block;margin-bottom:8px;">No playlists are available.</em>
		
		<button id="add_playlist_btn" style="cursor:pointer">Add new playlist</button>
  	</div>
  	
  	<input type="hidden" id="playlist_data" name="playlist_data" value="">

	<input id="update_btn" type="submit" name="submit" style="cursor:pointer;margin-top:20px;" value="Update playlists" />
	
	<?php wp_nonce_field("fwdu3dcar_playlist_manager_update", "fwdu3dcar_playlist_manager_nonce"); ?>
</form>

<?php echo $msg; ?>

