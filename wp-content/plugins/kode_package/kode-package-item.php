<?php
	/*	
	*	Package Listing
	*	---------------------------------------------------------------------
	*	This file contains functions that help you create package item
	*	---------------------------------------------------------------------
	*/
	
	//Package Listing
	if( !function_exists('kode_get_package_item') ){
		function kode_get_package_item( $settings ){
			// $settings['category'];
			// $settings['tag'];
			// $settings['num-excerpt'];
			// $settings['num-fetch'];
			// $settings['package-style'];
			// $settings['scope'];
			// $settings['order'];
			// $settings['margin-bottom'];
			// query posts section
			global $theme_option;
			$args = array('post_type' => 'package', 'suppress_filters' => false);
			$args['posts_per_page'] = (empty($settings['num-fetch']))? '5': $settings['num-fetch'];
			$settings['package-style'] = (empty($settings['package-style']))? 'grid-3column': $settings['package-style'];
			$args['orderby'] = (empty($settings['orderby']))? 'post_date': $settings['orderby'];
			$args['order'] = (empty($settings['order']))? 'desc': $settings['order'];
			$args['paged'] = (get_query_var('paged'))? get_query_var('paged') : 1;
			$margin = (!empty($settings['margin-bottom']))? 'margin-bottom: ' . esc_attr($settings['margin-bottom']) . ';': '';
			
			$margin_style = (!empty($margin))? ' style="' . esc_attr($margin) . '" ': '';
			if( !empty($settings['category']) || (!empty($settings['tag'])) ){
				$args['tax_query'] = array('relation' => 'OR');
				
				if( !empty($settings['category']) ){
					array_push($args['tax_query'], array('terms'=>explode(',', $settings['category']), 'taxonomy'=>'package_category', 'field'=>'slug'));
				}
				if( !empty($settings['tag'])){
					array_push($args['tax_query'], array('terms'=>explode(',', $settings['tag']), 'taxonomy'=>'package_tag', 'field'=>'slug'));
				}				
			}			
			$query = new WP_Query( $args );

			// create the package filter
			$thumbnail_size = 'small-grid-size';
			$settings['num-excerpt'] = empty($settings['num-excerpt'])? 0: esc_attr($settings['num-excerpt']);
			$size = 3;
			
			$settings['title-num-fetch'] = empty($settings['title-num-fetch'])? '24': esc_attr($settings['title-num-fetch']);
			$package  = '<div class="package-listing kd-package" '.$margin_style.'>';
			if($settings['package-style'] == 'modern-view'){
				if($settings['package-layout'] == 'grid-3column'){
					$size = 3;
					$thumbnail_size = 'small-grid-size';
				}else{
					$size = 4;
					$thumbnail_size = 'team-size';
				}
				$package  = '<div class="col-md-12 kode-gallery kode-package" '.$margin_style.'><ul class="row">';
			}else{
				$size = 3;
				$package  = '<div class="col-md-12"><div class="row kode-package-list kode-package" '.$margin_style.'>';
				$thumbnail_size = 'small-grid-size';
				
			}
			// $package  .= '
			// <div class="sort-controls">
				// <strong>'. esc_attr__('Sort By','kodeforest').':</strong>
				// &nbsp;
				// <select name="sort-properties" id="sort-properties">
					// <option value="default">'. __('Default Order','framework').'</option>
					// <option value="kode-price-asc" '. ( isset($_GET['sortby']) && ($_GET['sortby']=='price-asc') )?'selected':''.'>'. esc_attr__('Цена от меньшего к большему','kodeforest').'</option>
					// <option value="kode-price-desc" '. ( isset($_GET['sortby']) && ($_GET['sortby']=='price-desc') )?'selected':''.'>'. esc_attr__('Цена от большего к меньшему','kodeforest').'</option>
					// <option value="kode-date-asc" '. ( isset($_GET['sortby']) && ($_GET['sortby']=='date-asc') )?'selected':''.'>'. esc_attr__('Дата публикации','kodeforest').'</option>
					// <option value="kode-date-desc" '. ( isset($_GET['sortby']) && ($_GET['sortby']=='date-desc') )?'selected':''.'>'. esc_attr__('Дата публикации','kodeforest').'</option>
				// </select>
			// </div>';
			$current_size = 0;
			
			while($query->have_posts()){ $query->the_post();
				global $kode_post_option,$post,$kode_post_settings;
				$package_option = json_decode(kode_decode_stopbackslashes(get_post_meta($post->ID, 'post-option', true)), true);
				
				$price = (empty($package_option['price']))? ' ': $package_option['price'];
				$duration = (empty($package_option['days']))? ' ': $package_option['days'];
				$duration_pre = (empty($package_option['days-prefix']))? ' ': $package_option['days-prefix'];
				$location = (empty($package_option['location']))? ' ': $package_option['location'];
				$availability = (empty($package_option['availability']))? ' ': $package_option['availability'];
				$book_text = (empty($package_option['book_text']))? ' ': $package_option['book_text'];
				$book_url = (empty($package_option['book_url']))? ' ': $package_option['book_url'];
				
				$thumbnail_id = get_post_thumbnail_id( $post->ID );
				$image_thumb = wp_get_attachment_image_src($thumbnail_id, 'full');
				
				$theme_option['currency'] = (empty($theme_option['currency']))? ' ': $theme_option['currency'];
				
				if($settings['package-style'] == 'normal-view'){
				if( $current_size % $size == 0 ){
					$package .= '<div class="clear"></div>';
				}	
				$package .= '
					<article class="' . esc_attr(kode_get_column_class('1/' . $size)) . '">
						<div class="package-mainsection kode-ux">
						<figure>
							<a href="'.esc_url(get_permalink()).'">'.get_the_post_thumbnail($post->ID, $thumbnail_size).'</a>
							<figcaption>
								<span class="package-price thbg-color">'.esc_attr($theme_option['currency']).esc_attr($price).'</span>
								<div class="kd-bottomelement">
									<h5><a href="'.esc_url(get_permalink()).'">'.esc_attr(substr(get_the_title(),0,$settings['title-num-fetch'])).'</a></h5>
									<div style="background-color: #00c4d6;" class="days-counter"><span>'.esc_attr($duration).'</span><span>'.esc_attr($duration_pre).'</span></div>
								</div>
							</figcaption>
						</figure>
						</div>
					</article>';
				}else if($settings['package-style'] == 'listing-view'){
					if( $current_size % $size == 0 ){
						$package .= '<div class="clear"></div>';
					}	
					$package .= '
					<article class="' . esc_attr(kode_get_column_class('1/' . $size)) . '">
					<div class="f-property">
                        <div class="thumb">
                           <a href="'.esc_url(get_permalink()).'">'.get_the_post_thumbnail($post->ID, $thumbnail_size).'</a>
                            <div class="price">
                                <p>'.esc_attr($theme_option['currency']).esc_attr($price).'</p>
                            </div>
                        </div>
                        <div class="text">
                            <h2>'.esc_attr(substr(get_the_title(),0,$settings['title-num-fetch'])).'</h2>
                            <div class="rating" style="display:none">
                                <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                            </div>
                            <a href="'.esc_url(get_permalink()).'">'.__('Бронировать/смотреть','kodeforest').'</a>
                        </div>
                        <div class="property-info">
                            <ul>
                                <li>
                                    <span>'.esc_attr($price).'</span>
                                    <p>'.__('Цена','kodeforest').'</p>
                                </li>
                                <li>
                                    <span>'.esc_attr($duration).'</span>
                                    <p>'.__('Ночей','kodeforest').'</p>
                                </li>
                                <li>
                                    <span>'.esc_attr($location).'</span>
                                    <p>'.__('Звезд','kodeforest').'</p>
                                </li>
                                <li>
                                    <span>'.esc_attr($availability).'</span>
                                    <p>'.__('мест в номере','kodeforest').'</p>
                                </li>
                            </ul>
                        </div>
                    </div>
					</article>';
				}else if($settings['package-style'] == 'simple-view'){
					if( $current_size % $size == 0 ){
						$package .= '<div class="clear"></div>';
					}	
					$package .= '
					<article class="' . esc_attr(kode_get_column_class('1/' . $size)) . '">
					<div class="property-list">
						<div class="thumb">
							 <a href="'.esc_url(get_permalink()).'">'.get_the_post_thumbnail($post->ID, $thumbnail_size).'</a>
						</div>
						<div class="detail">
							<ul>
								<li><i class="fa fa-area-chart"></i><p>'.esc_attr($price).'</p></li>
								<li><i class="fa fa-bed"></i><p>'.esc_attr($availability).'</p></li>
							</ul>
						</div>
						<div class="text">
							 <h2>'.esc_attr(substr(get_the_title(),0,$settings['title-num-fetch'])).'</h2>
							 <a href="'.esc_url(get_permalink()).'">'.__('Читать далее','kodeforest').'</a>
						</div>
					</div>
					</article>';
				}else{
				$package .= '
					<li class="' . esc_attr(kode_get_column_class('1/' . $size)) . '">
						<div class="package-mainsection kode-ux">
							<figure><a href="'.esc_url(get_permalink()).'">'.get_the_post_thumbnail($post->ID, $thumbnail_size).'</a> <figcaption><a class="fa fa-plus" data-gal="prettyphoto[gallery]" href="'.esc_url($image_thumb[0]).'"></a></figcaption></figure>
							<div class="kd-galleryinfo">
							  <h5><a href="'.esc_url(get_permalink()).'">'.esc_attr(substr(get_the_title(),0,$settings['title-num-fetch'])).'</a></h5>
							  <span>'.esc_attr($location).'</span>
							</div>
						</div>
					</li>';
				}
				$current_size++;
			}
			if($settings['package-style'] <> 'modern-view'){
				$package .= '</div>';
			}
			if( $settings['pagination'] == 'enable' ){
				$package .= kode_get_pagination($query->max_num_pages, $args['paged']);
			}
			if($settings['package-style'] == 'modern-view'){
				$package .= '</ul></div>';
			}else{
				$package .= '</div>';
			}
			//$package .= '</div>';
			
			return $package;
		}
	}	
	
	//Package Listing
	if( !function_exists('kode_get_package_marker_item') ){
		function kode_get_package_marker_item( $settings ){
			// $settings['category'];
			// $settings['tag'];
			// $settings['num-excerpt'];
			// $settings['num-fetch'];
			// $settings['package-style'];
			// $settings['scope'];
			// $settings['order'];
			// $settings['margin-bottom'];
			// query posts section
			$args = array('post_type' => 'package', 'suppress_filters' => false);
			$args['posts_per_page'] = (empty($settings['num-fetch']))? '5': $settings['num-fetch'];
			$args['orderby'] = (empty($settings['orderby']))? 'post_date': $settings['orderby'];
			$args['order'] = (empty($settings['order']))? 'desc': $settings['order'];
			$args['paged'] = (get_query_var('paged'))? get_query_var('paged') : 1;
			$margin = (!empty($settings['margin-bottom']))? 'margin-bottom: ' . esc_attr($settings['margin-bottom']) . ';': '';
			$margin_style = (!empty($margin))? ' style="' . esc_attr($margin) . '" ': '';
			if( !empty($settings['category']) || (!empty($settings['tag'])) ){
				$args['tax_query'] = array('relation' => 'OR');
				
				if( !empty($settings['category']) ){
					array_push($args['tax_query'], array('terms'=>explode(',', $settings['category']), 'taxonomy'=>'package_category', 'field'=>'slug'));
				}
				if( !empty($settings['tag'])){
					array_push($args['tax_query'], array('terms'=>explode(',', $settings['tag']), 'taxonomy'=>'package_tag', 'field'=>'slug'));
				}				
			}			
			$query = new WP_Query( $args );

			// create the package filter
			$settings['num-excerpt'] = empty($settings['num-excerpt'])? 0: esc_attr($settings['num-excerpt']);
			$current_size = 0;?>
				<script src="http://maps.google.com/maps/api/js?sensor=false"></script> 
				<script type="text/javascript">
					var geocoder = new google.maps.Geocoder();
					var iconURLPrefix = "images";
					var icons = [ <?php
						while($query->have_posts()){
							$query->the_post();
							global $post;
							$package_option = json_decode(kode_decode_stopbackslashes(get_post_meta($post->ID, 'post-option', true)), true);
							$map_icon = $package_option['map_icon'];
							if(!empty($package_option['map_icon'])){
								if( is_numeric($package_option['map_icon']) ){
									$image_src = wp_get_attachment_image_src($package_option['map_icon'], 'full');	
									echo $map_icon = "'".esc_url($image_src[0])."',";
								}else{
									echo $map_icon = "'".esc_url($package_option['map_icon'])."',";
								}
							}else{
								echo $map_icon = "'".KODE_PATH.'/images/map-icon-2.png'."',";
							}	
						} ?>								
					];
					
					function kode_initialize(){
						var MY_MAPTYPE_ID = 'custom_style';
						var icons_length = icons.length;
						var shadow = {
						  anchor: new google.maps.Point(16,16),
						  url: iconURLPrefix + 'msmarker.shadow.png'
						};
						var featureOpts = [
							{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]}

						];
						var myOptions = {
						  center: new google.maps.LatLng(16,18),
						  mapTypeId: MY_MAPTYPE_ID,
						  mapTypeControl: true,
						  streetViewControl: true,
						  panControl: true,
						  scrollwheel: false,
						  draggable: true,	  
						  zoom: 3,
						}
						var map = new google.maps.Map(document.getElementById("kode_map_canv"), myOptions);
						var styledMapOptions = {
							name: 'Custom Style'
						};

						var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

						map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
						
						var infowindow = new google.maps.InfoWindow({
						  maxWidth: 350,
						});
						var marker;
						var markers = new Array();
						var iconCounter = 0;
						<?php 
						$counter_map = 0;
						while($query->have_posts()){
							$query->the_post();
							global $post;
							$counter_map++;
							$package_option = json_decode(kode_decode_stopbackslashes(get_post_meta($post->ID, 'post-option', true)), true);
							$price = $package_option['price'];
							$duration = $package_option['duration'];
							$location = $package_option['location'];
							$availability = $package_option['availability'];
							$book_text = $package_option['book_text'];
							$book_url = $package_option['book_url'];
							$map_icon = $package_option['map_icon'];
							
							if(!empty($package_option['map_icon'])){
								if( is_numeric($package_option['map_icon']) ){
									$image_src = wp_get_attachment_image_src($package_option['map_icon'], 'full');	
									$map_icon = esc_url($image_src[0]);
								}else{
									$map_icon = esc_url($package_option['map_icon']);
								}
							}	
							
							?>
							var i = <?php echo esc_attr($counter_map);?>;
							geocoder.geocode( { 'address': '<?php echo esc_attr($location)?>'}, function(results, status) {
								if (status == google.maps.GeocoderStatus.OK) {

									marker = new google.maps.Marker({
										position: results[0].geometry.location,
										map: map,
										icon : icons[iconCounter],
										shadow: shadow
									});

								markers.push(marker);
								google.maps.event.addListener(marker, 'click', (function(marker, i) {
									return function() {
										infowindow.setContent('<div class="kode-package-list"><article class="col-md-12"><div class="package-mainsection kode-ux"><figure><a href="<?php echo esc_url(get_permalink())?>"><?php echo get_the_post_thumbnail($post->ID, array(350,350))?></a><figcaption><span class="package-price thbg-color">$<?php echo esc_attr($price)?></span><div class="kd-bottomelement"><h5><a href="<?php echo esc_url(get_permalink())?>"><?php echo esc_attr(get_the_title())?></a></h5><div style="background-color: #00c4d6;" class="days-counter"><?php echo kode_esc_html($duration)?></div></div></figcaption></figure></div></article></div>');
										infowindow.open(map, marker);
									}
								})(marker, i));
								  
								  iconCounter++;
								  // We only have a limited number of possible icon colors, so we may have to restart the counter
								  if(iconCounter >= icons_length){
									iconCounter = 0;
								  }
								}
								
							}); 
						 
						  <?php }?>
					}
						google.maps.event.addDomListener(window, "load", kode_initialize);
				</script>
			<?php //echo do_shortcode('[map address="New Garden Town Lahore, Pakistan" type="roadmap" width="100%" height="300px" zoom="14" scrollwheel="yes" scale="yes" zoom_pancontrol="yes"][/map]');?>
			<div id="kode_map_canv" class="kode_map" <?php echo $margin_style;?>></div>
			<?php
		}
	}	
	
	
	if( !function_exists('kode_get_package_info') ){
		function kode_get_package_info( $array = array(), $wrapper = true, $sep = '',$div_wrap = 'div' ){
			global $theme_option; $ret = '';
			if( empty($array) ) return $ret;
			$exclude_meta = empty($theme_option['post-meta-data'])? array(): esc_attr($theme_option['post-meta-data']);
			
			foreach($array as $post_info){
				if( in_array($post_info, $exclude_meta) ) continue;
				if( !empty($sep) ) $ret .= $sep;
				
				switch( $post_info ){
					case 'date':
						$ret .= '<'.$div_wrap.' class="package-info package-date"><i class="fa fa-clock-o"></i>';
						$ret .= '<a href="' . esc_url(get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d'))) . '">';
						$ret .= esc_attr(get_the_time());
						$ret .= '</a>';
						$ret .= '</'.$div_wrap.'>';
						break;
					case 'tag':
						$tag = get_the_term_list(get_the_ID(), 'package_tag', '', '<span class="sep">,</span> ' , '' );
						if(empty($tag)) break;					
					
						$ret .= '<'.$div_wrap.' class="package-info package-tag"><i class="fa fa-tag"></i>';
						$ret .= $tag;						
						$ret .= '</'.$div_wrap.'>';					
						break;
					case 'category':
						$category = get_the_term_list(get_the_ID(), 'package_category', '', '<span class="sep">,</span> ' , '' );
						if(empty($category)) break;
						
						$ret .= '<'.$div_wrap.' class="package-info package-category"><i class="fa fa-list"></i>';
						$ret .= $category;					
						$ret .= '</'.$div_wrap.'>';			
						break;
					case 'comment':
						$ret .= '<'.$div_wrap.' class="package-info package-comment"><i class="fa fa-comment-alt"></i>';
						$ret .= '<a href="' . esc_url(get_permalink()) . '#respond" >' . esc_attr(get_comments_number()) . '</a>';						
						$ret .= '</'.$div_wrap.'>';					
						break;
					case 'author':
						ob_start();
						the_author_posts_link();
						$author = ob_get_contents();
						ob_end_clean();
						
						$ret .= '<'.$div_wrap.' class="package-info package-author"><i class="fa fa-user"></i>';
						$ret .= $author;
						$ret .= '</'.$div_wrap.'>';			
						break;						
				}
			}
			
			
			if($wrapper && !empty($ret)){
				return '<div class="kode-package-info kode-info">' . $ret . '<div class="clear"></div></div>';
			}else if( !empty($ret) ){
				return $ret;
			}
			return '';
		}
	}
	
	/*-----------------------------------------------------------------------------------*/
	/*	Properties Search Filter
	/*-----------------------------------------------------------------------------------*/
	if(!function_exists('kode_search')){
		function kode_search($search_args){

			/* taxonomy query and meta query arrays */
			$tax_query = array();
			$meta_query = array();

			/* Keyword Based Search */
			if( isset ( $_GET['keyword'] ) ) {
				$keyword = trim( $_GET['keyword'] );
				if ( ! empty( $keyword ) ) {
					$search_args['s'] = $keyword;
				}
			}
			
		
			/* Property ID Parameter */
			if( isset($_GET['availability']) && !empty($_GET['availability'])){
				$availability = trim($_GET['availability']);
				$meta_query[] = array(
					'key' => 'availability',
					'value' => $availability,
					'compare' => 'LIKE',
					'type'=> 'CHAR'
				);
			}

			/* Logic for Min and Max Price Parameters */
			if( isset($_GET['min-price']) && ($_GET['min-price'] != 'any') && isset($_GET['max-price']) && ($_GET['max-price'] != 'any') ){
				$min_price = doubleval($_GET['min-price']);
				$max_price = doubleval($_GET['max-price']);
				if( $min_price >= 0 && $max_price > $min_price ){
					$meta_query[] = array(
						'key' => 'price',
						'value' => array( $min_price, $max_price ),
						'type' => 'NUMERIC',
						'compare' => 'BETWEEN'
					);
				}
			}elseif( isset($_GET['min-price']) && ($_GET['min-price'] != 'any') ){
				$min_price = doubleval($_GET['min-price']);
				if( $min_price > 0 ){
					$meta_query[] = array(
						'key' => 'price',
						'value' => $min_price,
						'type' => 'NUMERIC',
						'compare' => '>='
					);
				}
			}elseif( isset($_GET['max-price']) && ($_GET['max-price'] != 'any') ){
				$max_price = doubleval($_GET['max-price']);
				if( $max_price > 0 ){
					$meta_query[] = array(
						'key' => 'price',
						'value' => $max_price,
						'type' => 'NUMERIC',
						'compare' => '<='
					);
				}
			}

			/* if more than one taxonomies exist then specify the relation */
			$tax_count = count( $tax_query );
			if( $tax_count > 1 ){
				$tax_query['relation'] = 'AND';
			}

			/* if more than one meta query elements exist then specify the relation */
			$meta_count = count( $meta_query );
			if( $meta_count > 1 ){
				$meta_query['relation'] = 'AND';
			}

			if( $tax_count > 0 ){
				$search_args['tax_query'] = $tax_query;
			}

			/* if meta query has some values then add it to base home page query */
			if( $meta_count > 0 ){
				$search_args['meta_query'] = $meta_query;
			}

			/* Sort By Price */
			if( (isset($_GET['min-price']) && ($_GET['min-price'] != 'any')) || ( isset($_GET['max-price']) && ($_GET['max-price'] != 'any') ) ){
				$search_args['orderby'] = 'meta_value_num';
				$search_args['meta_key'] = 'price';
				$search_args['order'] = 'ASC';
			}

			return $search_args;
		}
	}
	add_filter('kode_search_parameters','kode_search');
	
?>