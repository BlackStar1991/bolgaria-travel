jQuery(document).ready(function($){		
	$('#publish, #preview-action a, #save-post').click(function(){

		var page_option = $('.kode-page-option-wrapper');
		
		// save each page option to the hidden textarea
		page_option.each(function(){
		
			// jquery object that contains each option value
			var page_option = new Object();
			
			$(this).find('[data-slug]').each(function(){
			
				// input type = text
				if( $(this).attr('type') == 'text' || $(this).attr('type') == 'hidden' ){
					page_option[$(this).attr('data-slug')] = $(this).val();
					
				// input type = checkbox
				}else if( $(this).attr('type') == 'checkbox' ){
					if( $(this).attr('checked') ){
						page_option[$(this).attr('data-slug')] = 'enable';
					}else{
						page_option[$(this).attr('data-slug')] = 'disable'
					}
					
				// input type = radio
				}else if( $(this).attr('type') == 'radio' ){
					if( $(this).attr('checked') ){
						page_option[$(this).attr('data-slug')] = $(this).val();
					}
					
				// input type = combobox
				}else if( $(this).is('select') ){
					page_option[$(this).attr('data-slug')] = $(this).val();
					
				// input type = textarea
				}else if( $(this).is('textarea') ){
					page_option[$(this).attr('data-slug')] = $(this).val();
				}

			});
		
			$(this).children('textarea.kode-input-hidden').val(JSON.stringify(page_option));
		});

	});
});	