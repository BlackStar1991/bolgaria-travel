<?php

add_filter('gettext', 'translate_text');
add_filter('ngettext', 'translate_text');
 
function translate_text($translated) {
$translated = str_ireplace('Категория', 'Название Региона', $translated);
$translated = str_ireplace('Метка', 'Тип тура', $translated);

return $translated;
}


/**
 * Функция для вывода последних комментариев в WordPress.
 * ver: 0.1
 */
function page_comments($limit=10, $ex=45, $cat=0, $echo=1, $gravatar=''){
 global $wpdb;
 if($cat){
 $IN = (strpos($cat,'-')===false)?"IN ($cat)":"NOT IN (".str_replace('-','',$cat).")";
 $join = "LEFT JOIN $wpdb->term_relationships rel ON (p.ID = rel.object_id) LEFT JOIN $wpdb->term_taxonomy tax ON (rel.term_taxonomy_id = tax.term_taxonomy_id)";
 $and = "AND tax.taxonomy = 'category' AND tax.term_id $IN";
 }
 $sql = "SELECT comment_ID, comment_post_ID, comment_content, post_title, guid, comment_author, comment_author_email FROM $wpdb->comments com LEFT JOIN $wpdb->posts p ON (com.comment_post_ID = p.ID) {$join}
 WHERE comment_approved = '1' AND comment_type = '' {$and} ORDER BY comment_date DESC LIMIT $limit";
 
$results = $wpdb->get_results($sql);
 
$out = '<div id="comments"><ol class="commentlist">';
 foreach ($results as $comment){
 if($gravatar) $grava = get_avatar( $comment, 50 );
 $comtext = strip_tags($comment->comment_content);
 $leight = (int) iconv_strlen( $comtext, 'utf-8' );
 if($leight > $ex) $comtext =  iconv_substr($comtext,0,$ex, 'UTF-8').' …';
 if(strip_tags($comment->comment_author) == 'Артем Петрусенко'){
 $autor = " <cite style='color:red;' class='fn'> ".strip_tags($comment->comment_author)."</cite> ответил на вопрос в статье";
 }else{
 $autor = " <cite class='fn'>".strip_tags($comment->comment_author)."</cite>  прокомментировал(а) статью";
 }
 $out .= "
 <li class='comment'>
 <div  class='comment-body'>
 $grava
 <div class='comment-wrapper'>
 <div class='comment-meta' style='margin-bottom:5px;'>
 $autor <a style='font-size:20px;line-height: 0.5;' href='". get_comment_link($comment->comment_ID) ."'>{$comment->post_title}</a>
 </div>
 <div class='hentry-content'>
 {$comtext}
 </div>
 </div>
 </div>
 </li>
 ";
 } $out .= "</ol></div>";
 
if ($echo) echo $out;
 else return $out;
 }
/**
 * Функция для вывода последних комментариев в WordPress.
 * ver: 0.1
 */
function kama_recent_comments( $args = array() ){
	global $wpdb;

	$def = array(
		'limit'      => 9, // сколько комментов выводить.
		'ex'         => 200, // n символов. Обрезка текста комментария.
		'term'       => '', // id категорий/меток. Включить(5,12,35) или исключить(-5,-12,-35) категории. По дефолту - из всех категорий.
		'gravatar'   => '', // Размер иконки в px. Показывать иконку gravatar. '' - не показывать.
		'user'       => '', // id юзеров. Включить(5,12,35) или исключить(-5,-12,-35) комменты юзеров. По дефолту - все юзеры.
		'echo'       => 1,  // выводить на экран (1) или возвращать (0).
		'comm_type'  => '', // название типа коментария
		'meta_query' => '', // WP_Meta_Query
		'meta_key'   => '', // WP_Meta_Query
		'meta_value' => '', // WP_Meta_Query
		'url_patt'   => '', // оптимизация ссылки на коммент. Пр: '%s?all_comments#comment-%d' плейсхолдеры будут заменены на $post->guid и $comment->comment_ID
	);

	$args = wp_parse_args( $args, $def );
	extract( $args );

	$AND = '';


	if( $term ){
		$cats = explode(',', $term );
		$cats = array_map('intval', $cats );

		$CAT_IN = ( $cats[ key($cats) ] > 0 );

		$cats = array_map('absint', $cats );
		$AND_term_id = 'AND term_id IN ('. implode(',', $cats) .')';

		$posts_sql = "SELECT object_id FROM $wpdb->term_relationships rel LEFT JOIN $wpdb->term_taxonomy tax ON (rel.term_taxonomy_id = tax.term_taxonomy_id) WHERE 1 $AND_term_id ";

		$AND .= ' AND comment_post_ID '. ($CAT_IN ? 'IN' : 'NOT IN') .' ('. $posts_sql .')';
	}

	// ЮЗЕРЫ
	if( $user ){
		$users = explode(',', $user );
		$users = array_map('intval', $users );

		$USER_IN = ( $users[ key($users) ] > 0 );

		$users = array_map('absint', $users );

		$AND .= ' AND user_id '. ($USER_IN ? 'IN' : 'NOT IN') .' ('. implode(',', $users) .')';
	}

	// WP_Meta_Query
	$META_JOIN = '';
	if( $meta_query || $meta_key || $meta_value ){
		$mq = new WP_Meta_Query( $args );
		$mq->parse_query_vars( $args );
		if( $mq->queries ){
			$mq_sql = $mq->get_sql('comment', $wpdb->comments, 'comment_ID' );
			$META_JOIN = $mq_sql['join'];
			$AND .= $mq_sql['where'];
		}
	}

	$sql = $wpdb->prepare("SELECT * FROM $wpdb->comments LEFT JOIN $wpdb->posts ON (ID = comment_post_ID ) $META_JOIN
	WHERE comment_approved = '1' AND comment_type = %s $AND ORDER BY comment_date DESC LIMIT %d", $comm_type, $limit );

	//die( $sql );
	$results = $wpdb->get_results( $sql );

	if( ! $results ) return 'Комментариев нет.';

	// HTML
	$out = $grava = '';
	foreach ( $results as $comm ){
		if( $gravatar )
			$grava = get_avatar( $comm->comment_author_email, $gravatar );

		$comtext = strip_tags( $comm->comment_content );
		$com_url = $url_patt ? sprintf( $url_patt, $comm->guid, $comm->comment_ID ) : get_comment_link( $comm->comment_ID );

		$leight = (int) mb_strlen( $comtext );
		if( $leight > $ex )
			$comtext = mb_substr( $comtext, 0, $ex ) .' …';

		$out .= '<article>
          <p class="quote-phrase"><span class="quote-marks">"</span> '. $comtext .'<span class="quote-marks">"</span> </p><br>

          <p class="quote-author">'. strip_tags( $comm->comment_author ) .'</p>
</article>';
	}

	if( $echo )
		return print $out;
	return $out;
}

add_shortcode( 'kama_recent', 'kama_recent_shortcode1' );
function kama_recent_shortcode1( $atts ) {
    ob_start();?>
 <?php kama_recent_comments('gravatar=50'); ?>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    
}
add_shortcode( 'kama_recent_big', 'kama_recent_shortcode2' );
function kama_recent_shortcode2( $atts ) {
    ob_start();?>
<style>input{display:none}</style>
	<article id=slider>
		<input checked type=radio name=slider id=slide1 />
		<input type=radio name=slider id=slide2 />
		<input type=radio name=slider id=slide3 />
		<input type=radio name=slider id=slide4 />
		<input type=radio name=slider id=slide5 />
		<input type=radio name=slider id=slide6 />
		<input type=radio name=slider id=slide7 />
		<input type=radio name=slider id=slide8 />
		<input type=radio name=slider id=slide9 />

		<div id=slides>
		
			<div id=overflow>
			
				<div class=inner>
				
					<?php echo do_shortcode( '[kama_recent]' ); ?><!--НЕ ТРОГАТЬ--!>
					
								</div> 
				
			</div>
		
		</div>
		<div id=controls>

			<label for=slide1></label>
			<label for=slide2></label>
			<label for=slide3></label>
			<label for=slide4></label>
			<label for=slide5></label>
			<label for=slide6></label>
			<label for=slide7></label>
			<label for=slide8></label>
			<label for=slide9></label>

		
		</div> <!-- #controls -->
		<div id=active>

			<label for=slide1></label>
			<label for=slide2></label>
			<label for=slide3></label>
			<label for=slide4></label>
			<label for=slide5></label>
			<label for=slide6></label>
			<label for=slide7></label>
			<label for=slide8></label>
			<label for=slide9></label>

		</div> <!-- #active --></article></div>
                                   

    
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    
}

/*
	*	Custom post
	*	---------------------------------------------------------------------
	*
	*	---------------------------------------------------------------------
	*/


if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 150, 150 );
}

if ( function_exists( 'add_image_size' ) ) {
	
	add_image_size( 'hot_hotel-thumb', 300, 200, false );
}
register_sidebar( array(
	'name' =>'hot_tour_sidebar',
	'id' => 'secondary-widget-area',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );


add_shortcode( 'list-posts-basic', 'hot_tour_listing_shortcode1' );
function hot_tour_listing_shortcode1( $atts ) {
    ob_start();
    $loop = new WP_Query( array(
        'post_type' => 'hot_tour',
        'posts_per_page' => 8,
        'orderby' => 'rand',
	'order'   => 'DESC',
    ) );
     if ( $loop->have_posts() ) :
         while ( $loop->have_posts() ) : $loop->the_post(); ?>
 <?php get_template_part('loop-hot_tour'); ?>
     <?php endwhile; ?>
     <?php endif; wp_reset_postdata(); ?>
<style>
.up_line-hot_hotel{position: relative;top: 35px;background: rgba(10, 10, 10, 0.57);}
 </style>


    <?php $myvariable = ob_get_clean();
    return $myvariable;
    
}
if ( ! function_exists( 'hot_tour_cp' ) ) {


    function hot_tour_cp() {

        $labels = array(
            'name'                => _x( 'Горящие туры', 'Post Type General Name', 'hot_tour' ),
            'singular_name'       => _x( 'Горящие туры', 'Post Type Singular Name', 'hot_tour' ),
            'menu_name'           => __( 'Горящие туры', 'hot_tour' ),
            'parent_item_colon'   => __( 'Родительский:', 'hot_tourk' ),
            'all_items'           => __( 'Все записи', 'hot_tour' ),
            'view_item'           => __( 'Просмотреть', 'hot_tour' ),
            'add_new_item'        => __( 'Добавить новую запись в Горящие туры', 'hot_tour' ),
            'add_new'             => __( 'Добавить новую', 'hot_tour' ),
            'edit_item'           => __( 'Редактировать запись', 'hot_tour' ),
            'update_item'         => __( 'Обновить запись', 'hot_tour' ),
            'search_items'        => __( 'Найти запись', 'hot_tour' ),
            'not_found'           => __( 'Не найдено', 'hot_tour' ),
            'not_found_in_trash'  => __( 'Не найдено в корзине', 'hot_tour' ),
        );
        $args = array(
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail'),
            'taxonomies'          => array( 'hot_tour_tax' ),
            'public'              => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-book',
            
        );
        register_post_type( 'hot_tour', $args );

    }

    add_action( 'init', 'hot_tour_cp', 0 );
}

if ( ! function_exists( 'hot_tour_tax' ) ) {

// Опишем требуемый функционал
    function hot_tour_tax() {

        $labels = array(
            'name'                       => _x( 'Категории Горящие туры', 'Taxonomy General Name', 'hot_tour' ),
            'singular_name'              => _x( 'Категория Горящие туры', 'Taxonomy Singular Name', 'hot_tour' ),
            'menu_name'                  => __( 'Категории', 'hot_tour' ),
            'all_items'                  => __( 'Категории', 'hot_tour' ),
            'parent_item'                => __( 'Родительская категория Горящие туры', 'hot_tour' ),
            'parent_item_colon'          => __( 'Родительская категория Горящие туры:', 'hot_tour' ),
            'new_item_name'              => __( 'Новая категория', 'hot_tour' ),
            'add_new_item'               => __( 'Добавить новую категорию', 'hot_tour' ),
            'edit_item'                  => __( 'Редактировать категорию', 'hot_tour' ),
            'update_item'                => __( 'Обновить категорию', 'hot_tour' ),
            'search_items'               => __( 'Найти', 'hot_tour' ),
            'add_or_remove_items'        => __( 'Добавить или удалить категорию', 'hot_tour' ),
            'choose_from_most_used'      => __( 'Поиск среди популярных', 'hot_tour' ),
            'not_found'                  => __( 'Не найдено', 'hot_tour' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
        );
        register_taxonomy( 'hot_tour_tax', array( 'hot_tour' ), $args );

    }

    add_action( 'init', 'hot_tour_tax', 0 );

}

function hot_tour_meta_box() {
    add_meta_box(
        'hot_tour_meta_box',
        'Горящие туры - дополнительная информация',
        'show_my_hot_tour_metabox',
        'hot_tour',
        'normal',
        'high');
}
add_action('add_meta_boxes', 'hot_tour_meta_box');

$hot_tour_meta_fields = array(
    array(
        'label' => 'Звезды',
        'desc'  => 'Выберите тип.',
        'id'    => 'select_star',
        'type'  => 'select',
        'options' => array (
            'one' => array (
                'label' => 'Одна',
                'value' => 'Одна'
            ),
            'two' => array (
                'label' => 'Две',
                'value' => 'Две'
            ),
            'three' => array (
                'label' => 'Три',
                'value' => 'Три'
            ),
            'four' => array (
                'label' => 'Четыре',
                'value' => 'Четыре'
            ),
            'five' => array (
                'label' => 'Пять',
                'value' => 'Пять'
            ),
            'six' => array (
                'label' => 'ноль',
                'value' => 'ноль'
            )
        )
    ),

    array(
        'label' => 'Цена',
        'desc'  => '',
        'id'    => 'order',
        'type'  => 'text'
    ),
    array(
        'label' => 'Количество человек',
        'desc'  => ' ',
        'id'    => 'select_voodoo_people',
        'type'  => 'select',
        'options' => array (
            'one' => array (
                'label' => '1',
                'value' => '1'
            ),
            'two' => array (
                'label' => '2',
                'value' => '2'
            ),
            'three' => array (
                'label' => '2+1',
                'value' => '2+1'
            ),
            'four' => array (
                'label' => '2+2',
                'value' => '2+2'
            ),
            'five' => array (
                'label' => '3+1',
                'value' => '3+1'
            ),
            'six' => array (
                'label' => '3+2',
                'value' => '3+2'
            ),
            'seven' => array (
                'label' => '4+1',
                'value' => '4+1'
            ),
            'eight' => array (
                'label' => '4+2',
                'value' => '4+2'
            )
        )
    ),
array(
        'label' => 'Тип питания',
        'desc'  => ' ',
        'id'    => 'select_pitnie',
        'type'  => 'select',
        'options' => array (
            'one' => array (
                'label' => 'All-inc',
                'value' => 'all-inc'
            ),
            'two' => array (
                'label' => 'hb',
                'value' => 'hb'
            ),
            'three' => array (
                'label' => 'bb',
                'value' => 'bb'
            ),
            'four' => array (
                'label' => 'fb',
                'value' => 'fb'

            ),
            'five' => array (
                'label' => 'bo',
                'value' => 'bo'

            )
        )
    ),
    array(
        'label' => 'Характеристика номера',
        'desc'  => ' ',
        'id'    => 'select_xata',
        'type'  => 'select',
        'options' => array (
            'one' => array (
                'label' => 'app',
                'value' => 'app'
            ),
            'two' => array (
                'label' => 'dbl',
                'value' => 'dbl'
            ),
            'three' => array (
                'label' => 'qdbl',
                'value' => 'qdbl'
            ),
            'four' => array (
                'label' => 'sgl',
                'value' => 'sgl'
            ),
            'five' => array (
                'label' => 'studio',
                'value' => 'studio'
            ),
            'six' => array (
                'label' => 'trpl',
                'value' => 'trpl'
            ),
            'seven' => array (
                'label' => 'none',
                'value' => 'none'
            )
        )
    ),
    array(
        'label' => 'Трансфер',
        'desc'  => ' ',
        'id'    => 'select_ride',
        'type'  => 'select',
        'options' => array (
            'one' => array (
                'label' => 'Авиа',
                'value' => 'Авиа'
            ),
            'two' => array (
                'label' => 'Автобус',
                'value' => 'Автобус'
            ),
            'tree' => array (
                'label' => 'без_трансфера',
                'value' => 'без_трансфера'
            )
        )
    ),
    array(
        'label' => 'Количество ночей',
        'desc'  => ' ',
        'id'    => 'select_night',
        'type'  => 'select',
        'options' => array (
            'one' => array (
                'label' => '7',
                'value' => '7'
            ),
            'two' => array (
                'label' => '10',
                'value' => '10'
            ),
            'three' => array (
                'label' => '14',
                'value' => '14'
            ),
            'four' => array (
                'label' => '1',
                'value' => '1'
            ),
            'five' => array (
                'label' => '3',
                'value' => '3'
            ),
            'six' => array (
                'label' => '4',
                'value' => '4'
            ),
	    
            'seven' => array (
		'label' => '2',
                'value' => '2'
	    ),
	    
            'eight' => array (
		'label' => '5',
                'value' => '5'
	    ),
		
	    'nine' => array (
		'label' => '6',
                'value' => '6'
	    ),

            'ten' => array (
		'label' => '8',
                'value' => '8'
	    ),
	    'eleven' => array (
		'label' => '9',
                'value' => '9'
	    ),
	
            'twelve' => array (
		'label' => '11',
                'value' => '11'
	    ),
	    'threeteen' => array (
		'label' => '12',
                'value' => '12'
	    ),
            'fourteen' => array (
		'label' => '13',
                'value' => '13'
	    ),
            'fiveteen' => array (
		'label' => '15',
                'value' => '15'
	    )
        )
    ),
array(  
        'label' => 'Дата 1',  
        'desc'  => 'Введите дату в формате число/месяц - число/месяц',  
        'id'    => 'date1',
        'type'  => 'text'
    ), 
array(  
        'label' => 'Дата 2',  
        'desc'  => 'Введите дату в формате число/месяц - число/месяц',  
        'id'    => 'date2',
        'type'  => 'text'
    ),
array(  
        'label' => 'Дата 3',  
        'desc'  => 'Введите дату в формате число/месяц - число/месяц',  
        'id'    => 'date3',
        'type'  => 'text'
    ),
array(  
        'label' => 'Дата 4',  
        'desc'  => 'Введите дату в формате число/месяц - число/месяц',  
        'id'    => 'date4',
        'type'  => 'text'
    ),
  
    array(  
        'label' => 'включено в стоимость',  
        'desc'  => 'Что входит в стоимость.',  
        'id'    => 'in_price', 
        'type'  => 'textarea'  
    ),  
  
    array(  
        'label' => 'Оплата отдельно',  
        'desc'  => 'Что не входит в стоимость',  
        'id'    => 'out_price', 
        'type'  => 'textarea' 
    ),  
 array(
     'name'  => 'Image',
     'label' => 'слайд1',
     'desc'  => 'Изображение размером 600х270',
     'id'    => 'image1',
     'type'  => 'image'
 ),
 array(
     'name'  => 'Image',
     'label' => 'слайд2',
     'desc'  => 'Изображение размером 600х270',
     'id'    => 'image2',
     'type'  => 'image'
 ),
 array(
     'name'  => 'Image',
     'label' => 'слайд3',
     'desc'  => 'Изображение размером 600х270',
     'id'    => 'image3',
     'type'  => 'image'
 ),
 array(
     'name'  => 'Image',
     'label' => 'слайд4',
     'desc'  => 'Изображение размером 600х270',
     'id'    => 'image4',
     'type'  => 'image'
 ),
 array(
     'name'  => 'Image',
     'label' => 'слайд5',
     'desc'  => 'Изображение размером 600х270',
     'id'    => 'image5',
     'type'  => 'image'
 ),
 array(
     'name'  => 'Image',
     'label' => 'слайд6',
     'desc'  => 'Изображение размером 600х270',
     'id'    => 'image6',
     'type'  => 'image'
 ),

);

function show_my_hot_tour_metabox() {
global $hot_tour_meta_fields;
global $post;

echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';


    echo '<table class="form-table">';
    foreach ($hot_tour_meta_fields as $field) {

        $meta = get_post_meta($post->ID, $field['id'], true);

        echo '<tr>
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td>';
                switch($field['type']) {
                    // Текстовое поле
 case 'text':
     echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
         <br /><span class="description">'.$field['desc'].'</span>';
 break;
case 'textarea':  
    echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea> 
        <br /><span class="description">'.$field['desc'].'</span>';  
break;
case 'image':
    $image = get_template_directory_uri().'/images/image.png';
    echo '<span class="custom_default_image" style="display:none">'.$image.'</span>';
    if ($meta) { $image = wp_get_attachment_image_src($meta, 'medium'); $image = $image[0]; }
    echo    '<input name="'.$field['id'].'" type="hidden" class="custom_upload_image" value="'.$meta.'" />
                <img src="'.$image.'" class="custom_preview_image" alt="" /><br />
                    <input class="custom_upload_image_button button" type="button" value="Выберите изображение" />
                    <small> <a href="#" class="custom_clear_image_button">Убрать изображение</a></small>
                    <br clear="all" /><span class="description">'.$field['desc'].'</span>';
break;
 case 'select':
     echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
     foreach ($field['options'] as $option) {
         echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';
     }
     echo '</select><br /><span class="description">'.$field['desc'].'</span>';
 break;
                }
        echo '</td></tr>';
    }
    echo '</table>';
}


function save_my_hot_tour_meta_fields($post_id) {
    global $hot_tour_meta_fields;  // Массив с нашими полями

    // проверяем наш проверочный код
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
        return $post_id;
    // Проверяем авто-сохранение
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // Проверяем права доступа
    if ('hot_tour' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
    }


    foreach ($hot_tour_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
add_action('save_post', 'save_my_hot_tour_meta_fields');

if(is_admin()) {
    wp_enqueue_script('jquery-ui-datepicker','','','',true);
    wp_enqueue_script('imagefield', get_template_directory_uri().'/imagefield.js');
    wp_enqueue_style('jquery-ui-custom', get_template_directory_uri().'/jquery-ui.css');
}



	/*	
	*	Kodeforest Function File
	*	---------------------------------------------------------------------
	*	This file include all of important function and features of the theme
	*	---------------------------------------------------------------------
	*/
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function devise_widgets_init() {
   register_sidebar( array(
      'name' => __( 'Main Sidebar', 'devise' ),
        'id' => 'sidebar-1',
        'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'devise' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<span class="widget-title">',
        'after_title' => '</span>',
    ) );
    register_sidebar( array(
        'name' =>__( 'Front page sidebar', 'devise'),
        'id' => 'sidebar-2',
        'description' => __( 'Appears on the static front page template', 'devise' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<span class="widget-title">',
        'after_title' => '</span>',
    ) );

    }

 

add_action( 'widgets_init', 'devise_widgets_init' );



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//Define Theme Name
	define('WP_THEME_KEY', 'kodeforest');
	define('KODE_FULL_NAME', 'KodeTravel');
	define('KODE_SMALL_TITLE', 'kodetravel');
	define('KODE_SLUG', 'travel');	
	
	//WP Customizer
	include_once('framework/include/kode_meta/wp_customizer.php');
	
	//Responsive Menu
	include_once( 'framework/include/kode_front_func/kf_responsive_menu.php');
	
	// Framework
	include_once( 'framework/kf_framework.php' );
	include_once( 'framework/script-handler.php' );
	include_once( 'framework/include/kode_front_func/kode_header.php' );
	
	
	//Custom Widgets
	include_once( 'framework/include/custom_widgets/recent-comment.php');
	include_once( 'framework/include/custom_widgets/recent-post-widget.php');
	include_once( 'framework/include/custom_widgets/recent-package-widget.php');
	include_once( 'framework/include/custom_widgets/popular-post-widget.php');
	include_once( 'framework/include/custom_widgets/flickr-widget.php');
	include_once( 'framework/include/custom_widgets/contact-widget.php');
	include_once( 'framework/include/custom_widgets/tab-widget.php');
	include_once( 'framework/include/custom_widgets/travel-widget.php');
	
	
	// plugin support	
	include_once( 'framework/include/tgm_library/kode-activation.php');

	global $theme_option;
	//Load Fonts
	if( empty($theme_option['upload-font']) ){ $theme_option['upload-font'] = ''; }
	$kode_font_controller = new kode_font_loader( json_decode($theme_option['upload-font'], true) );	
	
	//Deregister the WooCommerce Style File
	add_action('wp_enqueue_scripts','kode_deregister_scripts');
	function kode_deregister_scripts(){
		// WooCommerce Style
		wp_deregister_style('woocommerce-general');
	}
	
	add_theme_support( 'woocommerce' );
	
	// add action to enqueue woocommerce style
	add_filter('kode_enqueue_scripts', 'kode_regiser_woo_style');
	if( !function_exists('kode_regiser_woo_style') ){
		function kode_regiser_woo_style($array){	
			global $woocommerce;
			if( !empty($woocommerce) ){
				$array['style']['kode-woo-style'] = KODE_PATH . '/framework/assets/default/css/kode-woocommerce.css';
			}
			return $array;
		}
	}
	
	//Title Hook
	function kode_wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() ) {
			return $title;
		}

		// Add the site name.
		$title .= get_bloginfo( 'name' );

		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title = "$title $sep $site_description";
		}

		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 ) {
			$title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'kodeforest' ), max( $paged, $page ) );
		}

		return $title;
	}
	//add_filter( 'wp_title', 'kode_wp_title', 10, 2 );
	
	// a comment callback function to create comment list
	if ( !function_exists('kode_comment_list') ){
		function kode_comment_list( $comment, $args, $depth ){
			$GLOBALS['comment'] = $comment;
			switch ( $comment->comment_type ){
				case 'pingback' :
				case 'trackback' :
				?>	
				<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
					<p><?php _e( 'Pingback :', 'KodeForest' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'KodeForest' ), '<span class="edit-link">', '</span>' ); ?></p>
				<?php break; ?>

				<?php default : global $post; ?>
				<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
					<div class="thumblist">
						<figure><?php echo get_avatar( $comment, 60 ); ?></figure>
						<div class="text">
							<?php echo get_comment_author_link(); ?>
							<time datetime="<?php echo esc_attr(get_comment_time('c')); ?>"><?php echo esc_attr(get_comment_date()) . ' ' . esc_attr__('at', 'KodeForest') . ' ' . esc_attr(get_comment_time()); ?></time>
							<?php comment_text(); ?>
							<?php edit_comment_link( esc_attr__( 'Edit', 'KodeForest' ), '<p class="edit-link">', '</p>' ); ?>
										<?php if( '0' == $comment->comment_approved ){ ?>
									<p class="comment-awaiting-moderation"><?php echo esc_attr__( 'Your comment is awaiting moderation.', 'KodeForest' ); ?></p>
								<?php } ?>
							<?php comment_reply_link( array_merge($args, array('before' => ' ', 'reply_text' => esc_attr__('Reply', 'KodeForest'), 'depth' => $depth, 'max_depth' => $args['max_depth'])) ); ?>
						</div>
					</div>
				<?php
				break;
			}
		}
	}	
	
	
	add_filter( 'gettext', 'upload_wp_text_convert', 20, 3 );
function upload_wp_text_convert( $translated_text, $text, $domain ) {
switch ( $translated_text ) {
case 'Товары' :
$translated_text = __( 'Туры', 'woocommerce' );
break;
}
return $translated_text;
}






remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

remove_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );

remove_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );





class Kama_Contents {
	var $margin;    // отступ слева у подразделов в пикселях. 40
	var $rep_tags;  // теги по умолчанию по котором будет строиться содеражние. Порядок имеет значение. array('h2','h3','h4')
	var $to_menu;   // ссылка на возврат к содержанию. '' - убрать ссылку
	var $title;     // Заголовок. '' - убрать заголовок 
	var $css;       // css стили. '' - убрать стили
	var $min_found; // минимальное количество найденных тегов, чтобы содержание выводилось.
	var $min_length; // минимальная длина (символов) текста, чтобы содержание выводилось.
	
	var $temp;
	
	protected static $instance;
	
	function __construct( $args ){
		// параметры по умолчанию
		$def = array(
			'margin'    => 10,
			'rep_tags'  => array('h2','h3','h4'),
			'to_menu'   => 'к содержанию ↑',
			'title'     => '',
			'css'       => '.kc_gotop{ display:block; text-align:right; } .kc_title{ font-style:italic; padding:10px 0 10px; }',
			'min_found' => 2,
			'min_length' => 4000,
		);
		// установим свойства
		foreach( array_merge( $def, $args ) as $k => $v ) $this->$k = $v;
	}
	
	static function init( $args = array() ){
		is_null( self::$instance ) AND self::$instance = new self( $args );
		return self::$instance;
	}
	
	/**
	 * Обрабатывает текст, превращает шоткод в нем в содержание.
	 * @param (string) $content текст, в котором есть шоткод.
	 * @return Обработанный текст с содержанием, если в нем есть шоткод.
	 */
	function shortcode( $content ){		
		// получаем данные о содержании
		if( ! preg_match('~^(.*)\]*)\](.*)$~s', $content, $m ) )
			return $content;
			
		if( $tags = trim( $m[2] ) )
			$tags = array_map('trim', explode(' ', $tags ) );

		$contents = $this->make_contents( $m[3], $tags );
		
		return $m[1] . $contents . $m[3];
	}
	
	/**
	 * Заменяет заголовки в переданном тексте (по ссылке), создает и возвращает содержание.
	 * @param (string) $content текст на основе которого нужно создать содержание.
	 * @param (array)  $tags    массив тегов, которые искать в переданном тексте.
	 * @return                  html код содержания.
	 */
	function make_contents( & $content, $tags = array() ){
		if( mb_strlen( $content ) < $this->min_length ) return; // выходим если текст короткий
		
		// переменные
		$this->temp    = new stdClass;
		$this->temp->i = 0;
		
		if( ! $tags ) $tags = $this->rep_tags;
		
		$this->temp->tag_level = array_flip( $tags ); // перевернем

		// заменяем все заголовки и собираем содержание в $this->temp->contents
		$h_patt = implode('|', $tags );
		$_content = preg_replace_callback('@<('. $h_patt .')([^>]*)>(.*?)</(?:'. $h_patt .')>@is', array( $this, 'make_contents_callback'), $content, -1, $count );
		
		if( ! $count || $count < $this->min_found ) return;
		
		$content = $_content; // опять работаем с важной $content

		// html содержания
		$contents = '';
		if( $this->title )
			$contents .= '<div class="kc_title" id="tm">'. $this->title .'</div>'. "\n";

		$contents .= '<ol class="contents"'. (!$this->title ? ' id="tm"' : '') .'>'. "\n" . 
			implode('', $this->temp->contents ) .
		'</ol>'."\n";
		
		$contents = '<div class="contents-wrap">'. $contents .'</div>';

		$this->temp = new stdClass; // чистим
		
		static $css;
		$css = ( ! $css && $this->css ) ? '<style>'. $this->css .'</style>' : '';
		
		return $css . $contents;
	}
	
	## callback функция для замены и сбора содержания
	protected function make_contents_callback( $match ){	
		$tag   = $match[1];
		$attrs = $match[2];
		$txt   = $match[3];
		$anchor = $this->transl4url( $txt );
		
		if( 0 < $level = $this->temp->tag_level[ $tag ] )
			$sub = ( $this->margin ? ' style=""' : '') . ' class="sub sub_'. $level .'"';
		else 
			$sub = ' class="top"';

		// собираем содержание
		$this->temp->contents[] = "\t". '<li'. $sub .'><a href="#'. $anchor .'">'. $txt .'</a></li>'. "\n";
		
		// заменяем
		$out = '';
		if( $this->to_menu )
			$out .= $this->temp->i == 1 ? '' : '';
		$out .= '<a  name="'. $anchor .'"></a>'."\n".'<a  href="#tm"  title="вернуться к содержанию"><'. $tag . $attrs .'>'. $txt .' ↑</'. $tag .'></a>';

		return $out;
	}
	
	## транслитерация для УРЛ
	function transl4url( $str ){
		$conv = array(
			'а' => 'a',  'б' => 'b',  'в' => 'v',  'г' => 'g',  'д' => 'd',  'е' => 'e',  'ё' => 'e',  'ж' => 'zh',  'з' => 'z',
			'и' => 'i',  'й' => 'y',  'к' => 'k',  'л' => 'l',  'м' => 'm',  'н' => 'n',  'о' => 'o',  'п' => 'p',  'р' => 'r',
			'с' => 's',  'т' => 't',  'у' => 'u',  'ф' => 'f',  'х' => 'h',  'ц' => 'c',  'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
			'ы' => 'y',  'э' => 'e',  'ю' => 'yu',  'я' => 'ya', 'ь' => 'l', 'ъ' => 'l', 'і' => 'l',

			'А' => 'A',  'Б' => 'B',  'В' => 'V',  'Г' => 'G',  'Д' => 'D',  'Е' => 'E',  'Ё' => 'E',  'Ж' => 'Zh',  'З' => 'Z',
			'И' => 'I',  'Й' => 'Y',  'К' => 'K',  'Л' => 'L',  'М' => 'M',  'Н' => 'N',  'О' => 'O',  'П' => 'P',  'Р' => 'R',
			'С' => 'S',  'Т' => 'T',  'У' => 'U',  'Ф' => 'F',  'Х' => 'H',  'Ц' => 'C',  'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
			'Ы' => 'Y',  'Э' => 'E',  'Ю' => 'Yu',  'Я' => 'Ya', 'Ь' => 'l', 'Ъ' => 'l', 'І' => 'l',
		);
		
		$str = strtr( $str, $conv );
		$str = strtolower( $str );
		$str = preg_replace('~[^-a-z0-9_]+~u', '-', $str ); // все ненужное на "-"
		$str = trim( $str, "-"); // начальные и конечные '-'
		
		return $str;
	}
}






## Вывод содержания автоматом вверху поста, с предварительными проверками
add_filter('the_content', 'smart_contents_on_top' );
function smart_contents_on_top( $content ){
	global $post;
	
	// для всех постов и произвольного типа записи
	if( is_singular() && ($post->post_type == 'custom' || $post->post_type == 'post') && false === strpos( $post->post_content, '[conten') ){
		$tags = array('h2','h3','h4');
		$args['min_found'] = 3;
		$contents = Kama_Contents::init( $args )->make_contents( $content, $tags );
		$content = $contents . $content;		
	}
	
	return $content;
}
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );


## чистим ссылки от лишник класов в меню и добавляем класс для активной
add_filter('nav_menu_css_class','remove_nav_menu_classes');
function remove_nav_menu_classes($classes) {
if ( in_array("current-menu-item", $classes ) ) {
unset( $classes );
$classes[0]= 'cikl001';
} else {
$classes = array();
}
return $classes;
}
function wp_nav_menu_remove_attributes( $menu ){
return $menu = preg_replace('/class=""/iU', '', $menu );
}
add_filter( 'wp_nav_menu', 'wp_nav_menu_remove_attributes' );





add_filter( 'woocommerce_product_categories_widget_args', 'woo_product_cat_widget_args' );
function woo_product_cat_widget_args( $cat_args ) {
    $cat_args['exclude'] = array(147);
    return $cat_args;
}
