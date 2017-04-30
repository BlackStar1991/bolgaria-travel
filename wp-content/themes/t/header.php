<?php
/*
Template Name:header
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
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<script type="text/javascript" src="/wp-content/themes/t/js/jquery.arcticmodal-0.3.min.js"></script>
	<script src="/wp-content/themes/t/js/jquery.cookie.js"></script>

</head>
<style>
html{
	margin:0px !important
}


*{
	margin:0;
	padding: 0;
}

body{
	font-family: 'Source Sans Pro', sans-serif !important;
}

.wrapper{
	width: 100%;
	display: block;
}

.header_block_main{
	width: 100%;
	background-color: white;
	display:flex;
	border-bottom:3px solid #ffb053;
	justify-content:center;
	
}
.header_item{
	margin-right:5%;
	margin-bottom: 0px;
	    margin-top:12px;
}

.contacts{
	margin-bottom: 2px;
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

.contacts_item a:hover{
text-decoration: underline;
	color:black;
}

.contacts_item_end{
	//display:inline-block;
	list-style: none;
	text-decoration: none;
	font-weight: 600;
	font-size:13px;
	margin-left:10px;
	margin-right: 20px;
}


.contacts_link{
	text-decoration: none;
	color: #9b999c;
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
}


.header_strong{
	 
 color: #9b999c !important;
}

contacts_link: hover{
	color:black ;
}

.phone{
	border-bottom: 1px solid grey;
	font-size: 10px;
	color: #9b999c;
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
	width: 171px;
	height: 114px;
	background-image: url(http://bolgaria-travel.com/wp-content/uploads/bg-tel-1.png);
	background-repeat: no-repeat;
	left:-65px;

	display: none;
	text-align: left;

	z-index: 1111;
}

.numbers_item{
	display: flex;
	color-black;
	align-items:center;
	margin: 10px 10px 10px 0px;
	justify-content:space-between;
}

.numbers_item img{
	margin-left: 10px;
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
	padding: 2px;
	border-radius: 3px 3px 0px 0px;
	margin-right: 5px;
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

.menu_item:nth-child(3)
{
	background: linear-gradient(to top, #ffb053, #ff8d05);
}


.fa-search{
	margin-left: 50%;
}


.submenu{
	display: none;
	border-radius: 0 0 5px 5px;
	position: absolute;
	padding: 5px;
	border-bottom: 3px solid orange;
	text-align: left;
	z-index:111;
	background-color: #ff8d05;
	margin-left:-2px;
}

.submenu_item{
	padding: 10px 20px;
	list-style: none;
	top:0;
	left: 0;
	border-bottom: 1px solid black;
	z-index:111;
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
</style>
<body>
<div class="banner_for_25 rotateIn animated"><a href="bolgaria-travel.com/akcii"><img src="http://bolgaria-travel.com/wp-content/uploads/всплывающий-баннер-25000.png"></a><i class="fa fa-times fa-4x" aria-hidden="true"></i></div>


<div class="header_block">
		<div class="header_block_main">
			<div class="logo">
						<a href="http://bolgaria-travel.com/"><img src="http://bolgaria-travel.com/wp-content/uploads/logoft.png" width="300" href="http://bolgaria-travel.com/"></a>
					</div>
			<div class="header_item">
				<div class="contacts">
					<ul class="contacts_block">
						<li class="contacts_item"><a href="http://bolgaria-travel.com/sotrudnichestvo-dlya-agentstv/" class="contacts_link">Агентствам</a></li>
						<li class="contacts_item"><a href="http://bolgaria-travel.com/poryadok-oformleniya-turov-dlya-chastnyx-lic/" class="contacts_link">Туристам</a></li>
						<li class="contacts_item"><a href="http://bolgaria-travel.com/house/" class="contacts_link">Недвижимость</a></li>
						<li class="contacts_item"><a href="http://bolgaria-travel.com/novosti/" class="contacts_link">Новости</a></li>
						
					</ul>
				</div>
				<div class="menu">
					<div class="menu_block">
						<div class="phone">
							<div class="phone_item">
								<strong class="header_strong">Поддержка клиентов на отдыхе</strong><br>
									 <p style="color:black">+359(89)983-63-65</p>
							</div>
							<div class="phone_item">
								<strong class="header_strong">Поддержка клиентов на отдыхе</strong><br>
									<p style="color:black; font-size:12px">+359(89)983-63-65</p>
							</div>
							<div class="phone_item">
								<strong class="header_strong">Для туристических агентов</strong><br>
									<p style="color:black; font-size:12px">+38(095)598-14-39</p>
							</div>
							<div class="phone_item">
								<strong class="header_strong">Частным лицам</strong><br>
									<p style="color:black; font-size:12px">+38(044)543-99-12 <i class="fa fa-arrow-down" aria-hidden="true"></i></p>
									<div class="numbers">
										<div class="numbers_item"><img width="20" src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/mts.png"><p style="color:#000000;font-size:12px">+38 (095) 598-14-39</p></div>
										<div class="numbers_item"><img width="20" src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/kiev.png"><p style="color:#000000;font-size:12px">+38 (097) 394-53-39</p></div>
										<div class="numbers_item"><img width="30" src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/life.png"><p style="color:#000000;font-size:12px">+38 (063) 025-51-93</p></div>
									</div>
							</div>
						</div>
						<ul class="menu_ul">
							<li class="menu_item"><a href="http://bolgaria-travel.com/about-us/" class="menu_link">О нас</a>
							</li>
							<li class="menu_item"><a href="#" class="menu_link">Виды отдыха</a>
									<ul class="submenu">
										<li class="submenu_item"><a href="http://bolgaria-travel.com/hotels-more/" class="item_link">Отдых на море</a></li>
										<li class="submenu_item"><a href="http://bolgaria-travel.com/hotels-ozdorovlenie/" class="item_link">Оздоровление</a></li>
										<li class="submenu_item"><a href="http://bolgaria-travel.com/hotels-gori/" class="item_link">Горнолыжный туризм</a></li>
										<li class="submenu_item"><a href="http://bolgaria-travel.com/hotels-children/" class="item_link">Детский туризм</a></li>
										<li class="submenu_item"><a href="http://bolgaria-travel.com/hotels-ozdorovlenie/" class="item_link">Лечебный туризм</a></li>

									</ul>
							</li>
							<li class="menu_item"><a href="http://bolgaria-travel.com/hotels/" class="menu_link">Подбор тура</a>
							</li>
							<li class="menu_item"><a href="http://bolgaria-travel.com/hot_tour/" class="menu_link">Горящие туры</a>
							</li>

							<li class="menu_item"><a href="#" class="menu_link">Услуги</a>
									<ul class="submenu">
										<li class="submenu_item"><a href="http://bolgaria-travel.com/oformlenie-viz/" class="item_link">Оформление виз</a></li>
										<li class="submenu_item"><a href="http://bolgaria-travel.com/oformlenie-vnzh-v-bolgarii-i-pomoshh-s-pereezdom/" class="item_link">Оформление ВНЖ</a></li>
									</ul>
							</li>
							<li class="menu_item"><a href="#" class="menu_link">Курорты</a>
<ul class="submenu">
										<li class="submenu_item"><a href="http://bolgaria-travel.com/hotels/?top_kurort=1464" class="item_link">Албена</a></li>
										<li class="submenu_item"><a href="http://bolgaria-travel.com/hotels/?top_kurort=1700" class="item_link">Балчик</a></li>
										<li class="submenu_item"><a href="http://bolgaria-travel.com/hotels/?top_kurort=1470" class="item_link">Бургас</a></li>
										<li class="submenu_item"><a href="http://bolgaria-travel.com/hotels/?top_kurort=1480" class="item_link">Варна</a></li>
										<li class="submenu_item"><a href="http://bolgaria-travel.com/hotels/?top_kurort=1473" class="item_link">Золотые пески</a></li>
										<li class="submenu_item"><a href="http://bolgaria-travel.com/hotels/?top_kurort=1943" class="item_link">Калиакра</a></li>
										<li class="submenu_item"><a href="http://bolgaria-travel.com/hotels/?top_kurort=1697" class="item_link">Кранево</a></li>
										<li class="submenu_item"><a href="http://bolgaria-travel.com/hotels/?top_kurort=1618" class="item_link">Равда</a></li>
										<li class="submenu_item"><a href="http://bolgaria-travel.com/hotels/?top_kurort=1477" class="item_link">Св. Константин и Елена</a></li>
										<li class="submenu_item"><a href="http://bolgaria-travel.com/hotels/?top_kurort=1587" class="item_link">Созополь</a></li>
									</ul>

</li>
							<li class="menu_item"><a href="http://bolgaria-travel.com/otdyx/" class="menu_link">Блог</a></li>
							<li class="menu_item"><a href="http://bolgaria-travel.com/kontakty/" class="menu_link">Контакты</a></li>
						</ul>
					</div>
				</div>
			</div>

						<li class="contacts_item_end"><a href="http://bolgaria-travel.com/agentam" class="contacts_link"><img src="http://hotels.bolgaria-travel.com/wp-content/uploads/2016/11/agency.png">Вход для агентств</a></li>
</div>
</div>
<script>


 var num = parseInt($.cookie("visit") || 0) + 1; 
     $.cookie("visit", num); 
     if(num == 1)
         $('.BANNER_FOR_25').css('display','block');
     else{
		$('.BANNER_FOR_25').css('display','none');
	}
	$('.fa-times').click(function(){
		$('.BANNER_FOR_25').css('display','none');
	});

 $(window).scroll(function(){
        var bo = $(this).scrollTop();  
        if (bo<=94)  {
        	$(".header_block_main").css('box-shadow','0 0 0 0');
        	$(".header_block_main").css('position','relative');
        	//$(".header_block").css('margin-top','0px');
        }         
		if ( bo >= 94) {
			$(".header_block_main").css('box-shadow','0 2px  rgba(0,0,0,0.2)');
			$(".header_block_main").css('position','fixed');
			$(".header_block_main").css('margin-top','0px');
			$(".header_block_main").css('z-index','1111');
			$(".header_block_main").css('top','0');
			}
		});


	$(function(){
			$('.menu_item').hover(
    			function() {$('ul', this).slideDown(110);},
    			function() {$('ul', this).slideUp(50);});});

</script>