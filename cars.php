<?php 

$car = new taurus;
$car->setColor('black');

print_r($car);
//echo $car->make;
// abstract class is use when class have add on 
abstract class car{
	protected $engine;
	protected $wheels = 4;
	protected $door;
	protected $length;
	protected $weight;
	protected $color;
	
	public function setColor($color){
		$this->color =$color;
		
	}
	
	public function setEngine(engine $engine){
		$this->engine =$engine;
	}
}

abstract class ford extends car{}
class taurus extends ford{
	
	public function _construct() {
		
		$this->length ='2000cm';
		$this->weight ='2000km';
		$this->door = '4';
		
		$engine = new engine;
		$this->setEngine($engine);
	}
	
	
	
	
}

class engine{}


?>

