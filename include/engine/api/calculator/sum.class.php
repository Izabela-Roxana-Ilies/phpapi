<?php
class Request extends RequestAbstract{
	protected $params = array(
		"operand"=>YES
	);
	function __construct(){}
	public function Perform(){
		$operand = $GLOBALS[REQUEST]["operand"];
		$sum = 0;
		foreach($operand as $idx=>$o){
			$sum += floatval($o);
		}
		return array(
			"success"=>YES,
			"sum"=>$sum
		);
	}
}
