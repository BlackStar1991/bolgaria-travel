<?php
	if( in_array(get_post_format(), array('aside', 'link', 'quote')) ){
		get_template_part('single/content_news', get_post_format());
	}else{
		global $kode_post_settings;
		if( empty($kode_post_settings['news-style']) || $kode_post_settings['news-style'] == 'news-timeline' ){
			get_template_part('single/content-full-news');
		}else if( $kode_post_settings['news-style'] == 'news-medium' ){
			get_template_part('single/content-medium-news');
		}else{
			get_template_part('single/content-grid-news');
		}
		
	} 
?>