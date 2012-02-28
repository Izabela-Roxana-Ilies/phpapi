<?php
class Action{
	function __construct(){
		
	}
	public function canBeCalled($request){
		if(file_exists(ACTION_PATH.".".$request.".class.php") && is_file(ACTION_PATH.".".$request.".class.php")){
			return YES;
		}
		return NO;
	}
	public function doRequest($request){
		if($this->canBeCalled($request) == NO){
			
			$GLOBALS[CONTENT]->displayBadRequest();
			die();
			return NO;
		}
		require_once(ACTION_PATH."actionrequest.abstract.class.php");
		require_once(ACTION_PATH.".".$request.".class.php");
		$reqObj = new TheAction();
		if($reqObj->acceptParams() == NO){
			
			$GLOBALS[CONTENT]->displayPageBadAction(array(
				"requiredparams"=>$reqObj->listOfParams()
			));
			
			die();
			return NO;
		}
		$response = $reqObj->Perform();
		
		return $response;
	}
}
