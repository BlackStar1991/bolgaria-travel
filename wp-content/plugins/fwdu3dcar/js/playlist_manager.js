jQuery(document).ready(function($)
{
	$("#playlists").accordion(
	{
		header: ".playlist-header",
    	collapsible: true,
    	heightStyle: "content",
    	active: false
    })
    .sortable(
   	{
        axis: "y",
        handle: ".playlist-header",
        start: startPlaylistsOrder,
        update: updatePlaylistsOrder
    });

	$(".cats").accordion(
	{
		header: ".category-header",
    	collapsible: true,
    	heightStyle: "content",
    	active: false
    })
    .sortable(
   	{
        axis: "y",
        handle: ".category-header",
        start: startCategoriesOrder,
        update: updateCategoriesOrder
    });

	$(".ths").sortable(
   	{
        axis: "y",
        handle: ".thumbnail-header",
        start: startThumbsOrder,
        update: updateThumbsOrder
    });
	
	$(".fwd-thumbnail").mouseover(function()
	{
		$(this).addClass("th_over");
		$(this).find(".thumbnail-header").css("color", "#212121");
	});
	
	$(".fwd-thumbnail").mouseout(function()
	{
		$(this).removeClass("th_over");
		$(this).find(".thumbnail-header").css("color", "#555555");
	});
	
	if ($("#playlists .playlist").length > 0)
	{
		$("#pl_em").hide();
	}
	
	$("img").tooltip(
    {
        position:
        {
    		my: "center bottom-10",
    		at: "center top"
        }
    });
	
	var curPlOrderId;
	var newPlOrderId;
	
	function startPlaylistsOrder(ev, ui)
	{
		var allPlItems = $(this).sortable("toArray");
		
		curPlOrderId = allPlItems.indexOf($(ui.item).attr("id"));
	}
	
	function updatePlaylistsOrder(ev, ui)
	{
		var allPlItems = $(this).sortable("toArray");

   		newPlOrderId = allPlItems.indexOf($(ui.item).attr("id"));
   		
   		var curItem = playlistsAr.splice(curPlOrderId, 1)[0];
   	  
   	    playlistsAr.splice(newPlOrderId, 0, curItem);
	};
	
	var curCatOrderId;
	var newCatOrderId;
	
	function startCategoriesOrder(ev, ui)
	{
		var allCatItems = $(this).sortable("toArray");
		
		curCatOrderId = allCatItems.indexOf($(ui.item).attr("id"));
	}
	
	function updateCategoriesOrder(ev, ui)
	{
		var allCatItems = $(this).sortable("toArray");

   		newCatOrderId = allCatItems.indexOf($(ui.item).attr("id"));
   		
   		var allPlItems = $("#playlists").sortable("toArray");
   		var plParent = $(this).closest(".playlist");
   		
   		curPlOrderId = allPlItems.indexOf($(plParent).attr("id"));
   		
   		var curItem = playlistsAr[curPlOrderId].categories.splice(curCatOrderId, 1)[0];
   	  
		playlistsAr[curPlOrderId].categories.splice(newCatOrderId, 0, curItem);
	}
	
	var curThOrderId;
	var newThOrderId;
	
	function startThumbsOrder(ev, ui)
	{
		var allThItems = $(this).sortable("toArray");
		
		curThOrderId = allThItems.indexOf($(ui.item).attr("id"));
	}
	
	function updateThumbsOrder(ev, ui)
	{
		var allThItems = $(this).sortable("toArray");

   		newThOrderId = allThItems.indexOf($(ui.item).attr("id"));
   		
   		var allPlItems = $("#playlists").sortable("toArray");
   		var plParent = $(this).closest(".playlist");
   		
   		curPlOrderId = allPlItems.indexOf($(plParent).attr("id"));
   		
   		var allCatItems = $($(this).closest(".cats")).sortable("toArray");
   		var catParent = $(this).closest(".category");

   		curCatOrderId = allCatItems.indexOf($(catParent).attr("id"));
   		
   		var curItem = playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs.splice(curThOrderId, 1)[0];
   	  
   		playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs.splice(newThOrderId, 0, curItem);
	}

    function checkLength(tips, el, prop, min, max)
	{
      	if ((el.val().length > max) || (el.val().length < min))
	    {
        	el.addClass("ui-state-error");
        	updateTips(tips, "Length of " + prop + " must be between " + min + " and " + max + ".");
        	
        	return false;
      	}
	    else
		{
        	return true;
      	}
	}
    
    function checkIfIntegerAndLength(tips, el, prop, min, max)
	{
    	var int_reg_exp = /-?[0-9]+/;
    	var str = el.val();
    	var res = str.match(int_reg_exp);
    	
    	if (res && (res[0] == str))
        {
    		if ((el.val().length > max) || (el.val().length < min))
    	    {
            	el.addClass("ui-state-error");
            	updateTips(tips, "Length of " + prop + " must be between " + min + " and " + max + ".");
            	
            	return false;
          	}
    	    else
    		{
            	return true;
          	}
        }
        else
        {
        	el.addClass("ui-state-error");
        	updateTips(tips, "The " + prop + " field value must be an integer.");
        	
        	return false;
        }
	}

	function updateTips(tips, txt)
	{
	    tips.text(txt).addClass("ui-state-highlight");

	    setTimeout(function()
		{
	    	tips.removeClass("ui-state-highlight", 1500);
	    }, 500);
	    
	    tips.addClass("fwd-error");
	}
	
	var cur_pl_id = 0;
	var cur_cat_id = 0;
	var cur_th_id = 0;

	// playlist dialogs
	var pl_name = $("#pl_name");
    var pl_type = $("#pl_type");
    var allFieldsPl = $([]).add(pl_name);

	$("#add-playlist-dialog").dialog(
	{
		autoOpen: false,
		width: 350,
	    height: 300,
	    modal: true,
	    buttons:
		{
	        "Add playlist": function()
	        {
	         	var fValid = true;
	         	var tips = $("#add_pl_tips");
	         	
	          	allFieldsPl.removeClass("ui-state-error");
	 
	          	fValid = fValid && checkLength(tips, pl_name, "name", 1, 64);
	 
	          	if (fValid)
		        {
	          		var pid = $("#playlists .playlist").length;
	          		var plsIdsAr = [];
	          		
	          		if (pid > 0)
	          		{
	          			$.each(playlistsAr, function(i, el)
          				{
          					plsIdsAr.push(el.id);
          				});
    	          		
    	          		for (var i=0; i<playlistsAr.length; i++)
    	          		{
    	          			if ($.inArray(i, plsIdsAr) == -1)
    	          			{
    	          				pid = i;
    	          				break;
    	          			}
    	          		}
	          		}
	          		else
	          		{
	          			$("#pl_em").hide();
	          		}
	          		
		            $("#playlists").append("<div id='pl" + pid + "' class='playlist'>"
		    	    	+ "<h3 class='playlist-header'>" + pl_name.val().replace(/"/g, "'") + " <span style='float:right'>ID : " + pid + "</span></h3>"
		    	       	+ "<div>"
		    	       	+ "<div id='pl" + pid + "_cats' class='cats' style='width:654px'></div>"
		    	       	+ "<button class='add_category_btn' id='pl" + pid + "_add_btn' style='cursor:pointer;'>Add new category</button>"
		    	       	+ "<button class='edit_playlist_btn' id='pl" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
		    	    	+ "<button class='delete_playlist_btn' id='pl" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"
		    	       	+ "</div>"
		    	   	+ "</div>");

		            $(".add_category_btn").click(function()
            		{
            			var reg_exp = /pl[0-9]+_/;
            			
            			cur_pl_id = parseInt($(this).attr("id").match(reg_exp)[0].slice(2, -1));
            			
            	        $("#add-category-dialog").dialog("open");
            	        return false;
            	    });
		            
		            $(".edit_playlist_btn").click(function()
            		{
            			var reg_exp = /pl[0-9]+_/;
            			
            			cur_pl_id = parseInt($(this).attr("id").match(reg_exp)[0].slice(2, -1));
            			
            			var allPlItems = $("#playlists").sortable("toArray");
            	   		curPlOrderId = allPlItems.indexOf("pl" + cur_pl_id);
            			
            	        $("#edit-playlist-dialog").dialog("open");
            	        return false;
            	    });
		            
		            $(".delete_playlist_btn").click(function()
            		{
            			var reg_exp = /pl[0-9]+_/;
            			
            			cur_pl_id = parseInt($(this).attr("id").match(reg_exp)[0].slice(2, -1));         			
            			
            	        $("#delete-playlist-dialog").dialog("open");
            	        return false;
            	    });
		            
		            $("#pl" + pid + "_cats").accordion(
            		{
            			header: ".category-header",
            	    	collapsible: true,
            	    	heightStyle: "content",
            	    	active: false
            	    })
            	    .sortable(
            	   	{
            	        axis: "y",
            	        handle: ".category-header",
            	        start: startCategoriesOrder,
            	        update: updateCategoriesOrder
            	    });       

		            $("#playlists").sortable("refresh");
		            $("#playlists").accordion("refresh");
		            
		            var newPl =
		            {
		            	id: pid,
		            	name: pl_name.val().replace(/"/g, "'"),
		            	type: pl_type.val(),
		            	categories: []
		            };
		            
		            playlistsAr.push(newPl);

		            $(this).dialog("close");
	         	 }	
	        },
	        "Cancel": function()
	        {
	        	$(this).dialog("close");
	        }
	    },
	    close: function()
	    {
		    allFieldsPl.removeClass("ui-state-error");
		    $("#add_pl_tips").removeClass("fwd-error");
	    },
	    open: function()
	    {
	    	$("#pl_name").val("");
		    $("#pl_type").val("image");
		    
		    $("#add_pl_tips").text("The name field is required.");
		}
	});

	$("#add_playlist_btn").click(function()
	{
        $("#add-playlist-dialog").dialog("open");
        return false;
    });
	
	var pl_name_edit = $("#pl_name_edit");
    var allFieldsPlEdit = $([]).add(pl_name_edit);

	$("#edit-playlist-dialog").dialog(
	{
		autoOpen: false,
		width: 350,
	    height: 250,
	    modal: true,
	    buttons:
		{
	        "Update playlist": function()
	        {
	         	var fValid = true;
	         	var tips = $("#edit_pl_tips");
	         	
	         	allFieldsPlEdit.removeClass("ui-state-error");
	 
	          	fValid = fValid && checkLength(tips, pl_name_edit, "name", 1, 64);
	 
	          	if (fValid)
		        {
	          		var content = $("#pl" + cur_pl_id + " > h3").html();
	          		var pos = content.indexOf(playlistsAr[curPlOrderId].name);
	          		
	          		content = content.slice(0, pos);
	          		
	          		$("#pl" + cur_pl_id + " > h3").html(content + pl_name_edit.val().replace(/"/g, "'") + "<span style='float:right'>ID : " + playlistsAr[curPlOrderId].id + "</span>");
	          		
		            playlistsAr[curPlOrderId].name = pl_name_edit.val().replace(/"/g, "'");
		            
		            $(this).dialog("close");
	         	 }	
	        },
	        "Cancel": function()
	        {
	        	$(this).dialog("close");
	        }
	    },
	    close: function()
	    {
		    allFieldsPlEdit.removeClass("ui-state-error");
		    $("#edit_pl_tips").removeClass("fwd-error");
	    },
	    open: function()
	    {
	    	$("#pl_name_edit").val(playlistsAr[curPlOrderId].name);
	    	
	    	$("#edit_pl_tips").text("The name field is required.");
		}
	});
	
	$(".edit_playlist_btn").click(function()
	{
		var reg_exp = /pl[0-9]+_/;
		
		cur_pl_id = parseInt($(this).attr("id").match(reg_exp)[0].slice(2, -1));
		
		var allPlItems = $("#playlists").sortable("toArray");
   		curPlOrderId = allPlItems.indexOf("pl" + cur_pl_id);
		
        $("#edit-playlist-dialog").dialog("open");
        return false;
    });
	
	$("#delete-playlist-dialog").dialog(
	{
		autoOpen: false,
		width: 300,
	    height: 160,
	    modal: true,
	    buttons:
		{
	        "Yes": function()
	        {
		   		var allPlItems = $("#playlists").sortable("toArray");
	       		curPlOrderId = allPlItems.indexOf("pl" + cur_pl_id);
		   		
		   		playlistsAr.splice(curPlOrderId, 1);
		   		
	            $("#pl" + cur_pl_id).remove();
	            
	            $("#playlists").accordion("option", "active", false);
	            
	            $("#playlists").sortable("refresh");
	            $("#playlists").accordion("refresh");
	            
	            if ($("#playlists .playlist").length == 0)
	            {
	            	$("#pl_em").show();
	            }
	            
	            $(this).dialog("close");
	        },
	        "No": function()
	        {
	        	$(this).dialog("close");
	        }
	    }
	});
	
	$(".delete_playlist_btn").click(function()
	{
		var reg_exp = /pl[0-9]+_/;
		
		cur_pl_id = parseInt($(this).attr("id").match(reg_exp)[0].slice(2, -1));
		
        $("#delete-playlist-dialog").dialog("open");
        return false;
    });

	// category dialogs
	var cat_name = $("#cat_name");
    var allFieldsCat = $([]).add(cat_name);

	$("#add-category-dialog").dialog(
	{
		autoOpen: false,
		width: 350,
	    height: 250,
	    modal: true,
	    buttons:
		{
	        "Add category": function()
	        {
	         	var fValid = true;
	         	var tips = $("#add_cat_tips");
	         	
	          	allFieldsCat.removeClass("ui-state-error");
	 
	          	fValid = fValid && checkLength(tips, cat_name, "name", 1, 64);
	 
	          	if (fValid)
		        {
	          		var cid = $("#pl" + cur_pl_id + "_cats .category").length;
	          		var catsIdsAr = [];
	          		
	          		var allPlItems = $("#playlists").sortable("toArray");
	          		curPlOrderId = allPlItems.indexOf("pl" + cur_pl_id);
	          		
	          		$.each($("#pl" + cur_pl_id + "_cats .category"), function(i, el)
      				{
	          			var reg_exp = /cat[0-9]+/;
            			var cat_id = parseInt($(el).attr("id").match(reg_exp)[0].slice(3));
            			
            			catsIdsAr.push(cat_id);
      				});
	          		
	          		for (var i=0; i<playlistsAr[curPlOrderId].categories.length; i++)
	          		{
	          			if ($.inArray(i, catsIdsAr) == -1)
	          			{
	          				cid = i;
	          				break;
	          			}
	          		}
	          		
		            $("#pl" + cur_pl_id + "_cats").append("<div id='pl" + cur_pl_id + "_cat" + cid + "' class='category'>"
		    	    	+ "<h3 class='category-header'>" + cat_name.val().replace(/"/g, "'") + "</h3>"
		    	    	+ "<div>"
		    	    	+ "<div id='pl" + cur_pl_id + "_cat" + cid + "_ths' class='ths' style='width:554px'></div>"
		    	       	+ "<button class='add_thumbnail_btn' id='pl" + cur_pl_id + "_cat" + cid + "_btn' style='cursor:pointer;'>Add new thumbnail</button>"
		    	       	+ "<button class='edit_category_btn' id='pl" + cur_pl_id + "_cat" + cid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
		    	    	+ "<button class='delete_category_btn' id='pl" + cur_pl_id + "_cat" + cid + "_del_btn' style='cursor:pointer;'>Delete</button>"
		    	       	+ "</div>"
		    	   	+ "</div>");

		            $(".add_thumbnail_btn").click(function()
            		{
            			var reg_exp1 = /pl[0-9]+_/;
            			var reg_exp2 = /cat[0-9]+_/;
            			
            			cur_pl_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));
            			cur_cat_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(3, -1));
            			
            	        $("#add-thumbnail-dialog").dialog("open");
            	        return false;
            	    });
		            
		            $(".edit_category_btn").click(function()
            		{
            			var reg_exp1 = /pl[0-9]+_/;
            			var reg_exp2 = /cat[0-9]+_/;
            			
            			cur_pl_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));
            			cur_cat_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(3, -1));
            			
            			var allPlItems = $("#playlists").sortable("toArray");
            	   		curPlOrderId = allPlItems.indexOf("pl" + cur_pl_id);
            	        
            	        var allCatItems = $("#pl" + cur_pl_id + "_cats").sortable("toArray");
            	   		curCatOrderId = allCatItems.indexOf("pl" + cur_pl_id + "_cat" + cur_cat_id);
            			
            	        $("#edit-category-dialog").dialog("open");
            	        return false;
            	    });
		            
		            $(".delete_category_btn").click(function()
            		{
            			var reg_exp1 = /pl[0-9]+_/;
            			var reg_exp2 = /cat[0-9]+_/;
            			
            			cur_pl_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));
            			cur_cat_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(3, -1));
            			
            	        $("#delete-category-dialog").dialog("open");
            	        return false;
            	    });
		            
		            $("#pl" + cur_pl_id + "_cat" + cid + "_ths").sortable(
            	   	{
            	        axis: "y",
            	        handle: ".thumbnail-header",
            	        start: startThumbsOrder,
            	        update: updateThumbsOrder
            	    });

		            $(".cats").sortable("refresh");
		            $(".cats").accordion("refresh");
		            
		            var newCat =
		            {
		            	name: cat_name.val().replace(/"/g, "'"),
		            	thumbs: []
		            };
		            
		            playlistsAr[curPlOrderId].categories.push(newCat);

		            $(this).dialog("close");
	         	 }	
	        },
	        "Cancel": function()
	        {
	        	$(this).dialog("close");
	        }
	    },
	    close: function()
	    {
		    allFieldsCat.removeClass("ui-state-error");  
		    $("#add_cat_tips").removeClass("fwd-error");
	    },
	    open: function()
	    {
	    	$("#cat_name").val("");
	    	
	    	$("#add_cat_tips").text("The name field is required.");
		}
	});

	$(".add_category_btn").click(function()
	{
		var reg_exp = /pl[0-9]+_/;
		
		cur_pl_id = parseInt($(this).attr("id").match(reg_exp)[0].slice(2, -1));
		
        $("#add-category-dialog").dialog("open");
        return false;
    });
	
	var cat_name_edit = $("#cat_name_edit");
    var allFieldsCatEdit = $([]).add(cat_name_edit);
	
	$("#edit-category-dialog").dialog(
	{
		autoOpen: false,
		width: 350,
	    height: 250,
	    modal: true,
	    buttons:
		{
	        "Update category": function()
	        {
	         	var fValid = true;
	         	var tips = $("#edit_cat_tips");
	         	
	          	allFieldsCatEdit.removeClass("ui-state-error");
	 
	          	fValid = fValid && checkLength(tips, cat_name_edit, "name", 1, 64);
	 
	          	if (fValid)
		        {
	          		var content = $("#pl" + cur_pl_id + "_cat" + cur_cat_id + " > h3").html();
	          		var pos = content.indexOf(playlistsAr[curPlOrderId].categories[curCatOrderId].name);
	          		
	          		content = content.slice(0, pos);
	          		
	          		$("#pl" + cur_pl_id + "_cat" + cur_cat_id + " > h3").html(content + cat_name_edit.val().replace(/"/g, "'"));
	          		
	          		playlistsAr[curPlOrderId].categories[curCatOrderId].name = cat_name_edit.val().replace(/"/g, "'");

		            $(this).dialog("close");
	         	 }	
	        },
	        "Cancel": function()
	        {
	        	$(this).dialog("close");
	        }
	    },
	    close: function()
	    {
		    allFieldsCatEdit.removeClass("ui-state-error");
		    $("#edit_cat_tips").removeClass("fwd-error");
	    },
	    open: function()
	    {
	    	$("#cat_name_edit").val(playlistsAr[curPlOrderId].categories[curCatOrderId].name);
	    	
	    	$("#edit_cat_tips").text("The name field is required.");
		}
	});

	$(".edit_category_btn").click(function()
	{
		var reg_exp1 = /pl[0-9]+_/;
		var reg_exp2 = /cat[0-9]+_/;
		
		cur_pl_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));
		cur_cat_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(3, -1));
		
		var allPlItems = $("#playlists").sortable("toArray");
   		curPlOrderId = allPlItems.indexOf("pl" + cur_pl_id);
        
        var allCatItems = $("#pl" + cur_pl_id + "_cats").sortable("toArray");
   		curCatOrderId = allCatItems.indexOf("pl" + cur_pl_id + "_cat" + cur_cat_id);
		
        $("#edit-category-dialog").dialog("open");
        return false;
    });
	
	$("#delete-category-dialog").dialog(
	{
		autoOpen: false,
		width: 300,
	    height: 160,
	    modal: true,
	    buttons:
		{
	        "Yes": function()
	        {
	            var allPlItems = $("#playlists").sortable("toArray");
	       		curPlOrderId = allPlItems.indexOf("pl" + cur_pl_id);
	            
	            var allCatItems = $("#pl" + cur_pl_id + "_cats").sortable("toArray");
	       		curCatOrderId = allCatItems.indexOf("pl" + cur_pl_id + "_cat" + cur_cat_id);
	       		
	       		playlistsAr[curPlOrderId].categories.splice(curCatOrderId, 1);
	       		
	       		$("#pl" + cur_pl_id + "_cat" + cur_cat_id).remove();
	       		
	       		$(".cats").accordion("option", "active", false);

	       		$(".cats").sortable("refresh");
	            $(".cats").accordion("refresh");  
	            
	            $(this).dialog("close");
	        },
	        "No": function()
	        {
	        	$(this).dialog("close");
	        }
	    }
	});
	
	$(".delete_category_btn").click(function()
	{
		var reg_exp1 = /pl[0-9]+_/;
		var reg_exp2 = /cat[0-9]+_/;
		
		cur_pl_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));
		cur_cat_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(3, -1));
		
        $("#delete-category-dialog").dialog("open");
        return false;
    });
	
	// thumbnail dialogs
	var th_name = $("#th_name");
    var th_image = $("#th_image");
    var th_type = $("#th_type");
    var th_url = $("#th_url");
    var th_target = $("#th_target");
    var th_title_offset = $("#th_title_offset");
    var th_top_offset = $("#th_top_offset");
    var th_bottom_offset = $("#th_bottom_offset");
    
    var allFieldsTh = $([]).add(th_name).add(th_image).add(th_url).add(th_title_offset).add(th_top_offset).add(th_bottom_offset);

	$("#add-thumbnail-dialog").dialog(
	{
		autoOpen: false,
		width: 680,
	    height: 700,
	    modal: true,
	    buttons:
		{
	        "Add thumbnail": function()
	        {
	         	var fValid = true;
	         	var tips = $("#add_th_tips");
	         	
	          	allFieldsTh.removeClass("ui-state-error");
	 
	          	fValid = fValid && checkLength(tips, th_name, "name", 1, 64);
	          	
	          	var allPlItems = $("#playlists").sortable("toArray");
	       		curPlOrderId = allPlItems.indexOf("pl" + cur_pl_id);
	       		
	       		if (playlistsAr[curPlOrderId].type == "image")
	       		{
	       			fValid = fValid && checkLength(tips, th_image, "thumbnail path", 1, 256);
	       		}
	       		
	       		fValid = fValid && checkLength(tips, th_url, "data URL", 0, 256);
	       		
	       		fValid = fValid && checkIfIntegerAndLength(tips, th_title_offset, "text title offset", 1, 8);
	       		fValid = fValid && checkIfIntegerAndLength(tips, th_top_offset, "text top offset", 1, 8);
	       		fValid = fValid && checkIfIntegerAndLength(tips, th_bottom_offset, "text bottom offset", 1, 8);
	 
	          	if (fValid)
		        {
	          		var tid = $("#pl" + cur_pl_id + "_cat" + cur_cat_id + "_ths .fwd-thumbnail").length;
	          		var thsIdsAr = [];
	          		
	          		var allPlItems = $("#playlists").sortable("toArray");
		       		curPlOrderId = allPlItems.indexOf("pl" + cur_pl_id);
		            
		            var allCatItems = $("#pl" + cur_pl_id + "_cats").sortable("toArray");
		       		curCatOrderId = allCatItems.indexOf("pl" + cur_pl_id + "_cat" + cur_cat_id);
	          		
	          		$.each($("#pl" + cur_pl_id + "_cat" + cur_cat_id + "_ths .fwd-thumbnail"), function(i, el)
      				{
	          			var reg_exp = /th[0-9]+/;
            			var th_id = parseInt($(el).attr("id").match(reg_exp)[0].slice(2));
            			
            			thsIdsAr.push(th_id);
      				});
	          		
	          		for (var i=0; i<playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs.length; i++)
	          		{
	          			if ($.inArray(i, thsIdsAr) == -1)
	          			{
	          				tid = i;
	          				break;
	          			}
	          		}
	          		
	          		$("#pl" + cur_pl_id + "_cat" + cur_cat_id + "_ths").append("<div id='pl" + cur_pl_id + "_cat" + cur_cat_id + "_th" + tid + "' class='fwd-thumbnail'>"
		    	    	+ "<h3 class='thumbnail-header'>" + th_name.val().replace(/"/g, "'") + "</h3>"
		    	       	+ "<button class='delete_thumbnail_btn' id='pl" + cur_pl_id + "_cat" + cur_cat_id + "_th" + tid + "_del_btn'>Delete</button>"
		    	       	+ "<button class='edit_thumbnail_btn' id='pl" + cur_pl_id + "_cat" + cur_cat_id + "_th" + tid + "_edit_btn'>Edit</button>"
			    	+ "</div>");
	          		
	          		$(".edit_thumbnail_btn").click(function()
      				{
      					var reg_exp1 = /pl[0-9]+_/;
      					var reg_exp2 = /cat[0-9]+_/;
      					var reg_exp3 = /th[0-9]+_/;
      					
      					cur_pl_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));
      					cur_cat_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(3, -1));
      					cur_th_id = parseInt($(this).attr("id").match(reg_exp3)[0].slice(2));
      					
      					var allPlItems = $("#playlists").sortable("toArray");
      			   		curPlOrderId = allPlItems.indexOf("pl" + cur_pl_id);
      			        
      			        var allCatItems = $("#pl" + cur_pl_id + "_cats").sortable("toArray");
      			   		curCatOrderId = allCatItems.indexOf("pl" + cur_pl_id + "_cat" + cur_cat_id);
      			   		
      			   		var allThItems = $("#pl" + cur_pl_id + "_cat" + cur_cat_id + "_ths").sortable("toArray");
      			   		curThOrderId = allThItems.indexOf("pl" + cur_pl_id + "_cat" + cur_cat_id + "_th" + cur_th_id);
      					
      			        $("#edit-thumbnail-dialog").dialog("open");
      			        return false;
      			    });
	          		
	          		$(".delete_thumbnail_btn").click(function()
      				{
      					var reg_exp1 = /pl[0-9]+_/;
      					var reg_exp2 = /cat[0-9]+_/;
      					var reg_exp3 = /th[0-9]+_/;
      					
      					cur_pl_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));
      					cur_cat_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(3, -1));
      					cur_th_id = parseInt($(this).attr("id").match(reg_exp3)[0].slice(2));
      					
      			        $("#delete-thumbnail-dialog").dialog("open");
      			        return false;
      			    });

		            $(".ths").sortable("refresh");
		            
		            $(".fwd-thumbnail").mouseover(function()
            		{
            			$(this).addClass("th_over");
            			$(this).find(".thumbnail-header").css("color", "#212121");
            		});
            		
            		$(".fwd-thumbnail").mouseout(function()
            		{
            			$(this).removeClass("th_over");
            			$(this).find(".thumbnail-header").css("color", "#555555");
            		});
		            
		            var newTh =
		            {
		            	name: th_name.val().replace(/"/g, "'"),
		            	path: th_image.val().replace(/"/g, "'"),
		            	html: getThumbHtml(),
		            	type: th_type.val(),
		            	url: th_url.val().replace(/"/g, "'"),
		            	target: th_target.val(),
		            	text: getThumbText(),
		            	title_offset: th_title_offset.val(),
		            	top_offset: th_top_offset.val(),
		            	bottom_offset: th_bottom_offset.val(),
		            	info: getThumbInfo()
		            };
		            
		            playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs.push(newTh);

		            $(this).dialog("close");
	         	}
	          	else
	          	{
	          		$("#add-thumbnail-dialog").scrollTop(0);
	          	}
	        },
	        "Cancel": function()
	        {
	        	$(this).dialog("close");
	        }
	    },
	    close: function()
	    {
		    allFieldsTh.removeClass("ui-state-error");
		    $("#add_th_tips").removeClass("fwd-error");
	    },
	    open: function()
	    {
	    	$("#th_name").val("");
	    	$("#th_type").val("link");
	    	$("#th_url").val("");
	    	$("#th_target").val("_blank");
		    
		    $("#th_title_offset").val("35");
		    $("#th_top_offset").val("10");
		    $("#th_bottom_offset").val("7");
		    
		    setThumbText("");
		    setThumbInfo("");
		    
		    $("#wp-thtext-wrap").attr("style", "margin-top:-30px;");
		    $("#thtext-html").html("HTML");
		    $("#wp-thinfo-wrap").attr("style", "margin-top:-30px;");
		    $("#thinfo-html").html("HTML");
		    
		    $("#th_media").show();
		    $("#th_link_target").show();
		    $("#th_media_img").hide();
		    $("#url_img_btn").hide();
		    $("#th_info_div").hide();
		    
		    var allPlItems = $("#playlists").sortable("toArray");
       		curPlOrderId = allPlItems.indexOf("pl" + cur_pl_id);
       		
       		if (playlistsAr[curPlOrderId].type == "image")
       		{
       			$("#upload_image_div").show();
       			$("#th_html_div").hide();
       			
       			$("#th_image").val("");
    		    $("#upload_img").attr("src", "");
    		    
    		    $("#add_th_tips").text("The name and thumbnail path fields are required.");
       		}
       		else
       		{
       			$("#upload_image_div").hide();
       			$("#th_html_div").show();
       			
       			$("#wp-thhtml-wrap").attr("style", "margin-top:-30px;");
       			$("#thhtml-html").html("HTML");
       			
       			setThumbHtml("");
       			
       			$("#thhtml_ifr").height(181);
       			
       			$("#add_th_tips").text("The name field is required.");
       		}
       		
       		$("#thtext_ifr").height(181);
       		$("#thinfo_ifr").height(181);
		}
	});
	
	function setThumbHtml(str)
	{
		if (tinyMCE.get("thhtml"))
	    {
	    	tinyMCE.get("thhtml").setContent(str);
	    }
	    
	    $("#thhtml").val(str);
	}
	
	function getThumbHtml()
	{
		var th_html;
		
		if (tinyMCE.get("thhtml"))
	    {
			if ($("#wp-thhtml-wrap").hasClass("tmce-active"))
			{
				th_html = tinyMCE.get("thhtml").getContent();
				
				if (th_html.length < 1)
				{
					th_html = $("#thhtml").val();
				}
			}
			else
			{
				th_html = $("#thhtml").val();
			}
	    }
		else
		{
			th_html = $("#thhtml").val();
		}

        return th_html.replace(/"/g, "'").replace(/\n/g, "");
	}
	
	function setThumbText(str)
	{
		if (tinyMCE.get("thtext"))
	    {
	    	tinyMCE.get("thtext").setContent(str);
	    }
	    
	    $("#thtext").val(str);
	}
	
	function getThumbText()
	{
		var th_text;
		
		if (tinyMCE.get("thtext"))
	    {
			if ($("#wp-thtext-wrap").hasClass("tmce-active"))
			{
				th_text = tinyMCE.get("thtext").getContent();
				
				if (th_text.length < 1)
				{
					th_text = $("#thtext").val();
				}
			}
			else
			{
				th_text = $("#thtext").val();
			}
	    }
		else
		{
			th_text = $("#thtext").val();
		}

        return th_text.replace(/"/g, "'").replace(/\n/g, "");
	}
	
	function setThumbInfo(str)
	{
	    if (tinyMCE.get("thinfo"))
	    {
	    	tinyMCE.get("thinfo").setContent(str);
	    }
	    
	    $("#thinfo").val(str);
	}
	
	function getThumbInfo()
	{
		var th_info;
		
		if (tinyMCE.get("thinfo"))
	    {
			if ($("#wp-thinfo-wrap").hasClass("tmce-active"))
			{
				th_info = tinyMCE.get("thinfo").getContent();
				
				if (th_info.length < 1)
				{
					th_info = $("#thinfo").val();
				}
			}
			else
			{
				th_info = $("#thinfo").val();
			}
	    }
		else
		{
			th_info = $("#thinfo").val();
		}

        return th_info.replace(/"/g, "'").replace(/\n/g, "");
	}

	$(".add_thumbnail_btn").click(function()
	{
		var reg_exp1 = /pl[0-9]+_/;
		var reg_exp2 = /cat[0-9]+_/;
		
		cur_pl_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));
		cur_cat_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(3, -1));
		
        $("#add-thumbnail-dialog").dialog("open");
        return false;
    });
	
	$("#th_type").change(function()
	{
		if ($("#th_type").val() == "none")
		{
			$("#th_media").hide(200);
		}
		else
		{
			$("#th_media").show(200);
			
			if ($("#th_type").val() == "link")
			{
				$("#th_link_target").show();
				$("#th_media_img").hide();
				$("#url_img_btn").hide();
			}
			else if ($("#th_type").val() == "media")
			{
				$("#th_link_target").hide();
				$("#th_media_img").show();
				$("#url_img_btn").show();
			}
			else
			{
				$("#th_link_target").hide();
				$("#th_media_img").hide();
				$("#url_img_btn").hide();
			}
		}
		
		if (($("#th_type").val() == "none") || ($("#th_type").val() == "link"))
		{
			$("#th_info_div").hide();
		}
		else
		{
			$("#th_info_div").show();
		}
	});
	
	var th_name_edit = $("#th_name_edit");
    var th_image_edit = $("#th_image_edit");
    var th_type_edit = $("#th_type_edit");
    var th_url_edit = $("#th_url_edit");
    var th_target_edit = $("#th_target_edit");
    var th_title_offset_edit = $("#th_title_offset_edit");
    var th_top_offset_edit = $("#th_top_offset_edit");
    var th_bottom_offset_edit = $("#th_bottom_offset_edit");
    
    var allFieldsThEdit = $([]).add(th_name_edit).add(th_image_edit).add(th_url_edit).add(th_title_offset_edit).add(th_top_offset_edit).add(th_bottom_offset_edit);

	$("#edit-thumbnail-dialog").dialog(
	{
		autoOpen: false,
		width: 680,
	    height: 700,
	    modal: true,
	    buttons:
		{
	        "Update thumbnail": function()
	        {
	         	var fValid = true;
	         	var tips = $("#edit_th_tips");
	         	
	          	allFieldsThEdit.removeClass("ui-state-error");
	 
	          	fValid = fValid && checkLength(tips, th_name_edit, "name", 1, 64);
	          	
	          	var allPlItems = $("#playlists").sortable("toArray");
	       		curPlOrderId = allPlItems.indexOf("pl" + cur_pl_id);
	       		
	       		if (playlistsAr[curPlOrderId].type == "image")
	       		{
	       			fValid = fValid && checkLength(tips, th_image_edit, "thumbnail path", 1, 256);
	       		}
	       		
	       		fValid = fValid && checkLength(tips, th_url_edit, "data URL", 0, 256);
	       		
	       		fValid = fValid && checkIfIntegerAndLength(tips, th_title_offset_edit, "text title offset", 1, 8);
	       		fValid = fValid && checkIfIntegerAndLength(tips, th_top_offset_edit, "text top offset", 1, 8);
	       		fValid = fValid && checkIfIntegerAndLength(tips, th_bottom_offset_edit, "text bottom offset", 1, 8);
	 
	          	if (fValid)
		        {
	          		var content = $("#pl" + cur_pl_id + "_cat" + cur_cat_id + "_th" + cur_th_id + " > h3").html();
	          		var pos = content.indexOf(playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].name);
	          		
	          		content = content.slice(0, pos);
	          		
	          		$("#pl" + cur_pl_id + "_cat" + cur_cat_id + "_th" + cur_th_id + " > h3").html(content + th_name_edit.val().replace(/"/g, "'"));
	          		
	          		$(".edit_thumbnail_btn").click(function()
      				{
      					var reg_exp1 = /pl[0-9]+_/;
      					var reg_exp2 = /cat[0-9]+_/;
      					var reg_exp3 = /th[0-9]+_/;
      					
      					cur_pl_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));
      					cur_cat_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(3, -1));
      					cur_th_id = parseInt($(this).attr("id").match(reg_exp3)[0].slice(2));
      					
      					var allPlItems = $("#playlists").sortable("toArray");
      			   		curPlOrderId = allPlItems.indexOf("pl" + cur_pl_id);
      			        
      			        var allCatItems = $("#pl" + cur_pl_id + "_cats").sortable("toArray");
      			   		curCatOrderId = allCatItems.indexOf("pl" + cur_pl_id + "_cat" + cur_cat_id);
      			   		
      			   		var allThItems = $("#pl" + cur_pl_id + "_cat" + cur_cat_id + "_ths").sortable("toArray");
      			   		curThOrderId = allThItems.indexOf("pl" + cur_pl_id + "_cat" + cur_cat_id + "_th" + cur_th_id);
      					
      			        $("#edit-thumbnail-dialog").dialog("open");
      			        return false;
      			    });
	          		
	          		$(".delete_thumbnail_btn").click(function()
      				{
      					var reg_exp1 = /pl[0-9]+_/;
      					var reg_exp2 = /cat[0-9]+_/;
      					var reg_exp3 = /th[0-9]+_/;
      					
      					cur_pl_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));
      					cur_cat_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(3, -1));
      					cur_th_id = parseInt($(this).attr("id").match(reg_exp3)[0].slice(2));
      					
      			        $("#delete-thumbnail-dialog").dialog("open");
      			        return false;
      			    });
	          		
	          		playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].name = th_name_edit.val().replace(/"/g, "'");
	          		playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].type = th_type_edit.val();
	          		playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].url = th_url_edit.val().replace(/"/g, "'");
	          		playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].target = th_target_edit.val();
	          		playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].path = th_image_edit.val().replace(/"/g, "'");
					
					playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].title_offset = th_title_offset_edit.val();
					playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].top_offset = th_top_offset_edit.val();
					playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].bottom_offset = th_bottom_offset_edit.val();
	          		
	          		playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].text = getThumbTextEdit();
	          		playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].info = getThumbInfoEdit();
	          		playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].html = getThumbHtmlEdit();

		            $(this).dialog("close");
	         	}
	          	else
	          	{
	          		$("#edit-thumbnail-dialog").scrollTop(0);
	          	}
	        },
	        "Cancel": function()
	        {
	        	$(this).dialog("close");
	        }
	    },
	    close: function()
	    {
		    allFieldsThEdit.removeClass("ui-state-error");
		    $("#edit_th_tips").removeClass("fwd-error");
	    },
	    open: function()
	    {
	    	$("#th_name_edit").val(playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].name);
	    	$("#th_type_edit").val(playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].type);
	    	$("#th_url_edit").val(playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].url);
	    	$("#th_target_edit").val(playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].target);
		    
		    $("#th_title_offset_edit").val(playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].title_offset);
		    $("#th_top_offset_edit").val(playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].top_offset);
		    $("#th_bottom_offset_edit").val(playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].bottom_offset);
		    
		    setThumbTextEdit(playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].text);
		    setThumbInfoEdit(playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].info);
		    
		    $("#wp-thtextedit-wrap").attr("style", "margin-top:-30px;");
		    $("#thtextedit-html").html("HTML");
		    $("#wp-thinfoedit-wrap").attr("style", "margin-top:-30px;");
		    $("#thinfoedit-html").html("HTML");
		    
		    $("#th_media_edit").show();
		    $("#th_link_target_edit").show();
		    $("#th_media_img_edit").hide();
		    $("#url_img_btn_edit").hide();
		    
		    if ($("#th_type_edit").val() == "none")
			{
				$("#th_media_edit").hide();
			}
			else
			{
				$("#th_media_edit").show();
				
				if ($("#th_type_edit").val() == "link")
				{
					$("#th_link_target_edit").show();
					$("#th_media_img_edit").hide();
					$("#url_img_btn_edit").hide();
				}
				else if ($("#th_type_edit").val() == "media")
				{
					$("#th_link_target_edit").hide();
					$("#th_media_img_edit").show();
					$("#url_img_btn_edit").show();
				}
				else
				{
					$("#th_link_target_edit").hide();
					$("#th_media_img_edit").hide();
					$("#url_img_btn_edit").hide();
				}
			}
		    
		    if (($("#th_type_edit").val() == "none") || ($("#th_type_edit").val() == "link"))
			{
				$("#th_info_div_edit").hide();
			}
			else
			{
				$("#th_info_div_edit").show();
			}
		    
		    var allPlItems = $("#playlists").sortable("toArray");
       		curPlOrderId = allPlItems.indexOf("pl" + cur_pl_id);
       		
       		if (playlistsAr[curPlOrderId].type == "image")
       		{
       			$("#upload_image_div_edit").show();
       			$("#th_html_div_edit").hide();
       			
    		    $("#th_image_edit").val(playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].path);
    		    $("#upload_img_edit").attr("src", playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].path);
    		    
    		    $("#edit_th_tips").text("The name and thumbnail path fields are required.");
       		}
       		else
       		{
       			$("#upload_image_div_edit").hide();
       			$("#th_html_div_edit").show();
       			
       			$("#wp-thhtmledit-wrap").attr("style", "margin-top:-30px;");
       			$("#thhtmledit-html").html("HTML");
       			
       			$("#thhtmledit_ifr").height(181);
       			
       			setThumbHtmlEdit(playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs[curThOrderId].html);
       			
       			$("#edit_th_tips").text("The name field is required.");
       		}
       		
       		$("#thtextedit_ifr").height(181);
       		$("#thinfoedit_ifr").height(181);
		}
	});
	
	function setThumbHtmlEdit(str)
	{
		if (tinyMCE.get("thhtmledit"))
	    {
	    	tinyMCE.get("thhtmledit").setContent(str);
	    }
	    
	    $("#thhtmledit").val(str);
	}
	
	function getThumbHtmlEdit()
	{
		var th_html_edit;
		
		if (tinyMCE.get("thhtmledit"))
	    {
			if ($("#wp-thhtmledit-wrap").hasClass("tmce-active"))
			{
				th_html_edit = tinyMCE.get("thhtmledit").getContent();
				
				if (th_html_edit.length < 1)
				{
					th_html_edit = $("#thhtmledit").val();
				}
			}
			else
			{
				th_html_edit = $("#thhtmledit").val();
			}
	    }
		else
		{
			th_html_edit = $("#thhtmledit").val();
		}

        return th_html_edit.replace(/"/g, "'").replace(/\n/g, "");
	}
	
	function setThumbTextEdit(str)
	{
		if (tinyMCE.get("thtextedit"))
	    {
	    	tinyMCE.get("thtextedit").setContent(str);
	    }
	    
	    $("#thtextedit").val(str);
	}
	
	function getThumbTextEdit()
	{
		var th_text_edit;
		
		if (tinyMCE.get("thtextedit"))
	    {
			if ($("#wp-thtextedit-wrap").hasClass("tmce-active"))
			{
				th_text_edit = tinyMCE.get("thtextedit").getContent();
				
				if (th_text_edit.length < 1)
				{
					th_text_edit = $("#thtextedit").val();
				}
			}
			else
			{
				th_text_edit = $("#thtextedit").val();
			}
	    }
		else
		{
			th_text_edit = $("#thtextedit").val();
		}

        return th_text_edit.replace(/"/g, "'").replace(/\n/g, "");
	}
	
	function setThumbInfoEdit(str)
	{
	    if (tinyMCE.get("thinfoedit"))
	    {
	    	tinyMCE.get("thinfoedit").setContent(str);
	    }
	    
	    $("#thinfoedit").val(str);
	}
	
	function getThumbInfoEdit()
	{
		var th_info_edit;
		
		if (tinyMCE.get("thinfoedit"))
	    {
			if ($("#wp-thinfoedit-wrap").hasClass("tmce-active"))
			{
				th_info_edit = tinyMCE.get("thinfoedit").getContent();
				
				if (th_info_edit.length < 1)
				{
					th_info_edit = $("#thinfoedit").val();
				}
			}
			else
			{
				th_info_edit = $("#thinfoedit").val();
			}
	    }
		else
		{
			th_info_edit = $("#thinfoedit").val();
		}

        return th_info_edit.replace(/"/g, "'").replace(/\n/g, "");
	}

	$(".edit_thumbnail_btn").click(function()
	{
		var reg_exp1 = /pl[0-9]+_/;
		var reg_exp2 = /cat[0-9]+_/;
		var reg_exp3 = /th[0-9]+_/;
		
		cur_pl_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));
		cur_cat_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(3, -1));
		cur_th_id = parseInt($(this).attr("id").match(reg_exp3)[0].slice(2));
		
		var allPlItems = $("#playlists").sortable("toArray");
   		curPlOrderId = allPlItems.indexOf("pl" + cur_pl_id);
        
        var allCatItems = $("#pl" + cur_pl_id + "_cats").sortable("toArray");
   		curCatOrderId = allCatItems.indexOf("pl" + cur_pl_id + "_cat" + cur_cat_id);
   		
   		var allThItems = $("#pl" + cur_pl_id + "_cat" + cur_cat_id + "_ths").sortable("toArray");
   		curThOrderId = allThItems.indexOf("pl" + cur_pl_id + "_cat" + cur_cat_id + "_th" + cur_th_id);
		
        $("#edit-thumbnail-dialog").dialog("open");
        return false;
    });
	
	$("#th_type_edit").change(function()
	{
		if ($("#th_type_edit").val() == "none")
		{
			$("#th_media_edit").hide(200);
		}
		else
		{
			$("#th_media_edit").show(200);
			
			if ($("#th_type_edit").val() == "link")
			{
				$("#th_link_target_edit").show();
				$("#th_media_img_edit").hide();
				$("#url_img_btn_edit").hide();
			}
			else if ($("#th_type_edit").val() == "media")
			{
				$("#th_link_target_edit").hide();
				$("#th_media_img_edit").show();
				$("#url_img_btn_edit").show();
			}
			else
			{
				$("#th_link_target_edit").hide();
				$("#th_media_img_edit").hide();
				$("#url_img_btn_edit").hide();
			}
		}
		
		if (($("#th_type_edit").val() == "none") || ($("#th_type_edit").val() == "link"))
		{
			$("#th_info_div_edit").hide();
		}
		else
		{
			$("#th_info_div_edit").show();
		}
	});
	
	$("#delete-thumbnail-dialog").dialog(
	{
		autoOpen: false,
		width: 300,
	    height: 160,
	    modal: true,
	    buttons:
		{
	        "Yes": function()
	        {
				var allPlItems = $("#playlists").sortable("toArray");
		   		curPlOrderId = allPlItems.indexOf("pl" + cur_pl_id);
		        
		        var allCatItems = $("#pl" + cur_pl_id + "_cats").sortable("toArray");
		   		curCatOrderId = allCatItems.indexOf("pl" + cur_pl_id + "_cat" + cur_cat_id);
		   		
		   		var allThItems = $("#pl" + cur_pl_id + "_cat" + cur_cat_id + "_ths").sortable("toArray");
		   		curThOrderId = allThItems.indexOf("pl" + cur_pl_id + "_cat" + cur_cat_id + "_th" + cur_th_id);
		   		
		   		playlistsAr[curPlOrderId].categories[curCatOrderId].thumbs.splice(curThOrderId, 1);
		   		
		   		$("#pl" + cur_pl_id + "_cat" + cur_cat_id + "_th" + cur_th_id).remove();
		
		   		$(".ths").sortable("refresh");
		        
		        $(this).dialog("close");
	        },
	        "No": function()
	        {
	        	$(this).dialog("close");
	        }
	    }
	});
	
	$(".delete_thumbnail_btn").click(function()
	{
		var reg_exp1 = /pl[0-9]+_/;
		var reg_exp2 = /cat[0-9]+_/;
		var reg_exp3 = /th[0-9]+_/;
		
		cur_pl_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));
		cur_cat_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(3, -1));
		cur_th_id = parseInt($(this).attr("id").match(reg_exp3)[0].slice(2));
		
        $("#delete-thumbnail-dialog").dialog("open");
        return false;
    });

	// image custom uploader
	var custom_uploader;
    
    $("#upload_image_button").click(function(e)
    {
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader)
        {
            custom_uploader.open();
            return;
        }
        
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media(
        {
            title: "Choose Image",
            button:
            {
                text: "Add Image"
            },
            library:
            {
            	type: "image"
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on("select", function()
        {
            attachment = custom_uploader.state().get("selection").first().toJSON();
            
            $("#th_image").val(attachment.url);
            $("#upload_img").attr("src", attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
    });
    
    // image custom uploader edit
    var custom_uploader_edit;
    
    $("#upload_image_button_edit").click(function(e)
    {
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader_edit)
        {
            custom_uploader_edit.open();
            return;
        }
        
        //Extend the wp.media object
        custom_uploader_edit = wp.media.frames.file_frame = wp.media(
        {
            title: "Choose Image",
            button:
            {
                text: "Add Image"
            },
            library:
            {
            	type: "image"
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader_edit.on("select", function()
        {
            attachment = custom_uploader_edit.state().get("selection").first().toJSON();
            
            $("#th_image_edit").val(attachment.url);
            $("#upload_img_edit").attr("src", attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader_edit.open();
    });
    
    // image custom uploader2
	var custom_uploader2;
    
    $("#url_img_btn").click(function(e)
    {
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader2)
        {
            custom_uploader2.open();
            return;
        }
        
        //Extend the wp.media object
        custom_uploader2 = wp.media.frames.file_frame = wp.media(
        {
            title: "Choose Image",
            button:
            {
                text: "Add Image"
            },
            library:
            {
            	type: "image"
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader2.on("select", function()
        {
            attachment = custom_uploader2.state().get("selection").first().toJSON();
            
            $("#th_url").val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader2.open();
    });
    
 // image custom uploader2 edit
	var custom_uploader2_edit;
    
    $("#url_img_btn_edit").click(function(e)
    {
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader2_edit)
        {
            custom_uploader2_edit.open();
            return;
        }
        
        //Extend the wp.media object
        custom_uploader2_edit = wp.media.frames.file_frame = wp.media(
        {
            title: "Choose Image",
            button:
            {
                text: "Add Image"
            },
            library:
            {
            	type: "image"
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader2_edit.on("select", function()
        {
            attachment = custom_uploader2_edit.state().get("selection").first().toJSON();
            
            $("#th_url_edit").val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader2_edit.open();
    });
    
    $("#update_btn").click(function()
	{
    	$("#playlist_data").val(JSON.stringify(playlistsAr));
    });
});