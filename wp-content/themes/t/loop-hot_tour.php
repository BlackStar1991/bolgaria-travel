<?php
$select_star = get_post_meta($post->ID, 'select_star', true);
$order = get_post_meta($post->ID, 'order', true);
$select_voodoo_people = get_post_meta($post->ID, 'select_voodoo_people', true);
$select_xata = get_post_meta($post->ID, 'select_xata', true);
$select_ride = get_post_meta($post->ID, 'select_ride', true);
$select_night = get_post_meta($post->ID, 'select_night', true);
$select_nyam = get_post_meta($post->ID, 'select_pitnie', true);
$field = get_post_meta( get_the_ID(), 'image', true );
$field_url = wp_get_attachment_url( $field );
?>
<?php
$a=1;
$b=2;
$c='2+1';
$d='2+2';
$e='3+1';
$f='3+2';
$g='4+1';
$h='4+2';

?>


<div class="start-hot_hotel">

	<div class="up_line-hot_hotel" >
		<div class="star-hot_hotel icon_hotel">
	<?php
 $x=$select_star;
 	if ($x == Одна) {    echo '<img src="/wp-content/uploads/icon/stars/star-1.png">';} 
	if ($x == ноль) {    echo '<img src="/wp-content/uploads/icon/stars/star0.png">';} 
	elseif ($x == Две) {    echo '<img src="/wp-content/uploads/icon/stars/star-2.png">';}  
	elseif ($x == Три) { echo '<img src="/wp-content/uploads/icon/stars/star-3.png">';} 
	elseif ($x == Четыре) {    echo '<img src="/wp-content/uploads/icon/stars/star-4.png">';} 
	elseif ($x == Пять) {    echo '<img src="/wp-content/uploads/icon/stars/star-5.png">'; }?>
		</div>
		<div class="nyam-hot_hotel icon_hotel">
		 <?php $y=$select_nyam;
 		if ($y == fb) {echo '<img src="/wp-content/uploads/icon/food/food-FB.png">';}
		elseif ($y == bb) {echo '<img src="/wp-content/uploads/icon/food/food-BB.png">';}  
		elseif ($y == hb) {echo '<img src="/wp-content/uploads/icon/food/food-HB.png">';} 
		elseif ($y == bo) {echo '<img src="/wp-content/uploads/icon/food/food-BO.png">';} 
		elseif  ($y == all-inc) {echo '<img src="/wp-content/uploads/icon/food/food-all-inc.png">';} ?>
		</div>
		<div class="people-hot_hotel icon_hotel">
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
		<div class="xata-hot_hotel icon_hotel">
<?php $y=$select_xata;
 	if ($y == app) {echo '<img src="/wp-content/uploads/icon/placement/placement-app.png">';} 
	elseif ($y == dbl) {echo '<img src="/wp-content/uploads/icon/placement/placement-dbl.png">';}  
	elseif ($y == qdbl) {echo '<img src="/wp-content/uploads/icon/placement/placement-qdpl.png">';} 
	elseif ($y == sgl) {echo '<img src="/wp-content/uploads/icon/placement/placement-sgl.png">';} 
	elseif ($y == studio) {echo '<img src="/wp-content/uploads/icon/placement/placement-studio.png">';} 
	elseif ($y == trpl) {echo '<img src="/wp-content/uploads/icon/placement/placement-trpl.png">';} 
	elseif ($y == none) {echo '<img src="/wp-content/uploads/icon/placement/apar.png">';} ?>
		</div>
		<div class="ride-hot_hotel icon_hotel">
<?php $y=$select_ride;
 	if ($y == Автобус) {    echo '<img src="/wp-content/uploads/icon/transfers/bus.png">';} 
	elseif ($y == Авиа) {    echo '<img src="/wp-content/uploads/icon/transfers/flight.png">';} 
	elseif ($y == без_трансфера) {    echo '<img src="/wp-content/uploads/no-transfer.png">';} ?>
		</div>
		<div class="night-hot_hotel icon_hotel">
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
	elseif ($y == 15) { echo  '<img src="http://bolgaria-travel.com/wp-content/uploads/15.png">';}?>
		</div>
	</div>
<center><a href="<?php the_permalink(); ?>" class="pre_image"><?php echo get_the_post_thumbnail( $id, array(444, 200), array('class' => 'hotel-tumb') ); ?></a></center>
	<div class="price-hot_hotel">
<p class="price_hot_hotel_text">от <?php echo $order?> <span class="euro">EUR</span></p>
	</div>
	<div class="title-hot_hotel">
<h4 class="postitle postitle-hot_hotel"><a href="<?php the_permalink(); ?>" style="color:white !important;"><?php the_title(); ?></a></h4>
	</div>
	
</div>
