<?php 

//if($GET != NULL){
	//print_r($_GET);
//}
$car_orders[0]['model']= 'taurus';
$car_orders[0]['engine'] = 'v6';
$car_orders[0]['color']= 'blue';
$car_orders[1]['model']= 'mustang';
$car_orders[1]['engine'] = 'v6';
$car_orders[1]['color']= 'black';
$car_orders[2]['model']= 'taurus';
$car_orders[2]['engine'] = 'v6';
$car_orders[2]['color']= 'blue';

//print_r($car_orders[$_GET['car_order']]);
if (empty($_GET)){

foreach($car_orders as $car_order){
	$i++;
	$car_order_num = $i -1;
	
	//foreach($car_order as $key =>  $value) {
		//echo $key . ':'. $value . "<br>\n";
	//}

	//print_r($car_order);
	
	echo '<a href = '.' "http://web.njit.edu/~lw234/is218/cars2.php?car_order=' . $car_order_num . '"'. '> Car Order '.$i. '</a>';
	
	echo '</p>';
}
}
$car_order = $car_orders[$_GET['car_order']];

foreach($car_order as $key =>  $value) {
		echo $key . ':'. $value . "<br>\n";
}
 
?>