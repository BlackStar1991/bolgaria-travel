(function($){	

	$(document).ready(function(){

		$("div#sidebar-element").click(function () {
			var clone_item = $(this).parents().siblings('.sidebar-default-k').find('.default-sidebar-item').clone(true);
			var input_id = $(this).siblings().attr('data-slug');
			alert(input_id);
			//var clone_val = $(this).parent().parent().parent().parent().find('input.kode-upload-box-input').val();
			var clone_val = $(this).parent().parent().parent().parent().find('input.kode-upload-box-input').val();
			if (clone_val.indexOf("&") > 0) {
				alert('You can\'t use the special charactor ( such as & ) as the sidebar name.');
				return;
			}
			if (clone_val == '' || clone_val == 'type sidebar name') return;
			clone_item.removeClass('default-sidebar-item').addClass('sidebar-item');
			clone_item.attr('id',' ');
			clone_item.find('input').attr('name', function () {
				return input_id + '[]';
			});
			clone_item.find('input').attr('data-slug', function () {
				return input_id + '[]';
			});
			clone_item.find('input').attr('value', clone_val);
			clone_item.find('.slider-item-text').html(clone_val);
			$("#selected-sidebar").append(clone_item);
			$(".sidebar-item").show();
			$('#sidebar_element input.kode-upload-box-input').val('type sidebar name');
		});
		$(".sidebar-item").css('display', 'block');
		$(".panel-delete-sidebar").click(function () {
			var remove_button = $(this);
			$('body').kode_confirm({
				success: function(){
					remove_button.parent('.sidebar-item').slideUp(function(){
						$(this).remove();							
					});					
				}
			});
			return false;
		});
	
		if($('#kode-admin-nav').length){
			// grab the initial top offset of the navigation 
			var stickyNavTop = $('#kode-admin-nav').offset().top;
			// our function that decides weather the navigation bar should have "fixed" css position or not.
			var stickyNav = function(){
				var scrollTop = $(window).scrollTop(); // our current vertical position from the top
				// if we've scrolled more than the navigation, change its position to fixed to stick to top,
				// otherwise change it back to relative
				if (scrollTop > stickyNavTop) { 
					$('#kode-admin-nav').addClass('sticky');
				} else {
					$('#kode-admin-nav').removeClass('sticky'); 
				}
			};
			stickyNav();
			// and run it again every time you scroll
			$(window).scroll(function() {
				stickyNav();
			});
		}	
		
		//Chosen Script
		$('.kode-combobox-wrapper select').chosen();
		
		// export option
		$('#kode-export').click(function(){
			$(this).siblings('textarea').html($('#kode-admin-form').serialize());
		});
		
		// import option
		$('#kode-import').click(function(){
			var data = $(this).siblings('textarea').val();	
			if( data ){
				var admin_form = $('#kode-admin-form');
				var ajax_url = admin_form.attr('data-ajax');
				var nonce = admin_form.attr('data-security');
				var action = admin_form.attr('data-action');	

				$.ajax({
					type: 'POST',
					url: ajax_url,
					data: { 'security': nonce, 'action': action, 'option': data },
					dataType: 'json',
					beforeSend: function(){
						admin_form.find('.now-loading').animate({'opacity': 1}, 300);
					},
					error: function(a, b, c){
						console.log(a, b, c);
						$('body').kode_alert({
							text: '<span class="head">Importing Error</span> Please make sure that the data is corrected.', 
							status: 'failed'
						});
					},
					success: function(data){
						location.reload();
					}
					
				});

			}else{
				$('body').kode_alert({'text': 'Please fill the exported data in the textarea.'});
			}
			
		});

		// animate the admin menu
		$('#kode-admin-nav').each(function(){
			var admin_menu = $(this).children('ul.admin-menu');
			var admin_sub_menu = $(this).parent().parent().parent().find('.kode-sidebar-section');
			var content_area = $(this).siblings('#kode-admin-content').children('.kode-content-group');
			
			admin_menu.children('li').click(function(){
				admin_menu.find('li').attr('data-class',' ');
				var id = $(this).attr('class');
				$(this).attr('data-class','active');
				$(this).parent().parent().parent().find('#kode-admin-content').find('.admin-sub-menu').hide();
				$('#'+id).show();				
			})
			
			admin_sub_menu.find('li.admin-sub-menu-list').click(function(){
				admin_sub_menu.find('li.admin-sub-menu-list').removeClass('active');
				$(this).addClass('active');				
				var selected_id = $(this).attr('data-id');
				content_area.children('.kode-content-section').css('display', 'none');
				content_area.children('#' + selected_id).fadeIn();
			});
		});
		
		// save admin menu
		$('#kode-admin-form').submit(function(){
			var admin_form = $(this);
		
			var ajax_url = admin_form.attr('data-ajax');
			var nonce = admin_form.attr('data-security');
			var action = admin_form.attr('data-action');

			$.ajax({
				type: 'POST',
				url: ajax_url,
				data: { 'security': nonce, 'action': action, 'option': jQuery(this).serialize() },
				dataType: 'json',
				beforeSend: function(){
					admin_form.find('.now-loading').animate({'opacity': 1}, 300);
				},
				error: function(a, b, c){
					console.log(a, b, c);
					$('body').kode_alert({
						text: '<span class="head">Sending Error</span> Please refresh the page and try this again.', 
						status: 'failed'
					});
				},
				success: function(data){
					$('body').kode_alert({text: data.message, status: data.status, duration: 1500});
				},
				complete: function(data){
					admin_form.find('.now-loading').animate({'opacity': 0}, 300);
				}
				
			});
			
			return false;
		});			
	});
})(jQuery);
