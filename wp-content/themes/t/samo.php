<?php
/*
Template Name: samo
*/ ?>




<style>


	.content{display:none;}

	.wrapper{
	width: 100%;
	display: block;
	font-family:Open Sans;
}




.content1{
	width: 60%;
	margin: auto;
}

.navigation{
	width: 100%;
	margin-bottom: 20px;
margin-top:20px;
}

button, .callback-btn-style{
	padding: 5px 10px;
	color: #79add8;
	border: 1px solid;
	border-radius: 4px;
	background-color: white;
	float: right;
	font-size:13px;
	margin-right:10px;
}

.callback-btn-style{
	padding: 3.5px 10px;
}

button a{
	text-decoration: none;
	color: #79add8;
}


.return{
	float: left;
}

.navigation:after{
	content: "";
	clear: both;
	display: block;
}

.hotel{
	width: 100%;
	display: flex;
	align-items:flex-start;
	justify-content:space-between;
	margin-bottom: 10px;
}


.hotel_item{
	width: 73%;
	border:1px solid grey;
	border-radius: 3px;
	margin-right: 3%;
}

.hotel_photo{
	width: 100%;
}


.hotel_header{
	background-color: #f3f3f3;
	padding: 10px 10px 10px 10px;
	display: flex;
	align-items:center;
	justify-content:space-between;
}


.hotel_header span{
	font-weight: 600;
	display: flex;
	align-items:center;
}

.hotel_header p{
	margin-right: 2%;
	width: 40%;
	display: inline-block;
}


.hotel_header img{
	margin-left:7px;
}


.read{
	background-color: #f49320;
	display: flex;
	padding: 0px 10px 0px 10px;
	align-items:center;
	border:1px solid grey;
	border-radius: 4px;
	color: black;
}


.photo{
	width: 100%;
	height:545px;
}

.photo img{
	width: 100%;
	height: 100%;
}

.images{
	padding: 10px 10px 10px 10px;
	align-items:center;
	border:1px solid #bababa;
	border-radius:1px;
	margin-bottom:20px;
}

.fa-angle-left{
	float:left;
	padding-top:10px;
}

.fa-angle-right{
	float:right;
	padding-top:12px;
}


.images img{
	width:9.9%;
	height:52px;
	margin: 0px 10px; 
}

.offer {
	background-color: #f3f3f3;
	border:1px solid grey;
	border-radius: 4px;
	margin-bottom:20px;
}

.banner{

	height:166px;
}


.offer_item{
	padding: 10px;
}


.offers_img{
	display: flex;
	align-items:center;
	justify-content: flex-start;
	margin:10px 0px 10px 0px;
	font-size: 13px;
}




.board{
	margin-left:3px;
	margin-right: 19px;
}

.nights{
	margin-right: 15px;
}

.bus{
	margin-right: 10px;
}

.persn{
	margin-right: 13px;
}

.app{
	margin-right: 10px;
}

.arrow{
	    margin-right: 12px;
}


.hotel_numbers{

	background-color: #ff8a00;
	padding: 5px 15px;
	text-align: right;
}

.error{
	width: 200px;
	font-size:14px;
	background-color: #ff5824;
	border-radius: 5px;
	color: white;
	padding: 3px;
	display: flex;
	align-items:center;
	justify-content:center;
	margin-bottom: 10px;
}



.error img{
	margin-right:5px;
}

.sale{
	display: flex;
	align-items:center;
	justify-content:space-between;
	padding-bottom: 10px;
	margin-bottom: 10px;
}

.hotel_numbers p{
	margin-left:22px;
	width:180px;
	font-size:13px;
	display:flex;
	justify-content:space-between;
	font-weight:600;
}

.hotel_numbers p > span{
	text-align:left;
}


.sale_offer{
		display: flex;
	align-items:center;
}

.money{
	text-decoration: line-through;
}

.i{
	text-align: left;
}

.info_of_number{
	border: 1px solid grey;
	margin-bottom: 50px;

}

.number_title{
	padding:5px 0px;
	
}

.number_title p{
	padding-left: 10px;
	font-size: 20px;
	display: flex;
	align-items:center;
}

.number_title img{
	margin-right: 10px;
}

.kol_persn{
	display: flex;
	justify-content:center;
	background-color: #f3f3f3;
	border-top: 1px solid grey;
	padding: 10px;
}

.kol_persn_item{
	text-align: center;
	margin: 0px 10px 0px 10px;
	padding: 15px 0px 15px 0px;
}

.kol_persn_item input{
	width: 100px;
	border-radius: 4px;
	height: 24px;
	border: 1px solid grey;
	margin-top: 10px;
}

.info_text
{
	background-color: #f8c88f;
	display: flex;
	justify-content:space-between;
}

.info_text img{
	margin: 0px 10px 0px 10px;
}

.select{
	width: 24%;
}

.select select{
	padding: 5px;
	font-size: 17px;
}

.left_part{
	padding: 10px 0px 10px 0px;
	display: flex;
}

.right_part{
	background-color: #ff8b03;
	padding: 10px;
	display: flex;
	flex-wrap:wrap;
	align-items:center;
	justify-content:center;
	font-size: 20px;
}

.right_part p{
	text-align: center;
}

.hotel_text, .room_text, .uslygi_text, .hill_text{
	background-color: #f3f3f3;
	border-top: 1px solid grey;
	padding: 10px;
}

.hotel_text h2{
	margin: 10px 0px 10px 0px;
}


.what_in_hotel{
	margin: 10px 0px 50px 0px;
}

.what_in_hotel ul{
	display: inline-block;
	text-decoration: none;
	list-style: none;
}
.what_in_hotel li{
	padding: 2px 0px 2px 0px;
}

.hotel_img img{
	width: 100%;
	height: auto;
	display: block;
	border-top: 1px solid grey;
}



.order_button{
	font-size: 30px;
	padding:3px 20px;
	background-color:#85c800;
	color:white;
	border:none;
	width:208px;
	margin-top:20px;
	border-radius:5px;
	box-shadow: 1px -8px 5px -2px rgba(0,0,0,0.27);
}

.content{
	width:1024px;
}

.samo_container{
	display:none;
}

.uslygi_text{
	display:flex;
	flex-wrap:wrap;
	
}

.pool, .razvlech, .opisanie, .sport, .dopuslygi, .beach, .place{
	width:23%;
	margin:10px 1%;
	display:none;
}

.pool li, .razvlech li, .opisanie li, .sport li, .dopuslygi li, .beach li, .place li{
	list-style:none;
}

.header_img_text{
	display:flex;
	align-items:center;
}

.header_img_text img{
	margin-right:6px;
}

iframe{
	width:99.9%;
}

.data_nights{
	margin-left:5px;
}

.hill{
	display:none;
}


.room{
	display:none;
}

.kurort_link{
	display:flex;
	align-items:center;
	color:black;
}


 #form{
	position:fixed;
	left:100px;
	top:100px;
	background-color:red;
	z-index:111111;
}


.fancybox_modal{
	position: fixed;
	width: 604px;
	top:22%;
	left: 33%;
	text-align: center;
	background-color: white;
	z-index:11111;
	display:none;
	border-radius:5px;
}


.fancybox_overlay{
	position: fixed;
	top:0;
	left:0;
	width: 100%;
	height: 100%;
	z-index:1111;
	background-color: rgba(0,0,0,0.5);
}


.wpcf7-submit{
	font-size:20px;
	padding:5px 20px;
	color: white;
	border: 1px solid white;
	background-color: #ff8b00;
}


.screen-reader-response{
	color:white
}

.wpcf7-mail-sent-ok{
	display:none;
}

.form_header{

	background-color:white;
	width:100%;
	border-radius: 5px 5px 0px 0px;
	text-align:left;
}

.form_header p{
	padding:10px;
	color:#ff8b00;
	font-weight:bold;
}

.form_new{
	position:relative;
	background-color:#ff8b00;
	height:250px;
	border-radius: 0px 0px 5px 5px;
}

form p{
	text-align:left;
	color:white;
}

.info_modal{
	display:flex;
	align-items:center;
	    padding: 10px;
    justify-content: space-between;
}

.update{
	margin:0px;
	font-weight:600;
}

.name_star{
	display:flex;
	align-items:center;
}

.call_to_us{
	padiing:0px 10px;
	border-top:1px dotted;
	color:grey;
}

.new_price{
	font-size:30px;
}


.new_offer{
	    margin-left: 80px;
}
</style>




<?php get_header(); ?>






<div class="wrapper">


	<div class="content">
		<!-- Sidebar With Content Section-->
		<?php 
		
			global $theme_option,$post,$post_id,$page_id;
			if(isset($theme_option['package-search-page'])){
				if($theme_option['package-search-page'] == $post->ID){
					echo '<div class="kode_search_wrapper">';
						echo kode_search_form_banner('Search Form');
					echo '</div>';
					echo '<div class="container">';
						$paged = (get_query_var('paged'))? get_query_var('paged') : 1;
						?>
						<div class="package-search">
							<?php
							/* List of Properties on Homepage */
							// $number_of_properties = intval(get_option('theme_properties_on_search'));
							// if(!$number_of_properties){
								// $number_of_properties = 4;
							// }
							$package = '';
							$search_args = array(
								'post_type' => 'package',
								'posts_per_page' => 5,
								'paged' => $paged
							);

							// Apply Search Filter
							$search_args = apply_filters('kode_search_parameters',$search_args);

							$search_args = kode_sort_packages($search_args);
							
							$search_query = new WP_Query( $search_args );
							if ( $search_query->have_posts() ) :
								$post_count = 0;
								$current_size = 0;
								$size = 3;
								$thumbnail_size = 'small-grid-size';
								echo '<div class="row kode-package-list kode-package">';
								while ( $search_query->have_posts() ) :
									$search_query->the_post();
									global $post;
									$package_option = json_decode(kode_decode_stopbackslashes(get_post_meta($post->ID, 'post-option', true)), true);
									$price = (empty($package_option['price']))? '': $package_option['price'];
									$duration = (empty($package_option['days']))? '': $package_option['days'];
									$duration_pre = (empty($package_option['days-prefix']))? '': $package_option['days-prefix'];
									$package_option['location'] = (empty($package_option['location']))? '': $package_option['location'];
									$package_option['availability'] = (empty($package_option['availability']))? '': $package_option['availability'];
									$package_option['book_text'] = (empty($package_option['book_text']))? '': $package_option['book_text'];
									
									if( $current_size % $size == 0 ){
										//echo  '<div class="clear"></div>';
									}	
									echo  '
									<article class="' . esc_attr(kode_get_column_class('1/' . $size)) . '">
										<div class="package-mainsection kode-ux">
										<figure>
											<a href="'.esc_url(get_permalink()).'">'.get_the_post_thumbnail($post->ID, $thumbnail_size).'</a>
											<figcaption>
												<span class="package-price thbg-color">'.esc_attr($theme_option['currency']).esc_attr($price).'</span>
												<div class="kd-bottomelement">
													<h5><a href="'.esc_url(get_permalink()).'">'.esc_attr(substr(get_the_title(),0,16)).'</a></h5>
													<div style="background-color: #00c4d6;" class="days-counter"><span>'.esc_attr($duration).'</span><span>'.esc_attr($duration_pre).'</span></div>
												</div>
											</figcaption>
										</figure>
										</div>
									</article>';
								
								endwhile;
								wp_reset_postdata();
								echo '</div>';
								echo kode_get_pagination($search_query->max_num_pages, $paged);
							else:
								?><div class="alert-wrapper"><h4><?php _e('No Package Found!', 'kodeforest') ?></h4></div><?php
							endif;
							wp_reset_query();
							?>
						</div>
						<?php
					echo '</div>';
					echo '</div>';
				}
			}
			if( !empty($kode_content_raw) ){ 
				echo '<div class="pagebuilder-wrapper">';
				kode_show_page_builder($kode_content_raw);
				echo '</div>';
			}else{
				echo '<div class="container">';
					$default['show-title'] = 'enable';
					$default['show-content'] = 'enable'; 
					echo kode_get_default_content_item($default);
				echo '</div>';
			}
		?>
	</div><!-- content -->






	<div class="content1">
		<div class="navigation">
			<button class="return"><a href="http://bolgaria-travel.com/hotels/">Вернуться к поиску</a></button>
			<button class="chat"><a href="#">Обратиться в чат</a></button>
			<?php do_action('wpcallback_button'); ?>
		</div>
		<div class="hotel">
			<div class="hotel_item">
				<div class="hotel_photo">
					<div class="hotel_header">
						<p><span class="name_star"></span>
						<span class="name_city"></span></p>
						<button class="read"><a href="#" class="kurort_link"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/kurort.png">Читать о курорте</a></button>
					</div>	
					<div class="photo">
						<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/02/white.png">	
					</div>
				</div>				
			</div>
			<div class="offer_block">
			<div class="offer">
				<div class="offer_item">
					Спецпредложения от <br>
					<img  width="100px" height="auto" src="http://bolgaria-travel.com/wp-content/uploads/Bulgar-Logo-2-1.png">
					<div class="offers_block">
						<span class="offers_img"><img class="nights" src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/nights.png">Ночей: <span class="data_nights">7</span></span>
						<span class="offers_img "><img class="arrow" src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/arrow_right.png">Выезд/вылет <span class="data_date">23 ноября 2016</span> </span>
						<span class="offers_img"><img class="board" src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/board.png"><span class="data_pitanie">Без питания </span></span>
						
						<span class="offers_img"><img class="persn" src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/persn.png">
<span class="data_razmer">4 взрослых </span> </span>
						<span class="offers_img"><img class="app" src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/app.png"><span class="data_room">Апартамент </span></span>
						<span class="offers_img transfer"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/transfer.png"><span>Трансфер:</span>  включен </span>
					</div>
				</div>
				<div class="hotel_numbers">
					<div class="error"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/voskl.png">Осталось номеров : 2</div>
					
					<p><span>Старая цена:</span><span class="get_price">99€</span></p>
					<div class="i"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/i.png"></div>
					<p><span>Стоимость итого:</span><span class="get_price">99€</span></p>
					<input type="submit" class="order_button" value="Заказать">
				</div>
			</div>
			<div class="banner"><a href="http://bolgaria-travel.com/many_akcii/"><img src="http://bolgaria-travel.com/wp-content/uploads/Без-имени-8-1.gif"></a></div>
			</div>
		</div>
	

		<div class="images">
						
			</div>


		<div class="info_of_number">
			<div class="number_title main_header_title">
				<p><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/info.png"> Информация об отеле</p>
			</div>
			<div class="hotel_text">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt pariatur libero deleniti maxime debitis doloribus ipsum ab? Velit nam, laudantium quaerat voluptate iste cupiditate consequatur consectetur nulla, soluta cumque tempora. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error aut dolore nobis ducimus nihil nemo mollitia, quas consequatur sint? Consequuntur quisquam maxime odit tempora eos fugiat, at quod eius. Adipisci.	
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus accusamus deserunt perferendis eligendi esse natus blanditiis quae animi unde facere. Voluptate dicta ratione quo aliquid iusto optio natus praesentium doloremque! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo quisquam modi itaque consectetur veritatis culpa distinctio voluptas quo, quidem, accusantium, quam similique. Rem, fuga. Voluptatibus reiciendis perspiciatis rem voluptates debitis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, quas ratione, harum quo dolore fuga, magnam minima odio sint fugit a alias facere quod adipisci ab perspiciatis vitae ipsum libero. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime ipsum consequatur architecto soluta similique, pariatur, culpa, sint neque quas itaque, veritatis labore laudantium necessitatibus esse libero dicta debitis. Nobis, iste!
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio modi eius ullam unde voluptate harum et vero necessitatibus dignissimos laborum, facere! Nihil, praesentium nisi necessitatibus obcaecati earum fugiat quasi sequi.
				<h2>Расположение:</h2>
				<p>Расстояние до подьемников:</p>
				<p>Расстояние до cупермаркета:</p>
				<p>Расстояние до центра города:</p>
				<div class="what_in_hotel">
					<ul>
						Что есть в отеле
						<li>-Lorem</li>
						<li>-Lorem</li>
						<li>-Lorem</li>
						<li>-Lorem</li>
						<li>-Lorem</li>
					</ul>
					<ul>
						
						<li>-ipsum</li>
						<li>-ipsum</li>
						<li>-ipsum</li>
						<li>-ipsum</li>
						<li>-ipsum</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="info_of_number room">
			<div class="number_title">
				<p><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/info.png">Описание номеров </p>
			</div>
			<div class="room_text">
				
			</div>
		</div>
			
		<div class="info_of_number">
			<div class="number_title">
				<p><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/info.png">Услуги в отеле </p>
			</div>
			<div class="uslygi_text">
					<ul class="pool">
					<div class="header_img_text"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/pool.png">Бассейн</div>
					</ul>
					<ul class="opisanie">
					<div class="header_img_text"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/op_hotel.png">Описание</div>
					</ul>
					<ul class="razvlech">
					<div class="header_img_text"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/fun.png">Развлечения</div>
					</ul>
					<ul class="dopuslygi">
					<div class="header_img_text"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/dop.png">Доп. услуги</div>
					</ul>
					<ul class="beach">
					<div class="header_img_text"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/beach.png">Пляж</div>
					</ul>
					<ul class="sport">
					<div class="header_img_text"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/gym.png">Спорт</div>
					</ul>
					<ul class="place">
					<div class="header_img_text"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/distance.png">Расположение </div>
					</ul>
			</div>
		</div>
		<div class="info_of_number hill">
			<div class="number_title">
				<p><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/Health_icon_TF2.png">Услуги в отеле </p>
			</div>
			<div class="hill_text">
				
			</div>
		</div>

		<div class="info_of_number">
			<div class="number_title">
				<p><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/map.png">Посмотреть на карты</p>
			</div>
			<div class="hotel_img">
				
			</div>
		</div>
	</div>
	<script type="text/javascript">
	//console.log(data[7]);
	$(document).ready(function() {
	if (data[9]=='MAP')
	{
		var a=$(document).height()-600;
		console.log('height=',a);
       		 $('html, body').animate({scrollTop:1100}, 'slow');
	}
	//alert($('.wpcf7').html());
	var form=$('.wpcf7').html();
//console.log(form);
//$('#form').html(form);
	var body=$('body');
	var modal=$('<div class="fancybox_modal"><div class=form_header><p><span class="name_star"></span><span class="name_city"></span></p><div class="info_modal"><div class="offers_block"><span class="offers_img update">Выезд/вылет:<span class="data_date">23 ноября 2016</span> </span><span class="offers_img update">Тип питания:<span class="data_pitanie">Без питания </span></span><span class="offers_img update">Тип Размещения:<span class="data_razmer">4 взрослых </span> </span><span class="offers_img update">Тип номера:<span class="data_room">Апартамент </span></span><span class="offers_img update"><span>Трансфер:</span>  включен </span></div><div class="price_modal"><span class="get_price new_price"> 7894UAH </span><span class="offers_img update new_offer"><span class="data_nights">7</span>ночей</span></div></div></div><div class="call_to_us"><h1>Позвоните нам <i class="fa fa-phone fa-1x" aria-hidden="true"></i>044 543 99 12</h1></div><div class="form_new">'+$('.wpcf7').html()+'</div></div> ');
	body.append(overlay);
	var overlay;
	//$('input[name="your-subject"]').val('ddsdsdsdsdsd');
	$('input[name="your-subject"]').prop('disabled', true);
	$('.order_button').on('click',showModal);

	function showModal(e)
	{
			overlay=$('<div class="fancybox_overlay"></div>')
			e.preventDefault();
			overlay.on('click',hideModal);
			body.append(modal);
			body.append(overlay);
			var form_children=$('.your-subject ').children();
			console.log(form_children);
			//$(form_children[1]).prop('disabled', true);
			
			$('.fancybox_modal').css('display','block');
			var form=$('.wpcf7-form').children();
			console.log(form);
			$(form[11]).css('display','none');
			$(form[9]).css('float','left');
			$(form[9]).css('margin','15px 334px 0px 20px');
			var children8=$(form[9]).children().children();
		 	$(children8).css('width','250px');
			$(children8).css('height','30px');
			$(form[10]).css('float','left');
			$(form[10]).css('margin','4.5px 334px 0px 20px');
			var children9=$(form[10]).children().children();
		 	$(children9).css('width','250px');
			$(children9).css('height','30px');
			$(form[12]).css('float','left');
			$(form[12]).css('margin','6px 334px 34px 20px');
			var children12=$(form[12]).children().children();
			$(children12).css('width','250px');
			$(children12).css('height','30px');
			$(form[13]).css('position','absolute');
			$(form[13]).css('top','15px');
			$(form[13]).css('left','290px');
			$(form[14]).css('position','absolute');
			$(form[14]).css('top','200px');
			$(form[14]).css('left','290px');
			$(form[14]).css('text-align','right');
			var data_length=data[1].split('').length;
			console.log(parseInt(data[1]));
			if (parseInt(data[1])>28)
			{
				var new_date=data[1].split('');
				if (new_date.length>=3)
					$('.data_nights').text(' '+new_date[0]+new_date[1]+'+'+new_date[2]);
				else
					$('.data_nights').text(' '+new_date[0]+'+'+new_date[1]);
			}
			else
			{
				$('.data_nights').text(' '+data[1]+' ');
			}
			$('.data_date').text(' '+data[0]+' ');
			$('.data_razmer').html(' '+data_razmer_update+' ');
			

			var data_rooms=data[2].split('');
			var data_room_update='';
			for (var i=0; i<data_rooms.length; i++)
			{
				if (data_rooms[i]=='%')
				{
					i=data_rooms.length;
				}
				else{
					data_room_update+=data_rooms[i];
					}
			}


	$('.data_room').text(' '+data_room_update+' ');
	$('.data_pitanie').text(' '+data[4]+' ');
	$('.get_price').text(' '+data[5]+' ');
	var hotel_name=$('.hotellname').text();
	var star_count=$('.star').width()/20;
		//
//console.log(hotel_name,star_count);
	var stars='';
for (var b=0; b<star_count;b++)
{
	stars+='<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/star.png">';
}
for (var b=0; b<5-star_count;b++)
{
	stars+='<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/blind_star.png">';
}
$('.name_star').html(hotel_name+stars);		
$('.name_city').text(data[6]);
$(form_children[1]).val(hotel_name+' '+'ночей: '+data[1]+' '+'вылет: '+data[0]+' '+data_razmer_update+' '+data_room_update+' '+data[4]+' цена:'+data[5]);	
	}

	function hideModal()
		{
			modal.hide();
			overlay.hide();
		}

    
});

	 $(window).scroll(function(){
        var bo = $(this).scrollTop();  
        if (bo<=94)  {
        	$(".header").css('box-shadow','0 0 0 0');
        	$(".header").css('position','relative');
        }         
		if ( bo >= 94) {
			$(".header").css('box-shadow','0 2px  rgba(0,0,0,0.2)');
			$(".header").css('position','fixed');
			$(".header").css('z-index','1111');
			$(".header").css('top','0px');
			}
		});
	function param(Name)
{
var Params = location.search.substring(1).split("&");
var variable = "";
for (var i = 0; i < Params.length; i++)
{
if(Params[i].split("=")[0] == Name)
{
if (Params[i].split("=").length > 1)
variable = Params[i].split("=")[1];
return variable;
}}
return "";
}

var hotel_name=$('.hotellname').text();
var star_count=$('.star').width()/20;
//console.log(hotel_name,star_count);
var stars='';
for (var b=0; b<star_count;b++)
{
	stars+='<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/star.png">';
}
for (var b=0; b<5-star_count;b++)
{
	stars+='<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/blind_star.png">';
}
$('.name_star').html(hotel_name+stars);

var icons=$('.icons').html();
$('.main_header_title').html('<p><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/info.png"> Информация об отеле  '+icons+' </p>')
var info_hotel=$('.hotel_layout').text();
//console.log(info_hotel);
$('.hotel_text').html(info_hotel);
var params=$('.params').children();
for (var i=0; i<params.length;i++)
{
	var param_chi=$(params[i]).children();
	var more_child_room=$(param_chi[0]).children();
	//console.log($(more_child_room[1]).text());
	if ($(more_child_room[1]).text()=='Additionally')
	{
		$('.room').css('display','block');
		var another_child_room=$(param_chi[1]).children();
		//console.log(another_child_room);
		var room_text=$(another_child_room[0]).text();
		//console.log(room_text);
		$('.room_text').text(room_text);
	}
	
	else if ($(more_child_room[1]).text()=='Pool')
	{
		$('.pool').css('display','inline-block');
		var another_child_pool=$(param_chi[1]).text().split(',');
		//console.log(another_child_pool);
		for (var a=0; a<another_child_pool.length;a++)
		{
			$('.pool').append('<li><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/check_hotel.png">'+another_child_pool[a]+'</li>')
		}
	}
	else if ($(more_child_room[1]).text()=='Описание')
	{
		$('.opisanie').css('display','inline-block');
		var another_child_pool=$(param_chi[1]).text().split(',');
		//console.log(another_child_pool);
		for (var a=0; a<another_child_pool.length;a++)
		{
			$('.opisanie').append('<li><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/check_hotel.png">'+another_child_pool[a]+'</li>')
		}
	}
	else if ($(more_child_room[1]).text()=='Entertainment')
	{
		$('.razvlech').css('display','inline-block');
		var another_child_pool=$(param_chi[1]).text().split(',');
		//console.log(another_child_pool);
		for (var a=0; a<another_child_pool.length;a++)
		{
			$('.razvlech').append('<li><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/check_hotel.png">'+another_child_pool[a]+'</li>')
		}
	}
	else if ($(more_child_room[1]).text()=='Services')
	{
		$('.dopuslygi').css('display','inline-block');
		var another_child_pool=$(param_chi[1]).html().split('<li>');
		//console.log(another_child_pool);
		for (var a=1; a<another_child_pool.length;a++)
		{
			$('.dopuslygi').append('<li><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/check_hotel.png">'+another_child_pool[a]+'</li>')
		}
	}
	else if ($(more_child_room[1]).text()=='Пляж')
	{
		$('.beach').css('display','inline-block');
		var another_child_pool=$(param_chi[1]).text().split(',');
		//console.log(another_child_pool);
		for (var a=0; a<another_child_pool.length;a++)
		{
			$('.beach').append('<li><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/check_hotel.png">'+another_child_pool[a]+'</li>')
		}
	}
	else if ($(more_child_room[1]).text()=='Sport Activities')
	{
		$('.sport').css('display','inline-block');
		var another_child_pool=$(param_chi[1]).text().split(',');
		//console.log(another_child_pool);
		for (var a=0; a<another_child_pool.length;a++)
		{
			$('.sport').append('<li><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/check_hotel.png">'+another_child_pool[a]+'</li>')
		}
	}
	else if ($(more_child_room[1]).text()=='Distances')
	{
		$('.place').css('display','inline-block');
		var another_child_pool=$(param_chi[1]).text().split(',');
		//console.log(another_child_pool);
		for (var a=1; a<another_child_pool.length-1;a++)
		{
			$('.place').append('<li><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/check_hotel.png">'+another_child_pool[a]+'</li>')
		}
	}
	else if ($(more_child_room[1]).text()=='Medical service')
	{
		$('.hill').css('display','block');
		var another_child_room=$(param_chi[1]).children();
		//console.log(another_child_room);
		var hill_text1=$(another_child_room[0]).text();
		var hill_text2=$(another_child_room[1]).text();
		//console.log(hill_text);
		$('.hill_text').html('<p><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/Public_health_icon_-_Noun_Project_6435.svg_.png">  Показания для лечения </p>'+hill_text1+'<br>'+'<p><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/Public_health_icon_-_Noun_Project_6435.svg_.png">   Профиль лечения</p>'+hill_text2);
	}
}

var gallery=$('.photos').children();
//console.log('gallery=',$(gallery));
var k_count=0;
if (gallery.length>8)
{ k_count=8;
}
else{
	k_count=gallery.length;
}
var gallery_array=[];
for (var bb=0; bb<k_count; bb++)
{
	var src_min=$(gallery[bb]).attr("href");
	gallery_array.push($(gallery[bb]).attr("href"));
	$('.images').append('<img src='+src_min+'>')
}


var gallery_count=0;
//console.log('array=',gallery_array)
$('.images').append('<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>');
$('.images').append('<i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>');
var attr=($(gallery[0]).attr('href'));
$('.photo').children('img').attr('src',attr);
//console.log('k_count=',k_count)
var this_photo=$('.images').children('img');
$(this_photo[0]).css('border','4px solid orange');
$('.fa-angle-right').click(function(){
	if (gallery_count>=k_count-1)
	{
	gallery_count=7;
		//console.log(gallery_count);
	$(this_photo[gallery_count]).css('border','4px solid orange');
	}
	else{
	gallery_count++;
	$('.images').children('img').css('border','0px solid orange');
	$(this_photo[gallery_count]).css('border','4px solid orange');
	var link_this=$(this_photo[gallery_count]).attr('src');
	$('.photo').children('img').attr('src',link_this);}
});


$('.fa-angle-left').click(function(){
	gallery_count--;
	if (gallery_count<0)
	{gallery_count=0
	$(this_photo[gallery_count]).css('border','4px solid orange');}
	else{
	$('.images').children('img').css('border','0px solid orange');
	$(this_photo[gallery_count]).css('border','4px solid orange');
	var link_this=$(this_photo[gallery_count]).attr('src');
	$('.photo').children('img').attr('src',link_this);}
});

/*$('.images').children('img').click(function(){
			var a=$(this).attr('src');
			console.log(a);
			$('.photo').children('img').attr('src',a);
			$('.images').children('img').css('border','0px solid orange');
			$(this).css('border','4px solid orange');
			
		});*/

var google_map=$('.k-content').children();
//console.log(google_map);
$('.hotel_img').html($('#google').html());
var select=param("nmae");
var data=select.split('_');
console.log(data);
var data_razmers=data[3].split('');
var data_razmer_update='';
for (var i=0; i<data_razmers.length; i++)
{
	if (data_razmers[i]=='%')
	{
		i=data_razmers.length;
	}
	else{
		data_razmer_update+=data_razmers[i];
	}
}
//console.log('data_razmer_update',data_razmer_update);
var data_length=data[1].split('').length;
			console.log(parseInt(data[1]));
			if (parseInt(data[1])>22)
			{
				var new_date=data[1].split('');
				if (new_date.length>=3)
					$('.data_nights').text(' '+new_date[0]+new_date[1]+'+'+new_date[2]);
				else
					$('.data_nights').text(' '+new_date[0]+'+'+new_date[1]);
			}
			else
			{
$('.data_nights').text(' '+data[1]+' ');
}
$('.data_date').text(' '+data[0]+' ');
$('.data_razmer').html(' '+data_razmer_update+' ');


var data_rooms=data[2].split('');
var data_room_update='';
for (var i=0; i<data_rooms.length; i++)
{
	if (data_rooms[i]=='%')
	{
		i=data_rooms.length;
	}
	else{
		data_room_update+=data_rooms[i];
	}
}


$('.data_room').text(' '+data_room_update+' ');
$('.data_pitanie').text(' '+data[4]+' ');
$('.get_price').text(' '+data[5]+' ');
var kurort_name=data[6].split('');
$('.name_city').text(data[6]);
if (data[7]==0)
{
	$('.transfer').css('display','none');
}
var kurorts='';
for (var i=0; i<kurort_name.length;i++)
{
	kurorts+=kurort_name[i];
}
kurorts=kurorts.toLowerCase();
$('.kurort_link').attr('href','http://bolgaria-travel.com/'+kurorts);



	</script>











<?php get_footer(); ?>