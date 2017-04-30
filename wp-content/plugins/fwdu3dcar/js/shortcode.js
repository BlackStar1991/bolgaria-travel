jQuery(document).ready(function($)
{
	$.each(fwdu3dcarPresetsObj, function(i, el)
	{
		$("#fwdu3dcar_presets_list").append("<option value='" + el.id + "'>" + el.name + "</option>");
	});

	$("#fwdu3dcar_presets_list").change(function()
	{
		sid = $("#fwdu3dcar_presets_list").val();
	});
	
	$("#fwdu3dcar_div").hide();
		
	if (fwdu3dcarPlaylistsObj.length > 0)
	{
		$.each(fwdu3dcarPlaylistsObj, function(i, el)
		{
			$("#fwdu3dcar_playlists_list").append("<option value='" + el.id + "'>" + el.name + "</option>");
		});

		$("#fwdu3dcar_playlists_list").change(function()
		{
			pid = $("#fwdu3dcar_playlists_list").val();
		});
		
		var sid = $("#fwdu3dcar_presets_list").val();
		var pid = $("#fwdu3dcar_playlists_list").val();
		
		$("#fwdu3dcar_shortcode_btn").click(function()
		{
			var shortcode = '[fwdu3dcar preset_id="' + sid + '" playlist_id="' + pid + '"]';
		
			if (typeof tinymce != "undefined")
			{
			    var editor = tinymce.get("content");
			    
			    if (editor && (editor instanceof tinymce.Editor) && ($("textarea#content:hidden").length != 0))
			    {
			        editor.selection.setContent(shortcode);
			        editor.save({no_events: true});
			    }
			    else
			    {
					var text = $("textarea#content").val();
					var select_pos1 = $("textarea#content").prop("selectionStart");
					var select_pos2 = $("textarea#content").prop("selectionEnd");
					
					var new_text = text.slice(0, select_pos1) + shortcode + text.slice(select_pos2);
					
					$("textarea#content").val(new_text);
			    } 
			}
			else
			{
				var text = $("textarea#content").val();
				var select_pos1 = $("textarea#content").prop("selectionStart");
				var select_pos2 = $("textarea#content").prop("selectionEnd");
				
				var new_text = text.slice(0, select_pos1) + shortcode + text.slice(select_pos2);
				
				$("textarea#content").val(new_text);
			}

			$("#fwdu3dcar_div").hide();
			$("#fwdu3dcar_div").fadeIn(600);
			$("#fwdu3dcar_msg").html("The shortcode has been added!");
			
			return false;
		});
	}
	else
	{
		var td = $("#fwdu3dcar_playlists_list").parent();
		
		$("#fwdu3dcar_playlists_list").remove();
		td.append("<em style='margin-left:8px;'>No playlists are available.</em>");
		
		$("#fwdu3dcar_shortcode_btn").prop("disabled", true);
		$("#fwdu3dcar_shortcode_btn").css("cursor", "default");
	}
});