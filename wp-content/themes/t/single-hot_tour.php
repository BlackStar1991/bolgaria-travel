<?php get_header(); ?>
	<?php  wp_head(); ?>
    <link type="text/css" rel="stylesheet" href="http://bolgaria-travel.com/wp-content/themes/t/css/slick.css">
    <link type="text/css" rel="stylesheet" href="http://bolgaria-travel.com/wp-content/themes/t/css/slick-theme.css">
    <link type="text/css" rel="stylesheet" href="http://bolgaria-travel.com/wp-content/themes/t/css/components.css">

<div class="content ">
	<div class="container hot_tour_container">
		<div class="row">
		


<div class="kode-item kode-blog-full ">
					<?php while ( have_posts() ){ the_post();global $post; ?>
					<!-- Blog Detail -->
<?php
$slide1 = get_post_meta( get_the_ID(), 'image1', true );
$slide1_url = wp_get_attachment_url( $slide1 );
$slide2 = get_post_meta( get_the_ID(), 'image2', true );
$slide2_url = wp_get_attachment_url( $slide2 );
$slide3 = get_post_meta( get_the_ID(), 'image3', true );
$slide3_url = wp_get_attachment_url( $slide3 );
$slide4 = get_post_meta( get_the_ID(), 'image4', true );
$slide4_url = wp_get_attachment_url( $slide4 );
$slide5 = get_post_meta( get_the_ID(), 'image5', true );
$slide5_url = wp_get_attachment_url( $slide5 );
$slide6 = get_post_meta( get_the_ID(), 'image6', true );
$slide6_url = wp_get_attachment_url( $slide6 );

$select_star = get_post_meta($post->ID, 'select_star', true);
$order = get_post_meta($post->ID, 'order', true);
$select_voodoo_people = get_post_meta($post->ID, 'select_voodoo_people', true);
$select_xata = get_post_meta($post->ID, 'select_xata', true);
$select_ride = get_post_meta($post->ID, 'select_ride', true);
$select_night = get_post_meta($post->ID, 'select_night', true);
$select_nyam = get_post_meta($post->ID, 'select_pitnie', true);
$field = get_post_meta( get_the_ID(), 'image', true );
$field_url = wp_get_attachment_url( $field );
$date1 = get_post_meta($post->ID, 'date1', true);
$date2 = get_post_meta($post->ID, 'date2', true);
$date3 = get_post_meta($post->ID, 'date3', true);
$date4 = get_post_meta($post->ID, 'date4', true);
$in_price = get_post_meta($post->ID, 'in_price', true);
$out_price = get_post_meta($post->ID, 'out_price', true);

$a=1;
$b=2;
$c='2+1';
$d='2+2';
$e='3+1';
$f='3+2';
$g='4+1';
$h='4+2';
$double_order=$order*2;?>



<h1 class="hot_hotel_h1"><?php echo get_the_title();?></h1>
<div class="block-hot-hotel">
    <div>
 	<div class="timeline-custom-col">
    	 <div class="image-hotel-view-block">
       	     <div class="slider-for group1">
             <div class="item silede"><a href="#slide1"><img src="<?php echo $slide1_url?>" align="center"></a> </div>
             <div class="item silede"><a href="#slide2"><img src="<?php echo $slide2_url?>" align="center"></a> </div>
             <div class="item silede"><a href="#slide3"><img src="<?php echo $slide3_url?>" align="center"></a> </div>
             <div class="item silede"><a href="#slide4"><img src="<?php echo $slide4_url?>" align="center"></a> </div>
             <div class="item silede"><a href="#slide5"><img src="<?php echo $slide5_url?>" align="center"> </a> </div>
             <div class="item silede"><a href="#slide6"><img src="<?php echo $slide6_url?>" align="center"> </a>   </div>
         </div>
         <div class="slider-nav group1">
             <div class="item hot-tumb"><img src="<?php echo $slide1_url?>"></div>
             <div class="item hot-tumb"><img src="<?php echo $slide2_url?>"></div>
             <div class="item hot-tumb"><img src="<?php echo $slide3_url?>"></div>
             <div class="item hot-tumb"><img src="<?php echo $slide4_url?>"></div>
             <div class="item hot-tumb"><img src="<?php echo $slide5_url?>"> </div>
             <div class="item hot-tumb"><img src="<?php echo $slide6_url?>"> </div>
         </div>
     </div>
 </div>
<div>
<div>
 <a href="#x" class="overlay" id="slide1"></a>
        <div class="popup slide_pop">
<img class="is-image" src="<?php echo $slide1_url?>" alt="" />
<a class="close" title="Закрыть" href="#close"></a>
        </div>
</div>
<div>
 <a href="#x" class="overlay" id="slide2"></a>
        <div class="popup slide_pop">
<img class="is-image" src="<?php echo $slide2_url?>" alt="" />
<a class="close" title="Закрыть" href="#close"></a>
        </div>
</div>
<div>
 <a href="#x" class="overlay" id="slide3"></a>
        <div class="popup slide_pop">
<img class="is-image" src="<?php echo $slide3_url?>" alt="" />
<a class="close" title="Закрыть" href="#close"></a>
        </div>
</div>

<div>
 <a href="#x" class="overlay" id="slide4"></a>
        <div class="popup slide_pop">
<img class="is-image" src="<?php echo $slide4_url?>" alt="" />
<a class="close" title="Закрыть" href="#close"></a>
        </div>
</div>
<div>
 <a href="#x" class="overlay slide_pop" id="slide5"></a>
        <div class="popup">
<img class="is-image" src="<?php echo $slide5_url?>" alt="" />
<a class="close" title="Закрыть" href="#close"></a>
        </div>
</div>

<div>
 <a href="#x" class="overlay slide_pop" id="slide6"></a>
        <div class="popup">
<img class="is-image" src="<?php echo $slide6_url?>" alt="" />
<a class="close" title="Закрыть" href="#close"></a>
        </div>
</div></div>

</div>

 <div class="description-hot-hotel">
	<div class="icon-block-hot-hotel">
		<div class="single_icon_hotel">
		<?php
 $x=$select_star;
 	if ($x == Одна) {    echo '<img src="/wp-content/uploads/icon/stars/star-1.png">';} 
	elseif  ($x == ноль) {    echo '<img src="/wp-content/uploads/icon/stars/star0.png">';} 
	elseif ($x == Две) {    echo '<img src="/wp-content/uploads/icon/stars/star-2.png">';}  
	elseif ($x == Три) { echo '<img src="/wp-content/uploads/icon/stars/star-3.png">';} 
	elseif ($x == Четыре) {    echo '<img src="/wp-content/uploads/icon/stars/star-4.png">';} 
	elseif ($x == Пять) {    echo '<img src="/wp-content/uploads/icon/stars/star-5.png">'; }?>
		</div>
		<div class="single_icon_hotel">
		 <?php $y=$select_nyam;
 		if ($y == fb) {echo '<img src="/wp-content/uploads/icon/food/food-FB.png">';}
		elseif ($y == bb) {echo '<img src="/wp-content/uploads/icon/food/food-BB.png">';}  
		elseif ($y == hb) {echo '<img src="/wp-content/uploads/icon/food/food-HB.png">';} 
		elseif ($y == bo) {echo '<img src="/wp-content/uploads/icon/food/food-BO.png">';} 
		elseif  ($y == all-inc) {echo '<img src="/wp-content/uploads/icon/food/food-all-inc.png">';} ?>
		</div>
		<div class="single_icon_hotel">
	 <?php $q=$select_voodoo_people ;
 	if ($q == $a) {echo '<img src="/wp-content/uploads/icon/quant/quant.-1.png">';} 
	elseif ($q == $b ) {echo '<img src="/wp-content/uploads/icon/quant/quant.-2.png">';}  
	elseif ($q == $c) {echo '<img src="/wp-content/uploads/icon/quant/quant-2+1.png">';} 
	elseif ($q == $d) {echo '<img src="/wp-content/uploads/icon/quant/quant-2+2.png">';}  
	elseif ($q == $e) {echo '<img src="/wp-content/uploads/icon/quant/quant-3+1.png">';}  
	elseif ($q == $f) {echo '<img src="/wp-content/uploads/icon/quant/quant-3+2.png">';}  
	elseif ($q == $g) {echo '<img src="/wp-content/uploads/icon/quant/quant-4+1.png">';} 
	elseif ($q == $h) {echo '<img src="/wp-content/uploads/icon/quant/quant-4+2.png">';}  ?>
		</div>
		<div class="single_icon_hotel">
<?php $y=$select_xata;
 	if ($y == app) {echo '<img src="/wp-content/uploads/icon/placement/placement-app.png">';} 
	elseif ($y == dbl) {echo '<img src="/wp-content/uploads/icon/placement/placement-dbl.png">';}  
	elseif ($y == qdbl) {echo '<img src="/wp-content/uploads/icon/placement/placement-qdpl.png">';} 
	elseif ($y == sgl) {echo '<img src="/wp-content/uploads/icon/placement/placement-sgl.png">';} 
	elseif ($y == studio) {echo '<img src="/wp-content/uploads/icon/placement/placement-studio.png">';} 
	elseif ($y == trpl) {echo '<img src="/wp-content/uploads/icon/placement/placement-trpl.png">';} 
	elseif ($y == none) {echo '<img src="/wp-content/uploads/icon/placement/apar.png">';} ?>
		</div>
		<div class="single_icon_hotel">
<?php $y=$select_ride;
 	if ($y == Автобус) {    echo '<img src="/wp-content/uploads/icon/transfers/bus.png">';} 
	elseif ($y == Авиа) {    echo '<img src="/wp-content/uploads/icon/transfers/flight.png">';}
	elseif ($y == без_трансфера) {    echo '<img src="/wp-content/uploads/no-transfer.png">';} ?>
		</div>
		<div class="single_icon_hotel">
<?php $y=$select_night;

 	if ($y == 10) {    echo  '<img src="/wp-content/uploads/icon/nights/10-nights.png">';} 
	elseif ($y == 7) {    echo  '<img src="/wp-content/uploads/icon/nights/7-nights.png">';}  
	elseif ($y == 14) { echo  '<img src="/wp-content/uploads/icon/nights/14-nights.png">';}  
	elseif ($y == 1) { echo  '<img src="/wp-content/uploads/icon/nights/night1.png">';} 
	elseif ($y == 3) { echo  '<img src="/wp-content/uploads/3-nights.png">';} 
	elseif ($y == 4) { echo  '<img src="/wp-content/uploads/4-nights.png">';}
	elseif ($y == 2) { echo  '<img src="http://bolgaria-travel.com/wp-content/uploads/2-2.png">';} 
	elseif ($y == 5) { echo  '<img src="http://bolgaria-travel.com/wp-content/uploads/5-3.png">';}
	elseif ($y == 6) { echo  '<img src="http://bolgaria-travel.com/wp-content/uploads/6-2.png">';} 
	elseif ($y == 8) { echo  '<img src="http://bolgaria-travel.com/wp-content/uploads/8.png">';}
	elseif ($y == 9) { echo  '<img src="http://bolgaria-travel.com/wp-content/uploads/9.png">';}
	elseif ($y == 11) { echo  '<img src="http://bolgaria-travel.com/wp-content/uploads/11.png">';}
	elseif ($y == 12) { echo  '<img src="http://bolgaria-travel.com/wp-content/uploads/12.png">';}
	elseif ($y == 13) { echo  '<img src="http://bolgaria-travel.com/wp-content/uploads/13.png">';}
	elseif ($y == 15) { echo  '<img src="http://bolgaria-travel.com/wp-content/uploads/15.png">';}  ?>
		</div>
 	</div>
	<div class="opisanie-hot-hotel">
		<div class="WTF">
			<p class="soimost-text-hot-tour">Стоимость тура</p>
		</div>
		<div class="single_price-hot-tour">
			<p ><?php echo $order?> &euro;<span>/1 чел.</span></p>
			<p class="double_order"><?php echo $double_order?> &euro;<span>/2 чел.</span></p>
		</div>
		<div class="single-date">

  <?php
if (empty($date1)) {echo 'Открытая дата';}
else {echo "<select class='select-date'><option> $date1 </option>";}
?>
  <?php
if (empty($date2)) {echo '';}
else {echo "<option> $date2 </option>";}
?>
 <?php
if (empty($date2)) {echo '';}
else {echo "<option> $date3 </option>";}
?>
 <?php
if (empty($date4)) {echo '';}
else {echo "<option> $date4 </option>";}
?>
</select>



		</div>
		<div class="order-single-hot-tour">
			<div><a href="#win1">Заказать тур</a> <div>
		</div>	
 	</div>
 </div>
</div>
</div>
</div>
</div>
<style>
.slide_pop{height:auto}
/* Базовые стили слоя затемнения и модального окна  */
.overlay {
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 10;
    display: none;
/* фон затемнения */
    background-color: rgba(0, 0, 0, 0.65);
    position: fixed; /* фиксированное поцизионирование */
    cursor: default; /* тип курсара */
}
/* активируем слой затемнения */
.overlay:target {
    display: block;
    z-index: 1000;
}
.wpcf7-submit{
    width: 100px;
}
/* стили модального окна */
.popup {
    z-index: 9999;
    top: -100%;
    right: 0;
    left: 50%;
    font-size: 14px;
    z-index: 20;
    margin: 0;
    width: 85%;
    min-width: 320px;
    max-width: 600px;
    
/* фиксированное позиционирование, окно стабильно при прокрутке */
    position: fixed;
    padding: 15px;
    border: 1px solid #383838;
    background: #fefefe;
/* скругление углов */
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    border-radius: 4px;
    font: 14px/18px 'Tahoma', Arial, sans-serif;
/* внешняя тень */
    -webkit-box-shadow: 0 15px 20px rgba(0,0,0,.22),0 19px 60px rgba(0,0,0,.3);
    -moz-box-shadow: 0 15px 20px rgba(0,0,0,.22),0 19px 60px rgba(0,0,0,.3);
    -ms-box-shadow: 0 15px 20px rgba(0,0,0,.22),0 19px 60px rgba(0,0,0,.3);
    box-shadow: 0 15px 20px rgba(0,0,0,.22),0 19px 60px rgba(0,0,0,.3);
    -webkit-transform: translate(-50%, -500%);
    -ms-transform: translate(-50%, -500%);
    -o-transform: translate(-50%, -500%);
    transform: translate(-50%, -500%);
    -webkit-transition: -webkit-transform 0.6s ease-out;
    -moz-transition: -moz-transform 0.6s ease-out;
    -o-transition: -o-transform 0.6s ease-out;
    transition: transform 0.6s ease-out;
}
/* активируем модальный блок */
.overlay:target+.popup {
    -webkit-transform: translate(-50%, 0);
    -ms-transform: translate(-50%, 0);
    -o-transform: translate(-50%, 0);
    transform: translate(-50%, 0);
    top: 20%;
    z-index: 1000
}
/* формируем кнопку закрытия */
.close {
    top: -10px;
    right: -10px;
    width: 20px;
    height: 20px;
    position: absolute;
    padding: 0;
    border: 2px solid #ccc;
    -webkit-border-radius: 15px;
    -moz-border-radius: 15px;
    -ms-border-radius: 15px;
    -o-border-radius: 15px;
    border-radius: 15px;
    background-color: rgba(61, 61, 61, 0.8);
    -webkit-box-shadow: 0px 0px 10px #000;
    -moz-box-shadow: 0px 0px 10px #000;
    box-shadow: 0px 0px 10px #000;
    text-align: center;
    text-decoration: none;
    font: 13px/20px 'Tahoma', Arial, sans-serif;
    font-weight: bold;
    -webkit-transition: all ease .8s;
    -moz-transition: all ease .8s;
    -ms-transition: all ease .8s;
    -o-transition: all ease .8s;
    transition: all ease .8s;
}
.close:before {
    color: rgba(255, 255, 255, 0.9);
    content: "X";
    text-shadow: 0 -1px rgba(0, 0, 0, 0.9);
    font-size: 12px;
}
.close:hover {
    background-color: rgba(252, 20, 0, 0.8);
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);    
}
/* изображения внутри окна */
.slide_pop img {
    width: 100%;
    height: auto;
}
/* миниатюры слева/справа */
.pic-left, 
.pic-right {
    width: 25%;
    height: auto;
}
.pic-left {
    float: left;
    margin: 5px 15px 5px 0;
}
.pic-right {
    float: right;
    margin: 5px 0 5px 15px;
}
/* элементы м-медиа, фреймы */
.popup embed, 
.popup iframe {
    top: 0;
    right: 0;
    bottom: 0; 
    left: 0; 
    display:block;
    margin: auto;
    min-width: 320px;
    max-width: 600px;
    width: 100%;
}
.popup h2 { /* заголовок 2 */
    margin: 0;
    color: #008000;
    padding: 5px 0px 10px;
    text-align: left;
    text-shadow: 1px 1px 3px #adadad;
    font-weight: 500;
    font-size: 1.4em;
    font-family: 'Tahoma', Arial, sans-serif;
    line-height: 1.3;
}
.order_submit{
width: 120px !important;
    float: none !important;
    border: none;
    background: #FDD835 !important;
    font-size: 20px;
}
.submit_display {display:block !important;}
#submitutton{display:block;}
/* параграфы */
.popup p {margin: 0; padding: 5px 0;    text-align: center;}
#wpcf7-f3633-p4450-o1 > form > center:nth-child(17) > p > img{width:auto !important;}
</style>
<div>
   <a href="#x" class="overlay" id="win1"></a>
   <div class="popup">
     <?php echo do_shortcode( '[contact-form-7 id="3633" title="Заказ тура"]' );?>
    <a class="close"title="Закрыть" href="#close"></a>
    </div>
</div>					<div class="kd-blog-detail">
						
						<div class="inn-detail ">
							<div class="hotel-tumd-del"><?php get_template_part('single/thumbnail', get_post_format()); ?></div>
							<div class="kd-rich-editor" style="width:90%">
								<p class="hotel-text ">Описание отеля</p>
								 <?php echo kode_content_filter($kode_post_settings['content'], true);?>
<div class="in_price"><h4><i class="fa fa-check" style="font-size: 25px; color:green;">&nbsp;</i>В стоимость включено</h4><pre><?php echo $in_price ?></pre></div>	
<div class="out_price"><h4><i class="fa fa-times" style="font-size: 25px; color:red;"></i>В стоимость НЕ включено</h4><pre><?php echo $out_price ?></pre></div>
							</div>
						</div>
						
						
						
					</div>
					
			
		

<!-- Blog Detail -->
					<?php comments_template( '', true ); ?>
					<?php } ?>
				</div>
				
			</div>
<!--<div class="predlog">
	<div class="reklama-verx">
		
		<div class="kartinka">
			<a href="http://bolgaria-travel.com/hot_tour/reklamnyj-tur/"><img src="http://bolgaria-travel.com/wp-content/uploads/tour.jpg"></a>
		<div class="specpredlog">
			<p>  РЕКЛАМНЫЙ ТУР</p>
		</div>
		</div>

		<div class="cena">
			<img src="http://moscow.bolgaria-travel.com/wp-content/uploads/badge.png">
			<p>95 €</p>
		</div>
	</div>
	<div class="reklama_niz">
		<div class="nazvanie">
			<p>Рекламный тур для турагентов и всех желающих посмотреть лучшие горнолыжные курорты Болгарии...</p>
		</div>
		<div class="excerpt">
			<p></p>
		</div>
 		<div style="color: red;"><a href="http://bolgaria-travel.com/hot_tour/reklamnyj-tur/">Далее > </a></div>
	</div>
</div>	<!-- end predlog -->
</div><!-- Row -->
</div>	

	</div><!-- Container -->
	
</div><!-- content -->

<script src="http://bolgaria-travel.com/wp-content/themes/t/js/slick.min.js"></script>
<script src="http://bolgaria-travel.com/wp-content/themes/t/js/hotel-view.js"></script>
<?php get_footer(); ?>