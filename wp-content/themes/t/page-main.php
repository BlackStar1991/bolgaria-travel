<?php
/*
Template Name: page-main
*/ ?>




<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/wp-content/themes/t/css/font-awesome.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<script src="/wp-content/themes/t/js/parallax/parallax.js" type="text/javascript"></script>
</head>
<style>
*{
	margin:0;
	padding: 0;
}



.header_item{
	margin-right:5%;
	margin-bottom: 0px;
	    margin-top:12px;
}


body{
	font-family: 'Source Sans Pro', sans-serif;
}


.wrapper{
	width: 100%;
	display: block;vi
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



.offers_item{
	width: auto;
	margin:10px 1.5% 0px 1.5%;
	height: 220px;
	border: 3px solid white;
	border-radius: 3px;
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
	margin-top: 60px;
	width: 98%;
	padding:10px 1% 10px 1%;
	text-align: center;
}

.hr{
	width: 10%;
	margin: auto;
	box-sizing:border-box;
	border:1px solid #cacaca;
	margin-top: 10px;
	margin-bottom: 10px;
}

.video_block{
	width: 20%;
	margin:10px 1.5% 10px  1.5%;
	display: inline-block;
	border: 1px solid grey;
	padding: 12px;
	overflow: hidden;
	height: auto;
	background-color:red;
}

.video_block img{
	width: 100%;
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
	width:370px;
	height:350px;
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
    left: 282px;
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
    top: 241px;
    left: 31px;
}

.child_block{
	position: absolute;
	top: 242px;
    font-size: 13px;
    left: 288px;
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
    top:300px;
    left:106px;
}

.load a{
	 text-decoration: none;
	color:white;
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
	width:145px !important;
}

.STATEINC{
	width:145px !important;
	position:absolute;
	left:-17px;
}

.Zebra_DatePicker_Icon_Wrapper{
	width:145px !important;
}

.CHECKIN_BEG{
	width:145px !important;
}

.Zebra_DatePicker_Icon Zebra_DatePicker_Icon_Inside{
	left: 120px !important;
}

.ADULT, .CHILD{
	    margin-top: 60px !important;
}



.NIGHTS_FROM{
	width:145px !important;
	position: absolute;
    left: 165px;
}
a{
	COLOR:black;
	text-decoration:none;
}

</style>
<body>
	<div class="wrapper">
		<?php get_header(); ?>
		<div class="img">
	<div class="position_scr">
		<div class="scr_block"><h1>Подбор тура онлайн</h1>
<div class="townfrom_block">Город отправления</div>
<div class="viezd">Выезд/вылет</div>
<div class="townto_block">Страна</div>
<div class="adult_block">Взр.</div>
<div class="child_block">Детей</div>
<div class="count_nights">Ночей</div>
<button ><a class='load' href=" http://bolgaria-travel.com/hotels/">Результаты</a></button>
<div class="transport_block">
	<div class="transport_item bus"> <i class="fa fa-bus" aria-hidden="true"></i> Автобус </div>
	или
	<div class="transport_item plane">Самолет <i class="fa fa-plane" aria-hidden="true"></i></div>
</div>
<script src="http://37.18.77.200/search_tour?samo_action=embed" charset="windows-1251"></script></div></div>
            	<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/slide.png">
    	</div>
    	<div class="offers">
		<a href="http://hotels.bolgaria-travel.com/hotels/?tour_data_type=1000026">
    		<div class="offers_item">
    			<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/summer.png" alt="">
    			<div class="offers_link">
    				<div class="offers_name"><p>Отдых на море</p></div>
    				<div class="offers_price">от 79€</div>
    			</div>
    		</div>
		</a>
		<a href="http://hotels.bolgaria-travel.com/hotels/?tour_data_type=1000030">
    		<div class="offers_item">
    			<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/ozdorovlenie.png" alt="">
    			<div class="offers_link">
    				<div class="offers_name"><p>Оздоровительный туризм</p></div>
    				<div class="offers_price">от 150€</div>
    			</div>
    		</div>
		</a>
		<a href="http://hotels.bolgaria-travel.com/hotels/?tour_data_type=1000027">
    		<div class="offers_item">
    			<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/learn.png" alt="">
    			<div class="offers_link">
    				<div class="offers_name"><p>Лечебный туризм</p></div>
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
						<a href="http://bolgaria-travel.com/hot_tour/tur-dlya-kompanii/"><div class="item_offer">
							<div class="item_price">от 99€</div> 
							<div class="item_text">Тур для компании</div>
						</div></a>
						<a href="http://bolgaria-travel.com/hot_tour/grami-3/"><div class="item_offer">
							<div class="item_price">от 244€</div>
							<div class="item_text">Грами 3*, Банско</div>
						</div></a>
						<a href="http://bolgaria-travel.com/hot_tour/gardeniya-4-novyj-god/"><div class="item_offer">   
							<div class="item_price">от 270€</div>
							<div class="item_text">Гардения 4*, Банско</div>
						</div></a>
						<a href="http://bolgaria-travel.com/hot_tour/balneo-tur-aura/"><div class="item_offer">
							<div class="item_price">от 251€</div>
							<div class="item_text">Бальнео-тур Аура</div>
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
						<a href="http://hotels.bolgaria-travel.com/hotels/?top_kurort=1529"><div class="item_offer">
							
							<div class="item_text top">Банско</div>
							<div class="item_price">от 152€</div>
						</div></a>
						<a href="http://hotels.bolgaria-travel.com/hotels/?top_kurort=1530"><div class="item_offer">
							
							<div class="item_text top">Боровец</div>
							<div class="item_price">от 169€</div>
						</div></a>
						<a href="http://hotels.bolgaria-travel.com/hotels/?top_kurort=1748"><div class="item_offer">
							<div class="item_text top">Велинград</div>
							<div class="item_price">от 154€</div>
						</div></a>
						<a href="http://hotels.bolgaria-travel.com/hotels/?top_kurort=1750"><div class="item_offer">
							<div class="item_text top">Хисаря</div>
							<div class="item_price">от 132€</div>
						</div></a>
					</div>
				</div>
			</div>
		<a href="http://hotels.bolgaria-travel.com/hotels/?tour_data_type=1000003">
    		<div class="offers_item">
    			<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/gori.png" alt="">
    			<div class="offers_link">
    				<div class="offers_name"><p>Горнолыжный туризм</p></div>
    				<div class="offers_price">от 86€</div>
    			</div>
    		</div>
		</a>
		<a href="http://hotels.bolgaria-travel.com/hotels/?tour_data_type=1">
    		<div class="offers_item">
    			<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/all.png" alt="">
    			<div class="offers_link">
    				<div class="offers_name"><p>Все включено</p></div>
    				<div class="offers_price">от 142€</div>
    			</div>
    		</div>
		</a>
		<a href="http://hotels.bolgaria-travel.com/hotels/?tour_data_type=1000028">
    		<div class="offers_item">
    			<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/children.png" alt="">
    			<div class="offers_link">
    				<div class="offers_name"><p>Детский туризм</p></div>
    				<div class="offers_price">от 81€</div>
    			</div>
    		</div>
		</a>
    	</div>
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
	    				<div class="dots_item">
	    					<div class="item_text new_text">Наш собственный отель «Кристалл» на побережье Черного моря, с комфортными номерами, приветливым персоналом и домашней болгарской кухней — рай для отпуска с любимой семьей.</div>
	    					<div class="item_count">4</div>
	    				</div>
	    				<div class="dots_item">					
	    					<div class="item_text new_text">Отдых для групп детей с руководителями, детские лагеря. Дайте возможность Вашим детям прочувствовать командный дух, развить свои таланты, найти новых друзей, испытать первые симпатии. Вспомните Ваше счастливое детство!</div>
	    					<div class="item_count">5</div>
	    				</div>
	    				<div class="dots_item">
	    					<div class="item_text new_text">Недвижимость по всей территории Болгарии. Кто не мечтает о собственном домике у Черного моря, коттедже в заснеженных Пиринских горах или апартаментах в столице сраны — Софии?</div>
	    					<div class="item_count">6</div>
	    				</div>
	    			</div>
	    		</div>
    		</div>
    	</div>




    	<div class="travel_to_bolgaria">
    		<h1>Видео из поездок наших клиентов</h1>
    		<div class="hr"></div>
    		<div class="video_block">
	    		<a href="https://www.youtube.com/embed/4xCNx6RWquc" class="fancybox">
					<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/phon1.png">
				</a>
			</div>
			<div class="video_block">
	    		<a href="https://www.youtube.com/embed/DU0wHbUpiO4" class="fancybox">
					<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/phon4.png">
				</a>
			</div>
			<div class="video_block">
	    		<a href="https://www.youtube.com/embed/zRa6Vp3PNfg" class="fancybox">
					<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/phon2.png">
				</a>
			</div>
			<div class="video_block">
	    		<a href="https://www.youtube.com/embed/mmdW9ve-lsg" class="fancybox">
					<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/phon3.png">
				</a>
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
    			<p>ЭКСКУРСИОННЫХ ТУРАХ</p>
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

		var c1=0;
		var c2=0;
		var c3=0;
		var c4=0;
		$(function(){

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
				if (c4==127)
				{
					clearInterval(interval4);
				}
			};
			var interval1=setInterval(someInterval1,1);
			var interval2=setInterval(someInterval2,1);
			var interval3=setInterval(someInterval3,1);
			var interval4=setInterval(someInterval4,1);



			var body=$('body');


	
	var tr=$('.panel').children().children();
	console.log(tr);
	
console.log("OK!");
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
	console.log(tr00   + " Show tr00");
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
	console.log(col   +  " = данные");
	var panel1=$('.col[1]').children();     /* ПРАВКИ АНДРЕЯ*/
	$(panel1).css('diplay','flex');
	$(panel1).css('justify-content','space-between');
	$('.description').css('display','none');
	$('.description2').css('display','none');
	$('.description3').css('display','none');
	
	var user_info=$('.user_info').children().children().children();
	console.log(user_info + "  =USER INFORMATION");
	$(user_info[2]).css('position','absolute');
	//$(user_info[2]).css('width','0px !important');
	
	$('.load').click(function(){
		
		var new_hotel_links_name='http://hotels.bolgaria-travel.com/hotels/?data_tour=_'+$('.NIGHTS_FROM').val()+'_'+$('.CHECKIN_BEG').val()+'_'+$('.ADULT').val()+'_'+$('.CHILD').val()+'_'+$('.STATEINC').val();
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
	
/*var XHR = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;

var xhr = new XHR();

// (2) запрос на другой домен :)
xhr.open('GET', 'http://37.18.77.200/samo/default.php', true);

xhr.onload = function() {
  alert( this.responseText );
}

xhr.onerror = function() {
  alert( 'Ошибка ' + this.status );
}

xhr.send();*/

</script>
</body>
</html>