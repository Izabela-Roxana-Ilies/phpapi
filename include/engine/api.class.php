<?php
class Api{
	const ACCEPTS = "ALL";
	private $ACCEPTED_REQUESTS = array(
		"/calculator/sum"=>PUBLIC_REQUEST
	);
	
	function __construct(){
		
	}
	public function isRequestAccepted($request){
		
		if(isset($this->ACCEPTED_REQUESTS[$request])){
			if($this->ACCEPTED_REQUESTS[$request] == PUBLIC_REQUEST){
				
				return YES;
				
			}
			if($this->ACCEPTED_REQUESTS[$request] == PRIVATE_REQUEST){
				if(isset($GLOBALS[REQUEST]["api_secret"]) && $GLOBALS[API_SECRETS][$GLOBALS[REQUEST]["api_secret"]] == YES ){
					return YES;
				}
			}
		}
		return NO;
	}
	public function doLocalRequest($request,$params){
		$GLOBALS[REQUEST] = $params;
		$this->doRequest($request);
	}
	public function doRequest($request){
		if($this->isRequestAccepted($request) == NO){
			return NO;
		}
		require_once(API_PATH."request.abstract.class.php");
		require_once(API_PATH.".".$request.".class.php");
		$class = str_replace("/","_",$request);
		$reqObj = new $class;
		if($reqObj->acceptParams() == NO){
			return array(
				"returned"=>NO,
				"message"=>"not all required params were received",
				"params"=>$reqObj->listOfParams(),
				"is_success"=>NO
			);
		}
		$response = array(
			"returned"=>$reqObj->Perform(),
			"is_success"=>YES
		);
		return $response;
	}
}
