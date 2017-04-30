<?php
/*
Template Name: many_akcii
*/ ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Akcii</title>
</head>
<style type="text/css">
	
	@font-face {
    font-family: PF_Sans_Pro;
    src: url(/wp-content/themes/t/fonts/pfsquaresanspro-regular.ttf); 
   }
	
	.content{
		width:70%;
		margin:auto;
		font-family: PF_Sans_Pro;
	}
	


	h1{
		margin-bottom:30px;
		font-family: PF_Sans_Pro;
	}

	
	.akcii{
		width:100%;
		display:flex;
		flex-wrap:wrap;
		justify-content:space-between;
	}


	.akcii_item{
		width: 325px;
		border:1px solid orange;
		border-radius:5px;
		margin:10px 0px;
	}

	.akcii_photo{
		position:relative;
	}

	.akcii_photo img{
		border-radius: 5px 5px 0 0;

		width:100%;
		height:auto;
	}
	.date{
		color:white;
		font-size: 16px;
		padding:10px;
		position:absolute;
		left:140px;
		top:0px;
		background-color:rgba(0,0,0,.2)
	}

	button{
		border-radius:5px;
		border:0px;
		color:white;
		font-size: 17px;
		background-color:#31d004;
		padding:5px 10px;
		position:absolute;
		left: 198px;
    		top: 230px;
	}

	.timer{
		text-align:center;
		padding:5px;
		border-right:1px solid;
		margin-right: 17px;
	}

	

	.akcii_text{
		display:flex;
		padding:5px;
	}


	.text h3{
		color:#2d68ff;
		font-size:14px;
		padding:5px;
		font-family: PF_Sans_Pro;
		font-weight:bold;
	}
	
	.text p{
		font-size:15px;
	}
</style>
<body>
	<?php get_header();?>
	<div class="content">
		<h1>Акции</h1>
		
	<div class="akcii">
		<div class="akcii_item">
			<div class="akcii_photo">
				<img src="http://bolgaria-travel.com/wp-content/uploads/kristal.png">
				<div class="date">12.02.2017-30.04.2017</div>
				<a href="http://bolgaria-travel.com/hotel_akcii1/"><button>Подробнее</button></a>
			</div>
			<div class="akcii_text">
				<div class="timer">
					Осталось
					<script src="http://megatimer.ru/s/27270698937ad674638181bba4079aba.js"></script>
				</div>
				<div class="text">
					<h3>СКИДКА -15% + ПОДАРОК </h3>
					<p>При резервации отеля “Кристалл 3*” получите 15% скидки и набор косметики в подарок!</p> 
				</div>
			</div>
		</div>




		<div class="akcii_item">
			<div class="akcii_photo">
				<img src="http://bolgaria-travel.com/wp-content/uploads/golden-ina-1.png">
				<div class="date">12.02.2017-30.04.2017</div>
				<a href="http://bolgaria-travel.com/hotels_akcii2/"><button>Подробнее</button></a>
			</div>
			<div class="akcii_text">
				<div class="timer">
					Осталось
					<script src="http://megatimer.ru/s/27270698937ad674638181bba4079aba.js"></script>
				</div>
				<div class="text">
					<h3>СКИДКА -15% + ПОДАРОК </h3>
					<p>При резервации отеля “Golden Ina 3*” получите 15% скидки и набор косметики в подарок!</p> 
				</div>
			</div>
		</div>



				
		<div class="akcii_item">
			<div class="akcii_photo">
				<img src="http://ro.bulgartourism.com/wp-content/uploads/астория-2.png">
				<div class="date">12.02.2017-30.04.2017</div>
				<a href="http://bolgaria-travel.com/hotel_akcii5/"><button>Подробнее</button></a>
			</div>
			<div class="akcii_text">
				<div class="timer">
					Осталось
					<script src="http://megatimer.ru/s/27270698937ad674638181bba4079aba.js"></script>
				</div>
				<div class="text">
					<h3>СКИДКА -10% + ПОДАРОК </h3>
					<p>При резервации отеля “ASTORIA 3*” получите 10% скидки и набор косметики в подарок!</p> 
				</div>
			</div>
		</div>



		<div class="akcii_item">
			<div class="akcii_photo">
				<img src="http://ro.bulgartourism.com/wp-content/uploads/helios-2.png">
				<div class="date">12.02.2017-30.04.2017</div>
				<a href="http://bolgaria-travel.com/hotel_akcii10/"><button>Подробнее</button></a>
			</div>
			<div class="akcii_text">
				<div class="timer">
					Осталось
					<script src="http://megatimer.ru/s/27270698937ad674638181bba4079aba.js"></script>
				</div>
				<div class="text">
					<h3>СКИДКА -10% + ЭКСКУРСИЯ</h3>
					<p>При резервации отеля “Helios 4*” получите 10% скидки и ваучер на экскурсию в Болгарии в подарок!</p> 
				</div>
			</div>
		</div>




		<div class="akcii_item">
			<div class="akcii_photo">
				<img src="http://ro.bulgartourism.com/wp-content/uploads/hilton.png">
				<div class="date">12.02.2017-30.04.2017</div>
				<a href="http://bolgaria-travel.com/hotel_akcii11/"><button>Подробнее</button></a>
			</div>
			<div class="akcii_text">
				<div class="timer">
					Осталось
					<script src="http://megatimer.ru/s/27270698937ad674638181bba4079aba.js"></script>
				</div>
				<div class="text">
					<h3>СКИДКА -10% + ЭКСКУРСИЯ </h3>
					<p>При резервации отеля “HILTON 5*” получите 10% скидки и ваучер на экскурсию в Болгарии в подарок!</p> 
				</div>
			</div>
		</div>








	</div>
	</div>
	<?php get_footer();?>
</body>
</html>
