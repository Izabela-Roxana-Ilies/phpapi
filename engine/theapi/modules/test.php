<?php
class test{
	public function __construct(){
		
	}
	public function hello($params = null){
		return "Hello from the PHP API";
	}
	public function math($params){
		$operand1 = floatval($params->operand1);
		$operand2 = floatval($params->operand2);
		$result = 0;
		switch($params->operator){
			case "+":
				$result = $operand1 + $operand2; 
			break;
			case "-":
				$result = $operand1 - $operand2; 
			break;
			case "*":
				$result = $operand1 * $operand2; 
			break;
			case "/":
				if($operand2 == 0){
					$result = "Second operand musnt be ZERO";
				}else{
					$result = $operand1 / $operand2;
				}
			break;
		}
		return $result;
	}
}


?>