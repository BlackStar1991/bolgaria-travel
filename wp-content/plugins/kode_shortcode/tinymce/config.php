<?php
/*-----------------------------------------------------------------------------------*/
/*	Default Options
/*-----------------------------------------------------------------------------------*/

// Number of posts array
function kodeforest_shortcodes_range ( $range, $all = true, $default = false, $range_start = 1 ) {
	if($all) {
		$number_of_posts['-1'] = 'All';
	}

	if($default) {
		$number_of_posts[''] = 'Default';
	}

	foreach(range($range_start, $range) as $number) {
		$number_of_posts[$number] = $number;
	}

	return $number_of_posts;
}

// Taxonomies
function kodeforest_shortcodes_categories ( $taxonomy, $empty_choice = false ) {
	if($empty_choice == true) {
		$post_categories[''] = 'Default';
	}

	$get_categories = get_categories('hide_empty=0&taxonomy=' . $taxonomy);

	if( ! array_key_exists('errors', $get_categories) ) {
		if( $get_categories && is_array($get_categories) ) {
			$post_categories['All'] = 'All';
			foreach ( $get_categories as $cat ) {
				if(isset($cat->slug)){
					$post_categories[$cat->slug] = $cat->name;
				}	
			}
		}

		if(isset($post_categories)) {
			return $post_categories;
		}
	}
}
// return the slug list of each post
function get_post_list_sc( $post_type ){
	
	$posts = get_posts(array('post_type' => $post_type, 'numberposts'=>100));
	
	if( ! array_key_exists('errors', $posts) ) {
		if( $posts && is_array($posts) ) {
			$posts_title = array();
			foreach ($posts as $post) {
				$posts_title[$post->ID] = $post->post_title;
			}
		}	
	}
	
	if(isset($posts_title)) {
		return $posts_title;
	}
	

}


$album_category = kodeforest_shortcodes_categories('album-categories');
$post_category = kodeforest_shortcodes_categories('category');
$event_category =  kodeforest_shortcodes_categories('event-categories');
$team_category =  kodeforest_shortcodes_categories('team-categories');
$choices = array('yes' => 'Yes', 'no' => 'No');
$reverse_choices = array('no' => 'No', 'yes' => 'Yes');
$dec_numbers = array('0.1' => '0.1', '0.2' => '0.2', '0.3' => '0.3', '0.4' => '0.4', '0.5' => '0.5', '0.6' => '0.6', '0.7' => '0.7', '0.8' => '0.8', '0.9' => '0.9', '1' => '1' );

// Fontawesome icons list
$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
$fontawesome_path = KODEFOREST_TINYMCE_DIR . '/css/font-awesome.css';
if( file_exists( $fontawesome_path ) ) {
	@$subject = file_get_contents($fontawesome_path);
}

preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

$icons = array();

foreach($matches as $match){
	$icons[$match[1]] = $match[2];
}

$checklist_icons = array ( 'icon-check' => '\f00c', 'icon-star' => '\f006', 'icon-angle-right' => '\f105', 'icon-asterisk' => '\f069', 'icon-remove' => '\f00d', 'icon-plus' => '\f067' );

/*-----------------------------------------------------------------------------------*/
/*	Shortcode Selection Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['shortcode-generator'] = array(
	'no_preview' => true,
	'params' => array(),
	'shortcode' => '',
	'popup_title' => ''
);

/*-----------------------------------------------------------------------------------*/
/*	Alert Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['alert'] = array(
	'no_preview' => true,
	'params' => array(

		'type' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Alert Type', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select the type of alert message', 'kodeforest_code' ),
			'options' => array(
				'general' => 'General',
				'error' => 'Error',
				'success' => 'Success',
				'notice' => 'Notice',
			)
		),
		'icon' => array(
			'type' => 'iconpicker',
			'label' => esc_attr__('Select Icon', 'kodeforest_code'),
			'desc' => esc_attr__('Click an icon to select, click again to deselect', 'kodeforest_code'),
			'options' => $icons
		),
		'content' => array(
			'std' => 'Your Content Goes Here',
			'type' => 'textarea',
			'label' => esc_attr__( 'Alert Content', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Insert the alert\'s content', 'kodeforest_code' ),
		),
		// 'animation_type' => array(
			// 'type' => 'select',
			// 'label' => esc_attr__( 'Animation Type', 'kodeforest_code' ),
			// 'desc' => esc_attr__( 'Select the type on animation to use on the shortcode', 'kodeforest_code' ),
			// 'options' => array(
				// '0' => 'None',
				// 'bounce' => 'Bounce',
				// 'fade' => 'Fade',
				// 'flash' => 'Flash',
				// 'shake' => 'Shake',
				// 'slide' => 'Slide',
			// )
		// ),
		// 'animation_direction' => array(
			// 'type' => 'select',
			// 'label' => esc_attr__( 'Direction of Animation', 'kodeforest_code' ),
			// 'desc' => esc_attr__( 'Select the incoming direction for the animation', 'kodeforest_code' ),
			// 'options' => array(
				// 'down' => 'Down',
				// 'left' => 'Left',
				// 'right' => 'Right',
				// 'up' => 'Up',
			// )
		// ),
		// 'animation_speed' => array(
			// 'type' => 'select',
			// 'std' => '',
			// 'label' => esc_attr__( 'Speed of Animation', 'kodeforest_code' ),
			// 'desc' => esc_attr__( 'Type in speed of animation in seconds (0.1 - 1)', 'kodeforest_code' ),
			// 'options' => $dec_numbers,
		// )
	),
	'shortcode' => '[alert icon="{{icon}}" type="{{type}}" ]{{content}}[/alert]',
	'popup_title' => esc_attr__( 'Alert Shortcode', 'kodeforest_code' )
);

/*-----------------------------------------------------------------------------------*/
/*	Albums Config
/*-----------------------------------------------------------------------------------*/
$kodeforest_shortcodes['albums'] = array(
	'no_preview' => true,
	'params' => array(
		
		'size' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Size', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select the size of shortcode element', 'kodeforest_code' ),
			'options' => array(
				'element1-1' => 'Full Width',
				// 'element1-2' => 'Half Width',
				// 'element1-3' => 'One Third Width',
				// 'element1-4' => 'One Forth',
			)
		),
		'header' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Header Title', 'kodeforest_code'),
			'desc' => esc_attr__('Add header title here', 'kodeforest_code')
		),
		
		'category' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Select Category', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select category to fetch its items', 'kodeforest_code' ),
			'options' => $album_category
		),
		'num_fetch' => array(
			'std' => 4,
			'type' => 'select',
			'label' => esc_attr__( 'Fetch number of items/posts', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select number of items/posts to show on page', 'kodeforest_code' ),
			'options' => kodeforest_shortcodes_range( 20, false )
		),
		
		'num_excerpt' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Number of Characters', 'kodeforest_code'),
			'desc' => esc_attr__('Add Number of Characters to show under each post/items', 'kodeforest_code')
		),
		
		'pagination' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Pagination', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Do you want to turn on pagination.', 'kodeforest_code' ),
			'options' => array(
				'Yes' => 'Yes',
				'No' => 'No',
			)
		),
		'orderby' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Orderby', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Show post order by.', 'kodeforest_code' ),
			'options' => array(
				'date' => 'date',
				'title' => 'title',
				'rand' => 'rand',
				'comment_count' => 'comment_count',
			)
		),
		
		'order' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Order', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select your posts/item order.', 'kodeforest_code' ),
			'options' => array(
				'asc' => 'ASC',
				'desc' => 'DESC',
			)
		),
		'item_margin' => array(
			'std' => 30,
			'type' => 'select',
			'label' => esc_attr__( 'Item Margin', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select margin from bottom', 'kodeforest_code' ),
			'options' => kodeforest_shortcodes_range( 100, false )
		),
		
	),
	'shortcode' => '[albums size="{{size}}" header="{{header}}" category="{{category}}" num_fetch="{{num_fetch}}" num_excerpt="{{num_excerpt}}" pagination="{{pagination}}" orderby="{{orderby}}" order="{{order}}" item_margin="{{item_margin}}"][/albums]',
	'popup_title' => esc_attr__( 'Albums Shortcode', 'kodeforest_code' )
);
/*-----------------------------------------------------------------------------------*/
/*	Progress Config
/*-----------------------------------------------------------------------------------*/
$kodeforest_shortcodes['progressbar'] = array(
	'no_preview' => true,
	'params' => array(
		
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Title', 'kodeforest_code'),
			'desc' => esc_attr__('Add title here', 'kodeforest_code')
		),
		'text_color' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Select Text Color', 'kodeforest_code'),
			'desc' => esc_attr__('Set the text color of the progress bar.', 'kodeforest_code')
		),
		'filled_color' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Select Filled Color', 'kodeforest_code'),
			'desc' => esc_attr__('Set the filled color of the progress bar.', 'kodeforest_code')
		),
		'unfilled_color' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Select Unfilled Color', 'kodeforest_code'),
			'desc' => esc_attr__('Set the unfilled color of the progress bar.', 'kodeforest_code')
		),
		'filled' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Filled Amount', 'kodeforest_code'),
			'desc' => esc_attr__('Add Filled here', 'kodeforest_code')
		)
	),
	'shortcode' => '[progressbar title="{{title}}" text_color="{{text_color}}" filled_color="{{filled_color}}" unfilled_color="{{unfilled_color}}" filled="{{filled}}" ][/progressbar]',
	'popup_title' => esc_attr__( 'Progress bar Shortcode', 'kodeforest_code' )
);
/*-----------------------------------------------------------------------------------*/
/*	Call To Action Config
/*-----------------------------------------------------------------------------------*/
$kodeforest_shortcodes['calltoaction'] = array(
	'no_preview' => true,
	'params' => array(
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Add Action Class', 'kodeforest_code'),
			'desc' => __('Add class of the action.', 'kodeforest_code')
		),
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Title Text of action', 'kodeforest_code'),
			'desc' => __('Add title of the action.', 'kodeforest_code')
		),
		'color' => array(
			'type' => 'colorpicker',
			'std' => '',
			'label' => __('Choose color', 'kodeforest_code'),
			'desc' => 'Leave blank for default'
		),
		'align' => array(
			'type' => 'select',
			'label' => __('Alignment', 'kodeforest_code'),
			'desc' => 'Select alignment of call to action text.',
			'options' => array(
				'left' => 'Left',
				'right' => 'Right',
				'center' => 'Center'
			)
		),
		'btn_text' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button Text', 'kodeforest_code'),
			'desc' => __('Add button text of the action.', 'kodeforest_code')
		),
		'btn_url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button URL', 'kodeforest_code'),
			'desc' => __('Add button URL of the action.', 'kodeforest_code')
		)
	),
	'shortcode' => '[calltoaction class="{{class}}" title="{{title}}" color="{{color}}" align="{{align}}" btn_text="{{btn_text}}" btn_url="{{btn_url}}" ][/calltoaction]',
	'popup_title' => __( 'Call to Action Shortcode', 'kodeforest_code' )
);
/*-----------------------------------------------------------------------------------*/
/*	Social Network Config
/*-----------------------------------------------------------------------------------*/
$kodeforest_shortcodes['list_items'] = array(
	'no_preview' => true,
	'params' => array(
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Social Network Class', 'kodeforest_code'),
			'desc' => __('Add social network class here.', 'kodeforest_code')
		),
		'align' => array(
			'type' => 'select',
			'label' => __('Alignment', 'kodeforest_code'),
			'desc' => 'Select alignment of call to action text.',
			'options' => array(
				'left' => 'Left',
				'right' => 'Right',
				'center' => 'Center'
			)
		),
	),
	'shortcode' => '[list_items class="{{class}}" align={{align}}]{{child_shortcode}}[/list_items]',
	'popup_title' => __( 'List Items Shortcode', 'kodeforest_code' ),
	'child_shortcode' => array(
		'params' => array(
			'icon' => array(
				'type' => 'iconpicker',
				'label' => __('Select Icon', 'kodeforest_code'),
				'desc' => __('Click an icon to select, click again to deselect', 'kodeforest_code'),
				'options' => $icons
			),
			'title' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Title ', 'kodeforest_code'),
				'desc' => __('Add title here.', 'kodeforest_code')
			),
			'color' => array(
				'type' => 'colorpicker',
				'std' => '',
				'label' => __('Button Text color', 'kodeforest_code'),
				'desc' => 'Leave blank for default'
			),
		),
		'shortcode' => '[list_item icon="{{icon}}" title="{{title}}" color="{{color}}" ][/list_item]',
		'clone_button' => __('Add Item', 'kodeforest_code')
	)
);
/*-----------------------------------------------------------------------------------*/
/*	Social Network Config
/*-----------------------------------------------------------------------------------*/
$kodeforest_shortcodes['social_network'] = array(
	'no_preview' => true,
	'params' => array(
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Social Network Class', 'kodeforest_code'),
			'desc' => __('Add social network class here.', 'kodeforest_code')
		),
		
	),
	'shortcode' => '[social_network class="{{class}}" ][/social_network]',
	'popup_title' => __( 'Social Network Shortcode', 'kodeforest_code' )
);
/*-----------------------------------------------------------------------------------*/
/*	Social Network Config
/*-----------------------------------------------------------------------------------*/
$kodeforest_shortcodes['adv_search'] = array(
	'no_preview' => true,
	'params' => array(
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Social Network Class', 'kodeforest_code'),
			'desc' => __('Add social network class here.', 'kodeforest_code')
		),
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Title', 'kodeforest_code'),
			'desc' => __('Add Advance Search Title here.', 'kodeforest_code')
		)
		
	),
	'shortcode' => '[adv_search class="{{class}}" title="{{title}}" ][/adv_search]',
	'popup_title' => __( 'Advance Search Shortcode', 'kodeforest_code' )
);
/*-----------------------------------------------------------------------------------*/
/*	Social Network Config2
/*-----------------------------------------------------------------------------------*/
$kodeforest_shortcodes['adv_search2'] = array(
	'no_preview' => true,
	'params' => array(
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Social Network Class', 'kodeforest_code'),
			'desc' => __('Add social network class here.', 'kodeforest_code')
		),
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Title', 'kodeforest_code'),
			'desc' => __('Add Advance Search2 Title here.', 'kodeforest_code')
		)
		
	),
	'shortcode' => '[adv_search2 class="{{class}}" title="{{title}}" ][/adv_search2]',
	'popup_title' => __( 'Advance Search Shortcode2', 'kodeforest_code' )
);
/*-----------------------------------------------------------------------------------*/
/*	Project Facts Config
/*-----------------------------------------------------------------------------------*/
$kodeforest_shortcodes['facts'] = array(
	'no_preview' => true,
	'params' => array(
		
		'icon' => array(
			'type' => 'iconpicker',
			'label' => esc_attr__('Select Icon', 'kodeforest_code'),
			'desc' => esc_attr__('Click an icon to select, click again to deselect', 'kodeforest_code'),
			'options' => $icons
		),	
		'color' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Select Color', 'kodeforest_code'),
			'desc' => esc_attr__('Set the fact color.', 'kodeforest_code')
		),
		'value' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Value', 'kodeforest_code'),
			'desc' => esc_attr__('Add Value here', 'kodeforest_code')
		),
		'sub_text' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Sub Text', 'kodeforest_code'),
			'desc' => esc_attr__('Add Sub Text here', 'kodeforest_code')
		)
	),
	'shortcode' => '[facts icon="{{icon}}" color="{{color}}" value="{{value}}" sub_text="{{sub_text}}" ][/facts]',
	'popup_title' => esc_attr__( 'Project Facts Shortcode', 'kodeforest_code' )
);
/*-----------------------------------------------------------------------------------*/
/*	Skill Config
/*-----------------------------------------------------------------------------------*/
$kodeforest_shortcodes['skill'] = array(
	'no_preview' => true,
	'params' => array(
		
		// 'title' => array(
			// 'std' => '',
			// 'type' => 'text',
			// 'label' => esc_attr__('Skill Text', 'kodeforest_code'),
			// 'desc' => esc_attr__('Add Skill Text here', 'kodeforest_code')
		// ),
		// 'text_color' => array(
			// 'type' => 'colorpicker',
			// 'label' => esc_attr__('Select Skill Text Color', 'kodeforest_code'),
			// 'desc' => esc_attr__('Set the Skill Text color of the progress bar.', 'kodeforest_code')
		// ),
		'filled_color' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Select Filled Color', 'kodeforest_code'),
			'desc' => esc_attr__('Set the filled color of the progress bar.', 'kodeforest_code')
		),
		'unfilled_color' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Select Unfilled Color', 'kodeforest_code'),
			'desc' => esc_attr__('Set the unfilled color of the progress bar.', 'kodeforest_code')
		),
		'value' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Value', 'kodeforest_code'),
			'desc' => esc_attr__('Add Value here', 'kodeforest_code')
		),
		'unit' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Unit', 'kodeforest_code'),
			'desc' => esc_attr__('Add Filled unit here', 'kodeforest_code')
		)
	),
	'shortcode' => '[skill filled_color="{{filled_color}}" unfilled_color="{{unfilled_color}}" value="{{value}}" unit="{{unit}}" ][/skill]',
	'popup_title' => esc_attr__( 'Skill Circle Shortcode', 'kodeforest_code' )
);
/*-----------------------------------------------------------------------------------*/
/*	Blog Config
/*-----------------------------------------------------------------------------------*/
$kodeforest_shortcodes['heading'] = array(
	'no_preview' => true,
	'params' => array(
		
		'style' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Style', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select heading style', 'kodeforest_code' ),
			'options' => array(
				'simple-style' => 'Simple Style',
				'normal-style' => 'Normal Style',
				'modern-style' => 'Modern Style',
			)
		),	
		'icon' => array(
			'type' => 'iconpicker',
			'label' => esc_attr__('Select Icon', 'kodeforest_code'),
			'desc' => esc_attr__('Click an icon to select, click again to deselect', 'kodeforest_code'),
			'options' => $icons
		),		
		'icon_color' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Select Icon Color', 'kodeforest_code'),
			'desc' => esc_attr__('Set the Icon color of the heading icon.', 'kodeforest_code')
		),
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Title', 'kodeforest_code'),
			'desc' => esc_attr__('Add title here', 'kodeforest_code')
		),		
		'title_color' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Select title Color', 'kodeforest_code'),
			'desc' => esc_attr__('Set the title color of the heading title.', 'kodeforest_code')
		),
		'caption' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Caption', 'kodeforest_code'),
			'desc' => esc_attr__('Add caption text here', 'kodeforest_code')
		),
		'caption_color' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Select caption Color', 'kodeforest_code'),
			'desc' => esc_attr__('Set the caption color of the heading caption.', 'kodeforest_code')
		),
		'item_margin' => array(
			'std' => 30,
			'type' => 'select',
			'label' => esc_attr__( 'Item Margin', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select margin from bottom', 'kodeforest_code' ),
			'options' => kodeforest_shortcodes_range( 100, false )
		),
		
	),
	'shortcode' => '[heading style="{{style}}" icon="{{icon}}" icon_color="{{icon_color}}" title="{{title}}" title_color="{{title_color}}" caption="{{caption}}" caption_color="{{caption_color}}" item_margin="{{item_margin}}" ]',
	'popup_title' => esc_attr__( 'Heading Shortcode', 'kodeforest_code' )
);
/*-----------------------------------------------------------------------------------*/
/*	Blog Config
/*-----------------------------------------------------------------------------------*/
$kodeforest_shortcodes['blog'] = array(
	'no_preview' => true,
	'params' => array(
		
		'size' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Size', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select the size of shortcode element', 'kodeforest_code' ),
			'options' => array(
				'1/1 Full Thumbnail' => 'Full Width',
				'1/2 Blog Grid' => 'Half Width',
				'1/3 Blog Grid' => 'One Third Width',
				'1/4 Blog Widget' => 'One Forth',
			)
		),		
		'header' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Header Title', 'kodeforest_code'),
			'desc' => esc_attr__('Add header title here', 'kodeforest_code')
		),
		
		'category' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Select Category', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select category to fetch its items', 'kodeforest_code' ),
			'options' => $post_category
		),
		'num_fetch' => array(
			'std' => 4,
			'type' => 'select',
			'label' => esc_attr__( 'Fetch number of items/posts', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select number of items/posts to show on page', 'kodeforest_code' ),
			'options' => kodeforest_shortcodes_range( 20, false )
		),
		
		'num_excerpt' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Number of Characters', 'kodeforest_code'),
			'desc' => esc_attr__('Add Number of Characters to show under each post/items', 'kodeforest_code')
		),
		
		'pagination' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Pagination', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Do you want to turn on pagination.', 'kodeforest_code' ),
			'options' => array(
				'Yes' => 'Yes',
				'No' => 'No',
			)
		),
		'orderby' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Orderby', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Show post order by.', 'kodeforest_code' ),
			'options' => array(
				'date' => 'date',
				'title' => 'title',
				'rand' => 'rand',
				'comment_count' => 'comment_count',
			)
		),
		
		'order' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Order', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select your posts/item order.', 'kodeforest_code' ),
			'options' => array(
				'asc' => 'ASC',
				'desc' => 'DESC',
			)
		),
		'item_margin' => array(
			'std' => 30,
			'type' => 'select',
			'label' => esc_attr__( 'Item Margin', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select margin from bottom', 'kodeforest_code' ),
			'options' => kodeforest_shortcodes_range( 100, false )
		),
		
	),
	'shortcode' => '[blog size="{{size}}" header="{{header}}" category="{{category}}" num_fetch="{{num_fetch}}" num_excerpt="{{num_excerpt}}" pagination="{{pagination}}" orderby="{{orderby}}" order="{{order}}" item_margin="{{item_margin}}"][/blog]',
	'popup_title' => esc_attr__( 'Blog Shortcode', 'kodeforest_code' )
);
	// <Recent-Posts>
		// <size>element2-3</size>
		// <show-caption>&lt;span class=&quot;color&quot;&gt;From Our&lt;/span&gt; Blog</show-caption>
		// <feature-post>98</feature-post>
		// <num-excerpt>140</num-excerpt>
		// <category>6</category>
		// <num-fetch>2</num-fetch>
		// <item-margin>30</item-margin>
	// </Recent-Posts>
/*-----------------------------------------------------------------------------------*/
/*	Recent Post Config
/*-----------------------------------------------------------------------------------*/
$kodeforest_shortcodes['recent_post'] = array(
	'no_preview' => true,
	'params' => array(
		
		'size' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Size', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select the size of shortcode element', 'kodeforest_code' ),
			'options' => array(
				//'element1-1' => 'Full Width',
				//'element1-2' => 'Half Width',
				'element2-3' => 'Two Third',
				//'element1-4' => 'One Forth',
			)
		),
		'header' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Header Title', 'kodeforest_code'),
			'desc' => esc_attr__('Add header title here', 'kodeforest_code')
		),
		'feature_post' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Select Feature Post', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select feature post/item', 'kodeforest_code' ),
			'options' => get_post_list_sc('post')
		),
		'post_num_excerpt' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Number of Characters', 'kodeforest_code'),
			'desc' => esc_attr__('Add Number of Characters to show under feature post/items', 'kodeforest_code')
		),
		
		'category' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Select Category', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select category to fetch its items', 'kodeforest_code' ),
			'options' => $post_category
		),
		'num_fetch' => array(
			'std' => 4,
			'type' => 'select',
			'label' => esc_attr__( 'Fetch number of items/posts', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select number of items/posts to show on page', 'kodeforest_code' ),
			'options' => kodeforest_shortcodes_range( 20, false )
		),
		'item_margin' => array(
			'std' => 30,
			'type' => 'select',
			'label' => esc_attr__( 'Item Margin', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select margin from bottom', 'kodeforest_code' ),
			'options' => kodeforest_shortcodes_range( 100, false )
		),
		
	),
	'shortcode' => '[recent_post size="{{size}}" header="{{header}}" feature_post="{{feature_post}}" post_num_excerpt="{{post_num_excerpt}}" category="{{category}}" num_fetch="{{num_fetch}}" item_margin="{{item_margin}}"][/recent_post]',
	'popup_title' => esc_attr__( 'Recent Posts Shortcode', 'kodeforest_code' )
);
/*-----------------------------------------------------------------------------------*/
/*	Counter Circle Config
/*-----------------------------------------------------------------------------------*/
$kodeforest_shortcodes['counter_circle'] = array(
	'no_preview' => true,
	'params' => array(
		
		'header' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Header Title', 'kodeforest_code'),
			'desc' => esc_attr__('Add header title here', 'kodeforest_code')
		),
		'event_id' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Select Event', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select Event to show its counter', 'kodeforest_code' ),
			'options' => get_post_list_sc('event')
		),
		'width' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Add Width of Counter', 'kodeforest_code'),
			'desc' => esc_attr__('Add width in pixels of counter circles', 'kodeforest_code')
		),
		'height' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Add Height of Counter', 'kodeforest_code'),
			'desc' => esc_attr__('Add height in pixels of counter circles', 'kodeforest_code')
		),
		'color' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Select Text Color', 'kodeforest_code'),
			'desc' => esc_attr__('Set the color of the circle text.', 'kodeforest_code')
		),
		'unfilled_color' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Select Unfilled Color', 'kodeforest_code'),
			'desc' => esc_attr__('Set the unfilled color of the circle.', 'kodeforest_code')
		),
		'filled_color' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Select Filled Color', 'kodeforest_code'),
			'desc' => esc_attr__('Set the filled color of the circle.', 'kodeforest_code')
		),
		'item_margin' => array(
			'std' => 30,
			'type' => 'select',
			'label' => esc_attr__( 'Item Margin', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select margin from bottom', 'kodeforest_code' ),
			'options' => kodeforest_shortcodes_range( 100, false )
		),
		
	),
	'shortcode' => '[counter_circle header="{{header}}" event_id="{{event_id}}" width="{{width}}" height="{{height}}" color="{{color}}" unfilled_color="{{unfilled_color}}" filled_color="{{filled_color}}" item_margin="{{item_margin}}"][/counter_circle]',
	'popup_title' => esc_attr__( 'Event Counter Circle Shortcode', 'kodeforest_code' )
);
/*-----------------------------------------------------------------------------------*/
/*	News Slider Config
/*-----------------------------------------------------------------------------------*/
$kodeforest_shortcodes['news_slider'] = array(
	'no_preview' => true,
	'params' => array(
		
		'size' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Size', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select the size of shortcode element', 'kodeforest_code' ),
			'options' => array(
				//'element1-1' => 'Full Width',
				//'element1-2' => 'Half Width',
				'element1-3' => 'One Third',
				//'element1-4' => 'One Forth',
			)
		),
		'header' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Header Title', 'kodeforest_code'),
			'desc' => esc_attr__('Add header title here', 'kodeforest_code')
		),
		'category' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Select Category', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select category to fetch its items', 'kodeforest_code' ),
			'options' => $post_category
		),
		'num_fetch' => array(
			'std' => 4,
			'type' => 'select',
			'label' => esc_attr__( 'Fetch number of items/posts', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select number of items/posts to show on page', 'kodeforest_code' ),
			'options' => kodeforest_shortcodes_range( 20, false )
		),
		'num_excerpt' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Number of Characters', 'kodeforest_code'),
			'desc' => esc_attr__('Add Number of Characters to show under each post/items', 'kodeforest_code')
		),
		'item_margin' => array(
			'std' => 30,
			'type' => 'select',
			'label' => esc_attr__( 'Item Margin', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select margin from bottom', 'kodeforest_code' ),
			'options' => kodeforest_shortcodes_range( 100, false )
		),
		
	),
	'shortcode' => '[news_slider size="{{size}}" header="{{header}}" category="{{category}}" num_fetch="{{num_fetch}}" num_excerpt="{{num_excerpt}}" item_margin="{{item_margin}}"][/news_slider]',
	'popup_title' => esc_attr__( 'News/Blog Slider Shortcode', 'kodeforest_code' )
);
/*-----------------------------------------------------------------------------------*/
/*	Event Config
/*-----------------------------------------------------------------------------------*/
// <Event>
		// <size>element1-1</size>
		// <header>&lt;span class=&quot;color&quot;&gt;Upcoming &lt;/span&gt; Events</header>
		// <event-type>Event Listing</event-type>
		// <num-excerpt>300</num-excerpt>
		// <item-scope>Future</item-scope>
		// <category>14</category>
		// <num-fetch>2</num-fetch>
		// <pagination>Yes</pagination>
		// <order>desc</order>
		// <item-margin>0</item-margin>
	// </Event>
$kodeforest_shortcodes['events'] = array(
	'no_preview' => true,
	'params' => array(
		
		'size' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Size', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select the size of shortcode element', 'kodeforest_code' ),
			'options' => array(
				'element1-1' => 'Full Width',
				'element1-2' => 'Half Width',
				'element1-3' => 'One Third Width',
				'element1-4' => 'One Forth',
			)
		),
		'header' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Header Title', 'kodeforest_code'),
			'desc' => esc_attr__('Add header title here', 'kodeforest_code')
		),
		'category' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Select Category', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select category to fetch its items', 'kodeforest_code' ),
			'options' => $event_category
		),
		'item_scope' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Item Scope', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select the item scope of shortcode element', 'kodeforest_code' ),
			'options' => array(
				'Future' => 'Future',
				'Past' => 'Past',
				'All' => 'All',
			)
		),
		'num_fetch' => array(
			'std' => 4,
			'type' => 'select',
			'label' => esc_attr__( 'Fetch number of items/posts', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select number of items/posts to show on page', 'kodeforest_code' ),
			'options' => kodeforest_shortcodes_range( 20, false )
		),
		
		'num_excerpt' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Number of Characters', 'kodeforest_code'),
			'desc' => esc_attr__('Add Number of Characters to show under each post/items', 'kodeforest_code')
		),
		
		// 'pagination' => array(
			// 'type' => 'select',
			// 'label' => esc_attr__( 'Pagination', 'kodeforest_code' ),
			// 'desc' => esc_attr__( 'Do you want to turn on pagination.', 'kodeforest_code' ),
			// 'options' => array(
				// 'Yes' => 'Yes',
				// 'No' => 'No',
			// )
		// ),
		// 'orderby' => array(
			// 'type' => 'select',
			// 'label' => esc_attr__( 'Orderby', 'kodeforest_code' ),
			// 'desc' => esc_attr__( 'Show post order by.', 'kodeforest_code' ),
			// 'options' => array(
				// 'date' => 'date',
				// 'title' => 'title',
				// 'rand' => 'rand',
				// 'comment_count' => 'comment_count',
			// )
		// ),
		
		'order' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Order', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select your posts/item order.', 'kodeforest_code' ),
			'options' => array(
				'asc' => 'ASC',
				'desc' => 'DESC',
			)
		),
		'item_margin' => array(
			'std' => 30,
			'type' => 'select',
			'label' => esc_attr__( 'Item Margin', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select margin from bottom', 'kodeforest_code' ),
			'options' => kodeforest_shortcodes_range( 100, false )
		),
		
	),
	'shortcode' => '[events size="{{size}}" header="{{header}}" category="{{category}}" item_scope="{{item_scope}}" num_fetch="{{num_fetch}}" num_excerpt="{{num_excerpt}}" order="{{order}}" item_margin="{{item_margin}}"][/events]',
	'popup_title' => esc_attr__( 'Event Shortcode', 'kodeforest_code' )
);
/*-----------------------------------------------------------------------------------*/
/*	Event Config
/*-----------------------------------------------------------------------------------*/
// <Team>
	// <size>element1-1</size>
	// <header>&lt;span class=&quot;color&quot;&gt;Our &lt;/span&gt;Team</header>
	// <num-fetch>4</num-fetch>
	// <category>event-managers</category>
	// <pagination>No</pagination>
	// <item-margin>0</item-margin>
// </Team>
$kodeforest_shortcodes['teams'] = array(
	'no_preview' => true,
	'params' => array(
		
		'size' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Size', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select the size of shortcode element', 'kodeforest_code' ),
			'options' => array(
				'element1-1' => 'Full Width',
			)
		),
		'header' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Header Title', 'kodeforest_code'),
			'desc' => esc_attr__('Add header title here', 'kodeforest_code')
		),
		'category' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Select Category', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select category to fetch its items', 'kodeforest_code' ),
			'options' => $team_category
		),
		'num_fetch' => array(
			'std' => 4,
			'type' => 'select',
			'label' => esc_attr__( 'Fetch number of items/posts', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select number of items/posts to show on page', 'kodeforest_code' ),
			'options' => kodeforest_shortcodes_range( 20, false )
		),
		'pagination' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Pagination', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Do you want to turn on pagination.', 'kodeforest_code' ),
			'options' => array(
				'Yes' => 'Yes',
				'No' => 'No',
			)
		),
		'item_margin' => array(
			'std' => 30,
			'type' => 'select',
			'label' => esc_attr__( 'Item Margin', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Select margin from bottom', 'kodeforest_code' ),
			'options' => kodeforest_shortcodes_range( 100, false )
		),
		
	),
	'shortcode' => '[teams size="{{size}}" header="{{header}}" category="{{category}}" num_fetch="{{num_fetch}}" pagination="{{pagination}}" item_margin="{{item_margin}}"][/teams]',
	'popup_title' => esc_attr__( 'Teams Shortcode', 'kodeforest_code' )
);
/*-----------------------------------------------------------------------------------*/
/*	Button Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['button'] = array(
	'no_preview' => true,
	'params' => array(

		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Button URL', 'kodeforest_code'),
			'desc' => esc_attr__('Add the button\'s url ex: http://example.com', 'kodeforest_code')
		),
		'target' => array(
			'type' => 'select',
			'label' => esc_attr__('Button Target', 'kodeforest_code'),
			'desc' => esc_attr__('_self = open in same window <br />_blank = open in new window', 'kodeforest_code'),
			'options' => array(
				'_self' => '_self',
				'_blank' => '_blank'
			)
		),
		'color' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Select Text Color', 'kodeforest_code'),
			'desc' => esc_attr__('Set the color of the Button text.', 'kodeforest_code')
		),
		'bgcolor' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Select Background Color', 'kodeforest_code'),
			'desc' => esc_attr__('Set the color of the Button background.', 'kodeforest_code')
		),
		'size' => array(
			'type' => 'select',
			'label' => esc_attr__('Button Size', 'kodeforest_code'),
			'desc' => esc_attr__('Select the button\'s size', 'kodeforest_code'),
			'options' => array(
				'small' => 'Small',
				'medium' => 'Medium',
				'large' => 'Large'
			)
		),
		'content' => array(
			'std' => 'Button Text',
			'type' => 'text',
			'label' => esc_attr__('Button\'s Text', 'kodeforest_code'),
			'desc' => esc_attr__('Add the text that will display in the button', 'kodeforest_code'),
		),
	),
	'shortcode' => '[button link="{{url}}" target="{{target}}" color="{{color}}" bgcolor="{{bgcolor}}" size="{{size}}" ]{{content}}[/button]',
	'popup_title' => esc_attr__('Button Shortcode', 'kodeforest_code')
);

/*-----------------------------------------------------------------------------------*/
/*	Checklist Config
/*-----------------------------------------------------------------------------------*/
$kodeforest_shortcodes['checklist'] = array(
	'params' => array(

		'icon' => array(
			'type' => 'iconpicker',
			'label' => esc_attr__('Select Icon', 'kodeforest_code'),
			'desc' => esc_attr__('Click an icon to select, click again to deselect', 'kodeforest_code'),
			'options' => $icons
		),
		'iconcolor' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Icon Color', 'kodeforest_code'),
			'desc' => esc_attr__('Leave blank for default', 'kodeforest_code')
		),
		'circle' => array(
			'type' => 'select',
			'label' => esc_attr__('Icon in Circle', 'kodeforest_code'),
			'desc' => esc_attr__('Choose to display the icon in a circle', 'kodeforest_code'),
			'options' => $choices
		),
	),

	'shortcode' => '[checklist icon="{{icon}}" iconcolor="{{iconcolor}}" circle="{{circle}}"]&lt;ul&gt;{{child_shortcode}}&lt;/ul&gt;[/checklist]',
	'popup_title' => esc_attr__('Checklist Shortcode', 'kodeforest_code'),
	'no_preview' => true,

	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'content' => array(
				'std' => 'Your Content Goes Here',
				'type' => 'textarea',
				'label' => esc_attr__( 'List Item Content', 'kodeforest_code' ),
				'desc' => esc_attr__( 'Add list item content', 'kodeforest_code' ),
			),
		),
		'shortcode' => '&lt;li&gt;{{content}}&lt;/li&gt;',
		'clone_button' => esc_attr__('Add New List Item', 'kodeforest_code')
	)
);

/*-----------------------------------------------------------------------------------*/
/*	Dropcap Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['dropcap'] = array(
	'no_preview' => true,
	'params' => array(
		'color' => array(
			'type' => 'colorpicker',
			'std' => '',
			'label' => esc_attr__('Dropcap color', 'kodeforest_code'),
			'desc' => 'Leave blank for default'
		),
		'content' => array(
			'std' => 'A',
			'type' => 'textarea',
			'label' => esc_attr__( 'Dropcap Letter', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Add the letter to be used as dropcap', 'kodeforest_code' ),
		)

	),
	'shortcode' => '[dropcap color="{{color}}"]{{content}}[/dropcap]',
	'popup_title' => esc_attr__( 'Dropcap Shortcode', 'kodeforest_code' )
);
/*-----------------------------------------------------------------------------------*/
/*	FontAwesome Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['fontawesome'] = array(
	'no_preview' => true,
	'params' => array(

		'icon' => array(
			'type' => 'iconpicker',
			'label' => esc_attr__('Select Icon', 'kodeforest_code'),
			'desc' => esc_attr__('Click an icon to select, click again to deselect', 'kodeforest_code'),
			'options' => $icons
		),
		'circle' => array(
			'type' => 'select',
			'label' => esc_attr__('Icon in Circle', 'kodeforest_code'),
			'desc' => 'Choose to display the icon in a circle',
			'options' => $choices
		),
		'size' => array(
			'type' => 'select',
			'label' => esc_attr__('Size of Icon', 'kodeforest_code'),
			'desc' => 'Select the size of the icon',
			'options' => array(
				'large' => 'Large',
				'medium' => 'Medium',
				'small' => 'Small'
			)
		),
		'iconcolor' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Icon Color', 'kodeforest_code'),
			'desc' => esc_attr__('Leave blank for default', 'kodeforest_code')
		),
		'circlecolor' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Icon Circle Background Color', 'kodeforest_code'),
			'desc' => esc_attr__('Leave blank for default', 'kodeforest_code')
		),
		'circlebordercolor' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Icon Circle Border Color', 'kodeforest_code'),
			'desc' => esc_attr__('Leave blank for default', 'kodeforest_code')
		),
	),
	'shortcode' => '[fontawesome icon="{{icon}}" circle="{{circle}}" size="{{size}}" iconcolor="{{iconcolor}}" circlecolor="{{circlecolor}}" circlebordercolor="{{circlebordercolor}}"]',
	'popup_title' => esc_attr__( 'FontAwesome Shortcode', 'kodeforest_code' )
);

/*-----------------------------------------------------------------------------------*/
/*	Fullwidth Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['fullwidth'] = array(
	'no_preview' => true,
	'params' => array(
		'backgroundcolor' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Background Color', 'kodeforest_code'),
			'desc' => esc_attr__('Leave blank for default', 'kodeforest_code')
		),
		'backgroundimage' => array(
			'type' => 'uploader',
			'label' => esc_attr__('Backgrond Image', 'kodeforest_code'),
			'desc' => 'Upload an image to display in the background'
		),
		'backgroundrepeat' => array(
			'type' => 'select',
			'label' => esc_attr__('Background Repeat', 'kodeforest_code'),
			'desc' => 'Choose how the background image repeats.',
			'options' => array(
				'no-repeat' => 'No Repeat',
				'repeat' => 'Repeat Vertically and Horizontally',
				'repeat-x' => 'Repeat Horizontally',
				'repeat-y' => 'Repeat Vertically'
			)
		),
		'backgroundposition' => array(
			'type' => 'select',
			'label' => esc_attr__('Background Position', 'kodeforest_code'),
			'desc' => 'Choose the postion of the background image',
			'options' => array(
				'left top' => 'Left Top',
				'left center' => 'Left Center',
				'left bottom' => 'Left Bottom',
				'right top' => 'Right Top',
				'right center' => 'Right Center',
				'right bottom' => 'Right Bottom',
				'center top' => 'Center Top',
				'center center' => 'Center Center',
				'center bottom' => 'Center Bottom'
			)
		),
		'backgroundattachment' => array(
			'type' => 'select',
			'label' => esc_attr__('Background Scroll', 'kodeforest_code'),
			'desc' => 'Choose how the background image scrolls',
			'options' => array(
				'scroll' => 'Scroll: background scrolls along with the element',
				'fixed' => 'Fixed: background is fixed giving a parallax effect',
				'local' => 'Local: background scrolls along with the element\'s contents'
			)
		),
		'paddingtop' => array(
			'std' => 20,
			'type' => 'select',
			'label' => esc_attr__( 'Padding Top', 'kodeforest_code' ),
			'desc' => esc_attr__( 'In pixels', 'kodeforest_code' ),
			'options' => kodeforest_shortcodes_range( 100, false )
		),
		'paddingbottom' => array(
			'std' => 20,
			'type' => 'select',
			'label' => esc_attr__( 'Padding Bottom', 'kodeforest_code' ),
			'desc' => esc_attr__( 'In pixels', 'kodeforest_code' ),
			'options' => kodeforest_shortcodes_range( 100, false )
		),
		'content' => array(
			'std' => 'Your Content Goes Here',
			'type' => 'textarea',
			'label' => esc_attr__( 'Content', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Add content', 'kodeforest_code' ),
		),
	),
	'shortcode' => '[fullwidth backgroundcolor="{{backgroundcolor}}" backgroundimage="{{backgroundimage}}" backgroundrepeat="{{backgroundrepeat}}" backgroundposition="{{backgroundposition}}" backgroundattachment="{{backgroundattachment}}" paddingTop="{{paddingtop}}px" paddingBottom="{{paddingbottom}}px"]{{content}}[/fullwidth]',
	'popup_title' => esc_attr__( 'Fullwidth Shortcode', 'kodeforest_code' )
);
/*-----------------------------------------------------------------------------------*/
/*	Gallery Config
/*-----------------------------------------------------------------------------------*/
$kodeforest_shortcodes['kode_gallery'] = array(
	'params' => array(
		'gallery_col' => array(
			'type' => 'select',
			'label' => __('Gallery Column', 'kodeforest_code'),
			'desc' => __('Select gallery column to show it in grid view.', 'kodeforest_code'),
			'options' => array(
				'2' => '2 Column',
				'3' => '3 Column',
				'4' => '4 Column'
			)
		),
	),
	'no_preview' => true,
	'shortcode' => '[kode_gallery]{{child_shortcode}}[/kode_gallery]',
	'popup_title' => __('Insert Tab Shortcode', 'kodeforest_code'),

	'child_shortcode' => array(
		'params' => array(
		
			'image' => array(
				'type' => 'uploader',
				'label' => __('client Image', 'kodeforest_code'),
				'desc' => 'Clicking this image will show lightbox'
			),
			'link' => array(
				'std' => 'Link',
				'type' => 'text',
				'label' => __('Add link for client', 'kodeforest_code'),
				'desc' => __('link for client', 'kodeforest_code'),
			)
		),
		'shortcode' => '[gallery_item link="{{link}}" image="{{image}}"][/gallery_item]',
		'clone_button' => __('Add Gallery', 'kodeforest_code')
	)
);
/*-----------------------------------------------------------------------------------*/
/*	Google Map Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['googlemap'] = array(
	'no_preview' => true,
	'params' => array(

		'type' => array(
			'type' => 'select',
			'label' => esc_attr__('Map Type', 'kodeforest_code'),
			'desc' => esc_attr__('Select the type of google map to display', 'kodeforest_code'),
			'options' => array(
				'roadmap' => 'Roadmap',
				'satellite' => 'Satellite',
				'hybrid' => 'Hybrid',
				'terrain' => 'Terrain'
			)
		),
		'width' => array(
			'std' => '100%',
			'type' => 'text',
			'label' => esc_attr__('Map Width', 'kodeforest_code'),
			'desc' => esc_attr__('Map Width in Percentage or Pixels', 'kodeforest_code')
		),
		'height' => array(
			'std' => '300px',
			'type' => 'text',
			'label' => esc_attr__('Map Height', 'kodeforest_code'),
			'desc' => esc_attr__('Map Height in Percentage or Pixels', 'kodeforest_code')
		),
		'zoom' => array(
			'std' => 14,
			'type' => 'select',
			'label' => esc_attr__('Zoom Level', 'kodeforest_code'),
			'desc' => 'Higher number will be more zoomed in.',
			'options' => kodeforest_shortcodes_range( 25, false )
		),
		'scrollwheel' => array(
			'type' => 'select',
			'label' => esc_attr__('Scrollwheel on Map', 'kodeforest_code'),
			'desc' => 'Enable zooming using a mouse\'s scroll wheel',
			'options' => $choices
		),
		'scale' => array(
			'type' => 'select',
			'label' => esc_attr__('Show Scale Control on Map', 'kodeforest_code'),
			'desc' => 'Display the map scale',
			'options' => $choices
		),
		'zoom_pancontrol' => array(
			'type' => 'select',
			'label' => esc_attr__('Show Pan Control on Map', 'kodeforest_code'),
			'desc' => 'Displays pan control button',
			'options' => $choices
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => esc_attr__( 'Address', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Add address to the location which will show up on map. For multiple addresses, separate addresses by using the | symbol. <br />ex: Address 1|Address 2|Address 3', 'kodeforest_code' ),
		)
	),
	'shortcode' => '[map address="{{content}}" type="{{type}}" width="{{width}}" height="{{height}}" zoom="{{zoom}}" scrollwheel="{{scrollwheel}}" scale="{{scale}}" zoom_pancontrol="{{zoom_pancontrol}}"][/map]',
	'popup_title' => esc_attr__( 'Google Map Shortcode', 'kodeforest_code' ),
);

/*-----------------------------------------------------------------------------------*/
/*	Highlight Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['highlight'] = array(
	'no_preview' => true,
	'params' => array(

		'color' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Highlight Text Color', 'kodeforest_code'),
			'desc' => esc_attr__('Pick a highlight color', 'kodeforest_code')
		),
		'bg_color' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Highlight Background Color', 'kodeforest_code'),
			'desc' => esc_attr__('Pick a highlight color', 'kodeforest_code')
		),
		
		'content' => array(
			'std' => 'Your Content Goes Here',
			'type' => 'textarea',
			'label' => esc_attr__( 'Content to Higlight', 'kodeforest_code' ),
			'desc' => esc_attr__( 'Add your content to be highlighted', 'kodeforest_code' ),
		)

	),
	'shortcode' => '[highlight color="{{color}}" bg_color="{{bg_color}}"]{{content}}[/highlight]',
	'popup_title' => esc_attr__( 'Highlight Shortcode', 'kodeforest_code' )
);

/*-----------------------------------------------------------------------------------*/
/*	Lightbox Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['lightbox'] = array(
	'no_preview' => true,
	'params' => array(

		'full_image' => array(
			'type' => 'uploader',
			'label' => esc_attr__('Full Image', 'kodeforest_code'),
			'desc' => 'Upload an image that will show up in the lightbox'
		),
		'thumb_image' => array(
			'type' => 'uploader',
			'label' => esc_attr__('Thumbnail Image', 'kodeforest_code'),
			'desc' => 'Clicking this image will show lightbox'
		),
		'alt' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Alt Text', 'kodeforest_code'),
			'desc' => 'The alt attribute provides alternative information if an image cannot be viewed'
		),
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Lightbox Description', 'kodeforest_code'),
			'desc' => 'This will show up in the lightbox as a description below the image'
		),
	),
	'shortcode' => '&lt;a title="{{title}}" href="{{full_image}}" rel="prettyPhoto"&gt;&lt;img alt="{{alt}}" src="{{thumb_image}}" /&gt;&lt;/a&gt;',
	'popup_title' => esc_attr__( 'Lightbox Shortcode', 'kodeforest_code' )
);

/*-----------------------------------------------------------------------------------*/
/*	Team/Persons Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['member'] = array(
	'no_preview' => true,
	'params' => array(

		'picture' => array(
			'type' => 'uploader',
			'label' => esc_attr__('Picture', 'kodeforest_code'),
			'desc' => 'Upload an image to display'
		),
		'pic_link' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Picture Link URL', 'kodeforest_code'),
			'desc' => 'Add the URL the picture will link to, ex: http://example.com'
		),
		'name' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Name', 'kodeforest_code'),
			'desc' => 'Insert the name of the person'
		),
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Title', 'kodeforest_code'),
			'desc' => 'Insert the title of the person'
		),
		'email' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Email Address', 'kodeforest_code'),
			'desc' => 'Insert an email address to display the email icon'
		),
		'facebook' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Facebook Profile Link', 'kodeforest_code'),
			'desc' => 'Insert a url to display the facebook icon'
		),
		'twitter' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Twitter Profile Link', 'kodeforest_code'),
			'desc' => 'Insert a url to display the twitter icon'
		),
		'linkedin' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('LinkedIn Profile Link', 'kodeforest_code'),
			'desc' => 'Insert a url to display the linkedin icon'
		),
		'dribbble' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Dribbble Profile Link', 'kodeforest_code'),
			'desc' => 'Insert a url to display the dribbble icon'
		),
		'target' => array(
			'type' => 'select',
			'label' => esc_attr__('Link Target', 'kodeforest_code'),
			'desc' => esc_attr__('_self = open in same window <br /> _blank = open in new window', 'kodeforest_code'),
			'options' => array(
				'_self' => '_self',
				'_blank' => '_blank'
			)
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => esc_attr__('Profile Description', 'kodeforest_code'),
			'desc' => 'Enter the content to be displayed'
		),
	),
	'shortcode' => '[member name="{{name}}" picture="{{picture}}" pic_link="{{pic_link}}" title="{{title}}" email="{{email}}" facebook="{{facebook}}" twitter="{{twitter}}" linkedin="{{linkedin}}" dribbble="{{dribbble}}" linktarget="{{target}}"]{{content}}[/member]',
	'popup_title' => esc_attr__( 'Member Shortcode', 'kodeforest_code' )
);

/*-----------------------------------------------------------------------------------*/
/*	Separator Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['separator'] = array(
	'no_preview' => true,
	'params' => array(

		'style' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Style', 'kodeforest_code' ),
			'desc' => 'Choose the separator line style',
			'options' => array(
				'none' => 'No Style',
				'single' => 'Single Border',
				'double' => 'Double Border',
				'dashed' => 'Dashed Border',
				'dotted' => 'Dotted Border',
				'shadow' => 'Shadow'
			)
		),
		'top' => array(
			'std' => 40,
			'type' => 'select',
			'label' => esc_attr__('Margin Top', 'kodeforest_code'),
			'desc' => 'Spacing above the separator',
			'options' => kodeforest_shortcodes_range( 100, false, false, 0 )
		),
		'bottom' => array(
			'std' => 40,
			'type' => 'select',
			'label' => esc_attr__('Margin Bottom', 'kodeforest_code'),
			'desc' => 'Spacing below the separator',
			'options' => kodeforest_shortcodes_range( 100, false, false, 0 )
		)
	),
	'shortcode' => '[separator top="{{top}}" bottom="{{bottom}}" style="{{style}}"]',
	'popup_title' => esc_attr__( 'Separator Shortcode', 'kodeforest_code' )
);

/*-----------------------------------------------------------------------------------*/
/*	Sharing Box Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['sharingbox'] = array(
	'no_preview' => true,
	'params' => array(

		'tagline' => array(
			'std' => 'Share This Story, Choose Your Platform!',
			'type' => 'text',
			'label' => esc_attr__('Tagline', 'kodeforest_code'),
			'desc' => 'The title tagline that will display'
		),
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Title', 'kodeforest_code'),
			'desc' => 'The post title that will be shared'
		),
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Link', 'kodeforest_code'),
			'desc' => 'The link that will be shared'
		),
		'description' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => esc_attr__('Description', 'kodeforest_code'),
			'desc' => 'The description that will be shared'
		),
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Link to Share', 'kodeforest_code'),
			'desc' => ''
		),
		'pinterest_image' => array(
			'std' => '',
			'type' => 'uploader',
			'label' => esc_attr__('Choose Image to Share on Pinterest', 'kodeforest_code'),
			'desc' => ''
		),
		'backgroundcolor' => array(
			'type' => 'colorpicker',
			'label' => esc_attr__('Background Color', 'kodeforest_code'),
			'desc' => esc_attr__('Leave blank for default color', 'kodeforest_code')
		),
	),
	'shortcode' => '[sharing tagline="{{tagline}}" title="{{title}}" link="{{link}}" description="{{description}}" pinterest_image="{{pinterest_image}}" backgroundcolor="{{backgroundcolor}}"][/sharing]',
	'popup_title' => esc_attr__( 'Sharing Box Shortcode', 'kodeforest_code' )
);

/*-----------------------------------------------------------------------------------*/
/*	SoundCloud Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['sound_cloud'] = array(
	'no_preview' => true,
	'params' => array(

		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('SoundCloud Url', 'kodeforest_code'),
			'desc' => 'The SoundCloud url, ex: http://api.soundcloud.com/tracks/110813479'
		),
		'comments' => array(
			'type' => 'select',
			'label' => esc_attr__('Show Comments', 'kodeforest_code'),
			'desc' => 'Choose to display comments',
			'options' => $choices
		),
		'auto_play' => array(
			'type' => 'select',
			'label' => esc_attr__('Autoplay', 'kodeforest_code'),
			'desc' => 'Choose to autoplay the track',
			'options' => $reverse_choices
		),
		'color' => array(
			'type' => 'colorpicker',
			'std' => '#ff7700',
			'label' => esc_attr__('Color', 'kodeforest_code'),
			'desc' => 'Select the color of the shortcode'
		),
		'width' => array(
			'std' => '100%',
			'type' => 'text',
			'label' => esc_attr__('Width', 'kodeforest_code'),
			'desc' => 'In pixels (px) or percentage (%)'
		),
		'height' => array(
			'std' => '81px',
			'type' => 'text',
			'label' => esc_attr__('Height', 'kodeforest_code'),
			'desc' => 'In pixels (px)'
		),
	),
	'shortcode' => '[sound_cloud url="{{url}}" comments="{{comments}}" auto_play="{{auto_play}}" color="{{color}}" width="{{width}}" height="{{height}}"][/sound_cloud]',
	'popup_title' => esc_attr__( 'SoundCloud Shortcode', 'kodeforest_code' )
);

/*-----------------------------------------------------------------------------------*/
/*	Social Links Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['sociallinks'] = array(
	'no_preview' => true,
	'params' => array(

		'colorscheme' => array(
			'type' => 'select',
			'label' => esc_attr__('Color Scheme', 'kodeforest_code'),
			'desc' => 'Choose the color scheme for the social links',
			'options' => array(
				'' => 'Default',
				'light' => 'Light',
				'dark' => 'Dark'
			)
		),
		'target' => array(
			'type' => 'select',
			'label' => esc_attr__('Link Target', 'kodeforest_code'),
			'desc' => esc_attr__('_self = open in same window <br />_blank = open in new window', 'kodeforest_code'),
			'options' => array(
				'_self' => '_self',
				'_blank' => '_blank'
			)
		),
		'rss' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('RSS Link', 'kodeforest_code'),
			'desc' => 'Insert your custom RSS link'
		),
		'facebook' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Facebook Link', 'kodeforest_code'),
			'desc' => 'Insert your custom Facebook link'
		),
		'twitter' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Twitter Link', 'kodeforest_code'),
			'desc' => 'Insert your custom Twitter link'
		),
		'dribbble' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Dribbble Link', 'kodeforest_code'),
			'desc' => 'Insert your custom Dribbble link'
		),
		'google' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Google+ Link', 'kodeforest_code'),
			'desc' => 'Insert your custom Google+ link'
		),
		'linkedin' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('LinkedIn Link', 'kodeforest_code'),
			'desc' => 'Insert your custom LinkedIn link'
		),
		'blogger' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Blogger Link', 'kodeforest_code'),
			'desc' => 'Insert your custom Blogger link'
		),
		'tumblr' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Tumblr Link', 'kodeforest_code'),
			'desc' => 'Insert your custom Tumblr link'
		),
		'reddit' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Reddit Link', 'kodeforest_code'),
			'desc' => 'Insert your custom Reddit link'
		),
		'yahoo' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Yahoo Link', 'kodeforest_code'),
			'desc' => 'Insert your custom Yahoo link'
		),
		'deviantart' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Deviantart Link', 'kodeforest_code'),
			'desc' => 'Insert your custom Deviantart link'
		),
		'vimeo' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Vimeo Link', 'kodeforest_code'),
			'desc' => 'Insert your custom Vimeo link'
		),
		'youtube' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Youtube Link', 'kodeforest_code'),
			'desc' => 'Insert your custom Youtube link'
		),
		'pinterest' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Pinterst Link', 'kodeforest_code'),
			'desc' => 'Insert your custom Pinterest link'
		),
		'digg' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Digg Link', 'kodeforest_code'),
			'desc' => 'Insert your custom Digg link'
		),
		'flickr' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Flickr Link', 'kodeforest_code'),
			'desc' => 'Insert your custom Flickr link'
		),
		'forrst' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Forrst Link', 'kodeforest_code'),
			'desc' => 'Insert your custom Forrst link'
		),
		'myspace' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Myspace Link', 'kodeforest_code'),
			'desc' => 'Insert your custom Myspace link'
		),
		'skype' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Skype Link', 'kodeforest_code'),
			'desc' => 'Insert your custom Skype link'
		),
		'show_custom' => array(
			'type' => 'select',
			'label' => esc_attr__('Show Custom Social Icon', 'kodeforest_code'),
			'desc' => esc_attr__('Show the custom social icon specified in Theme Options', 'kodeforest_code'),
			'options' => $reverse_choices
		),
	),
	'shortcode' => '[social_links colorscheme="{{colorscheme}}" linktarget="{{target}}" rss="{{rss}}" facebook="{{facebook}}" twitter="{{twitter}}" dribbble="{{dribbble}}" google="{{google}}" linkedin="{{linkedin}}" blogger="{{blogger}}" tumblr="{{tumblr}}" reddit="{{reddit}}" yahoo="{{yahoo}}" deviantart="{{deviantart}}" vimeo="{{vimeo}}" youtube="{{youtube}}" pinterest="{{pinterest}}" digg="{{digg}}" flickr="{{flickr}}" forrst="{{forrst}}" myspace="{{myspace}}" skype="{{skype}}" show_custom="{{show_custom}}"]',
	'popup_title' => esc_attr__( 'Social Links Shortcode', 'kodeforest_code' )
);

/*-----------------------------------------------------------------------------------*/
/*	Tabs Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['our_clients'] = array(
	'params' => array(

		
	),
	'no_preview' => true,
	'shortcode' => '[our_clients]{{child_shortcode}}[/our_clients]',
	'popup_title' => esc_attr__('Insert Tab Shortcode', 'kodeforest_code'),

	'child_shortcode' => array(
		'params' => array(
		
			'image' => array(
				'type' => 'uploader',
				'label' => esc_attr__('client Image', 'kodeforest_code'),
				'desc' => 'Clicking this image will show lightbox'
			),
			'link' => array(
				'std' => 'Link',
				'type' => 'text',
				'label' => esc_attr__('Add link for client', 'kodeforest_code'),
				'desc' => esc_attr__('link for client', 'kodeforest_code'),
			)
		),
		'shortcode' => '[client link="{{link}}" image="{{image}}"][/client]',
		'clone_button' => esc_attr__('Add Client', 'kodeforest_code')
	)
);


/*-----------------------------------------------------------------------------------*/
/*	Tabs Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['tabs'] = array(
	'params' => array(

		'layout' => array(
			'type' => 'select',
			'label' => esc_attr__('Layout', 'kodeforest_code'),
			'desc' => 'Choose the layout of the shortcode',
			'options' => array(
				'horizontal' => 'Horizontal',
				'vertical' => 'Vertical'
			)
		),
		'backgroundcolor' => array(
			'type' => 'colorpicker',
			'std' => '',
			'label' => esc_attr__('Background Color', 'kodeforest_code'),
			'desc' => 'Leave blank for default'
		),
		'inactivecolor' => array(
			'type' => 'colorpicker',
			'std' => '',
			'label' => esc_attr__('Inactive Color', 'kodeforest_code'),
			'desc' => 'Leave blank for default'
		),
	),
	'no_preview' => true,
	'shortcode' => '[tabs layout="{{layout}}" backgroundcolor="{{backgroundcolor}}" inactivecolor="{{inactivecolor}}"]{{child_shortcode}}[/tabs]',
	'popup_title' => esc_attr__('Insert Tab Shortcode', 'kodeforest_code'),

	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'std' => 'Title',
				'type' => 'text',
				'label' => esc_attr__('Tab Title', 'kodeforest_code'),
				'desc' => esc_attr__('Title of the tab', 'kodeforest_code'),
			),
			'content' => array(
				'std' => 'Tab Content',
				'type' => 'textarea',
				'label' => esc_attr__('Tab Content', 'kodeforest_code'),
				'desc' => esc_attr__('Add the tabs content', 'kodeforest_code')
			)
		),
		'shortcode' => '[tab title="{{title}}"]{{content}}[/tab]',
		'clone_button' => esc_attr__('Add Tab', 'kodeforest_code')
	)
);
/*-----------------------------------------------------------------------------------*/
/*	Title Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['title'] = array(
	'no_preview' => true,
	'params' => array(

		'size' => array(
			'type' => 'select',
			'label' => esc_attr__('Title Size', 'kodeforest_code'),
			'desc' => 'Choose the title size, H1-H6',
			'options' => kodeforest_shortcodes_range( 6, false )
		),
		'align' => array(
			'type' => 'select',
			'label' => esc_attr__('Select Alignment', 'kodeforest_code'),
			'desc' => 'Choose the alinment of the text shortcode',
			'options' => array(
				'left' => 'left',
				'right' => 'right',
				'center' => 'center',
				'none' => 'none'
			)
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => esc_attr__('Title', 'kodeforest_code'),
			'desc' => 'Insert the title text'
		),
	),
	'shortcode' => '[title align="{{align}}" size="{{size}}"]{{content}}[/title]',
	'popup_title' => esc_attr__( 'Sharing Box Shortcode', 'kodeforest_code' )
);

/*-----------------------------------------------------------------------------------*/
/*	Toggles Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['accordion'] = array(
	'params' => array(

	),
	'no_preview' => true,
	'shortcode' => '[accordian]{{child_shortcode}}[/accordian]',
	'popup_title' => esc_attr__('Insert Toggles Shortcode', 'kodeforest_code'),

	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'std' => '',
				'type' => 'text',
				'label' => esc_attr__('Title', 'kodeforest_code'),
				'desc' => 'Insert the accordion title',
			),
			'open' => array(
				'type' => 'select',
				'label' => esc_attr__('Open by Default', 'kodeforest_code'),
				'desc' => 'Choose to have the accordion open when page loads',
				'options' => $reverse_choices
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => esc_attr__('Accordion Content', 'kodeforest_code'),
				'desc' => 'Insert the accordion content'
			)
		),
		'shortcode' => '[toggle title="{{title}}" open="{{open}}"]{{content}}[/toggle]',
		'clone_button' => esc_attr__('Add Accordion', 'kodeforest_code')
	)
);

/*-----------------------------------------------------------------------------------*/
/*	Tooltip Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['tooltip'] = array(
	'no_preview' => true,
	'params' => array(

		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Tooltip Text', 'kodeforest_code'),
			'desc' => 'Insert the text that displays in the tooltip'
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => esc_attr__('Content', 'kodeforest_code'),
			'desc' => 'Insert the text that will activate the tooltip hover'
		),
	),
	'shortcode' => '[tooltip title="{{title}}"]{{content}}[/tooltip]',
	'popup_title' => esc_attr__( 'Tooltip Shortcode', 'kodeforest_code' )
);

/*-----------------------------------------------------------------------------------*/
/*	Vimeo Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['vimeo'] = array(
	'no_preview' => true,
	'params' => array(

		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Video ID', 'kodeforest_code'),
			'desc' => 'For example the Video ID for <br />https://vimeo.com/75230326 is 75230326'
		),
		'width' => array(
			'std' => '600',
			'type' => 'text',
			'label' => esc_attr__('Width', 'kodeforest_code'),
			'desc' => 'In pixels but only enter a number, ex: 600'
		),
		'height' => array(
			'std' => '350',
			'type' => 'text',
			'label' => esc_attr__('Height', 'kodeforest_code'),
			'desc' => 'In pixels but enter a number, ex: 350'
		),
		'autoplay' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Autoplay Video', 'kodeforest_code' ),
			'desc' =>  esc_attr__( 'Set to yes to make video autoplaying', 'kodeforest_code' ),
			'options' => $reverse_choices
		),
		'apiparams' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('AdditionalAPI Parameter', 'kodeforest_code'),
			'desc' => 'Use additional API parameter, for example &title=0 to disable title on video. VimeoPlus account may be required.'
		),
	),
	'shortcode' => '[vimeo id="{{id}}" width="{{width}}" height="{{height}}" autoplay="{{autoplay}}" api_params="{{apiparams}}"]',
	'popup_title' => esc_attr__( 'Vimeo Shortcode', 'kodeforest_code' )
);
/*-----------------------------------------------------------------------------------*/
/*	Youtube Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['youtube'] = array(
	'no_preview' => true,
	'params' => array(

		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Video ID', 'kodeforest_code'),
			'desc' => 'For example the Video ID for <br />http://www.youtube.com/LOfeCR7KqUs is LOfeCR7KqUs'
		),
		'width' => array(
			'std' => '600',
			'type' => 'text',
			'label' => esc_attr__('Width', 'kodeforest_code'),
			'desc' => 'In pixels but only enter a number, ex: 600'
		),
		'height' => array(
			'std' => '350',
			'type' => 'text',
			'label' => esc_attr__('Height', 'kodeforest_code'),
			'desc' => 'In pixels but only enter a number, ex: 350'
		),
		'autoplay' => array(
			'type' => 'select',
			'label' => esc_attr__( 'Autoplay Video', 'kodeforest_code' ),
			'desc' =>  esc_attr__( 'Set to yes to make video autoplaying', 'kodeforest_code' ),
			'options' => $reverse_choices
		),
		'apiparams' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('AdditionalAPI Parameter', 'kodeforest_code'),
			'desc' => 'Use additional API parameter, for example &rel=0 to disable related videos'
		),
	),
	'shortcode' => '[youtube id="{{id}}" width="{{width}}" height="{{height}}" autoplay="{{autoplay}}" api_params="{{apiparams}}"]',
	'popup_title' => esc_attr__( 'Vimeo Shortcode', 'kodeforest_code' )
);
/*-----------------------------------------------------------------------------------*/
/*	newsletter Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['newsletter'] = array(
	'no_preview' => true,
	'params' => array(

		'email' => array(
			'std' => '',
			'type' => 'text',
			'label' => esc_attr__('Email ID', 'kodeforest_code'),
			'desc' => 'Add Email ID in order to receive subscribers.'
		),
		
	),
	'shortcode' => '[newsletter email="{{email}}"]',
	'popup_title' => esc_attr__( 'Newsletter Shortcode', 'kodeforest_code' )
);


/*-----------------------------------------------------------------------------------*/
/*	Columns Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['columns'] = array(
	'shortcode' => ' {{child_shortcode}} ', // as there is no wrapper shortcode
	'popup_title' => esc_attr__('Insert Columns Shortcode', 'kodeforest_code'),
	'no_preview' => true,
	'params' => array(),

	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => esc_attr__('Column Type', 'kodeforest_code'),
				'desc' => esc_attr__('Select the width of the column', 'kodeforest_code'),
				'options' => array(
					'one_third' => 'One Third',
					'two_third' => 'Two Thirds',
					'one_half' => 'One Half',
					'one_fourth' => 'One Fourth',
					'three_fourth' => 'Three Fourth',
				)
			),
			'last' => array(
				'type' => 'select',
				'label' => esc_attr__('Last Column', 'kodeforest_code'),
				'desc' => 'Choose if the column is last in a set. This has to be set to "Yes" for the last column in a set',
				'options' => $reverse_choices
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => esc_attr__('Column Content', 'kodeforest_code'),
				'desc' => esc_attr__('Insert the column content', 'kodeforest_code'),
			)
		),
		'shortcode' => '[{{column}} last="{{last}}"]{{content}}[/{{column}}] ',
		'clone_button' => esc_attr__('Add Column', 'kodeforest_code')
	)
);


$kodeforest_shortcodes['price_table'] = array(
	'params' => array(
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Class', 'democracy'),
			'desc' => 'Insert the class',
		),
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Title', 'democracy'),
			'desc' => 'Insert the price table title',
		),
		'sub_title' => array(
			'type' => 'iconpicker',
			'label' => esc_attr__('Select Icon', 'kodeforest_code'),
			'desc' => esc_attr__('Click an icon to select, click again to deselect', 'kodeforest_code'),
			'options' => $icons
		),
		// 'sub_title' => array(
			// 'std' => '',
			// 'type' => 'text',
			// 'label' => __('Sub Title', 'democracy'),
			// 'desc' => 'Insert the price table sub title',
		// ),
		'price' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Price', 'democracy'),
			'desc' => 'Insert the price table price',
		),
		'duration' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Duration', 'democracy'),
			'desc' => 'Insert the price table duration',
		),
		'button' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button Text', 'democracy'),
			'desc' => 'Insert the price table button text',
		),
		'button_url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button URL', 'democracy'),
			'desc' => 'Insert the price table button url',
		),
		
	),
	'no_preview' => true,
	'shortcode' => '[price_table class="{{class}}" title="{{title}}" sub_title="{{sub_title}}" price="{{price}}" duration="{{duration}}" button="{{button}}" button_url="{{button_url}}" ]{{child_shortcode}}[/price_table]',
	'popup_title' => __('Insert Price Table Shortcode', 'democracy'),

	'child_shortcode' => array(
		'params' => array(
			'status' => array(
				'type' => 'select',
				'label' => __('Status', 'democracy'),
				'desc' => __('Select the Price Item Status.', 'democracy'),
				'options' => array(
					'enable' => 'Available',
					'disable' => 'Not Available',
				)
			),
			'link' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Link', 'democracy'),
				'desc' => 'Insert the price table items',
			),
			'content' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Item', 'democracy'),
				'desc' => 'Insert the price table items',
			),
		),
		'shortcode' => '[price_item link="{{link}}" content="{{content}}" status="{{status}}"]',
		'clone_button' => __('Add Price Item', 'democracy')
	)
);
/*-----------------------------------------------------------------------------------*/
/*	Table Config
/*-----------------------------------------------------------------------------------*/

$kodeforest_shortcodes['table'] = array(
	'no_preview' => true,
	'params' => array(

		'type' => array(
			'type' => 'select',
			'label' => esc_attr__('Type', 'kodeforest_code'),
			'desc' => esc_attr__('Select the table style', 'kodeforest_code'),
			'options' => array(
				'1' => 'Style 1',
				'2' => 'Style 2',
			)
		),
		'columns' => array(
			'type' => 'select',
			'label' => esc_attr__('Number of Columns', 'kodeforest_code'),
			'desc' => 'Select how many columns to display',
			'options' => array(
				'1' => '1 Column',
				'2' => '2 Columns',
				'3' => '3 Columns',
				'4' => '4 Columns'
			)
		)
	),
	'shortcode' => '',
	'popup_title' => esc_attr__( 'Table Shortcode', 'kodeforest_code' )
);