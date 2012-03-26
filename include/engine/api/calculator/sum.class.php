<?php
/*
Api method class name should be:

_namespace_method

or better yet:

str_replace("/","_","the_full_method")

in this case

/calculator/sum is what the api will call and the class is _calculator_sum

the update is for nested API calls, so you can call other API methods inside others .. 
stay focused when you do this as you can get to infinite loop .. hopefully you wont :P 

note to self: maybe put some sort of break point when nested calls are done and can go on infinite loop - maybe not, TBD



*/
class _calculator_sum extends RequestAbstract{
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
