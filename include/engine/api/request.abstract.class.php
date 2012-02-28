<?php
abstract class RequestAbstract{
	protected $params = array();
	
	abstract public function Perform();
	
	function __construct(){
		
	}
	public function listOfParams(){
		return $this->params;
	}
	public function acceptParams(){
		foreach($this->params as $key=>$val){
			if($val == YES){
				if(!isset($GLOBALS[REQUEST][$key]) || $GLOBALS[REQUEST][$key] == ""){
					return NO;
				}
			}
		}
		return YES;
	}
}
