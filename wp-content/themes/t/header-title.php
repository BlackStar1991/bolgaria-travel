<?php
/*
 * The template for displaying a header title section
 */
	global $theme_option, $kode_post_option;
	$header_background = '';
	if( !empty($kode_post_option['header-background']) ){
		if( is_numeric($kode_post_option['header-background']) ){
			$image_src = wp_get_attachment_image_src($kode_post_option['header-background'], 'full');	
			$header_background = ' style="background-image: url(\'' . esc_url($image_src[0]) . '\');" ';
		}else{
			$header_background = ' style="background-image: url(\'' . esc_url($kode_post_option['header-background']) . '\');" ';
		}
	}else{
		if( is_numeric($theme_option['default-page-title']) ){
			$image_src = wp_get_attachment_image_src($theme_option['default-page-title'], 'full');	
			$header_background = ' style="background-image: url(\'' . esc_url($image_src[0]) . '\');" ';
		}else{
			$header_background = ' style="background-image: url(\'' . esc_url($theme_option['default-page-title']) . '\');" ';
		}
	}
	$page_caption = '';
	
?>

	<?php if( is_page() && (empty($kode_post_option['show-sub']) || $kode_post_option['show-sub'] != 'disable') ){ ?>
	<?php $page_background = ''; $page_title = get_the_title(); 
	if(!empty($kode_post_option['page-caption'])){ $page_caption = $kode_post_option['page-caption'];} ?>
		<div <?php echo $header_background; ?> class="kd-subheader <?php echo esc_attr($theme_option['kode-header-style']);?>">
			





<div class="container">
				<div class="row">
					<div class="col-md-12">
						
						<div class="kd-breadcrumb">
							




<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>



						</div>
					</div>
				</div>
			</div>




		</div>
	<?php }else if( is_single() && $post->post_type == 'post' ){ 
	
		if( !empty($kode_post_option['page-title']) ){
			$page_title = $kode_post_option['page-title'];
			$page_caption = $kode_post_option['page-caption'];
		}else{
			$page_title = $theme_option['post-title'];
			$page_caption = $theme_option['post-caption'];
		} 
	?>
		<div <?php echo $header_background; ?> class="kd-subheader <?php echo esc_attr($theme_option['kode-header-style']);?>">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						
						<div class="kd-breadcrumb">
							<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }else if( is_single() ){ // for custom post type
		
		$page_title = get_the_title();
		if( !empty($kode_post_option) && !empty($kode_post_option['page-caption']) ){
			$page_caption = $kode_post_option['page-caption'];
		}else if($post->post_type == 'portfolio' && !empty($theme_option['page-caption']) ){
			$page_caption = $theme_option['portfolio-caption'];		
		}
	?>
		<div <?php echo $header_background; ?> class="kd-subheader <?php echo esc_attr($theme_option['kode-header-style']);?>">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						
						<div class="kd-breadcrumb">
							<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }else if( is_404() ){ ?>
		<div <?php echo $header_background; ?> class="kd-subheader <?php echo esc_attr($theme_option['kode-header-style']);?>">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						
						<div class="kd-breadcrumb">
							<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }else if( is_archive() || is_search() ){
		if( is_search() ){
			$title = __('Результат поиска', 'kode_forest');
			$caption = get_search_query();
		}else if( is_category() || is_tax('portfolio_category') || is_tax('product_cat') ){
			$title = __('Category','kode_forest');
			$caption = single_cat_title('', false);
		}else if( is_tag() || is_tax('portfolio_tag') || is_tax('product_tag') ){
			$title = __('Tag','kode_forest');
			$caption = single_cat_title('', false);
		}else if( is_day() ){
			$title = __('Day','kode_forest');
			$caption = get_the_date('F j, Y');
		}else if( is_month() ){
			$title = __('Month','kode_forest');
			$caption = get_the_date('F Y');
		}else if( is_year() ){
			$title = __('Year','kode_forest');
			$caption = get_the_date('Y');
		}else if( is_author() ){
			$title = __('By','kode_forest');
			
			$author_id = get_query_var('author');
			$author = get_user_by('id', $author_id);
			$caption = $author->display_name;					
		}else if( is_post_type_archive('product') ){
			$title = __('Shop', 'kode_forest');
			$caption = '';
		}else{
			$title = get_the_title();
			$caption = '';
		}
	?>
		<div <?php echo $header_background; ?> class="kd-subheader <?php echo esc_attr($theme_option['kode-header-style']);?>">
			<div class="container">
				<div class="row">
					
						<div class="kd-breadcrumb">
							<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- is search -->