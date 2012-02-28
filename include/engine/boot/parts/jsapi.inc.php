<?php
	$js_request_path = str_replace("/".DYNAMIC_JS_INIT_STRING,"",$lUrl["path"]);
	$callback = DEFAULT_JS_CALLBACK;
	if($_GET["callback"] != ""){
			$callback = $_GET["callback"];
	}
	$respose = array();
	if($GLOBALS[API]->isRequestAccepted($js_request_path) == NO){
		$response["is_success"] = NO;
		$response["message"] = "Request not accepted";
		$response["request"] = $api_request_path;
	}else{
		$response = $GLOBALS[API]->doRequest($js_request_path);
		$response["is_success"] = YES;
		$response["session_key"] = $GLOBALS[SESSION]->key();
	}
	header(RESPONSE_CODE_OK);
	header("Content-type: ".CONTENT_TYPE_JS);
	$fct = explode(".",$callback);
	$functionName = $fct[count($fct)-1];
	die($callback."(".json_encode($response).");document.getElementsByTagName('head')[0].removeChild(document.getElementById('{$functionName}'));try{Load.jsCallbacks.{$functionName}=nil;delete Load.jsCallbacks.{$functionName};}catch(e){}");