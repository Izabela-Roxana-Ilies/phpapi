<?php
class Utilities{
	public $constants = array(
	
		"PI"=>3.14159265258,
		"EARTH_RADIUS"=>6371000 //meters,
	);
	function __construct(){}
	public function distanceBetweenTwoGPSPoints($point1,$point2){
		$Dlat = deg2rad($point2["latitude"]-$point1["latitude"]);
		$Dlong = deg2rad($point2["longitude"]-$point1["longitude"]);
		$latitude1 = deg2rad($point1["latitude"]);
		$latitude2 = deg2rad($point2["latitude"]);
		$a = sin($Dlat/2)*sin($Dlat/2)+sin($Dlong/2)*sin($Dlong/2)*cos($latitude1)*cos($latitude2);
		$c = 2 * atan2(sqrt($a), sqrt(1-$a));
		return $this->constants["EARTH_RADIUS"]*$c;
	}
}
