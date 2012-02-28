<?php
abstract class ActionRequest{
	const REQUEST_TYPE_POST = '_POST';
	const REQUEST_TYPE_GET  = "_GET";
	protected $params = array();
	protected $requestType;
	protected $REQUEST;
	abstract public function Perform();
	function __construct(){
		
	}
	public function listOfParams(){
		return $this->params;
	}
	public function requestTypeAccepted(){
		return $this->requestType;
	}
	public function acceptParams(){
		switch($this->requestType){
			case self::REQUEST_TYPE_GET:
				$this->REQUEST = $_GET;
			break;
			case self::REQUEST_TYPE_POST:
				$this->REQUEST = $_POST;
			break;
			default:
				$this->REQUEST = $_REQUEST;
			break;
		}
		foreach($this->params as $key=>$val){
			if($val == YES){
				if(!isset($this->REQUEST[$key]) || $this->REQUEST[$key] == ""){
					return NO;
				}
			}
		}
		return YES;
	}
}
