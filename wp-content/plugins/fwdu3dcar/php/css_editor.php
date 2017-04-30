<style>
    body { font-size: 10px; }
    p { font-size: 12px; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
</style>

<script>
	jQuery(document).ready(function($)
	{
		$("#css_text").scrollTop($("#scroll_pos").val());
		
		$("#update_btn").click(function()
		{
		    $("#css_data").val($("#css_text").val());
		    $("#scroll_pos").val($("#css_text").scrollTop());
	    });
	});
</script>

<form action="" method="post" style="margin-top:20px;margin-right:20px;">
	<div style="height:500px;padding:20px;overflow:auto;" class="ui-widget ui-widget-content ui-corner-all">
		<label for="css_text" style="font-size:12px;">Here you can edit the carousel main CSS file (css/fwdu3dcar.css):</label>
	  	<br><br>
	  	<textarea id="css_text" cols="256" rows="32"><?php echo fread($handle, filesize($css_file)); ?></textarea>
  	</div>
  	
  	<input type="hidden" id="css_data" name="css_data" value="">
  	<input type="hidden" id="scroll_pos" name="scroll_pos" value="<?php echo $scroll_pos; ?>">

	<input id="update_btn" type="submit" name="submit" style="cursor:pointer;margin-top:20px;" value="Update CSS file" />
	
	<?php wp_nonce_field("fwdu3dcar_css_editor_update", "fwdu3dcar_css_editor_nonce"); ?>
</form>

<?php echo $msg; ?>

