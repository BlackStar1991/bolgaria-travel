<style>
    div .fwd-meta-box { font-size: 10px !important; }
    table .fwd-meta-box { border-spacing:0 !important; }
    tr .fwd-meta-box { height:30px !important;}
    td .fwd-meta-box { padding:0 !important; width:100px !important; }
</style>

<script>
	var fwdu3dcarPresetsObj = <?php echo json_encode($presetsNames); ?>;
	var fwdu3dcarPlaylistsObj = <?php echo json_encode($playlistsNames); ?>;
</script>

<div class="fwd-meta-box ui-widget">
	<table>
    	<tr>
			<td>
				<label for="fwdu3dcar_presets_list">Select preset:</label>
			</td>
			<td>
				<select id="fwdu3dcar_presets_list" class="ui-widget ui-corner-all" style="max-width:160px;"></select>
			</td>
		</tr>
		<tr>
			<td>
				<label for="fwdu3dcar_playlists_list">Select playlist:</label>
			</td>
			<td>
				<select id="fwdu3dcar_playlists_list" class="ui-widget ui-corner-all" style="max-width:160px;"></select>
			</td>
		</tr>
	</table>
	
	<p style="font-size:11px">Add the carousel shortcode to the editor:</p>
	
	<button id="fwdu3dcar_shortcode_btn" style="cursor:pointer">Add shortcode</button>
	
	<div id="fwdu3dcar_div" class="fwd-updated" style="background-color:#F2F2F2;"><p id="fwdu3dcar_msg" style="padding:8px;font-size:11px;"></p></div>
</div>
