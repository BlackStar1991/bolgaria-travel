<?php 
 
			// This file was created automatically by options.php
			// DON`T CHANGE!!!
		
				if(!isset($GLOBALS["htracer_encoding"]) 
				||!$GLOBALS["htracer_encoding"] 
				||strtolower($GLOBALS["htracer_encoding"])==="auto"
				||strtolower($GLOBALS["htracer_encoding"])==="global")
					$GLOBALS["htracer_encoding"]="utf-8";
			
		if(!isset($GLOBALS['htracer_test']))
			$GLOBALS['htracer_test']=false;
		if(!isset($GLOBALS['htracer_encoding']))
			$GLOBALS['htracer_encoding']="utf-8";
		if(!isset($GLOBALS['htracer_cash_days']))
			$GLOBALS['htracer_cash_days']=0;
		if(!isset($GLOBALS['htracer_cash_use_gzip']))
			$GLOBALS['htracer_cash_use_gzip']=false;
		if(!isset($GLOBALS['htracer_cash_save_full_pages']))
			$GLOBALS['htracer_cash_save_full_pages']=false;
		if(!isset($GLOBALS['htracer_mysql']))
			$GLOBALS['htracer_mysql']=true;
		if(!isset($GLOBALS['htracer_mysql_login']))
			$GLOBALS['htracer_mysql_login']="bolgar03_db";
		if(!isset($GLOBALS['htracer_mysql_pass']))
			$GLOBALS['htracer_mysql_pass']="3VMNpHvH";
		if(!isset($GLOBALS['htracer_mysql_dbname']))
			$GLOBALS['htracer_mysql_dbname']="bolgar03_db";
		if(!isset($GLOBALS['htracer_mysql_host']))
			$GLOBALS['htracer_mysql_host']="bolgar03.mysql.ukraine.com.ua";
		if(!isset($GLOBALS['htracer_mysql_prefix']))
			$GLOBALS['htracer_mysql_prefix']="";
		if(!isset($GLOBALS['htracer_mysql_disable_auto_detect']))
			$GLOBALS['htracer_mysql_disable_auto_detect']=false;
		if(!isset($GLOBALS['htracer_mysql_set_names']))
			$GLOBALS['htracer_mysql_set_names']="utf8";
		if(!isset($GLOBALS['htracer_mysql_dont_create_tables']))
			$GLOBALS['htracer_mysql_dont_create_tables']=false;
		if(!isset($GLOBALS['htracer_mysql_ignore_mysql_ping']))
			$GLOBALS['htracer_mysql_ignore_mysql_ping']=false;
		if(!isset($GLOBALS['htracer_use_php_dom']))
			$GLOBALS['htracer_use_php_dom']=false;
		if(!isset($GLOBALS['insert_keywords_where']))
			$GLOBALS['insert_keywords_where']="img_alt+a_title";
		if(!isset($GLOBALS['hkey_insert_context_links']))
			$GLOBALS['hkey_insert_context_links']=true;
		if(!isset($GLOBALS['htracer_site_stop_words']))
			$GLOBALS['htracer_site_stop_words']="";
		if(!isset($GLOBALS['htracer_context_links_b']))
			$GLOBALS['htracer_context_links_b']="only_first";
		if(!isset($GLOBALS['htracer_trace_grooping']))
			$GLOBALS['htracer_trace_grooping']=3;
		if(!isset($GLOBALS['htracer_trace']))
			$GLOBALS['htracer_trace']=false;
		if(!isset($GLOBALS['htracer_mysql_optimize_tables']))
			$GLOBALS['htracer_mysql_optimize_tables']=false;
		if(!isset($GLOBALS['htracer_mysql_close']))
			$GLOBALS['htracer_mysql_close']=false;
		if(!isset($GLOBALS['htracer_trace_double_not_first_page']))
			$GLOBALS['htracer_trace_double_not_first_page']=true;
		if(!isset($GLOBALS['htracer_trace_double_comercial_query']))
			$GLOBALS['htracer_trace_double_comercial_query']=true;
		if(!isset($GLOBALS['htracer_trace_sex_filter']))
			$GLOBALS['htracer_trace_sex_filter']=true;
		if(!isset($GLOBALS['htracer_trace_free_filter']))
			$GLOBALS['htracer_trace_free_filter']=true;
		if(!isset($GLOBALS['htracer_trace_download_filter']))
			$GLOBALS['htracer_trace_download_filter']=true;
		if(!isset($GLOBALS['htracer_trace_service_filter']))
			$GLOBALS['htracer_trace_service_filter']=false;
		if(!isset($GLOBALS['htracer_admin_pass']))
			$GLOBALS['htracer_admin_pass']="2c4140bc9e895df4bb9e8abb2bfe13c9";
		if(!isset($GLOBALS['htracer_meta_keys_rewrite']))
			$GLOBALS['htracer_meta_keys_rewrite']=false;
		if(!isset($GLOBALS['htracer_img_alt_rewrite']))
			$GLOBALS['htracer_img_alt_rewrite']=true;
		if(!isset($GLOBALS['htracer_a_title_rewrite']))
			$GLOBALS['htracer_a_title_rewrite']=true;
		if(!isset($GLOBALS['htracer_validate']))
			$GLOBALS['htracer_validate']=true;
		if(!isset($GLOBALS['htracer_short_cash']))
			$GLOBALS['htracer_short_cash']=false;
		if(!isset($GLOBALS['htracer_only_night_update']))
			$GLOBALS['htracer_only_night_update']=false;
		if(!isset($GLOBALS['htracer_symb_white_list']))
			$GLOBALS['htracer_symb_white_list']=true;
		if(!isset($GLOBALS['htracer_show_all_options']))
			$GLOBALS['htracer_show_all_options']=true;
		if(!isset($GLOBALS['htracer_cloud_links']))
			$GLOBALS['htracer_cloud_links']=500;
		if(!isset($GLOBALS['htracer_cloud_randomize']))
			$GLOBALS['htracer_cloud_randomize']=1;
		if(!isset($GLOBALS['htracer_cloud_min_size']))
			$GLOBALS['htracer_cloud_min_size']=70;
		if(!isset($GLOBALS['htracer_cloud_max_size']))
			$GLOBALS['htracer_cloud_max_size']=180;
		if(!isset($GLOBALS['htracer_cloud_style']))
			$GLOBALS['htracer_cloud_style']="ol_list";
		if(!isset($GLOBALS['htracer_clcore_size']))
			$GLOBALS['htracer_clcore_size']=6000;
		if(!isset($GLOBALS['htracer_max_clinks']))
			$GLOBALS['htracer_max_clinks']=20;
		if(!isset($GLOBALS['htracer_clinks_segment_lng']))
			$GLOBALS['htracer_clinks_segment_lng']=300;
		if(!isset($GLOBALS['htracer_context_links_selector']))
			$GLOBALS['htracer_context_links_selector']="#main #comments .comment-container";
		if(!isset($GLOBALS['htracer_cloud_selector']))
			$GLOBALS['htracer_cloud_selector']="";
		if(!isset($GLOBALS['htracer_cloud_post']))
			$GLOBALS['htracer_cloud_post']=";";
		if(!isset($GLOBALS['htracer_cloud_pre']))
			$GLOBALS['htracer_cloud_pre']="";
		if(!isset($GLOBALS['htracer_trace_runaway']))
			$GLOBALS['htracer_trace_runaway']=1.05;
		if(!isset($GLOBALS['htracer_trace_runaway_start_time']))
			$GLOBALS['htracer_trace_runaway_start_time']=0;
		if(!isset($GLOBALS['htracer_trace_view_depth']))
			$GLOBALS['htracer_trace_view_depth']=0;
		if(!isset($GLOBALS['htracer_trace_use_targets']))
			$GLOBALS['htracer_trace_use_targets']=false;
		if(!isset($GLOBALS['htracer_trace_p1_url']))
			$GLOBALS['htracer_trace_p1_url']="/contact/";
		if(!isset($GLOBALS['htracer_trace_p2_url']))
			$GLOBALS['htracer_trace_p2_url']="/";
		if(!isset($GLOBALS['htracer_trace_p3_url']))
			$GLOBALS['htracer_trace_p3_url']="/";
		if(!isset($GLOBALS['htracer_trace_p4_url']))
			$GLOBALS['htracer_trace_p4_url']="/";
		if(!isset($GLOBALS['htracer_trace_p5_url']))
			$GLOBALS['htracer_trace_p5_url']="/";
		if(!isset($GLOBALS['htracer_trace_p1_bonus']))
			$GLOBALS['htracer_trace_p1_bonus']=5;
		if(!isset($GLOBALS['htracer_trace_p2_bonus']))
			$GLOBALS['htracer_trace_p2_bonus']=0;
		if(!isset($GLOBALS['htracer_trace_p3_bonus']))
			$GLOBALS['htracer_trace_p3_bonus']=0;
		if(!isset($GLOBALS['htracer_trace_p4_bonus']))
			$GLOBALS['htracer_trace_p4_bonus']=0;
		if(!isset($GLOBALS['htracer_trace_p5_bonus']))
			$GLOBALS['htracer_trace_p5_bonus']=0;
		if(!isset($GLOBALS['htracer_pconnect']))
			$GLOBALS['htracer_pconnect']=false;
		if(!isset($GLOBALS['htracer_url_exceptions']))
			$GLOBALS['htracer_url_exceptions']="/admin/
/administrator/
/wp-admin/
/video/";
		if(!isset($GLOBALS['htracer_usp']))
			$GLOBALS['htracer_usp']=false;
		if(!isset($GLOBALS['htracer_title_order']))
			$GLOBALS['htracer_title_order']="rtl";
		if(!isset($GLOBALS['htracer_title_spacer']))
			$GLOBALS['htracer_title_spacer']="";
		if(!isset($GLOBALS['htracer_numeric_filter']))
			$GLOBALS['htracer_numeric_filter']=true;
		if(!isset($GLOBALS['htracer_not_ru_filter']))
			$GLOBALS['htracer_not_ru_filter']=true;
		if(!isset($GLOBALS['htracer_premoderation']))
			$GLOBALS['htracer_premoderation']=true;
		if(!isset($GLOBALS['htracer_mats_filter']))
			$GLOBALS['htracer_mats_filter']=true;
		if(!isset($GLOBALS['htracer_404_plugin']))
			$GLOBALS['htracer_404_plugin']=true;
		if(!isset($GLOBALS['htracer_404']))
			$GLOBALS['htracer_404']=true;
		if(!isset($GLOBALS['htracer_301']))
			$GLOBALS['htracer_301']=true;
		if(!isset($GLOBALS['htracer_ulink_plugin']))
			$GLOBALS['htracer_ulink_plugin']=true;
		if(!isset($GLOBALS['htracer_ulink_count']))
			$GLOBALS['htracer_ulink_count']=5;
		if(!isset($GLOBALS['htracer_ulink_list']))
			$GLOBALS['htracer_ulink_list']="li";
		if(!isset($GLOBALS['htracer_ulink_fast']))
			$GLOBALS['htracer_ulink_fast']="G";
		if(!isset($GLOBALS['htracer_ulink_other_domains']))
			$GLOBALS['htracer_ulink_other_domains']=false;
		if(!isset($GLOBALS['htracer_ulink_ignore_more']))
			$GLOBALS['htracer_ulink_ignore_more']=true;
		if(!isset($GLOBALS['htracer_user_minus_words']))
			$GLOBALS['htracer_user_minus_words']=""; 
 ?>