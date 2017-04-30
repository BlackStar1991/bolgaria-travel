// start the popup specefic scripts
// safe to use $
jQuery(document).ready(function($) {
	
    window.avada_tb_height = (92 / 100) * jQuery(window).height();
    window.avada_kodeforest_shortcodes_height = (71 / 100) * jQuery(window).height();
    if(window.avada_kodeforest_shortcodes_height > 550) {
        window.avada_kodeforest_shortcodes_height = (74 / 100) * jQuery(window).height();
    }

    jQuery(window).resize(function() {
        window.avada_tb_height = (92 / 100) * jQuery(window).height();
        window.avada_kodeforest_shortcodes_height = (71 / 100) * jQuery(window).height();

        if(window.avada_kodeforest_shortcodes_height > 550) {
            window.avada_kodeforest_shortcodes_height = (74 / 100) * jQuery(window).height();
        }
    });

    themekodeforest_shortcodes = {
    	loadVals: function()
    	{
    		var shortcode = $('#_kodeforest_shortcode').text(),
    			uShortcode = shortcode;
    		
    		// fill in the gaps eg {{param}}
    		$('.kodeforest-input').each(function() {
    			var input = $(this),
    				id = input.attr('id'),
    				id = id.replace('kodeforest_', ''),		// gets rid of the kodeforest_ prefix
    				re = new RegExp("{{"+id+"}}","g");
                    var value = input.val();
                    if(value == null) {
                      value = '';
                    }
    			uShortcode = uShortcode.replace(re, value);
    		});

    		// adds the filled-in shortcode as hidden input
    		$('#_kodeforest_ushortcode').remove();
    		$('#kodeforest-sc-form-table').prepend('<div id="_kodeforest_ushortcode" class="hidden">' + uShortcode + '</div>');
    	},
    	cLoadVals: function()
    	{
    		var shortcode = $('#_kodeforest_cshortcode').text(),
    			pShortcode = '';

    			if(shortcode.indexOf("<li>") < 0) {
    				shortcodes = '<br />';
    			} else {
    				shortcodes = '';
    			}

    		// fill in the gaps eg {{param}}
    		$('.child-clone-row').each(function() {
    			var row = $(this),
    				rShortcode = shortcode;
    			
                if($(this).find('#kodeforest_slider_type').length >= 1) {
                    if($(this).find('#kodeforest_slider_type').val() == 'image') {
                        rShortcode = '[slide type="{{slider_type}}" link="{{image_url}}" linktarget="{{image_target}}" lightbox="{{image_lightbox}}"]{{image_content}}[/slide]';
                    } else if($(this).find('#kodeforest_slider_type').val() == 'video') {
                        rShortcode = '[slide type="{{slider_type}}"]{{video_content}}[/slide]';
                    }
                }
    			$('.kodeforest-cinput', this).each(function() {
    				var input = $(this),
    					id = input.attr('id'),
    					id = id.replace('kodeforest_', '')		// gets rid of the kodeforest_ prefix
    					re = new RegExp("{{"+id+"}}","g");
                        var value = input.val();
                        if(value == null) {
                          value = '';
                        }
    				rShortcode = rShortcode.replace(re, input.val());
    			});

    			if(shortcode.indexOf("<li>") < 0) {
    				shortcodes = shortcodes + rShortcode + '<br />';
    			} else {
    				shortcodes = shortcodes + rShortcode;
    			}
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_kodeforest_cshortcodes').remove();
    		$('.child-clone-rows').prepend('<div id="_kodeforest_cshortcodes" class="hidden">' + shortcodes + '</div>');
    		
    		// add to parent shortcode
    		this.loadVals();
    		pShortcode = $('#_kodeforest_ushortcode').html().replace('{{child_shortcode}}', shortcodes);
            
    		// add updated parent shortcode
    		$('#_kodeforest_ushortcode').remove();
    		$('#kodeforest-sc-form-table').prepend('<div id="_kodeforest_ushortcode" class="hidden">' + pShortcode + '</div>');
    	},
    	children: function()
    	{
    		// assign the cloning plugin
    		$('.child-clone-rows').appendo({
    			subSelect: '> div.child-clone-row:last-child',
    			allowDelete: false,
    			focusFirst: false,
                onAdd: function(row) {
                    // Get Upload ID
                    var prev_upload_id = jQuery(row).prev().find('.kodeforest-upload-button').data('upid');
                    var new_upload_id = prev_upload_id + 1;
                    jQuery(row).find('.kodeforest-upload-button').attr('data-upid', new_upload_id);

                    // activate chosen
                    jQuery('.kodeforest-form-multiple-select').chosen({
                        width: '100%',
                        placeholder_text_multiple: 'Select Options or Leave Blank for All'
                    });

                    // activate color picker
                    jQuery('.wp-color-picker-field').wpColorPicker({
                        change: function(event, ui) {
                            themekodeforest_shortcodes.loadVals();
                            themekodeforest_shortcodes.cLoadVals();
                        }
                    });

                    // changing slide type
                    var type = $(row).find('#kodeforest_slider_type').val();

                    if(type == 'video') {
                        $(row).find('#kodeforest_image_content, #kodeforest_image_url, #kodeforest_image_target, #kodeforest_image_lightbox').closest('li').hide();
                        $(row).find('#kodeforest_video_content').closest('li').show();

                        $(row).find('#_kodeforest_cshortcode').text('[slide type="{{slider_type}}"]{{video_content}}[/slide]');
                    }

                    if(type == 'image') {
                        $(row).find('#kodeforest_image_content, #kodeforest_image_url, #kodeforest_image_target, #kodeforest_image_lightbox').closest('li').show();
                        $(row).find('#kodeforest_video_content').closest('li').hide();

                        $(row).find('#_kodeforest_cshortcode').text('[slide type="{{slider_type}}" link="{{image_url}}" linktarget="{{image_target}}" lightbox="{{image_lightbox}}"]{{image_content}}[/slide]');   
                    }

                    themekodeforest_shortcodes.loadVals();
                    themekodeforest_shortcodes.cLoadVals();
                }
    		});
    		
    		// remove button
    		$('.child-clone-row-remove').live('click', function() {
    			var	btn = $(this),
    				row = btn.parent();
    			
    			if( $('.child-clone-row').size() > 1 )
    			{
    				row.remove();
    			}
    			else
    			{
    				alert('You need a minimum of one row');
    			}
    			
    			return false;
    		});
    		
    		// assign jUI sortable
    		$( ".child-clone-rows" ).sortable({
				placeholder: "sortable-placeholder",
				items: '.child-clone-row',
                cancel: 'div.iconpicker, input, select, textarea, a'
			});
    	},
    	resizeTB: function()
    	{
			var	ajaxCont = $('#TB_ajaxContent'),
				tbWindow = $('#TB_window'),
				kodeforestPopup = $('#kodeforest-popup');

            tbWindow.css({
                height: window.avada_tb_height,
                width: kodeforestPopup.outerWidth(),
                marginLeft: -(kodeforestPopup.outerWidth()/2)
            });

			ajaxCont.css({
				paddingTop: 0,
				paddingLeft: 0,
				paddingRight: 0,
				height: window.avada_tb_height,
				overflow: 'auto', // IMPORTANT
				width: kodeforestPopup.outerWidth()
			});

            tbWindow.show();

			$('#kodeforest-popup').addClass('no_preview');
            $('#kodeforest-sc-form-wrap #kodeforest-sc-form').height(window.avada_kodeforest_shortcodes_height);
    	},
    	load: function()
    	{
    		var	kodeforest = this,
    			popup = $('#kodeforest-popup'),
    			form = $('#kodeforest-sc-form', popup),
    			shortcode = $('#_kodeforest_shortcode', form).text(),
    			popupType = $('#_kodeforest_popup', form).text(),
    			uShortcode = '';
    		
            // if its the shortcode selection popup
            if($('#_kodeforest_popup').text() == 'shortcode-generator') {
                $('.kodeforest-sc-form-button').hide();
            }

    		// resize TB
    		themekodeforest_shortcodes.resizeTB();
    		$(window).resize(function() { themekodeforest_shortcodes.resizeTB() });
    		
    		// initialise
            themekodeforest_shortcodes.loadVals();
    		themekodeforest_shortcodes.children();
    		themekodeforest_shortcodes.cLoadVals();
    		
    		// update on children value change
    		$('.kodeforest-cinput', form).live('change', function() {
    			themekodeforest_shortcodes.cLoadVals();
    		});
    		
    		// update on value change
    		$('.kodeforest-input', form).live('change', function() {
    			themekodeforest_shortcodes.loadVals();
    		});
			
			//Chosen
			$('#kodeforest_select_shortcode').chosen();
            
			// change shortcode when a user selects a shortcode from choose a dropdown field
            $('#kodeforest_select_shortcode').change(function() {
                var name = $(this).val();
                var label = $(this).text();
                
                if(name != 'select') {
                    tinyMCE.activeEditor.execCommand("kodeforestPopup", false, {
                        title: label,
                        identifier: name
                    });

                    $('#TB_window').hide();
                }
            });

            // activate chosen
            $('.kodeforest-form-multiple-select').chosen({
                width: '100%',
                placeholder_text_multiple: 'Select Options'
            });

            // update upload button ID
            jQuery('.kodeforest-upload-button:not(:first)').each(function() {
                var prev_upload_id = jQuery(this).data('upid');
                var new_upload_id = prev_upload_id + 1;
                jQuery(this).attr('data-upid', new_upload_id);
            });
    	}
	}
    
    // run
    $('#kodeforest-popup').livequery(function() {
        themekodeforest_shortcodes.load();

        $('#kodeforest-popup').closest('#TB_window').addClass('kodeforest-shortcodes-popup');

        $('#kodeforest_video_content').closest('li').hide();

            // activate color picker
            $('.wp-color-picker-field').wpColorPicker({
                change: function(event, ui) {
                    setTimeout(function() {
                        themekodeforest_shortcodes.loadVals();
                        themekodeforest_shortcodes.cLoadVals();
                    },
                    1);
                }
            });
    });

    // when insert is clicked
    $('.kodeforest-insert').live('click', function() {                        
        if(window.tinyMCE)
        {
            window.tinyMCE.activeEditor.execCommand('mceInsertContent', false, $('#_kodeforest_ushortcode').html());
            tb_remove();
        }
    });

    //tinymce.init(tinyMCEPreInit.mceInit['kodeforest_content']);
    //tinymce.execCommand('mceAddControl', true, 'kodeforest_content');
    //quicktags({id: 'kodeforest_content'});

    // activate upload button
    $('.kodeforest-upload-button').live('click', function(e) {
	    e.preventDefault();

        upid = $(this).attr('data-upid');

        if($(this).hasClass('remove-image')) {
            $('.kodeforest-upload-button[data-upid="' + upid + '"]').parent().find('img').attr('src', '').hide();
            $('.kodeforest-upload-button[data-upid="' + upid + '"]').parent().find('input').attr('value', '');
            $('.kodeforest-upload-button[data-upid="' + upid + '"]').text('Upload').removeClass('remove-image');

            return;
        }

        var file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select Image',
            button: {
                text: 'Select Image',
            },
	        frame: 'post',
            multiple: false  // Set to true to allow multiple files to be selected
        });

	    file_frame.open();

        file_frame.on( 'select', function() {
            var selection = file_frame.state().get('selection');
                selection.map( function( attachment ) {
                attachment = attachment.toJSON();

                $('.kodeforest-upload-button[data-upid="' + upid + '"]').parent().find('img').attr('src', attachment.url).show();
                $('.kodeforest-upload-button[data-upid="' + upid + '"]').parent().find('input').attr('value', attachment.url);

                themekodeforest_shortcodes.loadVals();
                themekodeforest_shortcodes.cLoadVals();
            });

            $('.kodeforest-upload-button[data-upid="' + upid + '"]').text('Remove').addClass('remove-image');
            $('.media-modal-close').trigger('click');
        });

	    file_frame.on( 'insert', function() {
		    var selection = file_frame.state().get('selection');
		    var size = jQuery('.attachment-display-settings .size').val();

		    selection.map( function( attachment ) {
			    attachment = attachment.toJSON();

			    if(!size) {
				    attachment.url = attachment.url;
			    } else {
				    attachment.url = attachment.sizes[size].url;
			    }

			    $('.kodeforest-upload-button[data-upid="' + upid + '"]').parent().find('img').attr('src', attachment.url).show();
			    $('.kodeforest-upload-button[data-upid="' + upid + '"]').parent().find('input').attr('value', attachment.url);

			    themekodeforest_shortcodes.loadVals();
			    themekodeforest_shortcodes.cLoadVals();
		    });

		    $('.kodeforest-upload-button[data-upid="' + upid + '"]').text('Remove').addClass('remove-image');
		    $('.media-modal-close').trigger('click');
	    });
    });

    // activate iconpicker
    $('.iconpicker i').live('click', function(e) {
        e.preventDefault();

        var iconWithPrefix = $(this).attr('class');
        var fontName = $(this).attr('data-name').replace('icon-', '');

        if($(this).hasClass('active')) {
            $(this).parent().find('.active').removeClass('active');

            $(this).parent().parent().find('input').attr('value', '');
        } else {
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');

            $(this).parent().parent().find('input').attr('value', fontName);
        }

        themekodeforest_shortcodes.loadVals();
        themekodeforest_shortcodes.cLoadVals();
    });

    // table shortcode
    $('#kodeforest-sc-form-table .kodeforest-insert').live('click', function(e) {
        e.stopPropagation();

        var shortcodeType = $('#kodeforest_select_shortcode').val();

        if(shortcodeType == 'table') {
            var type = $('#kodeforest-sc-form-table #kodeforest_type').val();
            var columns = $('#kodeforest-sc-form-table #kodeforest_columns').val();

            var text = '<div class="kd-table table-' + type + '"><table class="table" width="100%"><thead><tr>';

            for(var i=0;i<columns;i++) {
                text += '<th>Column ' + (i + 1) + '</th>';
            }

            text += '</tr></thead><tbody>';

            for(var i=0;i<columns;i++) {
                text += '<tr>';
                if(columns >= 1) {
                    text += '<td>Item #' + (i + 1) + '</td>';
                }
                if(columns >= 2) {
                    text += '<td>Description</td>';
                }
                if(columns >= 3) {
                    text += '<td>Discount:</td>';
                }
                if(columns >= 4) {
                    text += '<td>$' + (i + 1) + '.00</td>';
                }
                text += '</tr>';
            }

            text += '<tr>';
            
            if(columns >= 1) {
                text += '<td><strong>All Items</strong></td>';
            }
            if(columns >= 2) {
                text += '<td><strong>Description</strong></td>';
            }
            if(columns >= 3) {
                text += '<td><strong>Your Total:</strong></td>';
            }
            if(columns >= 4) {
                text += '<td><strong>$10.00</strong></td>';
            }
            text += '</tr>';
            text += '</tbody></table></div>';

            if(window.tinyMCE)
            {
                window.tinyMCE.activeEditor.execCommand('mceInsertContent', false, text);
                tb_remove();
            }
        }
    });
	
	
	
    // slider shortcode
    $('#kodeforest_slider_type').live('change', function(e) {
        e.preventDefault();

        var type = $(this).val();
        if(type == 'video') {
            $(this).parents('ul').find('#kodeforest_image_content, #kodeforest_image_url, #kodeforest_image_target, #kodeforest_image_lightbox').closest('li').hide();
            $(this).parents('ul').find('#kodeforest_video_content').closest('li').show();

            $('#_kodeforest_cshortcode').text('[slide type="{{slider_type}}"]{{video_content}}[/slide]');
        }

        if(type == 'image') {
            $(this).parents('ul').find('#kodeforest_image_content, #kodeforest_image_url, #kodeforest_image_target, #kodeforest_image_lightbox').closest('li').show();
            $(this).parents('ul').find('#kodeforest_video_content').closest('li').hide();

            $('#_kodeforest_cshortcode').text('[slide type="{{slider_type}}" link="{{image_url}}" linktarget="{{image_target}}" lightbox="{{image_lightbox}}"]{{image_content}}[/slide]');   
        }
    });

    $('.kodeforest-add-video-shortcode').live('click', function(e) {
        e.preventDefault();

        var shortcode = $(this).attr('href');
        var content = $(this).parents('ul').find('#kodeforest_video_content');
        
        content.val(content.val() + shortcode);
    });

    $('#kodeforest-popup textarea').live('focus', function() {
        var text = $(this).val();

        if(text == 'Your Content Goes Here') {
            $(this).val('');
        }
    });

    $('.kodeforest-gallery-button').live('click', function(e) {
	    var gallery_file_frame;

        e.preventDefault();

	    alert('To add images to this post or page for attachments layout, navigate to "Upload Files" tab in media manager and upload new images.');

        gallery_file_frame = wp.media.frames.gallery_file_frame = wp.media({
            title: 'Attach Images to Post/Page',
            button: {
                text: 'Go Back to Shortcode',
            },
            frame: 'post',
            multiple: true  // Set to true to allow multiple files to be selected
        });

	    gallery_file_frame.open();

        $('.media-menu-item:contains("Upload Files")').trigger('click');

        gallery_file_frame.on( 'select', function() {
            $('.media-modal-close').trigger('click');

            themekodeforest_shortcodes.loadVals();
            themekodeforest_shortcodes.cLoadVals();
        });
    });
});