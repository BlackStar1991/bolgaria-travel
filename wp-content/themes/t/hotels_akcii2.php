<?php
/*
Template Name: hotels_akcii2
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

hr{
	background-color:white !important;
}

.red{
	position:absolute;
	top:200px;
	left:400px;
}


.scr_block{
width:1020px;
height: 200px;
margin:auto;
border-radius:5px;
margin-bottom:2000px;
margin-top:20px;
 background-color:#535353;
position:relative;
}

.scr_block h1{
	color:white;
	font-weight:500;
	margin-left:50px;
	padding-top:10px;
}

/*SAMOTOOR BLOCK CHENGE BEGIN*/
.samo_container .panel, #modalContainer div.modalTitle, #logonContainer div.modalTitle {
   background-color:#535353 !important;
}

.samo_container .panel {box-shadow:none !important;}

.samo_container{
	margin-top:0px;
}

.tourists{
	padding-top:-100% !important;
}

.panel{
	display:flex;
	align-items:center;
	color:white;
}

#search_tour .user_info {
    width: 56% !important;
}

.load {
   	background-color: #31d004;
	border:0px;
	font-weight:600;
	position:absolute;
	top:-20px;
	left:-40px;
	padding:10px 18px !important;
	border-radius:5px;
}

.calendar{
	position: relative;
	top:-17px;
	left:-120px;
}

.samo_container {
    background: transparent !important;
}


.empty{display:none;}

#search_tour .hotels_container{
	position:relative;
	background-color:transparent !important
	
}

#search_tour .hotels_container td {
    padding: 5px;
    text-align: center;
    width: 30;
}

.samo_container .panel {
    color: white;
}
.samo_container .width100p {
    color: white;
}


#search_tour{color:white;}

#search_tour .std {width:100% !important; color:white; border-radius:5px !important}

.HOTELSCONTAINER{ 
	//display:none;
    position: absolute;
    left: -950px;
    display: flex;
    flex-wrap: wrap;
    width: 195px;
    top: 192px;
}
.ROOM{display:none;}
#search_tour .w380 {
	width:155px !important; 
	text-align:left !important;
}

.control_stars{
	width:165px !important;
	height:145px !important}

.control_hotels{
	display: block !important;
    overflow: auto !important;
    width: 165px !important;
	margin-top:50px;
	text-align:left;
	height:200px;
	z-index:111;
	color:black;
	
}

.TOWNTO_ANY{display:none;}


.control_hotels .header{
	//display:none;
}

.control_meal{
	width:165px !important;
	margin-top:10px !important;
}


.control_townto{
	height:210px; !important}
.samo_container .checklistbox {
    overflow: -moz-scrollbars-vertical !important;
    border:0px !important;
    padding: 5px !important; 
    height: 11em;
    overflow-y: visible !important; 
    overflow-x:visible !important
    text-align: left;
    margin: auto;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}


.TOWNTO{
color: black; font-weight:600;

}

#search_tour .tourists {
	width:80px !important;
}



#search_tour .direction {
    width: 36% !important;
	border-radius: 5px;
}

#search_tour .direction .direction_right {
    width: 70%;
    text-align: left;
    padding-top: 21px !important;
}


#search_tour .hotels_container .checklistbox {
    height: 13em;
    float: left;
}

#modalContainer{display:block}

.searchmodes{
	display:none;
}

.price_legend{
	display:none;
	position:absolute;
	width:100% !important;
	background-color:white;
	top:180px;
	border-radius:5px !important;
	
}

.resultset{
	padding: 0 !important;
}

.current_page{ color:black !important}
.page{color:black !important}


#search_tour .std {
	display:flex;
	align-items:center;
}

.description::after{
	content:'' !important;
}



.Zebra_DatePicker_Icon Zebra_DatePicker_Icon_Inside{
	left:75px;
}

.Zebra_DatePicker_Icon_Wrapper{
	position: absolute !important;
	top:31px !important;
	left:90px !important;
}


.samo_container input.date {
    font-size: 13px;
    width: 90px !important;
}
.spin{
	width:42px !important;
}
.TOWNFROMINC{
	width:150px !important;

margin-top: -16%; margin-left: -15%;
}



.STARS{color: black;
 width:156px !important;
 height:250px !important;}

.TOWNTO_ANY{display:none;}


.HOTELS{color:black}

.MEAL{color:black}

.ROOM{color:black}

.STATEINC{
	width:135px !important;

margin-top: -18%; margin-left: -35%;

}

.samo_container .Zebra_DatePicker.dp_visible {
    top: 100px !important;
	left: 500px !important
}
/*SAMOTOOR BLOCK CHENGE END*/

body{
	font-family: 'Source Sans Pro', sans-serif;
}


.wrapper{
	width: 100%;
	display: block;
}


.content{
	width: 1024px;
	margin: auto;
	display: flex;
	align-items:flex-start;
	justify-content: flex-end;
}




.filter{
	width: 20%;
	//display: inline-block;
	display:none;
}


h3{
	margin-bottom: 10px;
}


.filter li{
	list-style: none;
	margin-top: 10px;
	margin-bottom: 10px;
}


.filter ul{
	margin-left: 10px;
}

.filter_item{
	width: 100%;
	border-top: 2px solid orange;
	border-bottom: 2px solid orange;
	padding: 20px 0px 20px 0px;
}
.filter_item p{
	padding-left: 10px;
}

.spisok_item{
	display: flex;
	align-items:center;
}

.checkbox{
	width: 20px;
	height: 20px;
	border: 1px solid grey;
	border-radius: 2px;
	display: flex;
	justify-content:center;
	align-items:center;
	margin-right: 10px;
}

input{
	height: 25px;
	border-radius: 4px;
	padding-left: 10px;
	border: 1px solid black;
}




.hotels{
	width: 85%;
	display: inline-block;
}

.hotel_item{
	width: 97%;
	margin-left: 3%;
	border:1px solid grey;
	margin-bottom: 50px;
	display:none;
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
	margin-right: 14%;
	width: 40%;
	display: inline-block;
}

.map{
	background-color: #ffeb00;
	display: flex;
	padding: 0px 10px 0px 10px;
	align-items:center;
	border:1px solid grey;
	border-radius: 4px;
}

.read{
	background-color: #f49320;
	display: flex;
	padding: 0px 10px 0px 10px;
	align-items:center;
	border:1px solid grey;
	border-radius: 4px;
}

.read a, .map a{
	display: flex;
	align-items:center;
}

.information{
	display: flex;
	align-items:flex-start;
}

.hotel_content{
	width: 100%;
	display: flex;
}

.rooms{
	display: flex;
	align-items:flex-start;
}


.rooms_block{
	margin: 20px 5px 10px 5px;
	display: inline-block;
}

.rooms_item{
	list-style: none;
	margin: 10px 0px 10px 0px;
	font-size: 13px;
}


.nights{
	width: 30%;
	display: inline-block;
	font-size: 13px;
	margin-left: 2%;
        margin-top: 8px;
}

.nights h4{
	display: flex;
	font-size:14px;
	font-family: 'Open Sans', sans-serif;
}

 h1{
	font-family: 'Open Sans', sans-serif !important;
}


.grey{
	width: 100%;
	border:1px solid grey;
	box-sizing:border-box;
	margin-bottom: 10px;
}

.blue{
	color: blue;
}


.info_block, .price_block{
	margin-top: 10px;
}

.info_item{
	margin-top: 5px;
	list-style: none;
	font-size: 13px;
}

.price{
	width: 25%;
	background-color: #ff8b00;
	margin-left: 2%;
	padding-left: 2px;
	text-align: center;
	top:0px !important;
}

.price_item_height{
	height:300px;
}





.price strong{
	font-size: 14px;
}

.price_item{
	display: flex;
	align-items:center;
	font-size: 13px;
	margin:5px 0px 5px 0px;
}


.discount{
	text-align: right;
	padding-right: 10px;
}

.discount span{
	margin-top: 15px;
	margin-bottom: 15px;
	color: red;
	text-decoration: line-through;
}

.discount h3{
	font-weight: 500;
}

.read_info, .order_tour{
	width: 150px;
	border-radius: 15px;
	padding: 5px 10px 5px 10px;
	background-color: white;
	border:1px solid black;
	margin: 10px 0px 10px 0px;
}

.order_tour{
	background-color: #31d004;
}

.hotel_img{
	width:50%;
	height:auto;
	padding:10px 1%
}

.hotel_img img{
	width:100%;
	height:280px;
}

.hotel_header > p >span >img{
	margin-left:10px;
}
.map , .read{
	height:32px;
}


.filter_item > p > input{
	margin-top:10px;
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

.form_menu{
	display:flex;
}

.adult{
text-align:center;
	font-size: 13px;
margin-left:150px;
margin-top:-7px;;
position: relative;
top: -2px;
}

 .child{
	text-align:center;
	font-size: 13px;
margin-top: -7px;
position: relative;
top: -2px;
}

.townfrom_block{
	position:absolute;
	color:white;
	top:67px;
	left:25px;
	font-size:13px;
}

.townto_block{
	position:absolute;
	color:white;
	top:67px;
	left:232px;
	font-size:13px;
}

.adult_block{
	position:absolute;
	color:white;
	top:67px;
	left:795px;
	font-size:13px;
}

.child_block{
	position:absolute;
	color:white;
	top: 125px;
    	left: 791px;
	font-size:13px;
}

.transport_block{
	position:absolute;
	color:white;
	text-align:center;
	top:65.5px;
	left:680px;
	
}


.transport_item{
	padding:8px;
	color:black;
	border-radius:5px;
	display:inline-block;
	background-color:white;
	
}

.transport_block p{
	font-size:13px;
	margin-bottom:8px;
}




.viezd{
	position:absolute;
	left:400px;
	top:67px;
	color:white;
	font-size: 13px;
}

.hotel_price_item{
	font-weight:600;
	font-size: 25px;
}

.all_price{
	font-size:11px;
}

.data_notfound{
	display:none;
	text-align:center;
}

.left{color:black; font-size:20px}

.star{display:flex !important;
	align-items:center !important;}



.MEAL{
	overflow:visible !important;
}

.orange_bottom, .header{
	padding: 5px 0px;
    border-bottom: 3px solid #ffb053;
	margin-top:20px;
	text-align:center;
}


.programm_filter {
	position:absolute;
	top:140px;
	background-color:transparent !important;
	border-radius:5px;
}

.res{
	display:none !important;
}


.pager{
	width:100%;
	position:absolute;
	top:4390px;
	text-align:center;
}


#search_tour .nights {
    width: 60px;
}



.data_to_page{
	display:none;
}

.ADULT{margin-top:-6.5px}

.CHILD{margin-top:-6.5px}

/*.NIGHTS_TILL{
	margin-top:12px;
}*/


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

.resultset{
	color:#535353 !important;
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

.fancybox_overlay2{
	position: fixed;
	top:0;
	left:0;
	width: 100%;
	height: 100%;
	z-index:1111;
	background-color: transparent;
}

.fancybox_overlay2 img{
	position: absolute;
    top: 183px;
    left: 1050px;
}

.wpcf7{
	display:none;
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
	    margin-left: 100px;
}


.offers_img {
	display:block;
	    font-size: 13px;
}

.name_star_form{
	display:flex;
	align-items:center;
}


.view_hotel{
	display:block !important;
}

.blind_hotel{
	display:none !important;
}



.price-additional-nights:before{
	content:'+';
}

#search_tour .STARS label.hoteltype {
    display: none;
}
hr{
	display:none;
}



</style>
<script>
</scipt>
<body>
	<div class="wrapper">
		<?php get_header(); ?>
		<?php echo do_shortcode("[contact-form-7 id=5 title=Контактная форма 1]"); ?>
<div class="scr_block"><h1>Подбор тура онлайн</h1>
<div class="townfrom_block">Город отправления</div>
<div class="viezd">Выезд/вылет</div>
<div class="townto_block">Страна</div>
<div class="adult_block">Взр.</div>
<div class="child_block">Детей</div>
<div class="transport_block">
	<p>Транспорт</p> 
	<div class="transport_item bus"><i class="fa fa-bus" aria-hidden="true"></i></div>
	<div class="transport_item plane"><i class="fa fa-plane" aria-hidden="true"></i></div>
</div>
<script>var samo_date=""</script>
<script src="http://37.18.77.200/search_tour?samo_action=embed&LANG=rus&TOWNFROMINC=1170&STATEINC=17&NIGHTS_FROM=4&CHECKIN_BEG=20170602&CHECKIN_END=20170617&HOTELS=293&NIGHTS_TILL=9&ADULT=2&CHILD=0&TOWNTO_ANY=1&DOLOAD=1" charset="windows-1251"></script>
<style>
.CHILD{
position: absolute;
    top: 146px;
    left: 790px;
    z-index: 11;
}


.child_ages_container{
	    position: absolute;
    top: 136px;
    z-index: 11;
}


.note_container{

	display:none !important;
}

.samo_container select, .samo_container textarea, .samo_container .textinput, .samo_container input.frm-value, .samo_container input.frm-input {
    background-color: #ffffff;
    border: 1px solid #999999;
    border-radius: 5px;
    padding: 5px 5px;
    font-size: 13px;
    height:32px !important;
    line-height: 18px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -webkit-transition: background-color 1200ms linear;
    -moz-transition: background-color 1200ms linear;
    -o-transition: background-color 1200ms linear;
    -ms-transition: background-color 1200ms linear;
    transition: background-color 1200ms linear;
	font-weight:600;
}

</style>
</div>
<div class="content">
			<div class="filter">
				<h3>Найденно отелей:</h3>
				
				<div class="filter_item">
					<ul class="spisok_block">Количество звезд:
						<li class="spisok_item" ><div class="checkbox" value='1'></div></i><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/star.png"></li>
						<li class="spisok_item"><div class="checkbox" value='2'></div><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/star.png"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/star.png"></li>
						<li class="spisok_item"><div class="checkbox" value='3'></div><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/star.png"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/star.png"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/star.png"></li>
						<li class="spisok_item"><div class="checkbox" value='4'></div><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/star.png"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/star.png"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/star.png"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/star.png"></li>
						<li class="spisok_item"><div class="checkbox" value='5'></div><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/star.png"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/star.png"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/star.png"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/star.png"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/star.png"></li>
					</ul>
				</div>


				<div class="filter_item">
					<ul class="spisok_block">Тип питания:
						<li class="spisok_item"><div class="checkbox"></div>Все включено</li>
						<li class="spisok_item"><div class="checkbox"></div>Полный пансион </li>
						<li class="spisok_item"><div class="checkbox"></div>Завтрак ужин</li>
						<li class="spisok_item"><div class="checkbox"></div>Завтраки</li>
						<li class="spisok_item"><div class="checkbox"></div>Без питания</li>
					</ul>
				</div>
				
				<div class="filter_item">
					<p>Направление <br>
					<input type=text placeholder="Банско"></p>
				</div>
				
				<div class="filter_item">
					<ul class="spisok_block">Выбор вида отдыха:
						<li class="spisok_item"><div class="checkbox"></div>Морской</li>
						<li class="spisok_item"><div class="checkbox"></div>Горнолыжный </li>
						<li class="spisok_item"><div class="checkbox"></div>ЛЕчебный</li>
						<li class="spisok_item"><div class="checkbox"></div>Оздоровительный</li>
						<li class="spisok_item"><div class="checkbox"></div>Детский</li>
						<li class="spisok_item"><div class="checkbox"></div>Экскурсионный</li>
					</ul>
				</div>

				
				
			</div>
			<div class="hotels">
				<p class="data_notfound">Данных не найдено. Измените параметры поиска</p>
				<div class="hotel_item">
					<div class="hotel_header">
						<p><span class="name_star">Виллы Малины <img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/star_new.png"></span>
						<span class="town">Болгария Боривец</span></p>
						<button class="map"><a href="#" class="map_link"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/map.png">Смотреть на карте</a></button>
						<button class="read"><a href="#" class="kurort_link"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/kurort.png">  Читать о курорте</a></button>
					</div>
					<div class="information">
						<div class="hotel_content">
							<div class="hotel_img"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/hotel.png"></div>
							<div class="rooms">	
						</div>
						<div class="nights">
							<h4>7 ночей, ВВ (Завтраки)</h4>
							Спецпредложение от
							<img src="http://bolgaria-travel.com/wp-content/uploads/logo-mini.png">
							<div class="grey"></div>
							<span class="blue">Отправление из:</span> Киев,Украина<br>
							<p>Транспорт: EcoLines</p>
							<span class="blue">Вылет/выезд:</span><span class="date">24.12-02.01</span>
							<span class="blue">Количество ночей:</span><span class="count_nights"></span>
							<span class="blue">Тип:</span><span class="type_room">Вилла</span>
							<span class="blue">Размещение:</span><span class="room_raz"></span>
							<span class="blue">Тип питания:</span><span class="type_eat"></span>
							<div class="tour_info"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/arrow.png">
										<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/arrow_left.png">
										<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/place.png">
										<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/graph.png">
							</div>
						</div>

						<div class="price price_item_height">
							<ul class="price_block"><strong>Включено в стоимость:</strong>
									<li class="price_item "><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/check.png">Киев -> SOFIA </li>
									<li class="price_item live_item"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/check.png">Проживание 7 ночей </li>
									
									<li class="price_item"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/check.png">Мед страховка</li>
	<li class="price_item"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/check.png">Tрансфер</li>
	<li class="price_item "><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/check.png"> SOFIA -> Киев</li>
	<li class="price_item data_to_page"></li>
							</ul>
							<div class="discount">
								Цена:<p class="hotel_price_item"></p>
								<p class="all_price">Стоимость за весь тур</p>
							</div>
							<button class="read_info" ><a href="http://hotels.bolgaria-travel.com/hotel-item/"  target="_blank">Читать подробнее</a></button>
							<button class="order_tour">Заказать онлайн</button>
						</div>
					</div>
				</div>
				
			</div>
			
		</div>

</div>
		<?php get_footer(); ?>

		<script type="text/javascript">
		$('.fa-times').click(function(){
		$('.banner_for_25').css('display','none');
	});
			//$('.pager').click(function(){alert('sdsdsdsddsds')});
			$('.HOTELS_ANY').prop('checked',true);
			var tour_pages;
			$(window).scroll(function(){
        var bo = $(this).scrollTop();  
        if (bo<=94)  {
        	$(".header_block").css('box-shadow','0 0 0 0');
        	$(".header_block").css('position','relative');
        	$(".header_block").css('margin-top','0px');
        }         
		if ( bo >= 94) {
			$(".header_block").css('box-shadow','0 2px  rgba(0,0,0,0.2)');
			$(".header_block").css('position','fixed');
			$(".header_block").css('margin-top','-25px');
			$(".header_block").css('z-index','1111');
			}
		});

$( document ).ready(function() {

		
	if (tour_data_type1!='')
	{
		if (tour_data_type1!='1')
		{
			$('.hoteltype [value='+tour_data_type1+']').prop('checked',true);
		}
		else
		{
			var inputs=$('.MEAL').children().children()
			//console.log('meal=',inputs);
			$(inputs[0]).prop('checked',true);
		}	
	}
	 else if (top_kurort!='')
	{
		var checkbox_town=$('.hidden [value='+top_kurort+']').parent().parent().children();
		//console.log(checkbox_town);
		var new_check=$(checkbox_town[0]).children();
		$(new_check[0]).prop('checked',true);
		//console.log($(checkbox_town[1]));
		//$(checkbox_town[1]).css('display','block !important');
		//$(checkbox_town[1]).css('visibility','visible !important');
		var hidden_check=$(checkbox_town[1]).children();
		$(hidden_check[0]).prop('checked',true);
		//console.log(hidden_check);
	}
	
			//alert('HERE!')
			//var inputs=$('.MEAL').children().children()
			//console.log('meal=',inputs);
			//$('.TOURTYPE [value='+tour_select_type1+']').attr('selected', 'true');
			if (tour_select_type1!="")	{
			$('.TOURTYPE [value='+tour_select_type1+']').attr("selected", "selected");}


			
	var child_res;
				child_res=$('.res').children();
				//console.log(child_res);
				var grandchild_res=$(child_res[1]).children();
				
				//console.log('children=',grandchild_res);
				console.log('children length=',grandchild_res.length);



				$('.scr_block').css('margin-bottom','130px');
				
				if (grandchild_res.length==0)
				{
					$('.data_notfound').css('display','inline-block');
					$('.hotel_item').css('display','none');
					$('.hotels').css('text-align','center');
					$('.hotels').css('margin-bottom','1400px');
					$('.scr_block').css('margin-bottom','150px');
					//setTimeout( function() { location.reload();}, 2000);

				}
				else
				{second_passed()}
				$('.page').click(function(){
						setTimeout(second_passed, 2000);
						
							
						
					});
	
		
			


});
		$('.menu_item').hover(
    			function() {
      				$('ul', this).slideDown(110);
    				},
    			function() {
      			$('ul', this).slideUp(50);
    	});
		$('.checkbox').click(function(){
			if ($(this).html()=='')
			{
				$(this).append('<i class="fa fa-check" aria-hidden="true"></i>');
			}
			else
			{
				$(this).html('');
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
var select=param("data_tour");
var data=select.split('_');
console.log(data);
if (data!=''){
$('.NIGHTS_TILL  [value='+data[1]+']').attr("selected", "selected");
$('.CHECKIN_BEG').val(data[2]);
$('.ADULT [value='+data[3]+']').attr("selected", "selected");
$('.CHILD  [value='+data[4]+']').attr("selected", "selected");}

var tour_data_type1=param("tour_data_type");
var tour_select_type1=param("tour_select_type");
//console.log(tour_data_type1);
console.log(tour_select_type1);
var top_kurort=param("top_kurort");




	
//console.log(top_kurort);
//console.log($('.hidden [value='+top_kurort+']').parent().html());
//console.log($('.hoteltype [value='+tour_data_type1+']').parent().html());
var tr=$('.width100p').children('tbody').children();
	//console.log(tr[1]);
	$('.program_filter').css('background-color','transparent !important;')
	var tr1=$('.panel').children('tbody').children();
	//console.log(tr1);
	var tr1_0=$(tr1[0]).children();
	//console.log('tr1_0=',tr1_0);
	tr1_00=$(tr1_0[0]).children().children().children().children();
	$(tr1_00[0]).html('');
	$(tr1_00[2]).html('');
	//console.log('tr1_00=',tr1_00);
	$(tr1_0[1]).css('position','absolute');
	$(tr1_0[1]).css('top','130px');
	$(tr1_0[1]).css('left','268px');
	$(tr1_0[1]).css('z-index','1');
	var tr1_2=$(tr1[2]).children();
	var tr1_3=$(tr1[3]).children();
	//console.log('tr1_3=',$(tr1_3));
	//console.log('tr1_2=',tr1_2);
       // $(tr1_2[1]).css('display','none');
	//$(tr1_2[1]).css('display','none');
	$(tr1_3[1]).css('text-align','center');
	//console.log('tr1_3[1]',$(tr1_3[1]));
	//$(tr1_3[1]).css('position','absolute');
	//$(tr1_3[1]).css('top','55px');
	//$(tr1_3[1]).css('left','350px');
        $(tr1_2[1]).css('margin-top','10px');
	var panel_children=$('.panel').children();
	//console.log(panel_children);
	$(panel_children[2]).css('display','flex');
	$(tr1_2[3]).css('text-align','center');
        $(tr1_2[3]).css('position','relative');
 $(tr1_2[3]).css('top','-19px');
$(tr1_2[3]).css('left','180px');
	$(tr1_2[3]).html(' Ночей <br><select name="NIGHTS_FROM" class="NIGHTS_FROM spin nights" autocomplete="off"><option value="4" selected="">4</option><option value="8">8</option><option value="11">11</option><option value="12">12</option><option value="15">15</option><option value="18">18</option></select>');
	$(tr1_3[3]).css('position','relative');
	var select_children=$(tr1_3[3]).children();
	//console.log('select',select_children);
	$(select_children[0]).css('position','absolute');
	$(select_children[0]).css('left','120px ');
	$(select_children[0]).css('top','0px');
	//var select_children=$(tr1_3[3]).children();
	//console.log('select',select_children);
	//$(select_children[0]).css('margin-top','4px !important');
	var tr1_4=$(tr1[4]).children();
	var tr1_5=$(tr1[5]).children();
	console.log('tr1_5=',tr1_5);
	var tbody_flex=$('.width100p').children();
	//console.log(tbody_flex);
	$(tbody_flex).css('display','flex');
	for (var i=2; i<6; i++)
	{
		$(tr1_4[i]).css('display','none');
	}
	for (var i=3; i<6; i++)
	{
		$(tr1_5[i]).css('display','none');
	}
	var tr2=$('.hotels_container').children('tbody').children('tr').children('td').children();
	//console.log(tr2);
	$(tr2[10]).css('display','none');
	$(tr2[12]).css('display','none');
	$(tr2[13]).css('display','none');
	$(tr2[14]).css('display','none');
	$('.description').css('display','none');
	$('.description2').css('display','none');
	$('.description3').css('display','none');
	$('.description5').css('display','none');
	var user_info_children=$('.panel').children();
	//console.log(user_info_children);
	$(user_info_children[3]).css('display','flex');
	$(user_info_children[4]).css('display','flex');
	$('.load').text('Результаты');
	var bus=0;
	var plane=0;
	$('.bus').click(function(){
		bus++;
		var tour=$('.TOURINC').children().css('display','block');
		var tour_right=$('.tour_right').children();
		if (bus%2==1)
		{
			plane++;
			$('.plane').css('background-color','white');
			$('.plane').children('i').css('color','black');
			$(this).css('background-color','green');
			$(this).children('i').css('color','white');
			$('.TOURINC').attr('size',6);
			$('.TOURINC').css('height','60px !important');
			var tour=$('.TOURINC').children();
			for (var tour_type=0; tour_type<tour.length; tour_type++)
			{
				var bus_count=0;
				var tour_travel=$(tour[tour_type]).text().split(' ');
				//console.log(tour_travel.length);
				for (var tour_word=0; tour_word<tour_travel.length; tour_word++)
				{
					//console.log(tour_travel[tour_word]);
					if (tour_travel[tour_word]=='(bus)' || tour_travel[tour_word]=='(автобус)')
					{
						bus_count++;
					}
				}
				if (bus_count==0)
				{
					$(tour[tour_type]).css('display','none');
				}
			}
		}
		else{
			$('.TOURINC').attr('size',1);
			$(this).css('background-color','white');
			$(this).children('i').css('color','black');
			var tour=$('.TOURINC').children();
			for (var tour_type=0; tour_type<tour.length; tour_type++)
			{
				$(tour[tour_type]).css('display','block');
			}
		}
});


$('.plane').click(function(){
		plane++;
		if (plane%2==1)
		{
			bus++;
			var tour=$('.TOURINC').children().css('display','block');
			$(this).css('background-color','green');
			$(this).children('i').css('color','white');
			$('.bus').css('background-color','white');
			$('.bus').children('i').css('color','black');
			$('.TOURINC').attr('size',6);
			var tour=$('.TOURINC').children();
			for (var tour_type=0; tour_type<tour.length; tour_type++)
			{
				var plane_count=0;
				var tour_travel=$(tour[tour_type]).text().split(' ');
				//console.log(tour_travel.length);
				for (var tour_word=0; tour_word<tour_travel.length; tour_word++)
				{
					//console.log(tour_travel[tour_word]);
					if (tour_travel[tour_word]=='(flight)' || tour_travel[tour_word]=='(самолет)' ||  tour_travel[tour_word]=='(авиа)')
					{
						plane_count++;
					}
				}
				if (plane_count==0)
				{
					$(tour[tour_type]).css('display','none');
				}
			}
		}
		else{
			$('.TOURINC').attr('size',1);
			$(this).css('background-color','white');
			$(this).children('i').css('color','black');
			var tour=$('.TOURINC').children();
			for (var tour_type=0; tour_type<tour.length; tour_type++)
			{
				$(tour[tour_type]).css('display','block');
			}
		}
});
	var hotel_first_arr=$('.hotel_item').html();
	var res_count=0;
	
	$('.TOURTYPE').click(function(){
		$('.TOURINC').attr('size',1);
	});
	
	$('.TOURINC').click(function(){
		$('.TOURINC').attr('size',1);
	});
	//////FILTER/////

	//$('.HOTELS').css('width','180px !important')
	$('.control_hotels .header').html('Отели');
	$('.control_hotels .header').css('font-size','20px');
	$('.control_hotels .header').css('text-align','left');
	var filter_elements=$('.HOTELSCONTAINER').children();
	//console.log(filter_elements);

	////towmto////
	var filter_townto=$(filter_elements[0]).children();
	//console.log(filter_townto);
	$(filter_townto[1]).css('font-weight','500');
	$(filter_townto[1]).css('overflow','auto !important');
	var filter_townto_header=$(filter_townto[0]).children();
	//console.log( filter_townto_header);
	$(filter_townto_header[0]).html('Направление');
	//$(filter_townto_header[1]).css('display','none');

	////stars and rest////
	var filter_starrest=$(filter_elements[1]).children();
	//console.log(filter_starrest);
	$(filter_starrest[1]).css('overflow','visible !important;');
	var filter_starrest_header=$(filter_starrest[0]).children();
	//console.log( filter_starrest_header);
	$(filter_starrest_header[0]).html('Количество звезд');
	$(filter_starrest_header[1]).css('display','none');
	var filter_stars=$(filter_starrest[1]).children();
	//console.log('filter_stars=',filter_stars);
	$(filter_stars[0]).html('<input type="checkbox" class="star" value="1"> <img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/star.png"> <img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/star.png">');
	$(filter_stars[1]).html('<input type="checkbox" class="star" value="1"> <img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/star.png"> <img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/star.png"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/star.png">');
	$(filter_stars[2]).html('<input type="checkbox" class="star" value="3"> <img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/star.png"> <img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/star.png"> <img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/star.png"> <img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/star.png">');
	$(filter_stars[3]).html('<input type="checkbox" class="star" value="4"> <img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/star.png"> <img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/star.png"> <img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/star.png"> <img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/star.png"> <img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/star.png">');
	//$(filter_stars[4]).remove(); 
	//console.log('dsdssdds',$(filter_stars[5]));
	$(filter_stars[5]).css('width','180px');
	$(filter_stars[5]).css('background-image','none')
	//$(filter_stars[5]).html('<span class="left dokuwiki orange_bottom" >Вид отдыха</span>');
    	$(filter_stars[4]).html('<span class="left dokuwiki orange_bottom" >Вид отдыха</span>');
	$(filter_stars[4]).css('padding','10px 0px');
	$(filter_stars[4]).css('margin-bottom','18px');
	$(filter_stars[6]).css('background-image','none');
	//$(filter_stars[7]).remove();
	//$(filter_stars[8]).html('<input type="checkbox" class="hoteltype" value="1000003"> Горнолыжный ');
	//$(filter_stars[10]).remove();
	//$(filter_stars[12]).html('<input type="checkbox" class="hoteltype" value="1000026"> Морской ');
	//$(filter_stars[13]).html('<input type="checkbox" class="hoteltype" value="57"> Экскурсионный ');
	$(filter_stars[14]).css('background-image','none');
	//$(filter_stars[15]).remove();

	////////////food//////////////
	var filter_food=$(filter_elements[3]).children();
	//console.log(filter_food);
	var filter_food_header=$(filter_food[0]).children();
	//console.log( filter_food_header);
	$(filter_food_header[0]).html('Тип питания');
	$(filter_food_header[1]).css('display','none');
	$(filter_food[2]).css('display','none');
	$(filter_food[3]).css('display','none');
	var filter_food_type=$(filter_food[1]).children();
	//console.log( filter_food_type);
	$(filter_food_type[0]).html('<input type="checkbox" value="1"> Все включено')
	$(filter_food_type[1]).html('<input type="checkbox" value="2"> Завтраки')
	$(filter_food_type[2]).html('<input type="checkbox" value="3"> Полу пансион')
	$(filter_food_type[3]).html('<input type="checkbox" value="4"> Полный пансион');
	var pages_click_count=0;
	for (var i=0; i<=8; i++)
				{
					//alert(i);
					$('.hotels').append('<div class="hotel_item blind_hotel">'+hotel_first_arr+'</div>');
				}
	$('.load').click(function(){

				pages_click_count++;
				setTimeout(second_passed, 2500);
		

				//$('.page').css('color','red !important');
				//$('.res').css('display','none !important');
				//alert('res');
				//$('.resultset').css('display','none');
				

	});





	function second_passed(){
				$('.TOURINC').attr('size',1);
				$('.TOURINC').css('height','22px !important');
				$('.hotel_item').css('display','block');
				$('.hotels').css('margin-bottom','10px');
				$('.hotels').css('text-align','left');
				var child_res;
				child_res=$('.res').children();
				//console.log(child_res);
				var grandchild_res=$(child_res[1]).children();
				
				//console.log('children=',grandchild_res);
				console.log('children length=',grandchild_res.length);



				$('.scr_block').css('margin-bottom','130px');
				
				if (grandchild_res.length==0)
				{
					$('.data_notfound').css('display','inline-block');
					$('.hotel_item').removeClass("view_hotel");
					$('.hotel_item').css('display','none');
					$('.hotels').css('text-align','center');
					$('.hotels').css('margin-bottom','1400px');
					$('.scr_block').css('margin-bottom','150px');
					//setTimeout( function() { location.reload();}, 2000);

				}
				else
				{
				$('.data_notfound').css('display','none');
				$('.hotel_item').css('display','block');
				$('.blind_hotel').css('display','none !important');
				//$('data_notfound').remove();
				var hotels=$('.hotels');
				var hotel_count=$(hotels[1]).children();
				console.log('hotels_count=',hotel_count);
				if (grandchild_res.length<10)
				{
					var aa_length=grandchild_res.length;
				}
				else
				{
					var aa_length=grandchild_res.length+1;
				}
				
				res_count++;
				for (var count=0; count<=9; count++)
				{
					
					//$(hotel_count[count]).addClass("blind_hotel");
					var tour_children=$(grandchild_res[count]).children();
					//console.log(tour_children);
					var tour_date=$(tour_children[0]).html();
					var new_date=tour_date.split(',');
					var tour_name2=$(tour_children[1]).text();
					for (var aa=1; aa<aa_length; aa++)
					{
						$(hotel_count[aa]).addClass("view_hotel");
						$(hotel_count[aa]).removeClass("blind_hotel");
					}
					for (var aa=10; aa>aa_length; aa--)
					{
						$(hotel_count[aa]).addClass("blind_hotel");
						$(hotel_count[aa]).removeClass("view_hotel")
					}

					var tour_durible=$(tour_children[2]).html();
					//console.log('durible',tour_durible);
	

					//console.log(new_date[0], tour_durible); ///date comin, count days
					var tour_name=$(tour_children[3]).text();
					var tour_arr=tour_name.split('');
					//console.log('tour_arr=',tour_arr);
					var hotel_name='';////hotel name
					var star=0;////hotel star
					var town='';////hotel town
					for(var i=0;i<tour_arr.length;i++)
					{
						if(tour_arr[i]=='*')
						{
							star++;	
						}
						else if (tour_arr[i]=='(')
						{	
							while (tour_arr[i]!=')')
								{
									town+=tour_arr[i+1];
									i++;
								}
		
						}
						else{
							hotel_name+=tour_arr[i];
						}
						//hotel_name+=tour_arr[i];
					}
					//console.log(hotel_name,star, town); //town
					var tour_eat=$(tour_children[5]).text();//////eat
					//console.log(tour_eat);
					var new_tour_eat=tour_eat.split('');
					var update_tour_eat='';
					for (var i=0; i<new_tour_eat.length; i++)
					{
						if ( new_tour_eat[i]!=' ')
						{
							update_tour_eat+=new_tour_eat[i];
						}
					}

					var tour_number=$(tour_children[6]).text(); ///number type
					//console.log('number=',tour_number);

					var tour_price=$(tour_children[9]).text(); ///price
					//console.log(tour_price);
				
					var star_name='<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/star.png">';
				
					for (var i=1; i<star; i++)
					{
						star_name=star_name+'<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/star.png">'
					}
					for (var i=star; i<5; i++)
					{
						star_name=star_name+'<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2017/01/blind_star.png">'
					}

					var hotel_arr=$(hotel_count[count+1]).children();
					//console.log(hotel_arr);
					var hotel_header=$(hotel_arr[0]).children();
					//console.log(hotel_header);
					var hotel_p=$(hotel_header[0]).children();
					//console.log(hotel_p);
					$(hotel_p[0]).html(hotel_name+star_name)
					$(hotel_p[1]).html('('+town);
					var data_city='('+town;
					var room_razmer=tour_number.split('/');
					//console.log(room_razmer);
					var hotel_info=$(hotel_arr[1]).children().children();
					//console.log('hotel_info=',hotel_info);
					var nights_block=$(hotel_info[2]).children();
					//console.log('nights=',nights_block);
					$(nights_block[0]).text(tour_name2);
					var tour_name_split=$(nights_block[0]).html().split(' ');
					//console.log(tour_name_split);
					var new_tour_name_split='';
					for (var i=0; i<tour_name_split.length; i++)
					{
						if (tour_name_split[i]!='' && tour_name_split[i]!='\n')
						{
							new_tour_name_split+=' '+tour_name_split[i];
						}
					}
					//console.log(new_tour_name_split.split(' '));
					var new_tour_name_split_arr=new_tour_name_split.split(' ');
					console.log(new_tour_name_split_arr);
					if (new_tour_name_split_arr.length<=6)
					{
						new_tour_name_split_arr=new_tour_name_split_arr[new_tour_name_split_arr.length-1].split('');
						var transport_typename='';
						for (var i=1; i<new_tour_name_split_arr.length-2; i++)
						{
							transport_typename+=new_tour_name_split_arr[i];
						}
					}
					else
					{
						var new_tour_name_split_arr_two=new_tour_name_split_arr[6].split('');
						new_tour_name_split_arr=new_tour_name_split_arr[5].split('');
						var transport_typename='';
						var transport_typename_two='';
						for (var i=1; i<new_tour_name_split_arr.length-2; i++)
						{
							transport_typename+=new_tour_name_split_arr[i];
							transport_typename_two+=new_tour_name_split_arr_two[i];
						}
					}
					console.log(transport_typename_two);
					if (transport_typename=="автобус" || transport_typename_two=="ав")
					{
						$(nights_block[5]).html('Транспорт:автобус');
						
					}
					 else if (transport_typename=="авиа" || transport_typename_two=="авиа")
					{
						$(nights_block[5]).html('Транспорт:самолет');
						
					}
					else
					{
						$(nights_block[5]).html('Транспорт:отсутствует');
					}
					//var update_tour_name_split=new_tour_name_split.split(' ');
					//var split_new=update_tour_name_split[update_tour_name_split.length-1].split('');
					
					//console.log(split_new);

					$(nights_block[11]).html(room_razmer[0]+'<br>');
					var room_razmer0_update=room_razmer[0].split('');
					var new_room_razmer0='';////////////// for get
					for (var i=0; i<room_razmer0_update.length; i++)
					{
						if ((room_razmer0_update[i]!=' ') && (room_razmer0_update[i]!='\n'))
						{
							
							 new_room_razmer0+=room_razmer0_update[i];
						}
					}
					//console.log(new_room_razmer0);
					$(nights_block[13]).html(room_razmer[1]+'<br>');
					var room_razmer1_update=room_razmer[1].split('');
					var new_room_razmer1='';////////////// for get
					for (var i=0; i<room_razmer1_update.length; i++)
					{
						if ((room_razmer1_update[i]!=' ') && (room_razmer1_update[i]!='\n'))
						{
							if (room_razmer1_update[i]=='<')
							{ i=room_razmer1_update.length}
							else{
							 new_room_razmer1+=room_razmer1_update[i];}
						}
								
					}
					$(nights_block[13]).html( new_room_razmer1+'<br>');
					//console.log(new_room_razmer1);
					var update_date=new_date[0].split('');
					var new_update_date='';////////////////// nyzhen dlya get
					for (var i=0; i<update_date.length; i++)
					{
						if ((update_date[i]!=' ') && (update_date[i]!='\n'))
						{
							new_update_date+=update_date[i];
						}
					}
					//console.log(new_update_date.split(''));
					$(nights_block[7]).html(new_date[0]+'<br>');
					var new_tour_time=tour_durible;
					var new_tour_durible=$(tour_children[2]).text().split('');
					var update_tour_durible='';
					for (var i=0; i<new_tour_durible.length;i++)
					{
						if (new_tour_durible[i]!=' ')
						{ update_tour_durible+=new_tour_durible[i]}
					}

					$(nights_block[9]).html(tour_durible+'<br>');
					$(nights_block[15]).html(tour_eat+'<br>');
					var price_block=$(hotel_info[3]).children();
					//console.log('price=',price_block);
					var discount=$(price_block[1]).children();
					var ul=$(price_block[0]).children();
					$(discount[0]).html(tour_price);
					var new_tour_price=tour_price.split('');
					var update_tour_price='';
					for (var i=0; i<new_tour_price.length; i++)
					{
						if (new_tour_price[i]!=' ')
						{
							update_tour_price+=new_tour_price[i];
						}
					}
					//console.log('discount=',discount);
					var packet=$("input[name='PACKET']");
					//console.log($(packet[2]).prop('checked'));
					$(ul[1]).css('display','flex');
					$(ul[4]).css('display','flex');
					$(ul[5]).css('display','flex');
					var transfer=1;
					$('.discount').css('margin-top','0px');
					if ($(packet[2]).prop('checked'))
					{
						$(ul[1]).css('display','none');
						//$(ul[3]).css('display','none');
						$(ul[4]).css('display','none');
						$(ul[5]).css('display','none');
						$('.discount').css('margin-top','70px');
						transfer=0;
					}
					var little_town_count=town.split('');
					var little_town="";
					for (var i=0; i<little_town_count.length-1;i++)
					{
						little_town+=little_town_count[i];
					}
					little_town=little_town.charAt(0).toUpperCase() + little_town.substr(1).toLowerCase();
					$(ul[1]).html('<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/check.png">'+$('.TOWNFROMINC option:selected').text()+'->'+little_town);
					$(ul[5]).html('<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/check.png">'+little_town+'->'+$('.TOWNFROMINC option:selected').text());
					$(ul[2]).html('<img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/12/check.png">Проживание '+tour_durible+' ночей');
					$(ul[6]).html(new_date+room_razmer[0]+room_razmer[1]+tour_eat+tour_price);
					//console.log($(hotel_p[1]).text());
					var hotel_links=$(price_block[2]).children();
					//console.log('link=',hotel_links);
					
					var hotel_links_name=hotel_name.toLowerCase();
					var new_hotel_links_name='';
					for (var i=1; i<hotel_links_name.length; i++)
					{
						if (hotel_links_name[i]!=" " && hotel_links_name[i]!="." && hotel_links_name[i]!="&"){
							new_hotel_links_name+=hotel_links_name[i];
						}
					}
					

					var new_data_city=data_city.split('');
								var data_city_update='';
								for (var i=0; i<new_data_city.length; i++)
								{
									if (new_data_city[i]!=' ' && new_data_city[i]!='(' && new_data_city[i]!=')')
									{
										data_city_update+=new_data_city[i];
									}
								}
					//console.log(data_city_update);
					//console.log('new_hotel_links_name=',new_hotel_links_name.split(''))
					var hotel_image_link=new_hotel_links_name.toUpperCase();
					$(hotel_info[0]).html('<img src=/wp-content/themes/t/images/hotels_image/'+hotel_image_link+'.jpg>');
					new_hotel_links_name='http://bolgaria-travel.com/'+new_hotel_links_name+'/?nmae='+new_update_date+'_'+update_tour_durible+'_'+new_room_razmer0+'_'+new_room_razmer1+'_'+update_tour_eat+'_'+update_tour_price+'_'+data_city_update+'_'+transfer+'_';
					$(hotel_links[0]).attr("href", new_hotel_links_name);
					var kurort_name=data_city_update.split('');
					var kurorts='';
					for (var i=0; i<kurort_name.length;i++)
					{
						kurorts+=kurort_name[i];
					}
					kurorts=kurorts.toLowerCase();
					
					if (kurorts=='burgas')
					{	
						var kurort_button=$(hotel_header[2]).children()
						$(kurort_button).attr('href','http://bolgaria-travel.com/burgas_3');
					}					
					else{
					var kurort_button=$(hotel_header[2]).children()
					$(kurort_button).attr('href','http://bolgaria-travel.com/'+kurorts);}
					new_hotel_links_name+="_MAP";
					var map_button=$(hotel_header[1]).children();
					$(map_button).attr('href',new_hotel_links_name);
					
					hotel_name='';star=0;town='';
					$(hotel_count[count+1]).removeClass("blind_hotel");
					$(hotel_count[count+1]).addClass("view_hotel");

				
				}
				}
				 tour_pages=$('.pager').children();
				//console.log(tour_pages);
					$('.page').click(function(){
						setTimeout(second_passed, 2000);
						
							
						
					});
					/*var pages=$('.pager').children();
							console.log(pages);
							for (var i=0; i<pages.length; i++)
								{
									$(pages[i]).addClass('load');

								}*/
			}

	var body=$('body');
	var modal=$('<div class="fancybox_modal"><div class=form_header><p><span class="name_star_form"></span><span class="name_city_form"></span></p><div class="info_modal"><div class="offers_block"><span class="offers_img update">Выезд/вылет:<span class="data_date">23 ноября 2016</span> </span><span class="offers_img update">Тип питания:<span class="data_pitanie">Без питания </span></span><span class="offers_img update">Тип Размещения:<span class="data_razmer">4 взрослых </span> </span><span class="offers_img update">Тип номера:<span class="data_room">Апартамент </span></span><span class="offers_img update"><span>Трансфер:</span>  включен </span></div><div class="price_modal"><span class="get_price new_price"> 7894UAH </span><span class="offers_img update new_offer"><span class="data_nights">7</span>ночей</span></div></div></div><div class="call_to_us"><h1>Позвоните нам <i class="fa fa-phone fa-1x" aria-hidden="true"></i>044 543 99 12</h1></div><div class="form_new">'+$('.wpcf7').html()+'</div></div> ');
	body.append(overlay);
	var overlay;
	$('.order_tour').on('click',showModal);
	function showModal(e)
	{
			var hotel_item_children_one=$(this).parent().parent().parent().parent().children();
			var children_hotel_header=$(hotel_item_children_one[0]).children();
			var children_hotel_name=$(children_hotel_header[0]).children('.name_star').html();
			var children_hotel_city=$(children_hotel_header[0]).children('.town').html();
			//console.log(children_hotel_name.split(' '));
			var children_hotel_nights=$(hotel_item_children_one[1]).children().children('.nights');
			var data_date=$(children_hotel_nights[0]).children('.date').text();
			var data_nights=$(children_hotel_nights[0]).children('.count_nights').text();
			var data_type=$(children_hotel_nights[0]).children('.type_room').text();
			var data_room=$(children_hotel_nights[0]).children('.room_raz').text();
			var data_eat=$(children_hotel_nights[0]).children('.type_eat').text();
			//console.log(children_hotel_nights);
			var    	children_hotel_price=$(hotel_item_children_one[1]).children().children('.price').children('.discount').children('.hotel_price_item').html();
			overlay=$('<div class="fancybox_overlay"></div>')
			e.preventDefault();
			overlay.on('click',hideModal);
			body.append(modal);
			body.append(overlay);
			var form_children=$('.your-subject ').children();
			//console.log(form_children);
			//$(form_children[1]).prop('disabled', true);
			
			$('.fancybox_modal').css('display','block');
			var form=$('.wpcf7-form').children();
			//console.log(form);
			
			$('.fancybox_modal').css('display','block');
			var form=$('.wpcf7-form').children();
			//console.log(form);
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
			$('.name_star_form').html(children_hotel_name);
			$('.name_city_form').html(children_hotel_city);

			var new_data_date=data_date.split('');
			var data_date_update=''
			for (var i=0; i<new_data_date.length; i++)
			{
				if(new_data_date[i]!=' ')
				data_date_update+=new_data_date[i];
			}


			var new_children_hotel_price=children_hotel_price.split('');
			var children_hotel_price_update=''
			for (var i=0; i<new_children_hotel_price.length; i++)
			{
				if(new_children_hotel_price[i]!=' ')
				children_hotel_price_update+=new_children_hotel_price[i];
			}
			
			$('.data_date').text(data_date);
			$('.data_pitanie').text(data_eat);
			$('.data_razmer').text(data_type);
			$('.data_room').text(data_room);
			$('.data_nights').text(data_nights);
			$('.get_price').text(children_hotel_price);
			var form_name=children_hotel_name.split(' ');
			$(form_children[1]).val(form_name[0]+' '+'ночей: '+data_nights+' '+'вылет: '+data_date_update+' '+data_type+' '+data_room+' '+children_hotel_city+' цена:'+children_hotel_price_update);
	}

	function hideModal()
		{
			modal.hide();
			overlay.hide();
		}


		

	

	</script>
	</body>