<?php
/*
Plugin Name: WP-Note
Plugin URI: http://geeklu.com/2009/01/wp-note
Description: Make nice notes with WP-Note in your post.
Version: 1.2
Author: Luke
Author URI: http://geeklu.com
*/

function wp_note(){
    $wp_note = get_option('wp_note');
    if($wp_note=='1'){
        if ( !defined('WP_CONTENT_URL') ) define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
        $plugin_url = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__));
        echo '<link rel="stylesheet" href="'.$plugin_url.'/style.css"'.' type="text/css" media="screen" />';
    }
}

function active_wp_note(){
        add_option('wp_note','1','active the plugin');
}

function deactive_wp_note(){
    delete_option('wp_note');
}

function render_notes($text) {
    $note_tag_elements = array(
        '\[note\s*\]' => '<div class="note"><div class="noteclassic">',
        '\[/note\]' => '</div></div>',
        '\[important\s*\]' => '<div class="note"><div class="noteimportant">',
        '\[/important\]' => '</div></div>',
        '\[warning\s*\]' => '<div class="note"><div class="notewarning">',
        '\[/warning\]' => '</div></div>',
        '\[tip\s*\]' => '<div class="note"><div class="notetip">',
        '\[/tip\]' => '</div></div>',
        '\[help\s*\]' => '<div class="note"><div class="notehelp">',
        '\[/help\]' => '</div></div>'
    );

    foreach ($note_tag_elements as $notetag => $showtag) {
        $text = eregi_replace($notetag, $showtag, $text);
    }
    return $text;
}

add_filter('the_content', 'render_notes', 10);
add_filter('the_excerpt', 'render_notes', 10);
add_action('wp_head', 'wp_note');

register_activation_hook(__FILE__,'active_wp_note');
register_deactivation_hook(__FILE__,'deactive_wp_note');

?>
