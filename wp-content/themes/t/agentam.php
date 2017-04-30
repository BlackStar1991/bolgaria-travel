<?php
	/*
Template Name: agent
*/
?>
<body>
<?php get_header();?>

<script src="http://37.18.77.200/search_tour?samo_action=embed&LANG=rus&DOLOAD=1" charset="windows-1251"></script>
<style>

.HOTELSCONTAINER{
	width:910px;
	display:flex;
}


 .samo_container .panel, #modalContainer div.modalTitle, #logonContainer div.modalTitle {
    background-color:transparent !important;
}

.samo_container .panel {
   
    box-shadow:none !important;
}




.searchmodes{
	display: none;

}

.samo_container table.res thead th, .samo_container table.res .thead th, .samo_container table.res thead td, .samo_container .Zebra_DatePicker .dp_daypicker th {
	background-color: #ff6500 !important;
	color:white;
}

.price_info{
	backgro und-color: white !important;
	border:1px solid black;
}

.load{
background-color: #31d004;
	border-radius: 5px;
	color:white !important;
	border:none;
	font-size: 20px;
	padding: 10px 15px !important;

}

.samo_container .price_button{
	background-image: none !important;
	text-align: center;
	background-color: white !important;
	padding: 10px 0px;
	top:0px !important;
}

.programm_filter {
	display: none;
}

.left{
	color:black;
}

.PRICE_MIN {
	top:0px !important;
}

.PRICE_MAX {
	top:0px !important;
}

.samo_container table.res .odd td, .samo_container .odd{
	background-color: white !important;
}

.samo_container table.res .even td, .samo_container .even{
	background-color: white !important;
}

.res{
	border: 1px solid black !important;
}
</style>

<?php get_footer();?>
</body>