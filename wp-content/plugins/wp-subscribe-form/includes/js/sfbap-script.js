(function($){
	$(document).ready(function() {


		$('.sfbap-image-upload-button').click(function(e) {
			e.preventDefault();
			var image = wp.media({ 
				title: 'Upload Image',
// mutiple: true if you want to upload multiple files at once
multiple: false
}).open()
			.on('select', function(e){
// This will return the selected image from the Media Uploader, the result is an object
var uploaded_image = image.state().get('selection').first();
// We convert uploaded_image to a JSON object to make accessing it easier
// Output to the console uploaded_image
var image_url = uploaded_image.toJSON().url;
// Let's assign the url value to the input field
if ($("#sfbap_form1_template").prop("checked"))
	$('#sfbap-form1-background-image').val(image_url);

if ($("#sfbap_form2_template").prop("checked")) 
	$('#sfbap-form2-background-image').val(image_url);

if ($("#sfbap_form3_template").prop("checked")) 
	$('#sfbap-form3-background-image').val(image_url);

if ($("#sfbap_form4_template").prop("checked")) 
	$('#sfbap-form4-background-image').val(image_url);

if ($("#sfbap_form5_template").prop("checked")) 
	$('#sfbap-form5-background-image').val(image_url);

if ($("#sfbap_form6_template").prop("checked")) 
	$('#sfbap-form6-background-image').val(image_url);

if ($("#sfbap_form7_template").prop("checked")) 
	$('#sfbap-form7-background-image').val(image_url);

if ($("#sfbap_form8_template").prop("checked")) 
	$('#sfbap-form8-background-image').val(image_url);

if ($("#sfbap_form9_template").prop("checked")) 
	$('#sfbap-form9-background-image').val(image_url);

if ($("#sfbap_form10_template").prop("checked")) 
	$('#sfbap-form10-background-image').val(image_url);

if ($("#sfbap_form11_template").prop("checked")) 
	$('#sfbap-form11-background-image').val(image_url);

if ($("#sfbap_form12_template").prop("checked")) 
	$('#sfbap-form12-background-image').val(image_url);

$('#sfbap-preview-background-image').attr('src' , image_url);




});
		});


		$( '.sfbap-color-picker' ).wpColorPicker();

		$('.sfbap_form_template_container').click(function() {

			$( "#sfbap-loading-div" ).addClass( "sfbap-loading-div" );
			$( "#sfbap-gears" ).addClass( "sfbap-loading-gears" );

			if($('input[name="sfbap_form_template"]').is(':checked')) { 

				$( "#sfbap_submit" ).trigger( "click" );

			}

		});

		if($('input[name="sfbap_form_template"]').is(':checked')) { 
			$('html, body').animate({
				scrollTop: $("#sfbap_form_load_form").offset().top
			}, 1000); 
//$(window).scrollTop($('#sfbap-form-customizer-container').offset().top);
}

$('#sfbap-remove-image').click(function(e) {
	if ($("#sfbap_form1_template").prop("checked")){
		$('.sfbap-form-background-image').attr('src','');
		$('#sfbap-form1-background-image').val('');
		$('.sfbap-main-form-container').css('background-image','none');
	}

	if ($("#sfbap_form2_template").prop("checked")) {
		$('.sfbap-form-background-image').attr('src','');
		$('#sfbap-form2-background-image').val('');
		$('.sfbap-main-form-container').css('background-image','none');
	}

	if ($("#sfbap_form3_template").prop("checked")) {
		$('.sfbap-form-background-image').attr('src','');
		$('#sfbap-form3-background-image').val('');
		$('.sfbap-main-form-container').css('background-image','none');
	}

	if ($("#sfbap_form4_template").prop("checked")) {
		$('.sfbap-form-background-image').attr('src','');
		$('#sfbap-form4-background-image').val('');
		$('.sfbap-main-form-container').css('background-image','none');
	}

	if ($("#sfbap_form5_template").prop("checked")) {
		$('.sfbap-form-background-image').attr('src','');
		$('#sfbap-form5-background-image').val('');
		$('.sfbap-main-form-container').css('background-image','none');
	}

	if ($("#sfbap_form6_template").prop("checked")) {
		$('.sfbap-form-background-image').attr('src','');
		$('#sfbap-form6-background-image').val('');
		$('.sfbap-main-form-container').css('background-image','none');
	}

	if ($("#sfbap_form7_template").prop("checked")) {
		$('.sfbap-form-background-image').attr('src','');
		$('#sfbap-form7-background-image').val('');
		$('.sfbap-main-form-container').css('background-image','none');
	}

	if ($("#sfbap_form8_template").prop("checked")) {
		$('.sfbap-form-background-image').attr('src','');
		$('#sfbap-form8-background-image').val('');
		$('.sfbap-main-form-container').css('background-image','none');
	}

	if ($("#sfbap_form9_template").prop("checked")) {
		$('.sfbap-form-background-image').attr('src','');
		$('#sfbap-form9-background-image').val('');
		$('.sfbap-main-form-container').css('background-image','none');
	}

	if ($("#sfbap_form10_template").prop("checked")) {
		$('.sfbap-form-background-image').attr('src','');
		$('#sfbap-form10-background-image').val('');
		$('.sfbap-main-form-container').css('background-image','none');
	}

	if ($("#sfbap_form11_template").prop("checked")) {
		$('.sfbap-form-background-image').attr('src','');
		$('#sfbap-form11-background-image').val('');
		$('.sfbap-main-form-container').css('background-image','none');
	}

	if ($("#sfbap_form12_template").prop("checked")) {
		$('.sfbap-form-background-image').attr('src','');
		$('#sfbap-form12-background-image').val('');
		$('.sfbap-main-form-container').css('background-image','none');
	}


});

if($('select#sfbap_subscription_selection_dd option:selected').val() == 'database'){

}
if($('select#sfbap_subscription_selection_dd option:selected').val() == 'mail'){
	$('#sfbap_mail_selection').show(); 
}
if($('select#sfbap_subscription_selection_dd option:selected').val() == 'mailchimp'){
	$('#sfbap_mailchimp_selection').show(); 
}
if($('select#sfbap_subscription_selection_dd option:selected').val() == 'getresponse'){
	$('#sfbap_getresponse_selection').show(); 
}
if($('select#sfbap_subscription_selection_dd option:selected').val() == 'activecampaign'){
	$('#sfbap_activecampaign_selection').show(); 
}



});
})(jQuery);