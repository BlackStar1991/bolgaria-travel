<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if( get_post_meta($post->ID, '_sfbap-form1-width', true) !='' )
$form_width = get_post_meta($post->ID, '_sfbap-form1-width', true);
else
$form_width = '450';

if( get_post_meta($post->ID, '_sfbap-form1-background-image', true) !='' )
$form_background_image = get_post_meta($post->ID, '_sfbap-form1-background-image', true);

if( get_post_meta($post->ID, '_sfbap-form1-background-color', true) !='' )
$form_background_color = get_post_meta($post->ID, '_sfbap-form1-background-color', true);
else
$form_background_color = 'white';

if( get_post_meta($post->ID, '_sfbap-form1-heading', true) !='' )
$form_heading = get_post_meta($post->ID, '_sfbap-form1-heading', true);
else
$form_heading = 'Join our mailing list for exclusive offers and crazy deals!';

if( get_post_meta($post->ID, '_sfbap-form1-heading-color', true) !='' )
$form_heading_color = get_post_meta($post->ID, '_sfbap-form1-heading-color', true);
else
$form_heading_color = 'black';

if( get_post_meta($post->ID, '_sfbap-form1-subscribe-button-text', true) !='' )
$button_text = get_post_meta($post->ID, '_sfbap-form1-subscribe-button-text', true);
else
$button_text = 'SUBSCRIBE NOW!';

if( get_post_meta($post->ID, '_sfbap-form1-border-size', true) !='' )
$border_size = get_post_meta($post->ID, '_sfbap-form1-border-size', true);
else
$border_size = '1';

if( get_post_meta($post->ID, '_sfbap-form1-border-style', true) !='Select Border Style' && get_post_meta($post->ID, '_sfbap-form1-border-style', true) !='' )
$border_style = get_post_meta($post->ID, '_sfbap-form1-border-style', true);
else
$border_style = 'solid';

if( get_post_meta($post->ID, '_sfbap-form1-border-color', true) !='' )
$border_color = get_post_meta($post->ID, '_sfbap-form1-border-color', true);
else
$border_color = '#bfb9bc';

if( get_post_meta($post->ID, '_sfbap-form1-name-field-border-color', true) !='' )
$name_border_color = get_post_meta($post->ID, '_sfbap-form1-name-field-border-color', true);
else
$name_border_color = 'rgba(128, 126, 126, 0.12)';

if( get_post_meta($post->ID, '_sfbap-form1-email-field-border-color', true) !='' )
$email_border_color = get_post_meta($post->ID, '_sfbap-form1-email-field-border-color', true);
else
$email_border_color = 'rgba(128, 126, 126, 0.12)';

if( get_post_meta($post->ID, '_sfbap-form1-button-background-color', true) !='' )
$button_background_color = get_post_meta($post->ID, '_sfbap-form1-button-background-color', true);
else
$button_background_color = '#ff0066';

if( get_post_meta($post->ID, '_sfbap-form1-button-text-size', true) !='' )
$button_text_size = get_post_meta($post->ID, '_sfbap-form1-button-text-size', true);
else
$button_text_size = '16';

if( get_post_meta($post->ID, '_sfbap-form1-button-text-color', true) !='' )
$button_text_color = get_post_meta($post->ID, '_sfbap-form1-button-text-color', true);
else
$button_text_color = 'white';

if( get_post_meta($post->ID, '_sfbap-form1-button-border-color', true) !='' )
$button_border_color = get_post_meta($post->ID, '_sfbap-form1-button-border-color', true);
else
$button_border_color = 'transparent';



?>