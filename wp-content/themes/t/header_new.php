<?php
/*
Template Name:header_new

*/ ?>


<head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-84736730-1', 'auto');
  ga('send', 'pageview');

</script>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/wp-content/themes/t/css/font-awesome.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<script src="/wp-content/themes/t/js/parallax/parallax.js" type="text/javascript"></script>
</head>
<style>
*{
	margin:0;
	padding: 0;
}

body{
	font-family: 'Open Sans', sans-serif;
}

.wrapper{
	width: 100%;
	display: block;
}

.header{
	width: 100%;
	background-color: white;
	display:flex;
	border-bottom:3px solid #ffb053;
	justify-content:center;
	
}
.header_item{
	margin-right:5%;
	margin-bottom: 0px;
	    margin-top: 0px;
}

.contacts{
	margin-bottom: 5px;
	padding-top:5px;
}

.contacts_block{
	display:flex;
	justify-content:center;
	align-items:center;
}

.contacts_item{
	display: inline-block;
	text-decoration: none;
	margin:0 2% 0 2%;
}

.contacts_item_end{
	//display:inline-block;
	display:none;
	text-decoration: none;
	font-weight: 600;
	font-size:13px;
	margin-left:10px;
margin-right: 20px;
}


.contacts_link{
	text-decoration: none;
	color: black;
	display: flex;
	align-items:center;
	font-size: 13px;
}

.menu{
	display: flex;
	justify-content:center;
	position: relative;
	font-size: 20px;
	flex-wrap:wrap;
}

.logo{
	display: inline-block;
	margin-left:150px;
}




.phone{
	border-bottom: 2px solid grey;
	font-size: 12px;
	margin-bottom: 3px;
}

.phone_item:nth-child(1){
	display: none;
}

.phone_item{
	text-align: center;
	padding: 5px;
	display: inline-block;
}

.phone_item:nth-child(4)
{
	position: relative;
}

.numbers{
	position: absolute;
	width: 184px;
	height: 152px;
	background-image: url(http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/figure.png);
	background-repeat: no-repeat;
	left:-100px;
	display: none;
	text-align: left;
	padding: 10px;
	z-index: 1111;
}

.numbers_item{
	display: flex;
	align-items:center;
	margin: 10px 0px 10px 0px;
	justify-content:space-between;
}

.numbers_item img{
	margin-right: 10px;
}


.phone_item:nth-child(4):hover .numbers{
	display: block;
}

.menu_block{
	display: inline-block;
	text-align: right;
}

.menu_item{
	list-style: none;
	display: inline-block;
	padding: 5px;
	border-radius: 3px 3px 0px 0px;
}

.menu_link{
	text-decoration: none;
	color: black;
	font-size: 13px;
}

.menu_item:hover{
	background: linear-gradient(to top, #ffb053, #ff8d05);
	color:  white;
}

.menu_item:nth-child(2)
{
	background: linear-gradient(to top, #ffb053, #ff8d05);
}


.fa-search{
	margin-left: 50%;
}


.submenu{
	display: none;
	position: absolute;
	padding: 10px;
	border-bottom: 3px solid orange;
	text-align: left;
	z-index:111;
	background-color: #ff8d05;
}

.submenu_item{
	padding: 10px 20px;
	list-style: none;
	top:0;
	left: 0;
	border-bottom: 1px solid black
}
.item_link{
	text-decoration: none;
	color: black;
	font-size: 13px;
}
.submenu_item:hover{
	background-color: #f5f5f5;
	transition:0.5s linear;
}

a{
	color:black;
	text-decoration:none;
}

.header_block{
	box-shadow: 0px 0px 0px 0px;
    position: relative;
    margin-top: 10px;
    z-index: 1111;
    width: 100%;
}

</style>
<body>

<div class="header_block">
		<div class="header">
			<div class="logo">
						<a href="http://bolgaria-travel.com/"><img src="http://bolgaria-travel.com/wp-content/uploads/logoft.png" href="http://bolgaria-travel.com/"></a>
					</div>
			<div class="header_item">
				<div class="contacts">
					<ul class="contacts_block">
						<li class="contacts_item"><a href="http://bolgaria-travel.com/obshhaya-informaciya/" class="contacts_link">АГЕНСТВАМ</a></li>
						<li class="contacts_item"><a href="http://bolgaria-travel.com/turistam/" class="contacts_link">ТУРИСТАМ</a></li>
						<li class="contacts_item"><a href="http://bolgaria-travel.com/house/" class="contacts_link">НЕДВИЖИМОСТЬ</a></li>
						<li class="contacts_item"><a href="http://bolgaria-travel.com/novosti/" class="contacts_link">НОВОСТИ</a></li>
						
					</ul>
				</div>
				<div class="menu">
					<div class="menu_block">
						<div class="phone">
							<div class="phone_item">
								<strong>Поддержка клиентов на отдыхе</strong><br>
									 <p style="color:black">+359(89)983-63-65</p>
							</div>
							<div class="phone_item">
								<strong>Поддержка клиентов на отдыхе</strong><br>
									+359(89)983-63-65
							</div>
							<div class="phone_item">
								<strong>Для туристических агентов</strong><br>
									+3(095)598-14-39
							</div>
							<div class="phone_item">
								<strong>Частным лицам</strong><br>
									+38 (044) 543-99-12 <i class="fa fa-arrow-down" aria-hidden="true"></i>
									<div class="numbers">
										<div class="numbers_item"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/mts.png"><p>+38(000)0000</p></div>
										<div class="numbers_item"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/kiev.png"><p>+38 (097) 394-53-39</p></div>
										<div class="numbers_item"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/life.png"><p>+38 (063) 025-51-93</p></div>
									</div>
							</div>
						</div>
						<ul class="menu_ul">
							<li class="menu_item"><a href="http://bolgaria-travel.com/about-us/" class="menu_link">О НАС </a>
							</li>
							<li class="menu_item"><a href="http://hotels.bolgaria-travel.com/hotels/" class="menu_link">ПОДБОР ТУРА</a>
							</li>
							<li class="menu_item"><a href="http://bolgaria-travel.com/hot_tour/" class="menu_link">ГОРЯЩИЕ ТУРЫ</a>
							</li>
							<li class="menu_item"><a href="#" class="menu_link">ВИДЫ ОТДЫХА</a>
									<ul class="submenu">
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?tour_data_type=1000037" class="item_link">Бизнес туризм</a></li>
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?tour_data_type=1000034" class="item_link">Винный туризм</a></li>
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?tour_data_type=1000003" class="item_link">Горнолыжный туризм</a></li>
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?tour_data_type=1000028" class="item_link">Детский туризм</a></li>
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?tour_data_type=1000027" class="item_link">Лечебный туризм</a></li>
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?tour_data_type=1000030" class="item_link">Оздоровительный туризм</a></li>
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?tour_data_type=1000026" class="item_link">Отдых на море</a></li>
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?tour_data_type=1000038" class="item_link">Свадебный туризм</a></li>
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?tour_data_type=1000035" class="item_link">Эко туризм</a></li>

									</ul>
							</li>
							<li class="menu_item"><a href="#" class="menu_link">УСЛУГИ</a>
									<ul class="submenu">
										<li class="submenu_item"><a href="http://bolgaria-travel.com/oformlenie-viz/" class="item_link">Оформление виз</a></li>
										<li class="submenu_item"><a href="http://bolgaria-travel.com/oformlenie-vnzh-v-bolgarii-i-pomoshh-s-pereezdom/" class="item_link">Оформление ВНЖ</a></li>
									</ul>
							</li>
							<li class="menu_item"><a href="#" class="menu_link">КУРОРТЫ</a>
<ul class="submenu">
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?top_kurort=1464" class="item_link">Албена</a></li>
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?top_kurort=1700" class="item_link">Балчик</a></li>
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?top_kurort=1470" class="item_link">Бургас</a></li>
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?top_kurort=1480" class="item_link">Варна</a></li>
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?top_kurort=1473" class="item_link">Золотые пески</a></li>
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?top_kurort=1943" class="item_link">Калиакра</a></li>
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?top_kurort=1697" class="item_link">Кранево</a></li>
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?top_kurort=1618" class="item_link">Равда</a></li>
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?top_kurort=1477" class="item_link">Св. Константин и Елена</a></li>
										<li class="submenu_item"><a href="http://hotels.bolgaria-travel.com/hotels/?top_kurort=1587" class="item_link">Созополь</a></li>
									</ul>

</li>
							<li class="menu_item"><a href="http://bolgaria-travel.com/otdyx/" class="menu_link">БЛОГ</a></li>
							<li class="menu_item"><a href="http://bolgaria-travel.com/kontakty/" class="menu_link">КОНТАКТЫ</a></li>
						</ul>
					</div>
				</div>
			</div>
<li class="contacts_item_end"><a href="#" class="contacts_link"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/client.png">Вход для клиентов</a></li>
						<li class="contacts_item_end"><a href="#" class="contacts_link"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/agency.png">Вход для агенств</a></li>
</div>
</div>