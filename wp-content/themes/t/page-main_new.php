<?php
/*
Template Name: page-main-new
*/ ?>




<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/wp-content/themes/t/css/animate.css">
	<script src="/wp-content/themes/t/js/jquery.arcticmodal-0.3.min.js">
	<script src="//yandex.st/jquery/cookie/1.0/jquery.cookie.min.js"></script>
</head>
<title>FlyTravel Украина. Туры в Болгарию из Киева и Украины 2017.</title> 
<style>
*{
	margin:0;
	padding: 0;
}

body{
	font-family: 'Source Sans Pro', sans-serif;
}


h1{font-family: 'Source Sans Pro', sans-serif !important;}

.wrapper{
	width: 100%;
	display: block;
}


.img{
	width: 100%;
	border-bottom:3px solid orange;
	border-top: 3px solid orange;
	margin-bottom: 20px;
	position:relative;
}
.img img{
	width: 100%;
}
.offers{
	max-width:944px;
	margin: auto;
	position: relative;
	margin-bottom: 30px;
}

.heading-style3 h2{font-size:40px;line-height:40px;text-transform:uppercase;color:#333333;margin:0 0 15px;padding:0 0 15px;position:relative;font-weight:300; margin-top: 20px;}




.offers_item{
	width: auto;
	margin:10px 1.5% 0px 1.5%;
	height: 220px;
	border: 3px solid white;
	border-radius: 5px;
	display:inline-block;
	position: relative;
	overflow: hidden;
	margin-bottom: 10px;
	box-shadow: 0 0 10px rgba(0,0,0,0.5);
}

.offers_item:hover img{
	transform: scale(1.05);
	transition:0.3s linear;
}


.offers_item img{
	width: 100%;
	border-radius: 5px;
	display:inline-block;
}

.offers_link{
	position: absolute;
	top:185px;
	left: 0;
	margin-left: 5%;
	width: 90%;
	background-color: white;
	clear: both;
	display: flex;
    justify-content: space-between;
}

.offers_name{
	width: 68.7%;
	font-size:13px;
	display: inline-block;
	text-align: center;
	padding: 3px 0px 2px 0px;
}
.offers_price{
	width: 29.6%;
	display: inline-block;
	background-color: orange;
	text-align: center;
	padding: 3px 0px 2px 0px;
}

.why_we
{
	display: flex;
	width: 95.5%;
	margin: 0px 1.5% 0px 1.5%;
	border:1px solid;
	border-radius: 5px;
	background-color: #f2f2f2;
	justify-content:center;
}

.why_we p{
	display: flex;
	align-items:center;
	justify-content:center;
}

.why_we_item{
	width: 24.5%;
	padding: 10px 1% 10px 1%;
	text-align: center;
	box-sizing:border-box;
	display: inline-block;
}

.blue{
	display: inline-block;
	width: 100%;
	border: 2px solid #afcbd3;
	box-sizing:border-box;
	margin-bottom:4px;
}

.green{
	display: inline-block;
	width: 100%;
	border: 2px solid #ccd8c0;
	box-sizing:border-box;
	margin-bottom:4px;
}

.darkgreen{
	display: inline-block;
	width: 100%;
	border: 2px solid #6db4a9;
	box-sizing:border-box;
	margin-bottom:4px;
}


.darkyellow{
	display: inline-block;
	width: 100%;
	border: 2px solid #cec947;
	box-sizing:border-box;
	margin-bottom:4px;
}
.hot_tour{
	width: 46%;
	overflow: hidden;
	display: inline-block;
	margin-top: 20px;
	margin-left:1.5%;
	border-radius: 1px;
	border: 1px solid grey;
}
.hot_tour_item{
	display: flex;
	border-radius: 5px;
	align-items:center;
}
.item{
	width: 50%;
	display: inline-block;
}
.item_offer{
	width: 100%;
	background-color: #f2f2f2;
	display: inline-block;
	border-bottom: 1px solid #ccc;
}
.item_price{
	width: 27%;
	text-align: center;
	background-color: orange;
	display: inline-block;
	padding: 10px 0px 10px 0px;
}

.item_text{
	width: 70%;
	text-align: center;
	display: inline-block;
	padding: 10px 0px 10px 0px;
}

.hot_img{
	height: 164px;
	background-image: url(http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/hot_tour.png);
	background-size: cover;
	position: relative;
}

.hot_tour_button{
	border: none;
	position:  absolute;
	padding: 5px;
	left:50%;
	top:10px;

}

.top_kur{
	margin-left: 3%;
}
.top_kurort
{
	height: 164px;
	background-image: url(http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/top_kurort.png);
	background-size: cover;
	position: relative;
}

.top_kurort_button{
	border: none;
	position:  absolute;
	padding: 5px;
	left:7%;
	top:10px;

}
.parallax-container{
	width: 100%;
	padding: 30px 0px 30px 0px;
    background-image:url(http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/night.png);
	background-size:cover;
}

.parallax_content{
	width: 50%;
	border-radius: 5px;
	background-color:  rgba(34, 38, 69, 0.7);
	margin-left: 30px;
	padding: 10px;
	color: white;
	font-size: 20px;
}

.parallax_content h1{
	text-align: center;
}

.dots_block
{
	display: flex;
	align-items:center;
}

.dots{
	width: 49%;
	display: inline-block;
}

.dots_item{
	width: 100%;
	display:flex;
	align-items:center;
}

.item_count{
	width: 50px;
	height: 50px;
	display: flex;
	align-items:center;
	justify-content:center;
	background-color: #f8931b;
	border-radius: 50%;
	color: black;
	margin-right: 10px;
	margin-left: 10px;
}

.item_text{
	font-size: 13px;
	text-align: left;
}

.new_text
{
	text-align: right;
}


.travel_to_bolgaria
{
	margin-top: 10px;
	width: 98%;
	padding:10px 1% 10px 1%;
	text-align: center;
}

.hr{
	width: 10%;
	margin: auto;
	box-sizing:border-box;
	border:1px solid #cacaca;
	margin-top: 5px;
	margin-bottom: 5px;
}

.video_block{
	width: 20%;
	border-radius: 5px;
	margin:10px 1.5% 10px  1.5%;
	display: inline-block;
	border: 1px solid grey;
	padding: 12px;
	overflow: hidden;
	height: auto;
	position:relative;
}

.video_block img{
	width: 100%;
	border-radius: 5px;
	background-color: rgba(0, 0, 0, 0.4);
	z-index:11111111;
}



 .video_block:hover img{
	transform: scale(1.2);
	transition:0.5s linear;
}
.video_block:hover .overlay_img{
	z-index:1111;
	transform: scale(2);
	transition:0.5s linear;
}
.counter{
	padding: 20px 0px 20px 0px;
	background-color: orange;
	display: flex;
	justify-content:center;
}

.counter_item{
	margin: 0px 30px 0px 30px;
	text-align: center;
	display: inline-block;
	color: white;
}

.counter_item i{
	margin-bottom: 20px;
}

.equal{
	font-size: 40px;
	margin-bottom: 20px;
}


footer{
	background-color: #494947;
}

.social_network{
	padding: 5px 0px 5px 0px;
	width: 100%;
	display: inline-block;
	background-color: #3b3b39;
	text-align: center;
}

.footer{
	width: 59%;
	padding: 10px 0px 10px 0px;
	margin: auto;
	color: white;
	display:  flex;
	justify-content:space-between;
	margin-bottom: 40px;
}
.footer li{
	list-style: none;
	margin: 5px 0px 5px 0px;
}

.footer a{
	text-decoration: none;
	color: white;
}

.footer h3{
	margin-bottom: 10px;
	text-decoration: underline;
}

.tours{
	width: 59%;
	padding: 15px 0px 15px 0px;
	margin: auto;
	display:  flex;
	justify-content:space-between;
	border-top: 2px solid white;
	border-bottom: 2px solid white;
	margin-bottom: 40px;
}

.tours a{
	text-decoration: none;
	color: white;
}

.partners , .flags
{
	width: 59%;
	margin:auto;
	color: white;
	margin: 10px 20.5%;
	display: inline-block;
}
.partners_item{
	width: 85%;
	margin-left:13%;
}

.partners_item img{
	margin:0px 0.5% 0px 0px;
}

.flags img{
	width: 50px;
	height: auto;
	margin: 0px 5px 0px 5px;
}


.fancybox-modal{
	position: fixed;
	width: 604px;
	height: 454px;
	top:22%;
	left: 33%;
	text-align: center;
}
.fancybox-overlay{
	position: fixed;
	top:0;
	left:0;
	width: 100%;
	height: 100%;
	background-color: rgba(0,0,0,0.5);
	
}


.top{
	text-align:right;
}


#search_tour .hotels_container td {
    padding: 5px;
    text-align: center;
    width: 30;
}




#search_tour .hotels_container{
	position:relative;
}

#search_tour .footer .right {
    position:absolute;
    left:800px;
}


#search_tour .tourists {
	width:80px !important;
}






.HOTELSCONTAINER{ 
	display:none;
   
}

.price_legend{
	DISPLAY:NONE;
}


.hotels_container{
	display:none;
}


.programm_filter{
	display:none;
}


.searchmodes{
	display:none;
}




.empty{
	display:none;
}

.description::after{
	content:'';
}

.panel{
	width:100%;
}

.direction,.user_info{
	width:320px !important;
	
}

.col{
	width:0px !important;
}

.user_info{
	margin-top:60px !important;
}

.samo_container .panel {
    margin-bottom: 40px !important;
    box-shadow:none !important;
}

.samo_container .panel, #modalContainer div.modalTitle, #logonContainer div.modalTitle {
    background-color: transparent !important;
}

.samo_container{
	background-color:transparent !important;
	margin-left:20px !important;
}

.scr_block{
	width:354px;
	height:290px;
	margin:auto;
	background-color: rgba(34, 38, 69, 0.7);
	color:white;
	position:relative;
	border-radius:3px;
}

.scr_block h1{
	font-size:25px;
	text-align:center;
}

.eraser{
	display:none;
}

#search_tour{
	position:relative !important;
}


#search_tour .direction td {
    padding:3px 10px !important; 
}

.townfrom_block{
	position: absolute;
	top: 50px;
    left: 33px;
    font-size: 13px;
}

.townto_block{
	position: absolute;
	top: 48px;
	right: 33px;
    font-size: 13px;
}

.viezd{
	position: absolute;
	top: 113px;
    left: 32px;
    font-size: 13px;
}

.adult_block{
	position: absolute;
	font-size: 13px;
    top: 175px;
    left: 31px;
}

.child_block{
	position: absolute;
	top: 175px;
    font-size: 13px;
    right: 33px;
}

.count_nights{
	position:absolute;
	font-size: 13px;
    top: 113px;
    left: 284px;
}

.transport_block{
	text-align:center;
	position:absolute;
	top:190px;
	width:100%;
	z-index:1111;
	display:none;
}

.transport_item {
    padding: 8px;
    color: black;
    border-radius: 5px;
    display: inline-block;
    background-color: white;
    font-size:15px;
}

.load {
    background-color: #31d004;
    border: 0px;
    font-weight: 600;
    position: absolute;
    padding: 10px 18px !important;
    border-radius: 5px;
    top:240px;
    left:120px;
}

.load a{
	 text-decoration: none;
	color:black;
}

.position_scr{
	position:absolute;
	left: 70%;
}

#search_tour .std {
    margin: auto;
    width: 100% !important;
    border-spacing: 0px !important;
}

.samo_container select, .samo_container textarea, .samo_container .textinput, .samo_container input.frm-value, .samo_container input.frm-input {
    background-color: #ffffff;
    border: 1px solid #999999;
    border-radius: 5px;
    padding: 1px 2px;
    font-size: 13px;
    height: 30px !important;
    line-height: 18px;
    font-weight:600;
    width: 100%;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -webkit-transition: background-color 1200ms linear;
    -moz-transition: background-color 1200ms linear;
    -o-transition: background-color 1200ms linear;
    -ms-transition: background-color 1200ms linear;
    transition: background-color 1200ms linear;
}


.TOWNFROMINC{
	width:140px !important;
}

.STATEINC{
	width:140px !important;
	position:absolute;
	left:-20px;
}

.Zebra_DatePicker_Icon_Wrapper{
	width:145px !important;
}

.CHECKIN_BEG{
	width:140px !important;
}

.Zebra_DatePicker_Icon Zebra_DatePicker_Icon_Inside{
	left: 120px !important;
}

.ADULT{
	width:40px !important;
}

.CHILD{
	width:40px !important;
	position: absolute;
    right: 37px;

}
.NIGHTS_FROM{
	width:140px !important;
	position: absolute;
    left: 163px;
}
a{
	COLOR:black;
	text-decoration:none;
}


.reverse_dot{
	justify-content: flex-end;
}
.banner25 {
margin-top: -45px;
margin-bottom: -10px;

}

.catalogs{
	position:fixed;
	width:300px;
	height:auto;
	top:520px;
	left:10px;
	z-index:1111;
	opacity:0.6;
}


.fa-times{
	position:absolute;
	top:5px;
	left:265px;
	z-index:1111;
	color:red;
}

.catalogs_download{
	background-color:#575757;
	padding-bottom:10px;
}




.catalogs_download p{
	font-weight:800;
}



.big_offer_item{
	width: 915px;
    	margin: auto;
	position:relative;
}


.catalogs_button_download{
	width: 200px;
	position:absolute;
	top:10px;
	left:691px;
	padding:5px;
	border:1px solid white;
	background-color: #31d004;
	border-radius:50px;
	color:white;
	font-size:17px;
}


.banner_for_25{
	position:fixed;
	width: 26%;
    	left: 36%;
    	top: 171px;
	z-index:111;
	display:none;
}

.banner_for_25 img{
	width:100%;
	height:auto;
}

.fa-times{
	position:absolute;
	z-index:11111;
	color:red;
	left: 83%;
    	top: 10px;
}

.note_container{
	display:none;
}
</style>
<body>
	<div class="wrapper">
		<?php get_header(); ?>
	<div class="banner_for_25 rotateIn animated"><a href="bolgaria-travel.com/akcii"><img src="http://bolgaria-travel.com/wp-content/uploads/всплывающий-баннер-25000.png"></a><i class="fa fa-times fa-4x" aria-hidden="true"></i></div>
	<div class="position_scr">
		<div class="scr_block"><h1>Подбор тура онлайн</h1>
<div class="townfrom_block">Город отправления</div>
<div class="viezd">Выезд/вылет</div>
<div class="townto_block">Страна</div>
<div class="adult_block">Взр.</div>
<div class="child_block">Детей</div>
<div class="count_nights">Ночей</div>
<button ><a class='load' href="http://bolgaria-travel.com/hotels/">Результаты</a></button>
<div class="transport_block">
	<div class="transport_item bus"> <i class="fa fa-bus" aria-hidden="true"></i> Автобус </div>
	или
	<div class="transport_item plane">Самолет <i class="fa fa-plane" aria-hidden="true"></i></div>
</div>
<script src="http://37.18.77.200/search_tour?samo_action=embed" charset="windows-1251"></script></div></div>
            	<img class="img_big" src="http://bolgaria-travel.com/wp-content/uploads/slider.png" style="width:100%">
    	</div><br>
    	<div class="offers">
		<div class="big_offer_item">
			<a href="http://bolgaria-travel.com/many_akcii/">
				<img src="http://bolgaria-travel.com/wp-content/uploads/123123123.png">
				<button class="catalogs_button_download" ><a href="http://bolgaria-travel.com/many_akcii/">Читать подробнее<br> об акции</a></button>
			</a>
		</div>
		<a href=" http://bolgaria-travel.com/hotels-spo/">
    		<div class="offers_item">
    			<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/02/spo-pink.jpg" alt="">

    		</div>
		</a>


		<a href=" http://bolgaria-travel.com/hotels-more/">
    		<div class="offers_item">
    			<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/summer.png" alt="">
    			<div class="offers_link">
    				<div class="offers_name"><p>Отдых на море</p></div>
    				<div class="offers_price">от 79€</div>
    			</div>
    		</div>
		</a>
		<a href=" http://bolgaria-travel.com/hotels-ozdorovlenie/">
    		<div class="offers_item">
    			<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/ozdorovlenie.png" alt="">
    			<div class="offers_link">
    				<div class="offers_name"><p>Оздоровительный туризм</p></div>
    				<div class="offers_price">от 150€</div>
    			</div>
    		</div>
		</a>


			
			<div class="why_we">
				<div class="why_we_item">
					<h1>Поддержка</h1>
					<div class="blue"></div>
					<p><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/24.png">Помощь каждому  клиенту 24/7</p>

				</div>
				<div class="why_we_item">
					<h1>Круглый год</h1>
					<div class="green"></div>
					<p><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/money.png">Предложения на любое время года</p>
				</div>
				<div class="why_we_item">
					<h1>Безопасно</h1>
					<div class="darkgreen"></div>
					<p><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/safe.png">Поддержка клиентов за рубежом</p>
				</div>
				<div class="why_we_item">
					<h1>Удобно</h1>
					<div class="darkyellow"></div>
					<p><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/good.png">Оплачивайте так, как удобно Вам</p>
				</div>
			</div>

			<div class="hot_tour">
				<div class="hot_tour_item">
					<div class="item">
						<a href="http://bolgaria-travel.com/hot_tour/gardeniya-4-novyj-god/"><div class="item_offer">
							<div class="item_price">от 270€</div> 
							<div class="item_text">Гардения 4*, Банско</div>
						</div></a>
						<a href="http://bolgaria-travel.com/hot_tour/detskij-lager-serdika/"><div class="item_offer">
							<div class="item_price">от 167€</div>
							<div class="item_text">Лагерь «Сердика»</div>
						</div></a>
						<a href="http://bolgaria-travel.com/hot_tour/balneo-tur-aura/"><div class="item_offer">   
							<div class="item_price">от 251€</div>
							<div class="item_text">Бальнео-тур Аура</div>
						</div></a>
						<a href="http://bolgaria-travel.com/hot_tour/ruskovec-4-dobrinishte/"><div class="item_offer">
							<div class="item_price">от 330€</div>
							<div class="item_text">Зимние каникулы</div>
						</div></a>
					</div>
					<div class="item hot_img">
						<button class="hot_tour_button">Горящие туры</button>
					</div>
				</div>
			</div>
			<div class="hot_tour top_kur">
				<div class="hot_tour_item">
					<div class="item top_kurort">
						<button class="top_kurort_button">Топ курортов</button>
					</div>
					<div class="item">
						<a href="http://bolgaria-travel.com/hotels/?top_kurort=1529"><div class="item_offer">
							
							<div class="item_text top">Банско</div>
							<div class="item_price">от 152€</div>
						</div></a>
						<a href="http://bolgaria-travel.com/hotels/?top_kurort=1530"><div class="item_offer">
							
							<div class="item_text top">Боровец</div>
							<div class="item_price">от 169€</div>
						</div></a>
						<a href="http://bolgaria-travel.com/hotels/?top_kurort=1748"><div class="item_offer">
							<div class="item_text top">Велинград</div>
							<div class="item_price">от 154€</div>
						</div></a>
						<a href="http://bolgaria-travel.com/hotels/?top_kurort=1750"><div class="item_offer">
							<div class="item_text top">Хисаря</div>
							<div class="item_price">от 132€</div>
						</div></a>
					</div>
				</div>
			</div>
		<a href=" http://bolgaria-travel.com/hotels-gori/">
    		<div class="offers_item">
    			<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/gori.png" alt="">
    			<div class="offers_link">
    				<div class="offers_name"><p>Горнолыжный туризм</p></div>
    				<div class="offers_price">от 86€</div>
    			</div>
    		</div>
		</a>
		<a href="http://bolgaria-travel.com/hotels-meal/">
    		<div class="offers_item">
    			<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/all.png" alt="">
    			<div class="offers_link">
    				<div class="offers_name"><p>Все включено</p></div>
    				<div class="offers_price">от 142€</div>
    			</div>
    		</div>
		</a>
		<a href="http://bolgaria-travel.com/hotels-children/">
    		<div class="offers_item">
    			<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/children.png" alt="">
    			<div class="offers_link">
    				<div class="offers_name"><p>Детский туризм</p></div>
    				<div class="offers_price">от 81€</div>
    			</div>
    		</div>
		</a><br>

		<a href=" http://bolgaria-travel.com/hotels-ozdorovlenie/">
    		<div class="offers_item">
    			<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/learn.png" alt="">
    			<div class="offers_link">
    				<div class="offers_name"><p>Лечебный туризм</p></div>
    				<div class="offers_price">от 150€</div>
    			</div>
    		</div>
		</a>
<br>
    	</div>

<div class="banner25" align="center"><a href="http://bolgaria-travel.com/akcii/" target="_blank"><img src="http://bolgaria-travel.com/wp-content/uploads/banner_25.png" border="0"></a></div>

    	<div class="parallax-container" data-parallax="scroll" data-bleed="10" data-image-src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/night.png"  >
    		<div class="parallax_content">
    			<p>Наша компания «Fly Travel» — лицензированный украинский туроператор, который имеет надежные партнерские отношения с многими странами и обеспечивает наиболее качественную подготовку документов и надежную поддержку за границей.
Наша компания – одна из немногих, которым дорог каждый гость. Мы облегчаем все заботы, бережем ваши нервы, готовим идеальный отпуск от и до. Не зависимо от времени суток и дня недели наши туристы могут обратиться к нам, и мы решим все возможные вопросы.
Всеобъемлющий комплекс услуг и индивидуальный подход фирмы «Fly Travel» – это гарантия того, что вы останетесь довольны своим отдыхом: мы работаем исключительно на положительный результат и прилагаем максимум усилий для того, чтобы вы обращались к нам снова и снова.
</p>
    			<h1>Что мы предлагаем?</h1>
    			<div class="dots_block">
	    			<div class="dots">
	    				<div class="dots_item">
	    					<div class="item_count">1</div>
	    					<div class="item_text">Туризм на любой вкус круглый год: морской, горнолыжный, бальнеологический, семейный, детский, свадебный, винный, этнографический, спортивный и бизнес туризм, а также интереснейшие экскурсионные программы.</div>
	    				</div>
	    				<div class="dots_item">
	    					<div class="item_count">2</div>
	    					<div class="item_text">Надежных и проверенных перевозчиков, гарантированные места в отелях, безопасность, гостеприимную принимающую сторону в Болгарии, ответственный персонал - наилучший в сфере туризма.</div>
	    				</div>
	    				<div class="dots_item">
	    					<div class="item_count">3</div>
	    					<div class="item_text"</div>Различную ценовую политику - от качественного экономного до элитного и изысканного отдыха в лучших отелях класса «люкс».</div>
</div></div>
	    			<div class="dots">
	    				<div class="dots_item reverse_dot">
	    					<div class="item_text new_text">Наш собственный отель «Кристалл» на побережье Черного моря, с комфортными номерами, приветливым персоналом и домашней болгарской кухней — рай для отпуска с любимой семьей.</div>
	    					<div class="item_count">4</div>
	    				</div>
	    				<div class="dots_item reverse_dot">					
	    					<div class="item_text new_text">Отдых для групп детей с руководителями, детские лагеря. Дайте возможность Вашим детям прочувствовать командный дух, развить свои таланты, найти новых друзей, испытать первые симпатии. Вспомните Ваше счастливое детство!</div>
	    					<div class="item_count">5</div>
	    				</div>
	    				<div class="dots_item reverse_dot">
	    					<div class="item_text new_text">Недвижимость по всей территории Болгарии. Кто не мечтает о собственном домике у Черного моря, коттедже в заснеженных Пиринских горах или апартаментах в столице страны — Софии?</div>
	    					<div class="item_count">6</div>
	    				</div>
	    			</div>
	    		</div>
    		</div>
    	</div>




    	<div class="heading-style3" align="center">
    		<h2>Видео о Болгарии</h2>
    		<div class="hr"></div>
    		<div class="video_block">
	    		<a href="https://www.youtube.com/embed/BAqXAhIRQbI" class="fancybox">
					<img src="http://moscow.bolgaria-travel.com/wp-content/uploads/5-4-699x330.png"></a>
				<div class="overlay_img"></div>
			</div>
			<div class="video_block">
	    		<a href="https://www.youtube.com/embed/uJNSb_gYHRg" class="fancybox">
					<img src="http://moscow.bolgaria-travel.com/wp-content/uploads/6-3-699x330.png"></a>
				<div class="overlay_img"></div>
				</a>
			</div>
			<div class="video_block">
	    		<a href="https://www.youtube.com/embed/DU0wHbUpiO4" class="fancybox">
					<img src="http://moscow.bolgaria-travel.com/wp-content/uploads/7-2-699x330.png"></a>
				<div class="overlay_img"></div>
				</a>
			</div>
			<div class="video_block">
	    		<a href="https://www.youtube.com/embed/zRa6Vp3PNfg" class="fancybox">
					<img src="http://moscow.bolgaria-travel.com/wp-content/uploads/8-2-699x330.png"></a>
				<div class="overlay_img"></div>
			</div>


			<div class="video_block">
	    		<a href="https://www.youtube.com/embed/EAKB1C1Ac28" class="fancybox">
					<img src="http://moscow.bolgaria-travel.com/wp-content/uploads/1-6-699x330.png">
				<div class="overlay_img"></div></a>
			</div>
			<div class="video_block">
	    		<a href="https://www.youtube.com/embed/KDu_TjX_P4c" class="fancybox">
					<img src="http://moscow.bolgaria-travel.com/wp-content/uploads/2-5-699x330.png"></a>
				<div class="overlay_img"></div>
				</a>
			</div>
			<div class="video_block">
	    		<a href="https://www.youtube.com/embed/-QrG5HJLf5E" class="fancybox">
					<img src="http://moscow.bolgaria-travel.com/wp-content/uploads/3-5-699x330.png"></a>
				<div class="overlay_img"></div>
				</a>
			</div>
			<div class="video_block">
	    		<a href="https://www.youtube.com/embed/q3p0i5g309k" class="fancybox">
					<img src="http://moscow.bolgaria-travel.com/wp-content/uploads/4-5-699x330.png"></a>
				<div class="overlay_img"></div>
			</div>
    	</div>
    	<div class="counter">
    		<div class="counter_item">
    			<i class="fa fa-users fa-3x" aria-hidden="true"></i>
    			<p class="equal c1">0</p>
    			<div class="white"></div>
    			<p>ТЫС. ТУРИСТОВ В ГОД</p>
    		</div>

    		<div class="counter_item">
    			<i class="fa fa-plane fa-3x" aria-hidden="true"></i>
    			<p class="equal c2">0</p>
    			<div class="white"></div>
    			<p>ЧАРТЕРНЫХ РЕЙСОВ</p>
    		</div>

    		<div class="counter_item">
    			<i class="fa fa-thumbs-up fa-3x" aria-hidden="true"></i>
    			<p class="equal c3">0</p>
    			<div class="white"></div>
    			<p>ЭКСКУРСИОННЫХ ТУРА</p>
    		</div>

    		<div class="counter_item">
    			<i class="fa fa-calendar fa-3x" aria-hidden="true"></i>
    			<p class="equal c4">0</p>
    			<div class="white"></div>
    			<p>ДОСТУПНО ОТЕЛЕЙ</p>
    		</div>
    	</div>
		
    		<?php get_footer(); ?>
	</div>
	<script type="text/javascript">

var body=$('body');
	var modal;
	var overlay;
	$('.video_block').on('click',showModal);

	function showModal(e)
	{
		var a=$(this).children('a');
		var href=a.attr('href');
		console.log('fancy',href);
		 modal=$('<div class="fancybox-modal"><iframe  width="100%" height="100%"  frameborder="0" allowfullscreen src='+href+'></div> ');
			 overlay=$('<div class="fancybox-overlay">')

			e.preventDefault();
			overlay.on('click',hideModal);
			body.append(overlay);
			body.append(modal);	
	}

	function hideModal()
		{
			modal.hide();
			overlay.hide();
		}



		var c1=0;
		var c2=0;
		var c3=0;
		var c4=0;
		$(function(){
			$('.menu_item').hover(
    			function() {
      				$('ul', this).slideDown(110);
    				},
    			function() {
      			$('ul', this).slideUp(50);
    				});

			var someInterval1=function(){
				c1++;
				$('.c1').text(c1);
				if (c1==392)
				{
					clearInterval(interval1);
				}
			};

			var someInterval2=function(){
				c2++;
				$('.c2').text(c1);
				if (c2==250)
				{
					clearInterval(interval2);
				}
			};

			var someInterval3=function(){
				c3++;
				$('.c3').text(c3);
				if (c3==102)
				{
					clearInterval(interval3);
				}
			};

			var someInterval4=function(){
				c4++;
				$('.c4').text(c4);
				if (c4==415)
				{
					clearInterval(interval4);
				}
			};
			var interval1=setInterval(someInterval1,1);
			var interval2=setInterval(someInterval2,1);
			var interval3=setInterval(someInterval3,1);
			var interval4=setInterval(someInterval4,1);



			var body=$('body');
	var modal;
	var overlay;
	

			 $(window).scroll(function(){
        var bo = $(this).scrollTop();  
        if (bo<=94)  {
        	$(".header_block").css('box-shadow','0 0 0 0');
        	$(".header_block").css('position','relative');
        	$(".header_block").css('margin-top','10px');
        }         
		if ( bo >= 94) {
			$(".header_block").css('box-shadow','0 2px  rgba(0,0,0,0.2)');
			$(".header_block").css('position','fixed');
			$(".header_block").css('margin-top','0px');
			$(".header_block").css('z-index','1111');
			}
		});
	});
	
	var tr=$('.panel').children().children();
	console.log(tr);
	$(tr[0]).css('width','100%');
	$(tr[2]).css('width','100%');
	$(tr[2]).css('display','flex');
	$(tr[2]).css('justify-content','space-between');
	$(tr[3]).css('display','none');
	$(tr[4]).css('position','absolute');
	$(tr[4]).css('width','120px');
	$(tr[4]).css('left','-320px');
	$(tr[4]).css('top','68px');
	$(tr[5]).css('position','absolute');
	$(tr[5]).css('width','120px');
	$(tr[5]).css('left','-100px');
	$(tr[5]).css('top','68px');
	var tr0=$(tr[0]).children();
	$(tr0[1]).css('display','none');
	var tr00=$(tr0[0]).children().children().children().children();
	console.log(tr00);
	$(tr00[0]).css('display','none');
	$(tr00[1]).css('position','absolute');
	$(tr00[1]).css('left','2px');
	$(tr00[1]).css('width','120px');
	$(tr00[2]).css('display','none');
	$(tr00[3]).css('position','absolute');
	$(tr00[3]).css('left','183px');
	//$(tr00[3]).css('top','259.3px');
 	//$(tr00[3]).css('width','120px');
	var tr4=$(tr[4]).children();
	var tr5=$(tr[5]).children();
	console.log(tr4);
	for (var i=2; i<tr4.length; i++)
	{
		$(tr4[i]).css('display','none');
		$(tr5[i]).css('display','none');
	}
	
	var col=$('.col').children();
	console.log(col);
	var panel1=$(col[1]).children();
	$(panel1).css('diplay','flex');
	$(panel1).css('justify-content','space-between');
	$('.description').css('display','none');
	$('.description2').css('display','none');
	$('.description3').css('display','none');
	
	var user_info=$('.user_info').children().children().children();
	console.log(user_info);
	$(user_info[2]).css('position','absolute');
	//$(user_info[2]).css('width','0px !important');
	
	$('.load').click(function(){
		
		var new_hotel_links_name='http://bolgaria-travel.com/hotels/?data_tour=_'+$('.NIGHTS_FROM').val()+'_'+$('.CHECKIN_BEG').val()+'_'+$('.ADULT').val()+'_'+$('.CHILD').val()+'_'+$('.STATEINC').val();
					$('.load').attr("href", new_hotel_links_name);
 
	});



	var bus=0;
	var plane=0;
	$('.bus').click(function(){
		bus++;
		if (bus%2==1)
		{
			$(this).css('background-color','green');
			$(this).children('i').css('color','white');
			$(this).css('color','white');
			
		}
		else{
			$(this).css('background-color','white');
			$(this).children('i').css('color','black');
			$(this).css('color','black');
		}
});

	$('.plane').click(function(){
		plane++;
		if (plane%2==1)
		{
			$(this).css('background-color','green');
			$(this).children('i').css('color','white');
			$(this).css('color','white');
		}
		else{
			$(this).css('background-color','white');
			$(this).children('i').css('color','black');
			$(this).css('color','black');
		}
});
	

</script>
</body>
</html>